<?php
require_once 'models/Model.php';

class Product extends Model
{
    public $id;
    public $category_id;
    public $supplier_id;
    public $name;
    public $image;
    public $color;
    public $price;
    public $discount;
    public $quantity_in_stock;
    public $quantity_sold;
    public $liked;
    public $summary;
    public $description;
    public $status;
    public $created_at;
    public $updated_at;

    public function index(){
        $sqlSelect = "SELECT * FROM products";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        $products = $objSelect->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function insert(){
        $sqlInsert = "INSERT INTO products (`category_id`, `supplier_id`, `name`, `image`, `color`,`price`, `discount`, `quantity_in_stock`, `summary`, `description`, `status`) VALUES (:category_id, :supplier_id, :name, :image, :color,:price, :discount, :quantity_in_stock, :summary, :description, :status)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':category_id' => $this->category_id,
            ':supplier_id' => $this->supplier_id,
            ':name' => $this->name,
            ':image' => $this->image,
            ':color' => $this->color,
            ':price' => $this->price,
            ':discount' => $this->discount,
            ':quantity_in_stock' => $this->quantity_in_stock,
            ':summary' => $this->summary,
            ':description' => $this->description,
            ':status' => $this->status
        ];
        return $objInsert->execute($arrInsert);
    }

    public function getProductById($id){
        $sqlSelect = "SELECT * FROM products WHERE id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id){
        $sqlUpdate = "UPDATE products SET category_id = :category_id, supplier_id = :supplier_id, name = :name, image = :image, color = :color, price = :price, discount = :discount, quantity_in_stock = :quantity_in_stock, summary = :summary, description = :description, status = :status WHERE id = :id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':category_id' => $this->category_id,
            ':supplier_id' => $this->supplier_id,
            ':name' => $this->name,
            ':image' => $this->image,
            ':color' => $this->color,
            ':price' => $this->price,
            ':discount' => $this->discount,
            ':quantity_in_stock' => $this->quantity_in_stock,
            ':summary' => $this->summary,
            ':description' => $this->description,
            ':status' => $this->status,
            ':id' => $id
        ];
        return $objUpdate->execute($arrUpdate);
    }

    public function delete($id){
        $sqlDelete = "DELETE FROM products WHERE id = :id";
        $objDelete = $this->connection->prepare($sqlDelete);
        $arrDelete = [
            ':id' => $id
        ];
        return $objDelete->execute($arrDelete);
    }
}