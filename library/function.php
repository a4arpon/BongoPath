<?php 
function cat_fatcher($conn, $recent_post_cat_dat)
{
    $rc_post_sql = $conn->query("SELECT * FROM `menus_navbar` WHERE link='$recent_post_cat_dat'");
    $rc_post_sql_data = $rc_post_sql->fetch_assoc();
    return $rc_post_sql_data['name'];
}
function timeStraper($time_post){
   return date('h:i A j M, y', strtotime($time_post));
}

function catStraper($conn, $cat_name){
    $cat_sql = $conn->query("SELECT * FROM `menus_navbar` WHERE `name`='$cat_name'");
    $cat_link = $cat_sql->fetch_assoc();
    return $cat_link['link'];
}
?>