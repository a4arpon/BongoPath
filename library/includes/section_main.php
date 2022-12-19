<div class="container">
    <div class="row justify-content-center gx-2 gx-md-1 alert alert-danger px-1">
        <div class="border-bottom border-danger mb-2">
            <h1 class="my-2 text-danger">Breaking News</h1>
        </div>
        <?php
        $br_news_arry = array();
        $br_news = $conn->query("SELECT * FROM `breaking_news` Order by 'id' DESC Limit 8");
        while ($br_news_fetch_assoc = $br_news->fetch_assoc()) {
            $br_news_arry[] = $br_news_fetch_assoc['news_id'];
            $Temp_br_news_fetch_assoc = $br_news_fetch_assoc['news_id'];
            $br_news_post = $conn->query("SELECT * FROM `posts` WHERE post_id='$Temp_br_news_fetch_assoc' AND types='1' ORDER BY `post_id` DESC");
            $br_news_fetchs = $br_news_post->fetch_assoc();
        ?>
        <div class="col-lg-3 col-md-6">
            <a href="<?= $baseurl ?>post/<?= $br_news_fetchs['post_cat'] ?>/<?= $br_news_fetchs['postSlug'] ?>" class="text-decoration-none">
                <div class="alert bg-white text-black">
                    <img class="rounded" src="<?=$baseurl ?>assets/img_post/<?= $br_news_fetchs['thm'] ?>" alt="" height="auto" width="100%">
                    <h1 class="he1 text-truncate mt-2">
                        <?= $br_news_fetchs['post_title'] ?>
                    </h1>
                    <p><?= timeStraper($br_news_fetchs['time']); ?></p>

                </div>
            </a>
        </div>

        <?php
        }
        ?>
    </div>
</div>