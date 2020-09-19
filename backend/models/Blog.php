<?php
require_once 'models/Model.php';

class Blog extends Model
{
    public $id;
    public $title;
    public $image;
    public $summary;
    public $content;
    public $status;
    public $created_at;
    public $updated_at;

    public function index(){
        $sqlSelect = "SELECT * FROM blog";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(){
        $sqlInsert = "INSERT INTO blog (`title`, `image`, `summary`, `content`, `status`) VALUES (:title, :image, :summary, :sontent,:status)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':title' => $this->title,
            ':image' => $this->image,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':status' => $this->status
        ];
        return $objInsert->execute($arrInsert);
    }

    public function getBlogById($id){
        $sqlSelect = "SELECT * FROM blog WHERE id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id){
        $sqlUpdate = "UPDATE blog SET title = :title, image = :image, summary = :summary, content = :content, status = :status, updated_at = :updated_at WHERE id = :id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':title' => $this->title,
            ':image' => $this->image,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
            ':id' => $id
        ];
        return $objUpdate->execute($arrUpdate);
    }

    public function delete($id){
        $sqlDelete = "DELETE FROM blog WHERE id = :id";
        $objDelete = $this->connection->prepare($sqlDelete);
        $arrDelete = [
            ':id' => $id
        ];
        return $objDelete->execute($arrDelete);
    }
}