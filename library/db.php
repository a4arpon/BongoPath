<?php
$host_name = "localhost"; // Collect form your hosting panel
$db_username = "root"; // Collect form your hosting panel
$db_user_pwd = ""; // Collect form your hosting panel
$db = "octaomou_bongopath_live"; // Collect form your hosting panel

$conn = mysqli_connect($host_name, $db_username, $db_user_pwd, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$development_mod = true;

if ($development_mod) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
}
// development mod
$conn -> set_charset("utf8");
// Base URL
$baseurl = "http://localhost/demo/";
session_start();
?>