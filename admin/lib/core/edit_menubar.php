<?php
include('./db.php');
if (!isset($_COOKIE['admin_cook'])) {
    header("location:./pages-login.php");
} elseif (isset($_COOKIE['admin_cook'])) {
    $type = extract($_GET);
    if ($type = 'add_new') {
        $add_new = $con->query("INSERT INTO `menus_navbar`(`name`, `link`) VALUES ('$name','$link')");
        if ($add_new == true) {
            header('location:../../tables-general.php');
        }
    }
}
?>