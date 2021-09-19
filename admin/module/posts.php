<?php

$result = $post->showAll();

?>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Create time</th>
      <th scope="col">Foto</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($result as $post) : ?>
    <tr>
      <th scope="row"><?= $post->id ?></th>
        <td><?= $post->title ?></td>
        <td><?= $post->cname ?></td>
        <td><?= $post->created_at ?></td>
        <td><i class="<?= $post->foto ? 'bi bi-camera2 text-success' : 'bi bi-camera2 text-danger'?>"></i></td>
        <td>
            <a href="index.php?admin=show-post&id=<?= $post->id ?>" class="btn btn-outline-success btn-sm">Show</a>
            <a href="index.php?admin=edit-post&id=<?= $post->id ?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="index.php?admin=delete&page=posts&id=<?= $post->id ?>" class="btn btn-outline-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach ;?>
  </tbody>
</table>
<a href="index.php?admin=add-post" class="btn btn-outline-primary btn-sm">Add New</a>
