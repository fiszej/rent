<?php


if ($_GET['admin'] == 'delete-post' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $post->delete($id);
    header("Location: index.php?admin=posts");
}
