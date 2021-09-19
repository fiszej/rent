<?php

class Customer 
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function showAll()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function save()
    {
        try {
            $sql = sprintf("INSERT INTO user (
                firstname, 
                lastname,
                email,
                password) VALUES ('%s', '%s', '%s', '%s')",
                $this->firstname,
                $this->lastname,
                $this->email,
                $this->password);
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function readOne($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM user WHERE id = :id";
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
            $sql = sprintf("UPDATE user SET 
                    firstname = '%s',
                    lastname = '%s',
                    email = '%s'",
                    $this->firstname,
                    $this->lastname,
                    $this->email);

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function customers()
    {
        $sql = "SELECT COUNT(*) FROM user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function readOneForAuth($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}