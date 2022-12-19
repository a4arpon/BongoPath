<?php 
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $email = $_POST['email'];
    include("./db.php");
    $SQL_Query_sqerch = $conn->query("SELECT * FROM `users` Where email='$email'");
    if ($SQL_Query_sqerch->num_rows>0) {
        echo "<h1>Email Already Subscribed !!! Please Checkout Our Other Products</h1>";
    } else {
        $SQL_Inset = $conn->query("INSERT INTO `users`(`email`) VALUES ('$email')");
        if ($SQL_Inset == true) {
            setcookie("userauthemail", $email,time() + (86400 * 365), "/");
            header("location:$baseurl/thanks");
        } else {
            echo "Please try again.";
        }
        
    }
     
} else {
    echo "<h1>Null Code</h1>";
}
?>