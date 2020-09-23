<?php
require_once 'models/Model.php';

class Contact extends Model
{
    public $full_name;
    public $email;
    public $subject;
    public $message;
    public $created_at;

    public function insert(){
        $sqlInsert = "INSERT INTO contacts (`full_name`, `email`, `subject`, `message`) VALUES (:full_name, :email, :subject, :message)";
        $objInsert = $this->connection->prepare($sqlInsert);
        $arrInsert = [
            ':full_name' => $this->full_name,
            ':email' => $this->email,
            ':subject' => $this->subject,
            ':message' => $this->message
        ];
        return $objInsert->execute($arrInsert);
    }
}