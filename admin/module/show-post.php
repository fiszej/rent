<?php

if ($_GET['admin'] == 'show-post' && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $row = $post->readOne($id);
}
?>

<main role="main" class="container">
      <div class="jumbotron" style="border: 1px solid grey; border-radius: 10px 10px; padding: 10px 10px">
        <h1><?= $row->title ?></h1>
        <p class="lead"><?= $row->text?><br> <img style="float:inline-end" src="<?= POST_FOTO. $row->foto?>" width=" 200px" height="300px"></p>
        <small style="font-size: 12px;"><?= $row->created_at ?> by Admin</small><br>
        <a href="index.php?admin=edit-post&id=<?= $row->id ?>" class="btn btn-outline-primary btn-sm">Edit</a>
        <a href="index.php?admin=posts" class="btn btn-outline-primary btn-sm">Back</a><br>
      </div>
</main>


