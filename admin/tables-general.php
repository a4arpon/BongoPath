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
              <h5 class="card-title">Add Category</h5>
              <form action="lib/core/edit_menubar.php?action_type=add_new" method="GET">
                <span>Category Name:</span>
                <input type="text" name="name" class="form-control mb-2">
                <span>Category Link(must be in lower case):</span>
                <input type="text" name="link" class="form-control mb-2">
                <button type="submit" class="btn btn-primary w-100">Add Category</button>
              </form>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">link</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $menubar_sql = $con->query("SELECT * FROM `menus_navbar`");
                  if ($menubar_sql->num_rows > 0) {
                    $i = 1;
                    while ($category = $menubar_sql->fetch_assoc()) {
                  ?>
                  <tr>
                    <th scope="row">
                      <?= $i; $i++ ?>
                    </th>
                    <td>
                      <?= $category['name'] ?>
                    </td>
                    <td>
                      <?= $category['link'] ?>
                    </td>
                    <td><a href="lib/core/del_cat.php?id=<?= $category['id'] ?>&action_type=del"
                        class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                  </tr>
                  <?php
                    }
                  } else {
                  }
                  ?>
                </tbody>
              </table>
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