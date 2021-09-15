<?php

class Rentals 
{
    public $carId;
    public $start;
    public $end;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function show()
    {
        $sql = "SELECT * FROM rentals";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}