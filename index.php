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
    <!-- basic met -->
    <meta name="description"
        content="Latest news, analysis and opinion by the reporters of Bongo Path, Subscribe for Bangladesh and International news, business, politics, sports, science, technology, health, arts and more.">
    <meta name="keywords"
        content="Bongo Path, bangla news, current News, bangla newspaper, bangladesh newspaper, online paper, bangladeshi newspaper, bangla news paper, bangladesh newspapers, newspaper, all bangla news paper, bd news paper, news paper, bangladesh news paper, daily, bangla newspaper, daily news paper, bangladeshi news paper, bangla paper, all bangla newspaper, bangladesh news, daily newspaper">
    <!-- OpenGraph Meta -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $baseurl ?>">
    <meta property="og:title" content="Bongo Path- Breaking news, Bangladeshi News, World News and more.">
    <meta property="og:description"
        content="Latest news, analysis and opinion by the reporters of Bongo Path, Subscribe for Bangladesh and International news, business, politics, sports, science, technology, health, arts and more.">
    <meta property="og:image" content="assets/img_site/Bongo-Path-Logo.png">
    <meta property="og:image:width" content="1200">
    <meta name="brand_name" content="Bongo Path">
    <!-- Schema Data Index Page -->
    <script type="application/ld+json">
        {"@context":"http://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"<?= $baseurl ?>"}]}
    </script>
    <script type="application/ld+json"
        data-schema="Organization">{"@context":"http://schema.org","@type":"Organization","name":"<?= $site_data['site_name'] ?>","alternateName":"<?= $site_data['site_name'] ?>","foundingDate":"2022-12-31","url":"<?= $baseurl ?>","logo":{"@type":"ImageObject","url":"<?= $baseurl ?>assets/img_site/Bongo-Path-Logo.png"},"image":"assets/img_site/Bongo-Path-Logo.png","description":"Bongo Path, bangla news, current News, bangla newspaper, bangladesh newspaper, online paper, bangladeshi newspaper, bangla news paper, bangladesh newspapers, newspaper, all bangla news paper, bd news paper, news paper, bangladesh news paper, daily, bangla newspaper, daily news paper, bangladeshi news paper, bangla paper, all bangla newspaper, bangladesh news, daily newspaper"}}</script>
    <!-- canonical url -->
    <link rel="canonical" href="<?= $baseurl ?>">
    <meta name="robots" content="follow, index"/>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
    <title><?= $site_data['site_name'] ?> - Breaking news, Bangladeshi News, World News and more.</title>
</head>

<body>
    <?php
    include('./library/includes/navbar.php');
    ?>
    <header>
        <?php include("./library/includes/header.php") ?>
    </header>
    <section id="main">
        <?php include("library/includes/section_main.php") ?>
    </section>
    <section id="world">
        <?php include("library/includes/section_world.php") ?>
    </section>
    <section id="bn">
        <?php include("library/includes/section_country.php") ?>
    </section>
    <section id="spots">
        <?php include("library/includes/section_spots.php") ?>
    </section>
    <section id="business">
        <?php include("library/includes/section_business.php") ?>
    </section>
    <section id="tech">
        <?php include("library/includes/section_tech.php") ?>
    </section>
    <br><br>
    <section id="news_letter">
        <?php
        if (!isset($_COOKIE['userauthemail'])) {
            $class_status_nsl = "d-block";
        } elseif (isset($_COOKIE['userauthemail'])) {
            $class_status_nsl = "d-none";
        }
        ?>
        <div class="container my-3 <?= $class_status_nsl ?>">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        <h3>Subscribe Our Newsletter</h3>
                    </div>
                    <form action="<?= $baseurl ?>library/sub_nl.php" method="post">
                        <div class="input-group_news_letter">
                            <input type="email" class="input_newsletter_email" id="Email" name="email"
                                placeholder="example@email.com" autocomplete="off" required>
                            <input class="button--submit fw-bolder" value="Subscribe" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section id="footer">
        <?php include("library/includes/footer.php") ?>
    </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script>
        // Clock For Gretting
        function startTime() {
            const today = new Date();
            let hours = today.getHours();
            let mins = today.getMinutes();
            let seconds = today.getSeconds();
            let session = "AM";
            let day = today.getDate();
            let month = today.getMonth();
            let year = today.getFullYear();
            mins = checkTime(mins);
            if (hours > 12) {
                hours = hours - 12;
                session = "PM"
            }
            document.getElementById("clock_txt").innerHTML = hours + ":" + mins + ":" + seconds + " " + session;
            document.getElementById("calender_text").innerHTML = day + '-' + month + '-' + year;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            } // add zero in front of numbers < 10
            return i;
        }
        startTime();
// Clock For Gretting End
    </script>
</body>

</html>