<?php
$cars = $car->showAll();

if (isset($_POST['submit'])) {
    $rentals->carID = $_POST['car'];
    $rentals->days = $_POST['days'];
    $rentals->start = $_POST['start'];
    $rentals->customerID = 1;

    $rentals->save();
    $car->setInactive($rentals->carID);
    header("Location: index.php?admin=rentals");
    

}

?>

<form action="index.php?admin=add-rental" method="POST">
<div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Select car</label>
            <select class="form-select form-select-sm" name="car" aria-label="Default select example">
                <?php foreach ( $cars as $car ):?>
                    <option value="<?= $car->id ?>">
                        <?= $car->brand .' '. $car->model. ' - '.$car->year.'r.' ?>
                    </option>
                <?php endforeach ?>
            </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Select day</label>
            <select class="form-select form-select-sm" name="days" aria-label="Default select example">
                    <?php for ($d=1; $d <= 30; $d++) : ?>
                        <option value="<?=$d ?>"><?= $d ?></option>
                    <?php endfor ?>
            </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Start date</label><br>
        <input type="date" value="2021-04-01" class="form-control form-control-sm" name ="start" autocomplete="off">
    </div>
    <!-- <input type="hidden" name="user"> -->

    <div class="col-12">
        <input class="btn btn-primary" name="submit" type="submit" value="Add">
    </div>
</form>