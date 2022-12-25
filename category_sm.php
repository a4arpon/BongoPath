<?php
include("./library/db.php");
include("./library/function.php");
$site_data_qry = mysqli_query($conn, "SELECT * FROM `site_settings` Where id='1'");
$site_data = mysqli_fetch_assoc($site_data_qry);
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
    <meta name="robots" content="follow, index"/>
    <!-- canonical url -->
    <link rel="canonical" href="<?= $baseurl ?>category_sm/<?php if (!isset($_GET['item'])) {}elseif(isset($_GET['item'])){echo $_GET['item'];}?>">
    <title>
        <?php
        if (!isset($_GET['item'])) {
           
        } elseif(isset($_GET['item'])){
            echo $_GET['item'];
        }
        ?> | Category | <?= $site_data['item'] ?>
    </title>
</head>

<body>
    <header>
        <?php include("./library/includes/navbar.php") ?>
    </header>
    <br>
    <?php
    if (!isset($_GET['item'])) {
    ?>
    <section id="catagory">
        <div class="container">
            <div class="row">
                <?php
        $category_qry = $conn->query("SELECT * FROM `menus_navbar` Order By `name` ASC");
        while ($category = $category_qry->fetch_assoc()) {
                ?>
                <a class="col-md-4 px-3 mb-2 text-decoration-none"
                    href="<?= $baseurl ?>category/<?= $category['link'] ?>">
                    <div class="card">
                        <div class="card-body text-center">
                            <?= $category['name'] ?>
                        </div>
                    </div>
                </a>
                <?php
        }
                ?>
            </div>
        </div>
    </section>
    <?php
    } elseif (isset($_GET['item'])) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 px-2">
                <?php
        $post_cates = explode("/", $_GET['item']);
        $post_cate = $post_cates[0];
        $limit = 20;
        if (!isset($post_cates[1])) {
            $page = 1;
        } elseif (isset($post_cates[1])) {
            $page = $post_cates[1];
            if ($page < 1) {
                $page = 1;
            }
        }
        $page_offset = ($page - 1) * $limit;
        $sql_cat_post = $conn->query("SELECT * FROM `posts` WHERE `post_cat` = '$post_cate' AND types='1' ORDER BY `time` DESC LIMIT {$page_offset},{$limit}");
        if ($sql_cat_post->num_rows > 0) {
            $ium = 1;
            while ($cat_post = $sql_cat_post->fetch_assoc()) {
                ?>
                <a href="<?= $baseurl ?>post/<?= catStraper($conn, $cat_post['post_cat']) ?>/<?= $cat_post['postSlug'] ?>"
                    class="text-decoration-none">
                    <div class="alert alert-dark">
                        <h1 class="text-truncate">
                            <?php echo $ium;
                $ium++ ?>
                            <?= $cat_post['post_title'] ?>
                        </h1>
                    </div>
                </a>
                <?php
            }
        } else {
                ?>
                <div class="alert alert-warning">
                    <h1>This Category Contains No More Posts</h1>
                </div>
                <?php
        }
                ?>
                <div class="d-flex justify-content-center mt-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href=" <?php
        echo $baseurl . "category/" . $post_cate . "/" . ($page - 1);
                                ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php
        $navip_sql = $conn->query("SELECT * FROM `posts` WHERE `post_cat` = '$post_cate' ORDER BY `time` DESC");
        $navip_result = $navip_sql->num_rows;
        if ($navip_result > $limit) {
            $page_num = ceil($navip_result / $limit);
            for ($navi = 1; $navi <= $page_num; $navi++) {
                if ($navi == $page) {
                    $active = "active";
                } else {
                    $active = "";
                }

                            ?>
                            <li class="page-item <?= $active ?>"><a class="page-link" href="
                            <?php
                echo $baseurl . "category/" . $post_cate . "/" . $navi;
                            ?>">
                                    <?= $navi ?>
                                </a></li>
                            <?php
            }
        } else {
            echo '<li class="page-item"><a class="page-link" href="' . $baseurl . "category/" . $post_cate . "/" . 1 . '">1</a></li>';
        }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href=" <?php
        echo $baseurl . "category/" . $post_cate . "/" . ($page + 1);
                                ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>