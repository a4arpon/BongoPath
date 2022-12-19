<div class="container">
    <div class="row mb-2">
        <?php
        $qry_for_recent_menu = mysqli_query($conn, "SELECT * FROM `posts` ORDER BY `time` DESC LIMIT 4");
        if (mysqli_num_rows($qry_for_recent_menu) > 0) {

            while ($recent_post_data = mysqli_fetch_assoc($qry_for_recent_menu)) {
        ?>
        <a class="col-md-6 text-decoration-none px-2 py-2" href="<?=$baseurl ?>post/<?= $recent_post_data['post_cat'] ?>/<?= $recent_post_data['postSlug'] ?>">
            <div
                class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative h-100">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">
                        <?php echo cat_fatcher($conn, $recent_post_data['post_cat']) ?>
                    </strong>
                    <h1 class="mb-2 text-dark fs-4">
                        <?= $recent_post_data['post_title'] ?>
                    </h1>
                    <div class="mb-1 text-muted">
                        <?= $recent_post_data['time'] ?>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block d-md-none">
                    <img src="https://i.pinimg.com/736x/91/9b/f4/919bf433435845a455a0e5c429f9d47a.jpg" alt=""
                        class="bd-img">
                </div>
            </div>
        </a>
        <?php
            }
        } else {

        }

        ?>
    </div>
</div>