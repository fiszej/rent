<?php 



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