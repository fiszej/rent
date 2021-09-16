<?php

if ($_GET['admin'] == 'show-car' && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $car = $car->readOne($id);
}
?>

<main role="main" class="container">
      <div class="jumbotron" style="border: 1px solid grey; border-radius: 10px 10px; padding: 10px 10px">
        <h1><?= $car->brand . $car->model ?></h1>
        <h4><?= $car->production?></h4>
        <h4><?= '$'.$car->price?></h4>
        <small><?= $car->cname ?></small>
        
        <img src="<?= CAR_FOTO. $car->foto?>" alt="" width="400px" height="300px"><br><br>
        <a href="index.php?admin=edit-car&id=<?= $car->id ?>" class="btn btn-info btn-sm">Edit</a>
        <a href="index.php?admin=cars" class="btn btn-primary btn-sm">Back</a><br>
      </div>
</main>