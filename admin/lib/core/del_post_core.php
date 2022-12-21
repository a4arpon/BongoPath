<?php
include("./db.php");
if (!isset($_COOKIE['admin_cook'])) {
    header("location:./pages-login.php");
} elseif (isset($_COOKIE['admin_cook'])) {
    $get_post_id = $_GET['post_id'];
    $select_breaking_news_id = $con->query("SELECT * FROM `breaking_news` WHERE `news_id` = '$get_post_id'");
    if ($select_breaking_news_id->num_rows >0) {
        $br_id_del = $con->query("DELETE FROM `breaking_news` WHERE `news_id` = '$get_post_id'");
    }
    $select_google_news_id = $con->query("SELECT * FROM `google_news` WHERE `news_id` = '$get_post_id'");
    if ($select_google_news_id->num_rows >0) {
        $g_id_del = $con->query("DELETE FROM `google_news` WHERE `news_id` = '$get_post_id'");
    }
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