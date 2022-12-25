<?php
include("./library/db.php");
$site_data_qry = mysqli_query($conn, "SELECT * FROM `site_settings` Where id='1'");
$site_data = mysqli_fetch_assoc($site_data_qry);
include("library/function.php");

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
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img_site/fav/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img_site/fav/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img_site/fav/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img_site/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img_site/fav/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img_site/fav/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img_site/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img_site/fav/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img_site/fav/favicon-16x16.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Fav End -->
    <meta name="robots" content="follow, index" />
    <!-- canonical url -->
    <link rel="canonical" href="<?= $baseurl ?>category/<?php if (!isset($_GET['cat_name'])) {
          } elseif (isset($_GET['cat_name'])) {
              echo $_GET['cat_name'];
          } ?>">
    <title>
        <?php
        if (!isset($_GET['cat_name'])) {

        } elseif (isset($_GET['cat_name'])) {
            echo $_GET['cat_name'];
        }
        ?> | Category Map | <?= $site_data['site_name'] ?>
    </title>
</head>

<body>
    <?php
    if (!isset($_GET['cat_name'])) {

    } elseif (isset($_GET['cat_name'])) {
    ?>
    <center>
        <div class="card">
            <div class="card-body">
                <h1>
                    <?= $_GET['cat_name'] ?>
                </h1>
            </div>
        </div>
    </center>
    <?php
    }
    ?>
    <?php
    include('./library/includes/navbar.php');
    ?>
    <section id="lists">
        <div class="container">
            <div class="row gx-2">
                <?php
                if (!isset($_GET['cat_name'])) {
                    $sql_qry = $conn->query("SELECT * FROM `menus_navbar` ORDER BY `name` ASC");
                    if ($sql_qry->num_rows > 0) {
                        while ($assoc_cat = $sql_qry->fetch_assoc()) {
                ?>
                <a href="<?= $baseurl ?>category_sm/<?= $assoc_cat['link'] ?>"
                    class="text-decoration-none col-3 my-2 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h1><?= $assoc_cat['name'] ?></h1>
                        </div>
                    </div>
                </a>
                <?php
                        }
                    }
                } elseif (isset($_GET['cat_name'])) {
                    $cat_name = $_GET['cat_name'];
                    $sql_post = $conn->query("SELECT * FROM `posts` Where `post_cat`='$cat_name' ORDER BY `time` DESC");
                    if ($sql_post->num_rows > 0) {
                        while ($post_fetch = $sql_post->fetch_assoc()) {
                ?>
                <a href="<?= $baseurl ?>post/<?= catStraper($conn, $post_fetch['post_cat']) ?>/<?= $post_fetch['postSlug'] ?>"
                    class="text-decoration-none col-6 my-2 text-center">
                    <div class="card">
                        <div class="card-body">
                            <?= $post_fetch['post_title'] ?>
                        </div>
                    </div>
                </a>
                <?php
                        }
                    } else {
                        echo ("This Category Doesn't contain any posts");
                    }

                }
                ?>
            </div>
        </div>
    </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>