<div class="container">
    <div class="border-bottom border-dark mb-2">
    <a href="<?= $baseurl ?>category/spots" class="text-decoration-none text-dark"><h2 class="my-2">Spots</h2></a>
    </div>
    <div class="row justify-content-center gx-md-1">
        <?php
        $wn_news = $conn->query("SELECT * FROM `posts` Where post_cat='spots' AND types='1' ORDER BY `time` DESC Limit 6");
        if ($wn_news->num_rows > 0) {
            while ($ws_news = $wn_news->fetch_assoc()) {
                if (in_array($ws_news['post_id'], $br_news_arry)) {
                    continue;
                }
        ?>
        <div class="col-lg-4 col-md-4">
            <a href="<?= $baseurl ?>post/<?= $ws_news['post_cat'] ?>/<?= $ws_news['postSlug'] ?>" class="text-decoration-none">
                <div class="alert alert-secondary">
                <img class="rounded" src="<?=$baseurl ?>assets/img_post/<?= $ws_news['thm'] ?>" alt="" height="auto" width="100%">
                    <h1 class="he1 text-truncate mt-2">
                        <?= $ws_news['post_title'] ?>
                    </h1>
                    <span>
                        <?= date('h:i A F jS, y', strtotime($ws_news['time'])); ?>
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