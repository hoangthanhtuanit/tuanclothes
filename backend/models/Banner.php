<?php
require_once 'models/Model.php';
class Banner extends Model
{
    public $id;
    public $title;
    public $summary;
    public $image;
    public $status;
    public $created_at;
    public $updated_at;

    public function index(){
        $sqlSelect = "SELECT * FROM banners";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        $banners = $objSelect->fetchAll(PDO::FETCH_ASSOC);
        return $banners;
    }

    public function insert(){
        $sqlInsert = "INSERT INTO banners (`title`, `summary`, `image`, `status`) VALUES (:title, :summary, :image, :status)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':title' => $this->title,
            ':summary' => $this->summary,
            ':image' => $this->image,
            ':status' => $this->status
        ];
        return $objInsert->execute($arrInsert);
    }

    public function getBannerById($id){
        $sqlSelect = "SELECT * FROM banners WHERE id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        $banner = $objSelect->fetch(PDO::FETCH_ASSOC);
        return $banner;
    }

    public function update($id){
        $sqlUpdate = "UPDATE banners SET title = :title, summary = :summary, image = :image, status = :status WHERE id = :id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':title' => $this->title,
            ':summary' => $this->summary,
            ':image' => $this->image,
            ':status' => $this->status,
            ':id' => $id
        ];
        return $objUpdate->execute($arrUpdate);
    }

    public function delete($id){
        $sqlDelete = "DELETE FROM banners WHERE id = :id";
        $objDelete = $this->connection->prepare($sqlDelete);
        $arrDelete = [
            ':id' => $id
        ];
        return $objDelete->execute($arrDelete);
    }
}