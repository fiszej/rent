<?php

if ($_GET['admin'] == 'show-post' && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $row = $post->readOne($id);
}
?>

<main role="main" class="container">
      <div class="jumbotron" style="border: 1px solid grey; border-radius: 10px 10px; padding: 10px 10px">
        <h1><?= $row->title ?></h1>
        <p class="lead"><?= $row->text?></p>
        <small style="font-size: 12px;"><?= $row->created_at ?> by Admin</small><br>
        <a href="index.php?admin=edit-post&id=<?= $row->id ?>" class="btn btn-info btn-sm">Edit</a>
        <a href="index.php?admin=posts" class="btn btn-primary btn-sm">Back</a><br>
      </div>
</main>


