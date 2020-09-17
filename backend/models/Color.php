<?php
require_once 'models/Model.php';

class Color extends Model
{
    public $id;
    public $color;
    public $created_at;
    public $updated_at;

    public function create(){
        $sqlInsert = "INSERT INTO colors (`color`) VALUES (:color)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':color' => $this->color
        ];
        return $objInsert->execute($arrInsert);
    }
}