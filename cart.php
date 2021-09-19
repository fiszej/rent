<?php
include 'partials/header.php';
include 'admin/bootstrap.php';

if (!isset($_SESSION['id'])) {
    header("Location: auth.php");
}

$id = $_GET['id'];

$cars = $car->readOne($id);

if ($_POST['submit']) {
    $rentals->carID = $_POST['car'];
    $rentals->days = $_POST['days'];
    $rentals->start = $_POST['start'];
    $rentals->customerID = $_SESSION['id'];
    
    if ($rentals->save()) {
        $car->setInactive($rentals->carID);
        header("Location: account.php");
    }
}





?>

<section>
    <div class="container">
        <form action="cart.php" method="POST">
            <div class="mb-3">
                <div class="col-md-4 col-sm-4">
                         <div class="courses-thumb courses-thumb-secondary">
                              <div class="courses-top">
                                   <div class="team-image">
                                   <img src="/../admin/module/foto/car/<?= $cars->foto ?>" class="img-responsive" alt="">
                                   </div>
                                   <div class="courses-date">
                                        <span title="passegengers"><i class="fa fa-user"></i> 5</span>
                                        <span title="luggages"><i class="fa fa-briefcase"></i> 4</span>
                                        <span title="doors"><i class="fa fa-sign-out"></i> 4</span>
                                        <span title="transmission"><i class="fa fa-cog"></i> A</span>
                                   </div>
                              </div>

                              <div class="courses-detail">
                                   <h3><a href="fleet.php"><?= $cars->brand.' '.$cars->model.' '.$cars->production?></a></h3>
                                   <br>
                                   <label for="exampleFormControlInput1" class="form-label">Select days</label><br>
                                   <select class="form-control form-control-sm" name="days" aria-label="Default select example">
                    <?php for ($d = 1; $d <= 30; $d++) : ?>
                        <option value="<?= $d ?>"><?= $d ?></option>
                    <?php endfor ?>
                </select>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Start date</label><br>
                <input type="date" value="2021-04-01" class="form-control form-control-sm" name="start" autocomplete="off">
                <input type="hidden" name="car" value="<?= $id?>">
            </div>
                                   <p><?= $cars->year ?></p>
                                   <p class="lead"><small>from</small> <strong><?= '$'.$cars->price?></strong> <small>per 24/h</small></p>
                              </div>

                              <div class="courses-info">
                              <input class="section-btn btn btn-primary btn-block" name="submit" type="submit" value="Rent Now">
                                 </div>
                         </div>
                    </div>
            </div>
        </form>
    </div>
</section>

<?php include 'partials/footer.php' ?>