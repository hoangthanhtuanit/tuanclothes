<?php
require_once 'models/Model.php';

class Category extends Model
{
    public $id;
    public $name;
    public $status;
    public $created_at;
    public $updated_at;

    public function index()
    {
        $sqlSelect = "SELECT * FROM categories";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert()
    {
        $sqlInsert = "INSERT INTO categories (`name`, `status`) VALUES (:name, :status)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':name'   => $this->name,
            ':status' => $this->status
        ];
        return $objInsert->execute($arrInsert);
    }

    public function getCategoryById($id)
    {
        $sqlSelect = "SELECT * FROM categories WHERE id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {
        $sqlUpdate = "UPDATE categories SET name = :name, status = :status, updated_at = :updated_at WHERE id = :id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':name' => $this->name,
            ':status' => $this->status,
            'updated_at' => $this->updated_at,
            ':id' => $id
        ];
        return $objUpdate->execute($arrUpdate);
    }

    public function delete($id)
    {
        $sqlDelete = "DELETE FROM categories WHERE id = :id";
        $objDelete = $this->connection->prepare($sqlDelete);
        $sqlDeleteProduct = "DELETE FROM products WHERE category_id = :id";
        $objDeleteProduct = $this->connection->prepare($sqlDeleteProduct);
        $arrDelete = [
            ':id' => $id
        ];
        $objDeleteProduct->execute($arrDelete);
        return $objDelete->execute($arrDelete);
    }
}