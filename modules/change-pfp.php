<?php include('config.php');
error_reporting(0);
ini_set('display_errors', 0);
?>
<?php
if (isset($_FILES["image"]) && !empty($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    $sql = "INSERT INTO images(img) VALUES('$file_name')";
    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        header("location: http://localhost/focus/my-account.php");
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
        $conn->exec($sql);
        header("location: http://localhost/focus/my-account.php");
    } else {
        print_r($errors);
    }
}
?>

