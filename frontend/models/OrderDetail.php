<?php
require_once 'models/Model.php';

class OrderDetail extends Model
{
    public $order_id;
    public $product_id;
    public $quantity;
    public $size;

    public function insert(){
        $sqlInsert = "INSERT INTO order_details (`order_id`, `product_id`, `quantity`, `size`) VALUES (:order_id, :product_id, :quantity, :size)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':order_id' => $this->order_id,
            ':product_id' => $this->product_id,
            ':quantity' => $this->quantity,
            ':size' => $this->size
        ];
        return $objInsert->execute($arrInsert);
    }
}