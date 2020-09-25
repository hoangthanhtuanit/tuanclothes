<?php
require_once 'models/Model.php';

class Size extends Model
{
    public function getAll(){
        $sqlSelect = "SELECT * FROM sizes";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }
}