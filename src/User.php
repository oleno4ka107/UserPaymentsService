<?php


namespace Kl;


class User extends Model
{
    public $id;

    public $balance;

    public $email;

    public function __construct($id, $balance, $email)
    {
        $this->id = $id;
        $this->balance = $balance;
        $this->email = $email;
    }

    public function sendEmail()
    {
        $subject = 'Balance update';
        $message = 'Hello! Your balance has been successfully updated!';

        return EmailService::send($this->email, $subject, $message);
    }

    public function changeBalance($amount)
    {
        $this->balance += $amount;
    }

}
