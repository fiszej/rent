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
                                    foto) 
                            VALUES ( '%s',
                                    '%s',
                                    '%s',
                                    '%s',
                                    %d,
                                    '%s')",
                                    $this->brand,
                                    $this->model,
                                    $this->production,
                                    $this->price,
                                    $this->categoryId,
                                    $this->foto
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
            $sql = "DELETE FROM cars WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}