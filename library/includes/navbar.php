<div class="container">
    <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-md-3 pt-1 d-none d-md-block">
                <?php 
                if (!isset($_COOKIE['userauthemail'])) {
                    echo '<a class="btn btn-sm btn-outline-secondary" href="#news_letter">Subscribe</a>';
                } elseif (isset($_COOKIE['userauthemail'])) {
                    echo '<a class="btn btn-sm btn-primary disabled" href="#news_letter">Subscribed</a>';
                }
                ?>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <a class="blog-header-logo text-dark text-decoration-none" href="<?=$baseurl ?>">
                    <h2>
                        <?= $site_data['site_name'] ?>
                    </h2>
                </a>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center d-none d-md-block">
                <a class="btn btn-sm btn-outline-secondary disabled" href="#">Sign up</a>
            </div>
        </div>
    </header>
</div>
<div class="container sticky-top bg-white">
    <div class="nav-scroller py-1 mb-2 navbar-nav-scroll">
        <nav class="nav d-flex justify-content-between">
            <?php
        $qry_nav_menu = mysqli_query($conn, "SELECT * FROM `menus_navbar` ORDER BY `name` ASC");
        while ($nav_link = mysqli_fetch_assoc($qry_nav_menu)) {
        ?>
            <a class="p-2 link-secondary" href="<?= $baseurl ?>category/<?= $nav_link['link'] ?>">
                <?= $nav_link['name'] ?>
            </a>
            <?php
        }
        ?>
        </nav>
    </div>
</div>