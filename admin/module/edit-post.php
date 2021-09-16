<?php

if ($_GET['id']) {
    $id = $_GET['id'];
    $row = $post->readOne($id);
}

if ($_POST['submit']) {
    $post->title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
    $post->text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS));
    $post->categoryId = $_POST['category'];
    $post->id = $_POST['id'];
    $post->update();
    header("Location: index.php?admin=posts");
}

?>

<form action="index.php?admin=edit-post" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Title</label>
        <input type="text" class="form-control form-control-sm" name ="title" id="exampleFormControlInput1" value="<?= $row->title ?>">
        <input type="hidden" name="id" value="<?= $row->id?>">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Category</label>
            <select class="form-select form-select-sm" name="category" aria-label="Default select example">
            <?php foreach ($category->show() as $category) :?>
                    <option value="<?= $category->id?>"><?= $category->name ?></option>
                <?php endforeach ?>
            </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Text</label>
        <textarea class="form-control form-control-sm" name="text" id="exampleFormControlTextarea1" rows="3">
            <?= $row->text ?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Add foto...</label><br>
        <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
    </div>
    <div class="col-12">
        <input class="btn btn-primary" name="submit" type="submit" value="Save">
    </div>
</form>