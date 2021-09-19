<?php

if ($_GET['admin'] == 'show-customer' && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $row = $customer->readOne($id);
  $countRental = $rentals->countRental($id);

}
?>

<table style="width: 650px"  class="table table-striped table-hover">
  <tbody>
    <tr class="short-table">
      <th scope="row">Firstname</th>
      <td><?= $row->firstname?></td>

    </tr>
    <tr>
      <th scope="row">Lastname</th>
      <td><?= $row->lastname?></td>

    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?= $row->email?></td>

    </tr>
    <tr>
      <th scope="row">Rents</th>
      <td><?= $countRental?></td>
    </tr>
  </tbody>
</table>
<a href="index.php?admin=edit-customer&id=<?= $row->id ?>" class="btn btn-outline-primary btn-sm">Edit</a>
<a href="index.php?admin=customers" class="btn btn-outline-primary btn-sm">Back</a><br>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Rent ID</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Year</th>
      <th scope="col">Time</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($rentals->showAllRentsOneUser($id) as $rental) : ?>
    <tr>
      <th</th>
        <td>
          <a class="custom-hover" href="index.php?admin=show-rental&id=<?= $rental->rent_id ?>">
            <?= $rental->rent_id ?>
          </a>
        </td>
        <td><?= $rental->brand ?></td>
        <td><?= $rental->model ?></td>
        <td><?= $rental->production ?></td>
        <td><?= $rental->start .' + '. $rental->days ?></td>
        <td><?= '$'.$rental->days * $rental->price ?></td>
      </tr>
    <?php endforeach ;?>
  </tbody>
</table>
