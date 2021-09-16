<?php

class Post
{
    public $id;
    public $title;
    public $text;
    public $categoryId;
    public $createdAt;
    public $userId;
    public $foto;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function save()
    {
        try {
            $sql = sprintf("INSERT INTO posts (
                                title, 
                                text, 
                                category_id, 
                                user_id, 
                                foto) VALUES (
                                '%s', '%s', %d, %d, '%s')",
                                $this->title,
                                $this->text,
                                $this->categoryId,
                                $this->userId,
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
        $sql = "SELECT 
                posts.id, 
                posts.title, 
                posts.text, 
                posts.created_at, 
                posts.foto,
                category.name AS cname 
                FROM posts INNER JOIN category 
                ON posts.category_id = category.id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}