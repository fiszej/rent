<?php


if ($_GET['admin'] == 'delete-post' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    settype($id, 'int');
    $sql = "DELETE FROM posts WHERE id = $id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    header("Location: index.php?admin=posts");
}










