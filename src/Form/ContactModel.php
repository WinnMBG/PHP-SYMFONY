<?php
namespace App\Form;

class ContactModel {

    private string $email;
    private string $subject;
    private string $message;

    public function setEmail(string $value):void
    {
        $this->email = $value;
    }

    public function setSubject(string $value):void
    {
        $this->email = $value;
    }

    public function setMessage(string $value):void
    {
        $this->email = $value;
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function getSubject():string
    {
        return $this->subject;
    }

    public function getMessage():string
    {
        return $this->message;
    }

}
?>
