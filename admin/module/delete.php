<?php


if ($_GET['page'] == 'post' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $post->delete($id);
    header("Location: index.php?admin=posts");
}

if ($_GET['page'] == 'car' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $car->delete($id);
    header("Location: index.php?admin=cars");
}
