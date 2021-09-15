<?php

class Category 
{
    public $id;
    public $name;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function new()
    {
        try {
            $sql = "INSERT INTO category SET name = '$this->name', category_id = $this->id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM category WHERE category_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function showCategories()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function lastId()
    {
        $sql = "SELECT category_id FROM category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return end($result);
        
    }
}