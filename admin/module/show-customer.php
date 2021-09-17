<?php

if ($_GET['admin'] == 'show-customer' && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $row = $customer->readOne($id);
}
?>

<table style="width: 650px"  class="table table-striped table-info">
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
      <td>???</td>
    </tr>
  </tbody>
</table>
<a href="index.php?admin=edit-customer&id=<?= $row->id ?>" class="btn btn-outline-primary btn-sm">Edit</a>
<a href="index.php?admin=customers" class="btn btn-outline-primary btn-sm">Back</a><br>
