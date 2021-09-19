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
            INNER JOIN user ON user.id = rentals.user_id ORDER BY rent_id";
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
            return true;

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

    public function readOne($id)
    {
        $sql = "SELECT * FROM rentals WHERE rent_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function countRental($id)
    {
        $sql = "SELECT COUNT(*) FROM rentals WHERE user_id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function showAllRentsOneUser($id)
    {
        $sql = "SELECT 
            rentals.rent_id,
            rentals.car_id, 
            rentals.user_id, 
            rentals.start, 
            rentals.days, 
            cars.id, 
            cars.brand, 
            cars.model, 
            cars.production, 
            cars.price FROM rentals 
            INNER JOIN cars ON cars.id = rentals.car_id 
            AND rentals.user_id = $id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rentals()
    {
        $sql = "SELECT COUNT(*) FROM rentals";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function avgDays()
    {
        $sql = "SELECT AVG(days) FROM rentals";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return ceil($stmt->fetchColumn());
    }

}