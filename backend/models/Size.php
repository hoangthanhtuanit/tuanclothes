<?php
require_once 'mdoels/Model.php';

class Size extends Model
{
    public $id;
    public $size;
    public $created_at;
    public $updated_at;

    public function index(){
        $sqlSelect = "SELECT * FROM sizes";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(){
        $sqlInsert = "INSERT INTO sizes (`size`) VALUES (:size)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':size' => $this->size
        ];
        return $objInsert->execute($arrInsert);
    }
}