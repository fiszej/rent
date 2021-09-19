<?php



include 'partials/header.php';
include 'partials/slider.php';
include 'partials/offers.php';
include 'partials/contact.php';
include 'partials/footer.php';



if ($_POST['submit'] && !empty($_POST['email'])) {
    if (file_exists('admin/newsletter/newsletter.json')) {

        $data = file_get_contents('admin/newsletter/newsletter.json');

        if (is_int(strpos($data, $_POST['email']))) {
            exit();
        }

        $json = file_get_contents('admin/newsletter/newsletter.json');
        $jsData = json_decode($json, true);
        $email = $_POST['email'];
        $jsData[] = [$email];

        file_put_contents('admin/newsletter/newsletter.json', json_encode($jsData, JSON_PRETTY_PRINT));
    }

}  

?>

