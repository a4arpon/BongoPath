<?php
include('./library/db.php');
$sql = "SELECT * FROM `sitemap`";
$qry = $conn->query($sql);
header('Content-type: application/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>" . PHP_EOL;
echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
echo '<sitemap>' . PHP_EOL;
echo '<loc>' . $baseurl . '</loc>' . PHP_EOL;
echo '</sitemap>' . PHP_EOL;
while ($row = $qry->fetch_assoc()) {

    echo '<sitemap>' . PHP_EOL;
    echo '<loc>' . $baseurl . $row["main_url"] . '</loc>' . PHP_EOL;
    echo '<lastmod>'.$row["time"].'</lastmod>' . PHP_EOL;
    echo '</sitemap>' . PHP_EOL;
}
echo '</sitemapindex>' . PHP_EOL;
?>