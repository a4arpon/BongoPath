<?php
include("./library/db.php");
$site_data_qry = mysqli_query($conn, "SELECT * FROM `site_settings` Where id='1'");
$site_data = mysqli_fetch_assoc($site_data_qry);
include("library/function.php");
if (!isset($_COOKIE['userauthemail'])) {
    header("location:./index.php");
} elseif (isset($_COOKIE['userauthemail'])) {
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>
        <?= $site_data['site_name'] ?>
    </title>
</head>

<body>
    <?php
    include('./library/includes/navbar.php');
    ?>
    <header>
        <?php include("./library/includes/header.php") ?>
    </header>
    <section id="thanks">
        <div class="container">
            <div class="row justify-content-center">
                <div class="alert alert-success col-md-10">
                    <h1><span class="fw-bolder">Thank you </span>for subscribing our newsletter.</h1>
                    <h3>You can explore our other products. <a href="https://blacktelescope.xyz/products" class="text-success">Click Here</a></h3>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>