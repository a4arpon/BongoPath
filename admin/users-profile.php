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
    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Password</h5>
              <form action="lib/core/change_pwd.php.php" method="POST">
                <span>Enter New Password:</span>
                <input type="text" name="password" class="form-control mb-2">
                <button type="submit" class="btn btn-primary w-100">Change Password</button>
              </form>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php include('lib/inc/footer.php') ?>
</body>

</html>