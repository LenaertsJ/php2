<?php


class Contact
{
    private $email;
    private $name;
    private $subject;
    private $message;

    public function __construct($name, $email, $subject, $message){
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function sendMail(){

    }
}