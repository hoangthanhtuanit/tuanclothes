<?php
require_once 'models/Model.php';

class User extends Model
{
    public $id;
    public $email;
    public $password;
    public $full_name;
    public $phone_number;
    public $address;
    public $avatar;
    public $level;
    public $confirmation_code;
    public $status;
    public $created_at;
    public $updated_at;

    public function index(){
        $sqlSelect = "SELECT * FROM users";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        $users = $objSelect->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function insert(){
        $sqlInsert = "INSERT INTO users (`email`, `password`, `full_name`, `phone_number`, `address`, `avatar`, `level`, `status`) VALUES (:email, :password, :full_name, :phone_number, :address, :avatar, :level, :status)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':email' => $this->email,
            ':password' => $this->password,
            ':full_name' => $this->full_name,
            ':phone_number' => $this->phone_number,
            ':address' => $this->address,
            ':avatar' => $this->avatar,
            ':level' => $this->level,
            ':status' => $this->status
        ];
        return $objInsert->execute($arrInsert);
    }

    public function getUserById($id){
        $sqlSelect = "SELECT * FROM users WHERE id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id){
        $sqlUpdate = "UPDATE users SET email = :email, password = :password, full_name = :fullname, phone_number = :phone_number, address = :address, avatar = :avatar, level = :level, status = :status, updated_at = :updated_at WHERE id = :id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':email' => $this->email,
            ':password' => $this->password,
            ':full_name' => $this->full_name,
            ':phone_number' => $this->phone_number,
            ':address' => $this->address,
            ':avatar' => $this->avatar,
            ':level' => $this->level,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
            ':id' => $id
        ];
        return $objUpdate->execute($arrUpdate);
    }

    public function delete($id){
        $sqlDelete = "DELETE FROM users WHERE id = :id";
        $objDelete = $this->connection->prepare($sqlDelete);
        $arrDelete = [
            ':id' => $id
        ];
        return $objDelete->execute($arrDelete);
    }
}