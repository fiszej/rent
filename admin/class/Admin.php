<?php

class Admin
{
    public $login;
    public $password;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login()
    {
        
    }
}