<?php
// Класс для работы с базой данных
class DbConnector
{
    // Константы для подключения к базе данных
    const DB_HOST = 'localhost';
    const DB_NAME = 'online_shop';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    // Соединение с базой данных
    private $connection;

    // Конструктор класса
    function __construct()
    {
        // Подключение к базе данных
        $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=utf8";
        try {
            $this->connection = new PDO($dsn, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo "Ошибка подключения к базе данных: " . $e->getMessage();
            die();
        }
    }

    // Метод для выполнения SELECT запросов
    public function select($table, $where = null, $order_by = null)
    {
        $query = "SELECT * FROM $table";
        if ($where) {
            $query .= " WHERE $where";
        }
        if ($order_by) {
            $query .= " ORDER BY $order_by";
        }
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Метод для выполнения INSERT запросов
    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->connection->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    // Метод для выполнения UPDATE запросов
    public function update($table, $data, $where = null)
    {
        $set_values = array();
        foreach ($data as $key => $value) {
            $set_values[] = "$key = :$key";
        }
        $set_values = implode(", ", $set_values);
        $query = "UPDATE $table SET $set_values";
        if ($where) {
            $query .= " WHERE $where";
        }
        $stmt = $this->connection->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    // Метод для выполнения DELETE запросов
    public function delete($table, $where)
    {
        $query = "DELETE FROM $table WHERE $where";
        return $this->connection->exec($query);
    }
}
