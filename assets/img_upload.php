<?php


// Set the upload folder 
$imageFolder = "img_post/";


reset($_FILES);
$temp = current($_FILES);
if (is_uploaded_file($temp['tmp_name'])) {
  // Sanitize input 
  if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
    header("HTTP/1.1 400 Invalid file name.");
    return;
  }

  // Verify extension 
  if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "jpeg", "png"))) {
    header("HTTP/1.1 400 Invalid extension.");
    return;
  }

  // Accept upload if there was no origin, or if it is an accepted origin 
  $filetowrite = $imageFolder . time();
  if (move_uploaded_file($temp['tmp_name'], $filetowrite)) {
    // Determine the base URL 
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://";
    $baseurl = $protocol . $_SERVER["HTTP_HOST"] . rtrim(dirname($_SERVER['REQUEST_URI']), "/") . "/";

    // Respond to the successful upload with JSON. 
    // Use a location key to specify the path to the saved image resource. 
    // { location : '/your/uploaded/image/file'} 
    echo json_encode(array('location' => $baseurl . $filetowrite));
  } else {
    header("HTTP/1.1 400 Upload failed.");
    return;
  }
} else {
  // Notify editor that the upload failed 
  header("HTTP/1.1 500 Server Error");
}

?>