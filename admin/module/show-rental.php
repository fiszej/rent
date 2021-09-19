<?php

if ($_GET['admin'] == 'show-rental' && !empty($_GET['id'])) {
  $id = $_GET['id'];

  $rental = $rentals->readOne($id);
  $cars = $car->readOne($rental->car_id);
  $user = $customer->readOne($rental->user_id);
}
?>

<table style="width: 650px"  class="table table-striped table-hover">
  <tbody>
    <tr class="short-table">
      <th scope="row">Brand</th>
      <td><?= $cars->brand?></td>
    </tr>
    <tr>
      <th scope="row">Model</th>
      <td><?= $cars->model?></td>
    </tr>
    <tr>
      <th scope="row">Year</th>
      <td><?= $cars->production?></td>
    </tr>
    <tr>
      <th scope="row">Rent time</th>
      <td><?= $rental->start. ' + '. $rental->days. ' days' ?></td>
    </tr>
    <tr>
      <th scope="row">Customer</th>
      <td><?= $user->firstname. ' '. $user->lastname?></td>
    </tr>
    <tr>
      <th scope="row">Customer Email</th>
      <td><?= $user->email?></td>
    </tr>
    <tr>
      <th scope="row">Payment</th>
      <td><?= '$'.$cars->price * $rental->days?></td>
    </tr>
  </tbody>
</table>


<a href="index.php?admin=rentals" class="btn btn-outline-primary btn-sm">Back</a>
<a href="index.php?admin=delete&page=rental&id=<?= $rental->rent_id ?>&car=<?= $rental->car_id?>" class="btn btn-outline-danger btn-sm">Delete</a>