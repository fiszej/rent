<?php
include 'admin/bootstrap.php';

$user = $customer->readOne($_SESSION['id']);
$rents = $rentals->showAllRentsOneUser($_SESSION['id']);
?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title text-center">
                    <h2>Account</h2>
                </div>
                <ul>
                    <li><?= $user->firstname ?></li>
                    <li><?= $user->lastname ?></li>
                    <li><?= $user->email ?></li>
                </ul>
            </div>
        </div>

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
        <div class="section-title text-center">
            <h2>Your Rentals</h2>
        </div>
  <tbody>
      <?php foreach ($rents as $rental) : ?>
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
    </div>
</section>