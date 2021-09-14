<?php

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_OBJ);
?>


<main role="main" class="container">
      <div class="jumbotron" style="border: 1px solid grey; border-radius: 10px 10px; padding: 10px 10px">
        <h1><?= $post->title ?></h1>
        <p class="lead"><?= $post->text?></p>
        <small><?= $post->created_at ?></small><br>
        <a href="index.php?admin=edit-post&id=<?= $post->id ?>" class="btn btn-info btn-sm">Edit</a>
      </div>
</main>


