<div class="container">
    <div class="border-bottom border-dark mb-2">
        <a href="<?= $baseurl ?>category/business" class="text-decoration-none text-dark">
            <h1 class="my-2">Tech</h1>
        </a>
    </div>
    <div class="row justify-content-center gx-2 gx-md-1">
        <?php
        $ts_nes = $conn->query("SELECT * FROM `posts` Where post_cat='tech' AND types='1' ORDER BY `time` DESC Limit 9");
        if ($ts_nes->num_rows > 0) {
            while ($t_news = $ts_nes->fetch_assoc()) {
                if (in_array($t_news['post_id'], $br_news_arry)) {
                    continue;
                }
        ?>
        <div class="col-lg-4 col-md-4">
            <a href="<?= $baseurl ?>post/<?= catStraper($conn, $t_news['post_cat']) ?>/<?= $t_news['postSlug'] ?>" class="text-decoration-none">
                <div class="alert alert-secondary">
                <img class="rounded" src="<?=$baseurl ?>assets/img_post/<?= $t_news['thm'] ?>" alt="<?= $t_news['post_f_alt'] ?>" height="auto" width="100%">
                    <h1 class="he1 text-truncate mt-2">
                        <?= $t_news['post_title'] ?>
                    </h1>
                    <span>
                        <?= timeStraper($t_news['time']); ?>
                    </span>
                </div>
            </a>
        </div>

        <?php
            }
        } else {
            echo "<div class='alert alert-secondary'><h1>No Posts To Show</h1></div>";
        }
        ?>
    </div>
</div>