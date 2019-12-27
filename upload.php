<?php
    include 'config.php';
    include 'session.php';
    if (empty($user)) {
      echo '<script> location.href="./login";</script>';
    }

    if (isset($_POST['btnupload'])) {
    $name = $_POST['name'];
    $categ = $_POST['categories'];
    $link = $_POST['link'];
    $desc = $_POST['description'];
    //UPLOAD IMAGE: https://www.w3schools.com/php/php_file_upload.asp
    // Nếu người dùng có chọn file để upload
      if ($_FILES["image_upload"]["size"] > 2048000) {
      $error = '<div class="alert alert-danger" role="alert">
                  <center>Kích thước file ảnh phải nhỏ hơn 2MB</center>
                </div>';
    } 
    else{
              // Upload file
        $image_name = $_FILES['image_upload']['name'];
              move_uploaded_file($_FILES['image_upload']['tmp_name'], './image/'.$_FILES['image_upload']['name']);
              
          
  
    //https://freetuts.net/tao-slug-tu-dong-bang-javascript-va-php-199.html
  function to_slug($str) {
      $str = trim(mb_strtolower($str));
      $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
      $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
      $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
      $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
      $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
      $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
      $str = preg_replace('/(đ)/', 'd', $str);
      $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
      $str = preg_replace('/([\s]+)/', '-', $str);
      return $str;
  }
  $slug = to_slug($name);
  //
    //$sql = "SELECT * FROM DOCUMENT WHERE name = '$name' OR email = '$email'";
    //$query = mysqli_query($conn, $sql);
    //$num_rows = mysqli_num_rows($query);

      $sql_insert = "INSERT INTO DOCUMENT VALUES (NULL,'".$name."','".$categ."','".$desc."','".$image_name."','".$link."',0,'".$slug."',2,'".$user."')";
      $query_insert = mysqli_query($conn, $sql_insert);
      $noti = '<div class="alert alert-success" role="alert">
                  <center>Đã đăng tài liệu thành công, vui lòng chờ xét duyệt</center>
                </div>';
      //echo '<script> location.href="./success";</script>';
    }
  }

    $sql_categories = "SELECT * FROM CATEGORIES";
    $query_categories = mysqli_query($conn, $sql_categories);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Tải lên tài liệu - QNU SHARE
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-kit.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/css/material-kit.css" rel="stylesheet" />
  <link href="./assets/css/vertical-nav.css" rel="stylesheet" />
</head>

<body class="signup-page sidebar-collapse">
  <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="./">
          QNU SHARE </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Chuyên ngành
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="./presentation.html" class="dropdown-item">
                <i class="material-icons">computer</i> Công nghệ thông tin
              </a>
              <a href="./index.html" class="dropdown-item">
                <i class="material-icons">language</i> Ngôn ngữ Anh
              </a>
              <a href="http://demos.creative-tim.com/material-kit-pro/docs/2.1/getting-started/introduction.html" class="dropdown-item">
                <i class="material-icons">content_paste</i> Documentation
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="./upload" class="nav-link">
              <i class="material-icons">cloud_upload</i> Tải lên
            </a>
          </li>
          <?php if (!empty($user)) {
            echo '
              <li class="nav-item">
                <a href="./profile" class="nav-link">
                  Trang cá nhân
                </a>
              </li>
              <li class="button-container dropdown nav-item">
                <a class="dropdown-toggle nav-link btn btn-rose btn-round btn-block" data-toggle="dropdown">
                  <i class="material-icons">account_circle</i>'.$user.'
                </a>

                <div class="dropdown-menu dropdown-with-icons">
                  <a href="./logout" class="dropdown-item">
                    <i class="material-icons">dns</i> Đăng xuất
                  </a>
                </div>

              </li>
            ';
          } else
          echo '
            <li class="button-container dropdown nav-item">
              <a href="./login" class="nav-link btn btn-rose btn-round btn-block">
                <i class="material-icons">account_circle</i> Đăng nhập
              </a>
            </li>
          ';
          ?>

        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" filter-color="purple" style="background-image: url('./assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-signup">
            <h2 class="card-title text-center">Tải lên tài liệu</h2>
            <div class="card-body">
              <div class="row">
                <div class="col-md-5 ml-auto">
                  <div class="info info-horizontal">
                    <div class="icon icon-info">
                      <i class="material-icons">share</i>
                    </div>
                    <div class="description">
                      <h4 class="info-title">Tiện dụng</h4>
                      <p class="description">
                        Chia sẻ tài liệu với bạn bè và mọi người.
                      </p>
                    </div>
                  </div>
                  <div class="info info-horizontal">
                    <div class="icon icon-primary">
                      <i class="material-icons">filter_vintage</i>
                    </div>
                    <div class="description">
                      <h4 class="info-title">Giao diện đơn giản</h4>
                      <p class="description">
                        Giao diện được tối ưu, dễ dàng sử dụng.
                      </p>
                    </div>
                  </div>
                  <div class="info info-horizontal">
                    <div class="icon icon-rose">
                      <i class="material-icons">find_in_page</i>
                    </div>
                    <div class="description">
                      <h4 class="info-title">Tìm kiếm nhanh</h4>
                      <p class="description">
                        Kho tài liệu phong phú, tìm kiếm dễ dàng.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 mr-auto">
                 <!--  <div class="social text-center">
                    <button class="btn btn-just-icon btn-round btn-twitter">
                      <i class="fa fa-twitter"></i>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-dribbble">
                      <i class="fa fa-dribbble"></i>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-facebook">
                      <i class="fa fa-facebook"> </i>
                    </button>
                    <h4> or be classical </h4>
                  </div> -->
                  <?php echo $noti;?>
                  <?php echo $error;?>
                  <!---You should use "enctype= multipart/form-data" properties in <form> tag for upload image-->
                  <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype= multipart/form-data method="POST">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                       <div class="fileinput-new thumbnail img-raised">
                      
                       </div>
                       <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                       <div>
                      <span class="btn btn-raised btn-round btn-default btn-file">
                         <span class="fileinput-new">Ảnh bìa</span>
                         <span class="fileinput-exists">Thay đổi</span>
                         <input type="file" name="image_upload" id="image_upload" accept=".jpg,.png,.jpeg" required  oninvalid="this.setCustomValidity('Vui lòng chọn ảnh bìa')" oninput="setCustomValidity('')"/>
                      </span>
                            <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                            <i class="fa fa-times"></i> Xoá</a>
                       </div>
                    </div>
                    <!--------------------------------->

                    <div class="form-group">
                    <label for="name" class="bmd-label-static">Tên tài liệu</label>
                    <input type="text" class="form-control" name="name" required oninvalid="this.setCustomValidity('Vui lòng nhập tên tài liệu')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
            <label for="exampleFormControlSelect1">Chuyên ngành</label>
            <select class="form-control selectpicker" data-style="btn btn-link" name="categories" required oninvalid="this.setCustomValidity('Vui lòng chọn chuyên ngành')" oninput="setCustomValidity('')">
            <?php $count = 1; while ($data_cate = mysqli_fetch_array($query_categories)):?>
              <option><?php echo $data_cate['name'];?></option>
            <?php endwhile;?>
            </select>
          </div>
          <!---Tải tệp lên--
                <div class="form-group form-file-upload form-file-multiple">
            <input type="file" class="inputFileHidden">
            <div class="input-group">
                <input type="text" class="form-control inputFileVisible" placeholder="Chọn tệp">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-fab btn-round btn-primary">
                        <i class="material-icons">attach_file</i>
                    </button>
                </span>
            </div>
          </div>
          ------------------------------------->
          <div class="form-group">
                    <label for="name" class="bmd-label-static">Link tài liệu (Google Drive, Onedrive,...)</label>
                    <input type="text" class="form-control" name="link" required oninvalid="this.setCustomValidity('Vui lòng nhập link tài liệu')" oninput="setCustomValidity('')">
              </div>
                <div class="form-group label-floating">
                  <label class="form-control-label bmd-label-floating" for="message"> Mô tả</label>
                  <textarea class="form-control" rows="6" name="description" required oninvalid="this.setCustomValidity('Vui lòng nhập mô tả')" oninput="setCustomValidity('')"></textarea>
                </div>
                <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" name="checkbox">
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                        Tôi đã đồng ý với
                        <a href="#something">quy định và điều khoản</a>.
                      </label>
                   </div>
                <div class="submit text-center">
                  <button type="submit" class="btn btn-primary btn-round" name="btnupload" disabled>Tải lên</button>
                </div>
              </form>
                  <!--https://stackoverflow.com/questions/47448930/enable-a-button-if-atleast-one-checkbox-is-checked-using-javascript-->
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                  <script>
                    $("input[name='checkbox']").on('change', function() {
                    $("button[type='submit']").prop('disabled', !$("input[name='checkbox']:checked").length);
                  })
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            
            <li>
              <a href="../">
                Trang chủ
              </a>
            </li>
            <li>
              <a href="#">
                Quy định & điều khoản
              </a>
            </li>
            <li>
              <a href="#">
                Về chúng tôi
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script> made with <i class="material-icons">favorite</i> by
          <a href="#" target="_blank">5 TEAM</a>.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="./assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="./assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="./assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Small Gallery in Product Page -->
  <script src="./assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
  <!-- Plugins for presentation and navigation  -->
  <script src="./assets/demo/modernizr.js" type="text/javascript"></script>
  <script src="./assets/demo/vertical-nav.js" type="text/javascript"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
  <script src="./assets/demo/demo.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-kit.js?v=2.1.1" type="text/javascript"></script>
</body>

</html>