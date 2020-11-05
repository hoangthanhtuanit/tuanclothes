<?php
require_once 'models/Model.php';

class Order extends Model
{
    public $id;
    public $user_id;
    public $full_name;
    public $address;
    public $phone_number;
    public $email;
    public $note;
    public $price_total;
    public $payment_method;
    public $status;
    public $created_at;
    public $updated_at;

    public function index(){
        $sqlSelect = "SELECT * FROM orders";
        $objSelect = $this->connection->prepare($sqlSelect);
        $objSelect->execute();
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($id){
        $sqlSelect = "SELECT orders.*, products.name AS name, products.color AS color, products.discount AS discount, products.price AS price, products.image AS image, order_details.quantity AS quantity, order_details.size AS size, order_details.product_id AS product_id FROM orders INNER JOIN order_details ON orders.id = order_details.order_id INNER JOIN products ON order_details.product_id = products.id WHERE orders.id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductIdByOrderId($id){
        $sqlSelect = "SELECT product_id FROM order_details WHERE order_id = :id";
        $objSelect = $this->connection->prepare($sqlSelect);
        $arrSelect = [
            ':id' => $id
        ];
        $objSelect->execute($arrSelect);
        return $objSelect->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id){
        $sqlUpdate = "UPDATE orders SET status = :status, updated_at = :updated_at WHERE id = :id";
        $objUpdate = $this->connection->prepare($sqlUpdate);
        $arrUpdate = [
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
            ':id' => $id
        ];
        return $objUpdate->execute($arrUpdate);
    }

    public function delete($id){
        $sqlDelete = "DELETE FROM orders WHERE id = :id";
        $objDelete = $this->connection->prepare($sqlDelete);
        $sqlDeleteProduct = "DELETE FROM order_details WHERE order_id = :id";
        $objDeleteProduct = $this->connection->prepare($sqlDeleteProduct);
        $arrDelete = [
            ':id' => $id
        ];
        $objDeleteProduct->execute($arrDelete);
        return $objDelete->execute($arrDelete);
    }
}