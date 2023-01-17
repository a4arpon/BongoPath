<?php
include("./lib/core/db.php");
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
        <div class="col-lg-12">
          <?php
          $post_sql = "SELECT * FROM `posts` ORDER BY `time` DESC";
          $post_result = $con->query($post_sql);
          if ($post_result->num_rows > 0) {

            while ($post = $post_result->fetch_assoc()) {

          ?>
          <div class="card p-2">
            <div class="card-body d-flex align-items-center align-content-center" style="overflow: hidden;">
              <div class="w-100">
                <h4 class="my-1">
                  <?= $post['post_title'] ?>
                </h4>
                <span class="badge bg-secondary">
                  <?= $post['post_cat'] ?>
                </span>
              </div>

              <div class="btn-group">
                <a href="forms-editors_edit.php?post_id=<?= $post['post_id'] ?>" class="btn btn-warning"><i
                    class="bi bi-pencil-square"></i></a>
                <a href="lib/core/del_post_core.php?post_id=<?= $post['post_id'] ?>"
                  onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
              </div>

            </div>
          </div>
          <?php }
          }
          ?>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('./lib/inc/footer.php') ?>

</body>

</html>