<?php


include 'partials/header.php';


include 'admin/bootstrap.php';


if (isset($_GET['v'])) {
    unset($_SESSION['admin']);
    unset($_SESSION['id']);
    header("Location: index.php");
}

$errors = [];

if (isset($_POST['submit'])) {
    $user = $customer->readOneForAuth($_POST['email']);
        if ($user && password_verify($_POST['password'], $user->password)) {
            session_start();
            $_SESSION['id'] = $user->id;
            if ($user->firstname == 'admin') {
                $_SESSION['admin'] = $user->firstname;
            }
            header("Location: index.php");
        }
}

?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="text-center">
                        <div class="col-md-8 col-xs-12">
                            <form action="auth.php" class="form" method="POST">
                                <h2>Login</h2>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>

                                            <input type="text" name="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label">Password</label>

                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <p><small>Don't have account? <a href="register.php">Register</a> please.</small></p>
                                <input type="submit" name="submit" class="section-btn btn btn-primary" value="Login">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'partials/footer.php' ?>