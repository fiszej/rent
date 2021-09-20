<?php

class Page
{
    public $company;
    public $tel;
    public $address;
    public $email;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function display()
    {
        $sql = "SELECT * FROM page";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
        
        
    }

    public function update()
    {
        $sql = sprintf("UPDATE page SET 
                        company = '%s',
                        tel = '%s',
                        address = '%s',
                        email = '%s'",
            $this->company,
            $this->tel,
            $this->address,
            $this->email);

        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}