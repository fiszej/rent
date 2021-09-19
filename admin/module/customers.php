<?php

$result = $customer->showAll();

?>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($result as $customer) : ?>
    <tr>
      <th scope="row"><?= $customer->id ?></th>
        <td><?= $customer->firstname ?></td>
        <td><?= $customer->lastname ?></td>
        <td><?= $customer->email ?></td>
        <td>
            <a href="index.php?admin=show-customer&id=<?= $customer->id ?>" class="btn btn-outline-success btn-sm">Show</a>
            <a href="index.php?admin=edit-customer&id=<?= $customer->id ?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="index.php?admin=delete&page=customer&id=<?= $customer->id ?>" class="btn btn-outline-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach ;?>
  </tbody>
</table>
<a href="index.php?admin=add-customer" class="btn btn-outline-primary btn-sm">Add New</a>
