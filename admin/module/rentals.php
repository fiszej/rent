<?php

?>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Year</th>
      <th scope="col">Time</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($rentals->showAll() as $rental) : ?>
    <tr>
      <th</th>
        <td><?= $rental->rent_id ?></td>
        <td><?= $rental->brand ?></td>
        <td><?= $rental->model ?></td>
        <td><?= $rental->production ?></td>
        <td><?= $rental->start .' + '. $rental->days ?></td>
        <td><?= '$'.$rental->days * $rental->price ?></td>
        <td>
            <a href="index.php?admin=show-rental&id=<?= $rental->rent_id ?>" class="btn btn-outline-success btn-sm">Show</a>
        </td>
      </tr>
    <?php endforeach ;?>
  </tbody>
</table>

<a href="index.php?admin=add-rental" class="btn btn-outline-primary btn-sm">Add New</a>

