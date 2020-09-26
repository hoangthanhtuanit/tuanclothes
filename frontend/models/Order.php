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
    public $status;
    public $created_at;
    public $updated_at;

    public function insert(){
        
    }
}