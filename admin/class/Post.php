<?php

class Post
{
    public $id;
    public $title;
    public $text;
    public $categoryId;
    public $createdAt;
    public $userId;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function save()
    {
        try {
            $sql = "INSERT INTO posts (category_id, title, text, user_id) VALUES (:category, :title, :text , :user_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':category', $this->categoryId, PDO::PARAM_INT);
            $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindParam(':text', $this->text, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $this->userId, PDO::PARAM_INT);
            
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM posts WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            $sql = sprintf("
            UPDATE posts SET 
            category_id= '%s', 
            title= '%s', 
            text= '%s' 
            WHERE 
            id = %d", 
            $this->categoryId, 
            $this->title, 
            $this->text, 
            $this->id);

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function readOne($id)
    {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function showAll()
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


}