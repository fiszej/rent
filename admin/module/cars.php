<?php

$cars = $car->showAll();

?>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Year</th>
      <th scope="col">$/24h</th>
      <th scope="col">Category</th>
      <th scope="col">Foto</th>
      <th scope="col">Action</th>
      <th scope="col">Availability</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($cars as $car) : ?>
    <tr>
      <th</th>
        <td><?= $car->id ?></td>
        <td><?= $car->brand ?></td>
        <td><?= $car->model ?></td>
        <td><?= substr($car->year, 0, 4)?> </td>
        <td><?= '$'.$car->price?> </td>
        <td><?= $car->cname?> </td>
        <td><i class="<?= $car->foto ? 'bi bi-camera2 text-success' : 'bi bi-camera2 text-danger'?>"></i></td>
        <td>
            <a href="index.php?admin=show-car&id=<?= $car->id ?>" class="btn btn-outline-success btn-sm">Show</a>
            <a href="index.php?admin=edit-car&id=<?= $car->id ?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="index.php?admin=delete&page=car&id=<?= $car->id ?>" class="btn btn-outline-danger btn-sm">Delete</a>
        </td>
        <td><i class="<?= ($car->status == 1) ? 'bi bi-truck text-success' : 'bi bi-truck text-danger'?>"></i></td>
      </tr>
    <?php endforeach ;?>
  </tbody>
</table>
<a href="index.php?admin=add-car" class="btn btn-outline-primary btn-sm"> + </a>