<?php

class Rentals 
{
    public $id;
    public $carID;
    public $start;
    public $days;
    public $customerID;
    
    
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function showAll()
    {
        $sql = "SELECT * FROM rentals 
            INNER JOIN cars ON cars.id = rentals.car_id 
            INNER JOIN user ON user.id = rentals.user_id;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function save()
    {
        try {
            $sql = sprintf("INSERT INTO rentals (
                car_id, start, days, user_id) VALUES (
                %d, '%s', %d, %d)",
                $this->carID,
                $this->start,
                $this->days,
                $this->customerID);

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM rentals WHERE rent_id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}