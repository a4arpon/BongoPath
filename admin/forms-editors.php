<?php
include('./lib/core/db.php');
if (!isset($_COOKIE['admin_cook'])) {
  header("location:./pages-login.php");
} elseif (isset($_COOKIE['admin_cook'])) {

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./lib/inc/head.php') ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <?php include('./lib/inc/nav.php') ?>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <?php include('./lib/inc/sidebar.php') ?>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <section class="section">
      <form action="./lib/core/add_new_post.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12 mb-2">
            <div class="card">
              <div class="card-body p-4">
                <div class="col-md-12 mb-2 px-2">
                  <h3>Post Title</h3>
                  <textarea name="post_title" class="w-100" rows="2"></textarea>
                </div>
                <div class="d-md-flex">
                  <div class="col-md-4 mb-2 px-2">
                    <div class="row gx-2">
                      <div class="col-6">
                        <h5>Select Category</h5>
                        <select name="post_cat" class="form-control">
                          <option value="Category">-- Select Category --</option>
                          <?php
                          $qry_nav_menu = mysqli_query($con, "SELECT * FROM `menus_navbar`");
                          while ($nav_link = mysqli_fetch_assoc($qry_nav_menu)) {
                          ?>
                          <option value="<?= $nav_link['link'] ?>">
                            <?= $nav_link['name'] ?>
                          </option>
                          <?php
                          } ?>
                        </select>
                      </div>
                      <div class="col-6">
                        <h5>Breaking News ?</h5>
                        <select name="br_news" class="form-control">
                          <option value="no">No</option>
                          <option value="yes">Yes</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-4 mb-2 px-2">
                        <h5>Select Thumbnail</h5>
                        <input type="file" name="f_image_file" class="form-control" accept="image/*">
                      </div>
                      <div class="col-md-8 mb-2 px-2">
                        <h5>Image Alt Tag</h5>
                        <input type="text" name="f_image_alt" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 mb-2">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">HexiSlot Editor</h5>

                <!-- TinyMCE Editor -->
                <textarea class="tinymce-editor" name="post_details">
                <h1>What's on your mind?</h1>
              </textarea><!-- End TinyMCE Editor -->

              </div>
            </div>
          </div>
          <div class="col-lg-12 mb-2">
            <div class="card">
              <div class="card-body p-4">
                <h3>Meta Description</h3>
                <textarea name="post_meta" class="form-control w-100 mb-2" rows="10"></textarea>
                <div class="row gx-2">
                  <div class="col-4">
                    <span>Author Name</span>
                    <input type="text" name="author" class="form-control mb-2">
                  </div>
                  <div class="col-8">
                    <span>Author URL</span>
                    <input type="text" name="author_url" class="form-control mb-2">
                  </div>
                  <div class="col-4">
                    <span>Publisher</span>
                    <input type="text" name="org_name" class="form-control mb-2">
                  </div>
                  <div class="col-8">
                    <span>Publisher URL</span>
                    <input type="text" name="org_url" class="form-control mb-2">
                  </div>
                  <div class="col-8">
                    <span>Summery</span>
                    <textarea type="text" name="summery" class="form-control mb-2" rows="5"></textarea>
                  </div>
                  <div class="col-4">
                    <span>Publish Date</span>
                    <input type="date" name="post_date" class="form-control mb-2">
                    <span>Google News?</span>
                    <select name="google_news" class="form-control mt-2">
                      <option value="no">No</option>
                      <option value="yes">Yes</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 mb-2">
            <div class="card">
              <div class="card-body p-4 row gx-2">
                <div class="w-100 col">
                  <select name="post_mode" class="form-control" id="mode">
                    <option value="none">-- Select Post Mode --</option>
                    <option value="Publish" class="form-control">Publish</option>
                    <option value="Draft" class="form-control">Draft</option>
                  </select>
                </div>
                <div class="w-100 col">
                  <button type="submit" id="button_post" name="submit"
                    class="btn btn-primary w-100 fw-bold disabled"><span id="mode_text"></span> Post</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </form>
    </section>

  </main><!-- End #main -->

  <?php include('./lib/inc/footer.php') ?>
  <script>
    document.querySelector('#mode').onchange = () => {
      if (document.querySelector('#mode').value == 'none') {
        document.querySelector('#button_post').classList.add("disabled");
      } else {
        document.querySelector('#mode_text').innerHTML = document.querySelector('#mode').value;
        document.querySelector('#button_post').classList.remove("disabled");
      }
    }
  </script>
  <script src="assets/vendor/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', '../assets/img_upload.php');

      xhr.upload.onprogress = (e) => {
        progress(e.loaded / e.total * 100);
      };

      xhr.onload = () => {
        if (xhr.status === 403) {
          reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
          return;
        }

        if (xhr.status < 200 || xhr.status >= 300) {
          reject('HTTP Error: ' + xhr.status);
          return;
        }

        const json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
          reject('Invalid JSON: ' + xhr.responseText);
          return;
        }

        resolve(json.location);
      };

      xhr.onerror = () => {
        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
      };

      const formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());

      xhr.send(formData);
    });
    const useDarkMode = window.matchMedia('(prefers-color-scheme: light)').matches;
    const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

    tinymce.init({
      selector: '.tinymce-editor',
      plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
      editimage_cors_hosts: ['picsum.photos'],
      menubar: 'file edit view insert format tools table help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
      toolbar_sticky: true,
      toolbar_sticky_offset: isSmallScreen ? 102 : 108,
      image_advtab: true,
      importcss_append: true,
      file_picker_callback: (callback, value, meta) => {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
          callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }

        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
          callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }
        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
          callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
      },
      height: 1000,
      image_caption: true,
      quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
      noneditable_class: 'mceNonEditable',
      toolbar_mode: 'sliding',
      contextmenu: 'link image table',
      skin: useDarkMode ? 'oxide-dark' : 'oxide',
      content_css: useDarkMode ? 'dark' : 'default',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
      // override default upload handler to simulate successful upload
      images_upload_handler: image_upload_handler_callback
    })

  </script>
</body>

</html>