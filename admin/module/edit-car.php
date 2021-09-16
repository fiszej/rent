<?php

if ($_GET['id']) {
    $id = $_GET['id'];
    $row = $car->readOne($id);
}

if ($_POST['submit']) {
    $car->brand = htmlspecialchars(trim(filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS)));
    $car->model = htmlspecialchars(trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS)));
    $car->production = htmlspecialchars(trim(filter_input(INPUT_POST, 'production', FILTER_SANITIZE_SPECIAL_CHARS)));
    $car->price = htmlspecialchars(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS)));
    $car->categoryId = $_POST['category'];

    
    $car->foto = $_FILES['foto']['name'];
    $car->update();
    move_uploaded_file($_FILES['foto']['tmp_name'], CAR_FOTO . $car->foto);
    
    header("Location: index.php?admin=posts");
}

?>

<form action="index.php?admin=add-car" method="POST" enctype="multipart/form-data">
    <h1 style="text-align: center;">ADD NEW CAR</h1>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Brand</label>
        <input type="text" class="form-control form-control-sm" value="<?= $row->brand ?>" name ="brand" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Model</label>
        <input type="text" class="form-control form-control-sm" value="<?= $row->model ?>" name ="model" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Production</label>
        <input type="text" class="form-control form-control-sm" value="<?= $row->production ?>" value="np.2021" name ="production" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="text" class="form-control form-control-sm" value="<?= $row->price ?>" name ="price" id="exampleFormControlInput1">
    </div>
        <label for="exampleFormControlInput1" class="form-label">Category</label>
            <select class="form-select form-select-sm" name="category" aria-label="Default select example">
                <?php foreach ($category->show() as $category) :?>
                    <option value="<?= $category->id?>"><?= $category->name ?></option>
                <?php endforeach ?>
            </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Add foto...</label><br>
        <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
    </div>
    <div class="col-12">
        <input class="btn btn-primary" name="submit" type="submit" value="Add">
    </div>
</form>