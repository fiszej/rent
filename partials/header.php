<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Car Rental</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">

     <style>
          a img:hover {
               opacity: 0.9;
               
          }
     </style>
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand">Car Rental Website</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="index.php">Home</a></li>
                         <li><a href="fleet.php">Fleet</a></li>
                         <li><a href="about-us.php">About Us</a></li>
                         <li><a href="contact.php">Contact Us</a></li>
                         <?php if (!isset($_SESSION['id'])) : ?>
                         <li><a href="register.php">Register</a></li>
                         <li><a href="auth.php">Login</a></li>
                         <?php else: ?>
                         <li><a href="auth.php?v=logout">Logout</a></li>
                         <li><a style="color: red" href="account.php">Account</a></li>
                         <?php endif ?>
                    </ul>
               </div>
          </div>
     </section>
