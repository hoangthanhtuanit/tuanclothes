<?php
require_once 'configs/database.php';

/**
 * Class Model đóng vai trò class Model cha
 */
class Model
{
    public $connection;

    public function __construct()
    {
        $this->getConnection();
    }

    public function getConnection()
    {
        try {
            $this->connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->connection = null;
    }
}