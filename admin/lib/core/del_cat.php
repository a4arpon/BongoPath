<?php
include('./db.php');
if (!isset($_COOKIE['admin_cook'])) {
    header("location:./pages-login.php");
} elseif (isset($_COOKIE['admin_cook'])) {
    $type = $_GET['action_type'];
    if ($type = 'del') {
        $id = $_GET['id'];
        $del = $con->query("DELETE FROM `menus_navbar` WHERE id='$id'");
        if ($del == true) {
            header('location:../../tables-general.php');
        }
    }
}
?>