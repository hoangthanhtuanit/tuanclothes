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

    public function insert(){
        $sqlInsert = "INSERT INTO orders (`full_name`, `address`, `phone_number`, `email`, `note`, `price_total`, `payment_method`, `status`) VALUES (:full_name, :address, :phone_number, :email, :note, :price_total, :payment_method, :status)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':full_name' => $this->full_name,
            ':address' => $this->address,
            ':phone_number' => $this->phone_number,
            ':email' => $this->email,
            ':note' => $this->note,
            ':price_total' => $this->price_total,
            ':payment_method' => $this->payment_method,
            ':status' => $this->status
        ];
        $objInsert->execute($arrInsert);
        $order_id = $this->connection->lastInsertId();
        return $order_id;
    }
}