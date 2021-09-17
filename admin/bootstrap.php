<?php

include 'config/settings.php';

$db = new PDO(DSN, USER, PASSWORD);

include 'class/Post.php';
include 'class/Category.php';
include 'class/Rentals.php';
include 'class/Car.php';
include 'class/Customer.php';



$category = new Category($db);
$post = new Post($db);
$rentals = new Rentals($db);
$car = new Car($db);
$customer = new Customer($db);

