<?php
include("library/db.php");
include("./library/function.php");
header('Content-Type: text/xml');
$feed="<?xml version='1.0' encoding='UTF-8' ?>";
$feed.='<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/" version="2.0">';
$feed.='<channel>';
$feed.='<title>Bongo Path</title>';
$feed.='<link>'.$baseurl.'</link>';
$feed.='<description>Latest news, analysis and opinion by the reporters of Bongo Path, Subscribe for Bangladesh and International news, business, politics, sports, science, technology, health, arts and more.</description>';
$res = $conn->query("SELECT * FROM `posts` Where types='1' ORDER BY `time` DESC");
if(mysqli_num_rows($res)>0){
	while($row=$res->fetch_assoc()){
		$feed.='<item>';
			$feed.='<title>'.$row['post_title'].'</title>';
			$feed.='<content:encoded><![CDATA[' . $row['post_details'] . ']]></content:encoded>';
			$feed.='<link>'.$baseurl.'post/'.catStraper($conn,$row['post_cat']).'/'.$row['postSlug'].'</link>';
			$feed.='<guid>'.$row['post_id'].'</guid>';
			$feed.='<pubDate>'.$row['time'].'</pubDate>';
		$feed.='</item>';
	}
}
$feed.='</channel>';
$feed.='</rss>';
echo $feed;
?>