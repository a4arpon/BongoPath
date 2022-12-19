<?php
include('./library/db.php');
$sql = "SELECT * FROM `posts` Where types='1'  ORDER BY `post_id` DESC";
$qry = $conn->query($sql);
header('Content-type: application/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>" . PHP_EOL;
echo '<urlset xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
while ($row = $qry->fetch_assoc()) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $baseurl . "post/".$row['post_cat']."/".$row["postSlug"] . '</loc>' . PHP_EOL;
    echo '<changefreq>hourly</changefreq>';
    echo '<lastmod>'.$row["time"].'</lastmod>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}
echo '</urlset>' . PHP_EOL;
?>