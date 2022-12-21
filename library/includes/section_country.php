<div class="container">
    <div class="row justify-content-center gx-md-2 gx-1">
        <div class="col-6">
            <div class="border-bottom border-dark mb-2">
                <a href="<?= $baseurl ?>category/country" class="text-decoration-none text-dark">
                    <h3 class="my-2">Country</h3>
                </a>
            </div>
            <div class="row gx-1">
                <?php
                $cnn_news = $conn->query("SELECT * FROM `posts` where post_cat='country' AND types='1' ORDER BY `time` DESC Limit 6");
                if ($cnn_news->num_rows > 0) {
                    while ($cn_news = $cnn_news->fetch_assoc()) {
                        if (in_array($cn_news['post_id'], $br_news_arry)) {
                            continue;
                        }
                ?>
                <div class="col-md-6">
                    <a href="<?= $baseurl ?>post/<?= catStraper($conn, $cn_news['post_cat']) ?>/<?= $cn_news['postSlug'] ?>"
                        class="text-decoration-none">
                        <div class="alert alert-secondary">
                            <img class="rounded" src="<?= $baseurl ?>assets/img_post/<?= $cn_news['thm'] ?>" alt="<?= $cn_news['post_f_alt'] ?>"
                                height="auto" width="100%">
                            <h1 class="he1 text-truncate mt-2">
                                <?= $cn_news['post_title'] ?>
                            </h1>
                            <span>
                                <?= timeStraper($cn_news['time']); ?>
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
        <div class="col-6">
            <div class="border-bottom border-dark mb-2">
                <a href="<?= $baseurl ?>category/education" class="text-decoration-none text-dark">
                    <h3 class="my-2">Education</h3>
                </a>
            </div>
            <div class="row gx-1">
                <?php
                $enn_news = $conn->query("SELECT * FROM `posts` Where post_cat='education' AND types='1' ORDER BY `time` DESC Limit 6");
                if ($enn_news->num_rows > 0) {
                    while ($en_news = $enn_news->fetch_assoc()) {
                        if (in_array($en_news['post_id'], $br_news_arry)) {
                            continue;
                        }
                ?>
                <div class="col-md-6 col-sm-12">
                    <a href="<?= $baseurl ?>post/<?= catStraper($conn, $en_news['post_cat']) ?>/<?= $en_news['postSlug'] ?>"
                        class="text-decoration-none">
                        <div class="alert alert-secondary">
                            <img class="rounded" src="<?= $baseurl ?>assets/img_post/<?= $en_news['thm'] ?>" alt="<?= $en_news['post_f_alt'] ?>"
                                height="auto" width="100%">
                            <h1 class="he1 text-truncate mt-2">
                                <?= $en_news['post_title'] ?>
                            </h1>
                            <span>
                                <?= timeStraper($en_news['time']); ?>
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
    </div>
</div>