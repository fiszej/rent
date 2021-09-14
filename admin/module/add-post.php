<?php

if ($_POST['submit']) {

    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
    $text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS));
    $category = $_POST['category'];


    try {
        $sql = "INSERT INTO posts (category, title, text) VALUES ('$category', '$title', '$text')";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        header("Location: index.php?admin=posts");
    } catch (Exception $e) {
        echo 'Error add post'. $e->getMessage();
    }

}
?>

<form action="index.php?admin=add-post" method="POST">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Title</label>
        <input type="text" class="form-control form-control-sm" name ="title" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Category</label>
            <select class="form-select form-select-sm" name="category" aria-label="Default select example">
                <option value="1">Daily</option>
                <option value="2">Luxurious</option>
                <option value="3">Electric</option>
            </select>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Text</label>
        <textarea class="form-control form-control-sm" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="col-12">
        <input class="btn btn-primary" name="submit" type="submit" value="Add">
    </div>
</form>