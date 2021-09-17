<?php


if ($_GET['page'] == 'posts' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $post->delete($id);
    header("Location: index.php?admin=posts");
}

if ($_GET['page'] == 'car' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $car->delete($id);
    header("Location: index.php?admin=cars");
}

if ($_GET['page'] == 'customer' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $customer->delete($id);
    header("Location: index.php?admin=customers");
}

if ($_GET['page'] == 'rental' && !empty($_GET['id'])) {
    $carID = $_GET['car'];
    $id = $_GET['id'];
    $rentals->delete($id);
    $car->setActive($carID);
    header("Location: index.php?admin=rentals");
}
