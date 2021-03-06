<?php
require_once 'models/Model.php';
require_once 'models/Pagination.php';

class Product extends Model
{
    public $id;
    public $quantity_in_stock;

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
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProduct(){
        $sql_select = "SELECT products.*, categories.name 
          AS category_name, suppliers.name AS supplier_name FROM categories
          INNER JOIN products ON products.category_id = categories.id INNER JOIN suppliers ON suppliers.id = products.supplier_id
          WHERE products.status = 1";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();

        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countTotal(){
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE status = 1");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getAllPagination($params = []){
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection->prepare("SELECT * FROM products WHERE status = 1 LIMIT $start, $limit");

        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countTotalByCat($id){
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE status = 1 AND category_id = $id");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getProductByCategory($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $id = $params['category_id'];
        $start = ($page - 1) * $limit;
        $objSelect = $this->connection->prepare("SELECT * FROM products WHERE status = 1 AND category_id = $id LIMIT $start, $limit");
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id){
        $sqlUpdate = "UPDATE products SET liked = :liked, updated_at = :updated_at WHERE id = :id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':liked' => $this->liked,
            ':updated_at' => $this->updated_at,
            ':id' => $id
        ];
        return $objUpdate->execute($arrUpdate);
    }

    public function updateQuantity($id){
        $sqlUpdate = "UPDATE products SET quantity_in_stock = :quantity_in_stock WHERE id = $id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':quantity_in_stock' => $this->quantity_in_stock
        ];
        return $objUpdate->execute($arrUpdate);
    }
}