<?php

include 'config/settings.php';

$db = new PDO(DSN, USER, PASSWORD);

include 'class/Post.php';
include 'class/Category.php';

$category = new Category($db);
$post = new Post($db);