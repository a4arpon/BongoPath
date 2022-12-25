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
            $image_temp = $_FILES['f_image_file'];
            $thm = image_upload($baseurl, $image_temp);
            // $post_fImage =
            $post_title = $con->real_escape_string($post_title);
            $post_details = $con->real_escape_string($post_details);
            $summery = $con->real_escape_string($summery);
            $f_image_alt = $con->real_escape_string($f_image_alt);
            $postSlug = slug($post_title);
            // Schema Generator
            $schema = meta_processor(
                $baseurl,
                $author,
                $author_url,
                $org_name,
                $org_url,
                $summery,
                $post_date,
                $postSlug,
                $post_title,
                $post_cat,
                $thm
            );
            $post_meta = $post_meta . $schema;
            $post_meta_processed = $con->real_escape_string($post_meta);
            $post_cat_name = cat_fatcher($con, $post_cat);
            // SQL Process
            if ($post_mode == "Publish") {
                $sql = "INSERT INTO `posts`(`post_meta`,`summery`,`thm`,`post_f_alt`,`postSlug`,`post_title`, `post_details`, `post_cat`) VALUES
    ('$post_meta_processed','$summery','$thm','$f_image_alt','$postSlug','$post_title','$post_details','$post_cat_name')";
            } elseif ($post_mode == "Draft") {
                $sql = "INSERT INTO `posts`(`post_meta`,`summery`,`postSlug`,`post_title`, `post_details`, `post_cat`, `types`) VALUES
    ('$post_meta_processed','$summery','$postSlug','$post_title','$post_details','$post_cat_name', '0')";
            }
            $qry = $con->query($sql);
            if ($br_news == "yes") {
                $select_post_id = $con->query("SELECT * FROM `posts` where postSlug='$postSlug'");
                $select_fetch = $select_post_id->fetch_assoc();
                $br_id = $select_fetch['post_id'];
                $br_id_set = $con->query("INSERT INTO `breaking_news`(`news_id`) VALUES ('$br_id')");
            }
            if ($google_news == "yes") {
                $select_post_id = $con->query("SELECT * FROM `posts` where postSlug='$postSlug'");
                $select_fetch = $select_post_id->fetch_assoc();
                $gn_id = $select_fetch['post_id'];
                $gn_id_set = $con->query("INSERT INTO `google_news`(`news_id`) VALUES ('$gn_id')");
            }
            header("location:../../forms-editors.php?action_msg='Post Added'");
        }
    }
    if (isset($error)) {
        foreach ($error as $error) {
            echo $error;
        }
    }
    function slug($title)
    {
        $title = preg_replace('~[^\\pL\d]+~u', '-', $title);
        $title = trim($title, '-');
        $title = iconv("UTF-8", "US-ASCII//TRANSLIT", $title);
        $title = strtolower($title);
        $title = preg_replace("~[^-\w]+~", "", $title);
        if (empty($title)) {
            return time() + 69;
        }
        return $title;

    }
    function meta_processor(
        $baseurl,
        $author,
        $author_url,
        $org_name,
        $org_url,
        $summery,
        $post_date,
        $postSlug,
        $post_title,
        $post_cat,
        $thm
    )
    {
        $schema = '
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "NewsArticle",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "' . $baseurl . 'post/' . $post_cat . '/' . $postSlug . '"
          },
          "headline": "' . $post_title . '",
          "description": "' . $summery . '",
          "image": "' . $baseurl . 'assets/post_img/' . $thm . '",  
          "author": {
            "@type": "Organization",
            "name": "' . $author . '",
            "url": "' . $author_url . '"
          },  
          "publisher": {
            "@type": "Organization",
            "name": "' . $org_name . '",
            "logo": {
              "@type": "ImageObject",
              "url": "' . $org_url . '"
            }
          },
          "datePublished": "' . $post_date . '"
        }
        </script>
    <meta name="description" content="' . $summery . '">
    <link rel="canonical" href="' . $baseurl . 'post/' . $post_cat . '/' . $postSlug . '">
    <meta property="og:site_name" content="Bongo Path">
    <meta property="og:type" content="article">
    <meta property="og:url" content="' . $baseurl . 'post/' . $post_cat . '/' . $postSlug . '">
    <meta property="og:title" content="' . $post_title . '">
    <meta property="og:description" content="' . $summery . '">
    <meta property="og:image" content="' . $baseurl . 'assets/post_img/' . $thm . '">
    <meta property="og:image:width" content="750">
    <meta property="og:image:height" content="393">
    <meta property="article:published_time" content="' . $post_date . '">
    <meta name="robots" content="index, follow, max-image-preview:large">
    ';
        return $schema;
    }
    function image_upload($baseurl, $image_temp)
    {
        $f_image_file_name = time() . $image_temp['name'];
        $save_dir = '../../../assets/img_post/' . $f_image_file_name;
        $f_image_file_name_temp = $image_temp['tmp_name'];
        move_uploaded_file($f_image_file_name_temp, $save_dir);
        return $f_image_file_name;

    }
    function cat_fatcher($con, $recent_post_cat_dat)
    {
        $rc_post_sql = $con->query("SELECT * FROM `menus_navbar` WHERE link='$recent_post_cat_dat'");
        $rc_post_sql_data = $rc_post_sql->fetch_assoc();
        return $rc_post_sql_data['name'];
    }
}
?>