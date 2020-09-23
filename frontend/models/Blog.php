<?php
require_once 'models/Model.php';

class Blog extends Model
{
    public function getAllBlog(){
        $sqlSelect = "SELECT * FROM blogs WHERE status = 1 ORDER BY RAND()";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBlog(){
        $sqlSelect = "SELECT * FROM blogs WHERE status = 1 ORDER BY RAND() LIMIT 3";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBlogById($id){
        $sqlSelect = "SELECT * FROM blogs WHERE status = 1 AND id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetch(PDO::FETCH_ASSOC);
    }
}