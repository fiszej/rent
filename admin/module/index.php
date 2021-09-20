<?php 



if ($_POST['submit']) {
    $page->company = $_POST['company'];
    $page->tel = $_POST['tel'];
    $page->address = $_POST['address'];
    $page->email = $_POST['email'];
      
    $page->update();
}

$page = $page->display();
?>


<h2>Stats</h2>
<h5>Number of: </h5>
<table style="width: 650px"  class="table table-striped table-hover">
  <tbody>
    <tr class="short-table table-success">
      <th scope="row">Cars (active)</th>
      <td><?= $car->cars().'('.$car->available().')'?></td>
    </tr>
    <tr>
      <th scope="row">Customers</th>
      <td><?= $customer->customers()?></td>
    </tr>
    <tr>
      <th scope="row">Rentals</th>
      <td><?= $rentals->rentals()?></td>
    </tr>
    <tr>
      <th scope="row">Average rentals days</th>
      <td><?= $rentals->avgDays() ?></td>
    </tr>
    <tr>
      <th scope="row">Average price</th>
      <td><?= '$'.$car->avgPrice() ?></td>
    </tr>
  </tbody>
</table>

<form style="width: 650px" action="index.php?admin=index" method="POST">
  <h2>Page Settings</h2>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Company </label>
        <input type="text" class="form-control form-control-sm" name ="company" value="<?= $page->company?>" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tel number</label>
        <input type="text" class="form-control form-control-sm" value="<?= $page->tel?>" name ="tel" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Address</label>
        <input type="text" class="form-control form-control-sm" value="<?= $page->address?>" name ="address" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="text" class="form-control form-control-sm" value="<?= $page->email?>" name ="email" autocomplete="off">
    </div>
    <div class="col-12">
        <input class="btn btn-primary" name="submit" type="submit" value="Save">
    </div>
</form>
