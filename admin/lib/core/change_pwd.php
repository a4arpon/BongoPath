<?php
include('./db.php');
if (!isset($_COOKIE['admin_cook'])) {
    header("location:./pages-login.php");
} elseif (isset($_COOKIE['admin_cook'])) {
    extract($_POST);
    $qry = $con->query("UPDATE `admin` SET `password`='$password' WHERE id='1'");
    if ($qry == true) {
        header("../../index.php");
    }
}


?>