<?php
require_once 'models/Model.php';

class Banner extends Model
{
    public function getAllBanner(){
        $sqlSelect = "SELECT * FROM banners";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }
}