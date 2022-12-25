<?php
include('./lib/core/db.php');
if (!isset($_COOKIE['admin_cook'])) {
  header("location:./pages-login.php");
} elseif (isset($_COOKIE['admin_cook'])) {

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./lib/inc/head.php') ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <?php include('./lib/inc/nav.php') ?>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <?php include('./lib/inc/sidebar.php') ?>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Ping Search Console</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-terminal-plus"></i>
                    </div>
                    <div class="ps-3">
                      <a href="https://www.google.com/ping?sitemap=<?=$baseurl ?>sitemap.xml" class="btn btn-primary mx-3">!!! Ping !!!</a>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
          </div><!-- End News & Updates -->
        </div>
      </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <?php include('lib/inc/footer.php') ?>

</body>

</html>