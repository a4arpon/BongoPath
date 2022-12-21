<?php
include('./library/db.php');
include("./library/function.php");
$g_news = $conn->query("SELECT * FROM `google_news` Order by 'id'");
$sql = "SELECT * FROM `posts` Where types='1'  ORDER BY `post_id` DESC";
$qry = $conn->query($sql);
header('Content-type: text/xml');
echo "<?xml version='1.0' encoding='UTF-8' ?>" . PHP_EOL;
echo '<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">' . PHP_EOL;
echo '<channel>' . PHP_EOL;
echo '<title>Bongo Path</title>' . PHP_EOL;
echo '<link>' . $baseurl . '</link>' . PHP_EOL;
echo '<description>Latest news, analysis and opinion by the reporters of Bongo Path, Subscribe for Bangladesh and International news, business, politics, sports, science, technology, health, arts and more.</description>' . PHP_EOL;
while ($g_news_fetch_assoc = $g_news->fetch_assoc()) {
    $Temp_g_news_fetch_assoc = $g_news_fetch_assoc['news_id'];
    $g_news_post = $conn->query("SELECT * FROM `posts` WHERE post_id='$Temp_g_news_fetch_assoc' AND types='1' ORDER BY `time` DESC");
    $row = $g_news_post->fetch_assoc();
    // Now Access The Fetches
    echo '<item>' . PHP_EOL;
    echo '<title>' . $row['post_title'] . '</title>' . PHP_EOL;
    echo '<content:encoded><![CDATA[' . $row['post_details'] . ']]></content:encoded>' . PHP_EOL;
    echo '<link>' . $baseurl . "post/" . catStraper($conn,$row['post_cat']) . "/" . $row["postSlug"] . '</link>' . PHP_EOL;
    echo '<guid>' . $row['post_id'] . '</guid>' . PHP_EOL;
    echo '<pubDate>' . date('Y-m-d', strtotime($row['time'])) . '</pubDate>' . PHP_EOL;
    echo '</item>' . PHP_EOL;
}
echo '</channel>' . PHP_EOL;
echo '</rss>' . PHP_EOL;
?>