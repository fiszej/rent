<?php

include 'config/settings.php';

$db = new PDO(DSN, USER, PASSWORD);

include 'class/Post.php';
include 'class/Category.php';
include 'class/Rentals.php';


$category = new Category($db);
$post = new Post($db);
$rentals = new Rentals($db);