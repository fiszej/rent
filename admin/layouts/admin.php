<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Dashboard</title>
    <style>
        .custom-hover {
            text-decoration: none;
        }
        .custom-hover:hover {
            text-decoration: underline;
        }
        table {
            font-size: 15px;
        }
        table.a {
            font-size: 15px;
        }
        nav ul li a {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <a class="nav-link" <?= $_GET['admin']== 'index' ? 'style="color: black"' : '' ?> aria-current="page" href="index.php?admin=index">Home</a>
        <a class="nav-link" <?= $_GET['admin'] == 'cars' ? 'style="color: black"' : '' ?>href="index.php?admin=cars">Cars</a>
        <a class="nav-link" <?= $_GET['admin'] == 'rentals' ? 'style="color: black"' : '' ?> href="index.php?admin=rentals">Rentals</a>
        <a class="nav-link" <?= $_GET['admin'] == 'customers' ? 'style="color: black"' : '' ?>href="index.php?admin=customers">Customers</a>
        <a class="nav-link" <?= $_GET['admin'] == 'category' ? 'style="color: black"' : '' ?>href="index.php?admin=category">Categories</a>
        <a class="nav-link" <?= $_GET['admin'] == 'posts' ? 'style="color: black"' : '' ?>href="index.php?admin=posts">Posts</a>
        <a class="nav-link" <?= $_GET['admin'] == 'newsletter' ? 'style="color: black"' : '' ?>href="index.php?admin=newsletter">Newsletter</a>
        <?php if ($_SESSION['admin']) :?>
        <a class="nav-link text-danger" href="index.php?admin=index&v=logout">Logout</a>
        <?php endif ?>


    </nav>
    <hr>
    <div class="container">
        <?= $layout ?>
        
    </div>
</body>
</html>