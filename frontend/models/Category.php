<?php
require_once 'models/Model.php';

class Category extends Model
{
    public function getAllCategory(){
        $sqlSelect = "SELECT * FROM categories";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }
}