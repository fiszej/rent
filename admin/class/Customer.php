<?php

class Customer 
{
    public $id;
    public $email;
    public $password;
    public $name;
    public $foto;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}