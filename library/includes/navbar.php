<nav class="navbar bg-light sticky-top justify-content-center shadow-sm">
    <div class="container-fluid">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <?= $site_data['site_name'] ?><span style="font-size: small;">en</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= $baseurl ?>">Home</a>
                    </li>
                    <?php
                    $qry_nav_menu = mysqli_query($conn, "SELECT * FROM `menus_navbar` ORDER BY `name` ASC");
                    while ($nav_link = mysqli_fetch_assoc($qry_nav_menu)) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseurl ?>category/<?= $nav_link['link'] ?>">
                            <?= $nav_link['name'] ?>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text_line_logo" href="#">
            <?= $site_data['site_name'] ?>
        </a>
        <h1 class="text_h1_logo">
            <?= $site_data['site_name'] ?><span style="font-size: 22px;">en</span>
        </h1>
        <div class="extra_nav">
            <div class="d-none">
                <a href="#" class="text-decoration-none mx-1">About</a>
                <a href="#" class="text-decoration-none mx-1">Privacy Policy</a>
                <a href="#" class="text-decoration-none mx-1">Products</a>
                <a href="#" class="btn-sm btn-secondary btn mx-1">Login</a>
            </div>
        </div>
    </div>
    <div class="new_nav_bar text-center mt-2">
        <div class="d-none">
            <a href="#" class="text-decoration-none mx-1">About</a>
            <a href="#" class="text-decoration-none mx-1">Privacy Policy</a>
            <a href="#" class="text-decoration-none mx-1">Products</a>
            <a href="#" class="btn-sm btn-secondary btn mx-1">Login</a>
        </div>
    </div>
</nav>