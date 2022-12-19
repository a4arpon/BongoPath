<?php
include("./db.php");
if (!isset($_COOKIE['admin_cook'])) {
    header("location:./pages-login.php");
} elseif (isset($_COOKIE['admin_cook'])) {
    $get_post_id = $_GET['post_id'];
    $del_post = $con->query("DELETE FROM `posts` WHERE `post_id` = '$get_post_id'");
    if ($del_post == true) {
        # code...
        header("location:../../forms-validation.php");
    } else {
        # code...
        echo ("Post Delete Error");
    }
}
?>