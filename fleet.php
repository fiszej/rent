<?php include 'partials/header.php' ?>
<?php include 'admin/bootstrap.php' ?>


<section>
          <div class="container">
               <div class="text-center">
                    <h1>Fleet</h1>

                    <br>

                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="row">
               <?php foreach ($car->showAllActive() as $cars) :?>
                    <div class="col-md-4 col-sm-4">
                         <div class="courses-thumb courses-thumb-secondary">
                              <div class="courses-top">
                                   <div class="team-image">
                                   <a href="panel.php?id=<?= $cars->id?>"><img src="/../admin/module/foto/car/<?= $cars->foto ?>" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="courses-date">
                                        <span title="passegengers"><i class="fa fa-user"></i> 5</span>
                                        <span title="luggages"><i class="fa fa-briefcase"></i> 4</span>
                                        <span title="doors"><i class="fa fa-sign-out"></i> 4</span>
                                        <span title="transmission"><i class="fa fa-cog"></i> A</span>
                                   </div>
                              </div>

                              <div class="courses-detail">
                                   <h3><a href="fleet.php"><?= $cars->brand.' '.$cars->model ?></a></h3>
                                   <p><?= $cars->year ?></p>
                                   <p class="lead"><small>from</small> <strong><?= '$'.$cars->price?></strong> <small>per 24/h</small></p>
                              </div>

                              <div class="courses-info">
                              <a href="cart.php?id=<?= $cars->id?>" class="section-btn btn btn-primary btn-block">Rent</a>                              </div>
                         </div>
                    </div>
                    <?php endforeach ;?>
               </div>
          </div>
     </section>















<?php include 'partials/footer.php' ?>

