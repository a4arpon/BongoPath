<?php
if (isset($_POST['password'])) {
    include("./db.php");
    $password = $_POST['password'];
    if (!empty($password)) {
        $password = $con->real_escape_string($password);
        $pwd_match = $con->query("SELECT * FROM `admin` Where password='$password'");
        if ($pwd_match->num_rows == 1) {
            setcookie("admin_cook", $password, time() + (86400 * 365), "/");
            header("location:../../index.php");
        } else {
            echo "Password Wrong";
        }
    }
} else {
    # code...
    echo ("Please Enter Password");
}
?>