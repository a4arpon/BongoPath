<?php
include("./library/db.php");
include("./library/function.php");
$site_data_qry = mysqli_query($conn, "SELECT * FROM `site_settings` Where id='1'");
$site_data = mysqli_fetch_assoc($site_data_qry);
$full_req = explode("/", $_GET['post']);
$postSlug = $full_req[1];
if (isset($postSlug)) {

    $post_qry = mysqli_query($conn, "SELECT * FROM `posts` Where postSlug='$postSlug'");
    $post_data = mysqli_fetch_assoc($post_qry);
} else {

    header("location: ./index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom Meta -->
    <?= $post_data['post_meta'] ?>
    <!-- Custom Meta End -->
    <title><?= $post_data['post_title'] ?> - <?= $site_data['site_name'] ?></title>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $baseurl ?>assets/css/style.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $baseurl ?>assets/img_site/fav/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $baseurl ?>assets/img_site/fav/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $baseurl ?>assets/img_site/fav/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $baseurl ?>assets/img_site/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $baseurl ?>assets/img_site/fav/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="<?= $baseurl ?>assets/img_site/fav/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $baseurl ?>assets/img_site/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $baseurl ?>assets/img_site/fav/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $baseurl ?>assets/img_site/fav/favicon-16x16.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Fav End -->
        <style>
            img {
                max-width: 100%;
                max-height: auto;
            }
        </style>
</head>

<body>
    <header>
        <?php include("./library/includes/navbar.php") ?>
    </header>
    <section id="main_story">
        <div class="container mt-5">
            <div class="row gx-2 gy-2">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title border-bottom border-dark mb-2">
                                <h1 class="text-dark">
                                    <?= $post_data['post_title'] ?>
                                </h1>
                                <h6><b class="badge bg-primary">
                                        <?= cat_fatcher($conn, $post_data['post_cat']) ?>
                                    </b> <span class="text-muted">
                                        <?= timeStraper($post_data['time']) ?>
                                    </span></h6>
                            </div>

                            <div class="post_text">
                                <?= $post_data['post_details'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center">
                        <h4>Related Topics</h4>
                    </div>
                    <?php
                    $post_r_cat = $post_data['post_cat'];
                    $sql_r_topic = $conn->query("SELECT * FROM `posts` Where post_cat='$post_r_cat' AND types='1' Order by time DESC Limit 8");
                    if ($sql_r_topic->num_rows > 1) {
                        while ($r_post = $sql_r_topic->fetch_assoc()) {
                            if ($r_post['post_id'] == $post_data['post_id']) {
                                continue;
                            }
                    ?>
                    <a href="<?= $baseurl ?>post/<?= $r_post['post_cat'] ?>/<?= $r_post['postSlug'] ?>"
                        class="text-decoration-none text-dark">
                        <div class="alert alert-secondary mb-2">
                            <h4 class="fs-4 text-truncate">
                                <?= $r_post['post_title'] ?>
                            </h4>
                            <span>
                                <?= timeStraper($r_post['time']) ?>
                            </span>
                        </div>
                    </a>
                    <?php
                        }
                    } else {
                    ?>
                    <div class="alert alert-warning mb-2">
                        <h2 class="fs-4">This category doesn't contain any related posts.</h2>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <br><br>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>