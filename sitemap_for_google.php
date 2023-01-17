<?php
include('./library/db.php');
include("./library/function.php");
$g_news = $conn->query("SELECT * FROM `google_news` Order by 'id'");
$sql = "SELECT * FROM `posts` Where types='1'  ORDER BY `post_id` DESC";
$qry = $conn->query($sql);
header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . PHP_EOL;
while ($g_news_fetch_assoc = $g_news->fetch_assoc()) {
    $Temp_g_news_fetch_assoc = $g_news_fetch_assoc['news_id'];
    $g_news_post = $conn->query("SELECT * FROM `posts` WHERE post_id='$Temp_g_news_fetch_assoc' AND types='1' ORDER BY `time` DESC");
    $row = $g_news_post->fetch_assoc();
    // Now Access The Fetches
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $baseurl . "post/" . catStraper($conn,$row['post_cat']) . "/" . $row["postSlug"] . '</loc>' . PHP_EOL;
    echo '<news:news>' . PHP_EOL;
    echo '<news:publication>' . PHP_EOL;
    echo '<news:name>Bongo Path</news:name>' . PHP_EOL;
    echo '<news:language>en</news:language>' . PHP_EOL;
    echo '</news:publication>' . PHP_EOL;
    echo '<news:publication_date>' . date('Y-m-d',strtotime($row['time'])). '</news:publication_date>' . PHP_EOL;
    echo '<news:title>' . $row['post_title'] . '</news:title>' . PHP_EOL;
    echo '</news:news>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}
echo '</urlset>' . PHP_EOL;
?>