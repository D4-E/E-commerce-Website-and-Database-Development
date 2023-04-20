<?php

require_once 'DbConnector.php';

/**
 * Класс для обработки данных
 */
class Process
{
    private $db;

    /**
     * Конструктор класса Process, создает объект класса DbConnector
     */
    public function __construct()
    {
        $this->db = new DbConnector();
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
        $result = $this->db->select("users", "email='$email'");

        if (count($result) > 0) {
            return "User with this email already exists.";
        }

        $data = array(
            "name" => $name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        );

        $result = $this->db->insert("users", $data);

        if ($result) {
            header('Location: catalog.php');
            exit();
        } else {
            return "Registration failed. Please try again later.";
        }
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
        $result = $this->db->select("users", "email='$email'");

        if (count($result) > 0) {
            if (password_verify($password, $result[0]['password'])) {
                header('Location: catalog.php');
                exit();
            } else {
                return "Incorrect password.";
            }
        } else {
            return "User not found.";
        }
    }
}

// Создаем объект класса Process
$process = new Process();

var_dump($_POST);

// Обрабатываем данные формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $process->register($name, $email, $password);
    } elseif (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $process->login($email, $password);
    }
}
?>