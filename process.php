<?php

require_once 'DbConnector.php';

/**
 * Класс для работы с пользовательскими данными
 */
class UserManager
{
    /**
     * Объект для работы с базой данных
     *
     * @var DbConnector
     */
    private $db;

    /**
     * Конструктор класса UserManager, создает объект класса DbConnector
     */
    public function __construct()
    {
        $this->db = new DbConnector();
    }

    /**
     * Метод для получения пользователя по email и паролю
     *
     * @param string $email Email пользователя
     * @param string $password Пароль пользователя
     * 
     * @return array|null Массив данных пользователя или null, если пользователь не найден
     */
    public function getUserByEmailAndPassword(string $email, string $password): ?array
    {
        // Выбираем пользователя из базы данных по email
        $result = $this->db->select("users", "email='$email'");

        // Проверяем, что пользователь найден и пароль верный
        if (count($result) > 0 && password_verify($password, $result[0]['password'])) {
            return $result[0];
        }

        return null;
    }

    /**
     * Метод для регистрации нового пользователя
     *
     * @param string $name Имя пользователя
     * @param string $email Email пользователя
     * @param string $password Пароль пользователя
     * 
     * @return bool Результат выполнения запроса на добавление пользователя
     */
    public function registerUser(string $name, string $email, string $password): bool
    {
        // Проверяем, что пользователь с таким email еще не зарегистрирован
        $result = $this->db->select("users", "email='$email'");

        if (count($result) > 0) {
            return false;
        }

        // Добавляем пользователя в базу данных
        $data = array(
            "name" => $name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        );

        return $this->db->insert("users", $data);
    }
}

/**
 * Класс для обработки данных
 */
class Process
{
    /**
     * Объект для работы с пользовательскими данными
     *
     * @var UserManager
     */
    private $userManager;

    /**
     * Конструктор класса Process, создает объект класса UserManager
     */
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    /**
     * Метод для регистрации пользователя
     *
     * @param string $name Имя пользователя
     * @param string $email Email пользователя
     * @param string $password Пароль пользователя
     * 
     * @return string Сообщение о результате регистрации
     */
    public function register(string $name, string $email, string $password): string
    {
        // Пытаемся зарегистрировать пользователя
        if (!$userId = $this->userManager->registerUser($name, $email, $password)) {
            http_response_code(409);
            $response = [
                'message' => 'User with this email already exists',
                'url' => null
            ];
            return json_encode($response);
        }
        
        $_SESSION['user_id'] = $userId;

        
        // Если пользователь зарегистрирован, возвращаем сообщение об успехе и URL-адрес для перенаправления на страницу каталога
        $response = [
            'message' => 'User successfully registered',
            'url' => '/catalog.php'
        ];
        return json_encode($response);
    }

    /**
     * Метод для авторизации пользователя
     *
     * @param string $email Email пользователя
     * @param string $password Пароль пользователя
     * 
     * @return string Сообщение о результате авторизации
     */
    public function login(string $email, string $password): string
    {
        $user = $this->userManager->getUserByEmailAndPassword($email, $password);

        if (!$user) {
            http_response_code(401);
            $response = [
                'message' => 'Wrong email or password',
                'url' => null
            ];
            return json_encode($response);
        }

        $_SESSION['user_id'] = $user['id'];
        
        // Если пользователь авторизован, возвращаем сообщение об успехе и URL-адрес для перенаправления на страницу каталога
        $response = [
            'message' => 'User successfully logged in',
            'url' => '/catalog.php'
        ];
        return json_encode($response);
    }
}

// Создаем объект класса Process
$process = new Process();

// Обрабатываем данные формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из запроса POST
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Получаем отдельные переменные из декодированных данных
    $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
    $password = $data['password'];

    // Проверяем, какая кнопка была нажата на форме
    if (isset($data['registration'])) {
        $name = filter_var($data['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $result = $process->register($name, $email, $password);
    
        header('Content-Type: application/json');
        echo json_encode($result);
    } elseif (isset($data['login'])) {
        header('Content-Type: application/json');
        echo json_encode($process->login($email, $password));
    }
}
?>