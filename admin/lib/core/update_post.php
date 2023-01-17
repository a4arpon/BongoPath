<?php
// add_new_post.php
include("./db.php");
if (!isset($_COOKIE['admin_cook'])) {
    header("location:./pages-login.php");
} elseif (isset($_COOKIE['admin_cook'])) {
    if (isset($_POST['post_mode'])) {
        extract($_POST);
        // Image Upload
        if ($post_title == "") {
            $error[] = "Please Enter Post Title";
        }
        if ($post_cat == "Category") {
            $error[] = "Please Select Category";
        }
        if ($post_details == "") {
            $error[] = "Please Enter Post";
        }
        if (!isset($error)) {
            // $post_fImage =
            $post_id = $_GET['post_id'];
            $post_title = $con->real_escape_string($post_title);
            $post_details = $con->real_escape_string($post_details);
            $post_meta = $con->real_escape_string($post_meta);
            $post_cat_name = cat_fatcher($con, $post_cat);
            $f_image_alt = $con->real_escape_string($f_image_alt);
            // SQL Process
            if ($post_mode == "Publish") {
                $sql = "UPDATE `posts` SET `post_meta`='$post_meta',`post_f_alt`='$f_image_alt',`post_title`='$post_title',`post_details`='$post_details',`post_cat`='$post_cat_name' WHERE `post_id`='$post_id'";
            } elseif ($post_mode == "Draft") {
                $sql = "UPDATE `posts` SET `post_meta`='$post_meta',`post_f_alt`='
                $f_image_alt',`post_title`='$post_title',`post_details`='$post_details',`post_cat`='$post_cat_name',`types`='0' WHERE `post_id`='$post_id'";
            }
            $qry = $con->query($sql);
            if ($br_news == "yes") {
                $check_br_old = $con->query("SELECT * From `breaking_news` Where news_id='$post_id'");
                if ($check_br_old->num_rows < 0) {
                    $br_id_set = $con->query("INSERT INTO `breaking_news`(`news_id`) VALUES ('$post_id')");
                }
            } elseif ($br_news == "no") {
                $check_br_old = $con->query("SELECT * From `breaking_news` Where news_id='$post_id'");
                if ($check_br_old->num_rows < 2) {
                    $br_set = $con->query("DELETE FROM `breaking_news` WHERE news_id='$post_id'");
                }
            }
            if ($google_news == "yes") {
                $check_gn_old = $con->query("SELECT * From `google_news` Where news_id='$post_id'");
                if ($check_gn_old->num_rows < 0) {
                    $gn_id_set = $con->query("INSERT INTO `google_news`(`news_id`) VALUES ('$post_id')");
                }
            } elseif ($google_news == "no") {
                $check_gn_old = $con->query("SELECT * From `google_news` Where news_id='$post_id'");
                if ($check_gn_old->num_rows < 2) {
                    $gn_id_set = $con->query("DELETE FROM `google_news` WHERE news_id='$post_id'");
                }
            }
            header("location:../../forms-editors.php?action_msg='Post Added'");
        }
    }
    if (isset($error)) {
        foreach ($error as $error) {
            echo $error;
        }
    }
    function cat_fatcher($con, $recent_post_cat_dat)
    {
        $rc_post_sql = $con->query("SELECT * FROM `menus_navbar` WHERE link='$recent_post_cat_dat'");
        $rc_post_sql_data = $rc_post_sql->fetch_assoc();
        return $rc_post_sql_data['name'];
    }
}
?>