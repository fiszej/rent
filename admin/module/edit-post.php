<?php

// if (empty($_GET['id'])) {
//     header("Location: index.php?page=posts");
// } 
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_OBJ);
    $stmt->closeCursor();
}

if ($_POST['submit']) {

    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
    $text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS));
    $category = $_POST['category'];
    $id = $_POST['id'];

    try {
        $sql = sprintf("UPDATE posts SET category= '%s', title= '%s', text= '%s' WHERE id = %d", $category, $title, $text, $id);
        $stmt = $db->prepare($sql);
        $stmt->execute();

        //header("Location: index.php?admin=posts");
    } catch (Exception $e) {
        echo 'Error add post'. $e->getMessage();
    }
}

?>

<form action="index.php?admin=edit-post" method="POST">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Title</label>
        <input type="text" class="form-control form-control-sm" name ="title" id="exampleFormControlInput1" value="<?= $post->title ?>">
        <input type="hidden" name="id" value="<?= $post->id?>">
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
        <textarea class="form-control form-control-sm" name="text" id="exampleFormControlTextarea1" rows="3">
            <?= $post->text ?>
        </textarea>
    </div>
    <div class="col-12">
        <input class="btn btn-primary" name="submit" type="submit" value="Save">
    </div>
</form>