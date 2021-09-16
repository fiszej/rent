
<?php

$result = $category->show();


if (array_key_exists('submit', $_POST)) {
    $category->name = trim(filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_SPECIAL_CHARS));
    //$category->id = $category->lastId()['category_id'] + 1;
    $category->new();
    header("Location: index.php?admin=category");
}

if (isset($_GET['action'])) {
    $id = $_GET['id'];
    $category->delete($id);
    header("Location: index.php?admin=category");
} 
?>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($result as $category) : ?>
    <tr>
      <th scope="row"><?= $category->id ?></th>
        <td><?= $category->name ?></td>
        <td>
            <a href="index.php?admin=category&action=delete&id=<?= $category->id ?>" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach ;?>
    </tbody>
</table>
    <form class="form-inline" action="index.php?admin=category" method="POST">
    <div class="form-group mb-2">
        <div class="col-sm-3">
            <input type="text" class="form-control" name="categoryName" placeholder="enter category name">
        </div>
    </div>
        <input type="submit" name="submit" class="btn btn-info btn-sm" value="Add New">
    </form>

