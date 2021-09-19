<?php include 'admin/bootstrap.php';

$row = $car->showAll();
shuffle($row);
$result = array_slice($row, 0, 6);

?>
<section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Offers</h2>
                              </div>
                         </div>
                         <?php foreach ($result as $cars) :?>
                         <div class="col-md-4 col-sm-6" >
                              <div class="team-thumb" >
                                   <div class="team-image">
                                   <a href="panel.php?id=<?= $cars->id?>"><img src="/../admin/module/foto/car/<?= $cars->foto ?>" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="team-info">
                                        <h3><?= $cars->brand.' '.$cars->model ?></h3>
                                        <p><b><?= $cars->cname ?></b></p>
                                        <p><?= $cars->year ?></p>
                                        <p class="lead"><small>from</small> <strong><?= '$'.$cars->price ?></strong> <small>per 24/h</small></p>
                                   </div>
                                   <div class="team-thumb-actions">
                                        <a href="cart.php?id=<?= $cars->id?>" class="section-btn btn btn-primary btn-block">Rent</a>
                                   </div>
                              </div>
                         </div>
                         <?php endforeach ;?>
                    </div>
               </div>
          </section>