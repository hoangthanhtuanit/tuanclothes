<?php
require_once 'models/Model.php';

class Product extends Model
{
    public function getNewProduct(){
        $sqlSelect = "SELECT * FROM products WHERE STATUS = 1 ORDER BY RAND() LIMIT 8";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHotProduct(){
        $sqlSelect = "SELECT * FROM products WHERE STATUS = 1 AND quantity_sold > 0 ORDER BY RAND() LIMIT 4";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSaleProduct(){
        $sqlSelect = "SELECT * FROM products WHERE STATUS = 1 AND discount > 0 ORDER BY RAND() LIMIT 4";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopRateProduct(){
        $sqlSelect = "SELECT * FROM products WHERE STATUS = 1 AND liked > 0 ORDER BY RAND() LIMIT 3";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id){
        $sqlSelect = "SELECT products.*, categories.name AS category_name, suppliers.name AS supplier_name FROM categories INNER JOIN products ON products.category_id = categories.id INNER JOIN suppliers ON suppliers.id = products.supplier_id WHERE products.status = 1 AND products.id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' =>$id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetch(PDO::FETCH_ASSOC);
    }
}