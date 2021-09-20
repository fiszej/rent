<?php 

include 'admin/bootstrap.php';


$errors = [];
if (isset($_POST['submit'])) {
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'This field is required!';
    }
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'This field is required!';
    }
    if (empty($_POST['email'])) {
        $errors['emailReq'] = 'This fields is required';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])) {
        $errors['emailValidate'] = 'Enter valid email address!';
    }
    if ($_POST['password'] != $_POST['passwordConfirm']) {
        $errors['password'] = 'Password must be the same!';
    }

    if (strlen($_POST['password']) <= 6 && strlen($_POST['password']) >= 12) {
        $errors['len'] = 'Password must be min 6 & max 12 chars!';
    }
    if ($customer->readOneForAuth($_POST['email'])) {
        $errors['exists'] = 'Enter another email address';
    }

    if (empty($errors)) {
        $customer->firstname = $_POST['firstname'];
        $customer->lastname = $_POST['lastname'];
        $customer->email = $_POST['email'];
        $customer->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $customer->save();
        $errors['success'] = 'Register success!';
    }
}



include 'partials/header.php' 
?>
<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="text-center">
                        <div class="col-md-8 col-xs-12">
                            <form action="register.php" class="form" method="POST">
                                <p><?= $errors['success'] ?></p>
                                <h2>Register new account</h2>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label" >Firstname</label>
                                            <small style="color:red"><?= $errors['firstname'] ?? ''?></small>
                                            <input type="text" name="firstname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label">Lastname</label>
                                            <small style="color:red"><?= $errors['lastname'] ?? ''?></small>
                                            <input type="text" name="lastname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <small style="color:red"><?= $errors['emailReq'] ?? ''?></small><br>
                                            <small style="color:red"><?= $errors['emailValidate'] ?? ''?></small>
                                            <small style="color:red"><?= $errors['exists'] ?? ''?></small>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <small style="color:red"><?= $errors['password'] ?? ''?></small>
                                            <input type="password" name="password" class="form-control">
                                            <label class="control-label">Password Confirm</label>
                                            <small style="color:red"><?= $errors['password'] ?? ''?></small><br>
                                            <small style="color:red"><?= $errors['len'] ?? ''?></small>
                                            <input type="passwordConfirm" name="passwordConfirm" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="section-btn btn btn-primary" value="Register">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'partials/footer.php' ?>