<div class="container">
    <div class="border-bottom border-dark mb-2">
        <a href="<?= $baseurl ?>category/world" class="text-decoration-none text-dark">
            <h1 class="my-2">World</h1>
        </a>
    </div>
    <div class="row justify-content-center gx-2 gx-md-1">
        <?php
        $wn_news = $conn->query("SELECT * FROM `posts` Where post_cat='world' AND types='1' ORDER BY `time` DESC Limit 9");
        if ($wn_news->num_rows > 0) {
            while ($w_news = $wn_news->fetch_assoc()) {
                if (in_array($w_news['post_id'], $br_news_arry)) {
                    continue;
                }
        ?>
        <div class="col-lg-4 col-md-4">
            <a href="<?= $baseurl ?>post/<?= $w_news['post_cat'] ?>/<?= $w_news['postSlug'] ?>" class="text-decoration-none">
                <div class="alert alert-secondary">
                <img class="rounded" src="<?=$baseurl ?>assets/img_post/<?= $w_news['thm'] ?>" alt="" height="auto" width="100%">
                    <h1 class="he1 text-truncate mt-2">
                        <?= $w_news['post_title'] ?>
                    </h1>
                    <span>
                        <?= date('h:i A F jS, y', strtotime($w_news['time'])); ?>
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