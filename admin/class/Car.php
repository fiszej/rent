<?php

class Car 
{
    public $id;
    public $brand;
    public $model;
    public $production;
    public $price;
    public $categoryId;
    public $foto;
    public $status = 1;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function showAll()
    {
        $sql = "SELECT 
                cars.id,
                cars.brand,
                cars.model,
                cars.production AS year,
                cars.price,
                cars.category,
                cars.foto,
                cars.status,
                category.name AS cname FROM cars
                INNER JOIN category ON
                category.id = cars.category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function save()
    {
        try {
            $sql = sprintf(
                "INSERT INTO cars (brand, 
                                    model, 
                                    production, 
                                    price, 
                                    category, 
                                    foto,
                                    status) 
                            VALUES ( '%s',
                                    '%s',
                                    '%s',
                                    '%s',
                                    %d,
                                    '%s', 
                                    %d)",
                                    $this->brand,
                                    $this->model,
                                    $this->production,
                                    $this->price,
                                    $this->categoryId,
                                    $this->foto,
                                    $this->status
            );
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function readOne($id)
    {
        $sql = "SELECT * FROM cars WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update()
    {
        try {
            $sql = sprintf("
            UPDATE cars SET 
            brand = '%s',
            model = '%s',
            production = '%s',
            price = '%s',
            category = %d
            foto = '%s'",
            $this->brand,
            $this->model,
            $this->production,
            $this->price,
            $this->categoryId,
            $this->foto);

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM cars WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function setInactive($id)
    {
        $sql = "UPDATE cars SET status = 0 WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function setActive($id)
    {
        $sql = "UPDATE cars SET status = 1 WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function cars()
    {
        $sql = "SELECT COUNT(*) FROM cars";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function available()
    {
        $sql = "SELECT COUNT(*) FROM cars WHERE status = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function avgPrice()
    {
        $sql = "SELECT AVG(price) FROM cars";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return floor($stmt->fetchColumn());
    }

    public function showAllActive()
    {
        $sql = "SELECT 
                cars.id,
                cars.brand,
                cars.model,
                cars.production AS year,
                cars.price,
                cars.category,
                cars.foto,
                cars.status,
                category.name AS cname FROM cars
                INNER JOIN category ON
                category.id = cars.category
                WHERE cars.status = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}