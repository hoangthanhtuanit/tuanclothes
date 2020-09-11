<?php
require_once 'models/Model.php';

class Supplier extends Model
{
    public $id;
    public $name;
    public $phone_number;
    public $address;
    public $email;
    public $created_at;
    public $updated_at;

    public function index()
    {
        $sqlSelect = "SELECT * FROM suppliers";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert()
    {
        $sqlInsert = "INSERT INTO suppliers (`name`, `phone_number`, `address`, `email`) VALUES (:name, :phone_number, :address, :email)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':name' => $this->name,
            ':phone_number' => $this->phone_number,
            ':address' => $this->address,
            ':email' => $this->email
        ];
        return $objInsert->execute($arrInsert);
    }

    public function getSupplierById($id)
    {
        $sqlSelect = "SELECT * FROM suppliers WHERE id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {
        $sqlUpdate = "UPDATE suppliers SET name = :name, phone_number = :phone_number, address = :address, email = :email, updated_at = :updated_at WHERE id = :id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':name' => $this->name,
            ':phone_number' => $this->phone_number,
            ':address' => $this->address,
            ':email' => $this->email,
            ':updated_at' => $this->updated_at,
            ':id' => $id
        ];
        return $objUpdate->execute($arrUpdate);
    }

    public function delete($id)
    {
        $sqlDelete = "DELETE FROM suppliers WHERE id = :id";
        $objDelete = $this->connection->prepare($sqlDelete);
        $arrDelete = [
            ':id' => $id
        ];
        return $objDelete->execute($arrDelete);
    }
}