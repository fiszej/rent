<?php

if (isset($_POST['submit'])) {

    $error = [];

    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if (empty($_POST['firstname'])) {
        $error['firstname'] = 'This Field is required';
    }    
    if (empty($_POST['lastname'])) {
        $error['lastname'] = 'This Field is required';
    }    
    if (empty($_POST['email'])) {
        $error['email'] = 'This Field is required';
    }
    if (empty($_POST['password'])) {
        $error['pass1'] = 'This Field is required';
    }   
    if (empty($_POST['passwordConfirm'])) {
        $error['pass1'] = 'This Field is required';
    }  
    if ($password != $passwordConfirm) {
        $error['password'] = 'Password must be the same';
    } 

    if (count($error) == 0) {
        $customer->firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
        $customer->lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
        $customer->email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

        $customer->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
        $customer->save();
        header("Location: index.php?admin=customers");
    
        
    }
}
?>

<form action="index.php?admin=add-customer" method="POST">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Firstname</label>
        <input type="text" class="form-control form-control-sm" name ="firstname" autocomplete="off">
        <small class="text-danger"><?= $error['firstname'];?></small>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Lastname</label>
        <input type="text" class="form-control form-control-sm" name ="lastname" autocomplete="off">
        <small class="text-danger"><?= $error['lastname'];?></small>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="text" class="form-control form-control-sm" name ="email" autocomplete="off">
        <small class="text-danger"><?= $error['email'];?></small>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input type="password" class="form-control form-control-sm" name ="password" autocomplete="off">
        <small class="text-danger"><?= $error['password'];?></small>
        <small class="text-danger"><?= $error['pass1'];?></small>

    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password Confirm</label>
        <input type="password" class="form-control form-control-sm" name ="passwordConfirm" autocomplete="off">
        <small class="text-danger"><?= $error['password'];?></small>
        <small class="text-danger"><?= $error['pass1'];?></small>

    </div>

    <div class="col-12">
        <input class="btn btn-primary" name="submit" type="submit" value="Add">
    </div>
</form>