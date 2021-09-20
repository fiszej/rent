<?php

session_start();

include 'bootstrap.php';

if (!array_key_exists('admin', $_SESSION)) {
    header("Location: /../index.php");
}
if (isset($_GET['v'])) {
    unset($_SESSION['id']);
    unset($_SESSION['admin']);
    header("Location: index.php");
}

if (array_key_exists('admin', $_GET)) {
    $controller = $_GET['admin'];
} else {
    $controller = 'index';
}

$dir = __DIR__.'/module/';
$file = $dir . $controller.'.php';

if (file_exists($file)) {
    ob_start();
    $layout = require $file;
    $layout = ob_get_contents();
    ob_end_clean();

    include 'layouts/admin.php';
} else {
    echo '404';
}
