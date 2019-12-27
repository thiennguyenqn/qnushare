<?php
	include 'config.php';
	include 'session.php';

	$slug = isset($_GET['slug']) ? htmlspecialchars($_GET['slug']) : null;
	if (empty($slug)) {
		echo '<script> location.href="../";</script>';
	}

	$sql = "SELECT * FROM document WHERE slug = '$slug'";
  	$query = mysqli_query($conn, $sql);
  	$data = mysqli_fetch_array($query);

  	//Tăng số lượt xem bài viết
  	$view = $data['views']+1;
  	$sql_view = "UPDATE document SET views = '$view' WHERE slug = '$slug'";
  	mysqli_query($conn, $sql_view);

  	//Lấy bài viết cùng chuyên ngành với chuyên ngành bài đang xem từ database ra 
  	$categories = $data['categories'];
  	$sql_show_cate = "SELECT * FROM DOCUMENT WHERE categories = '$categories' LIMIT 4";
  	$query_show_cate = mysqli_query($conn, $sql_show_cate);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    <?php echo $data['name'];?> - QNU SHARE
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-kit.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="../assets/demo/vertical-nav.css" rel="stylesheet" />
  <style>
    .cropimage {
        width: 320px;
        height: 213px;
        overflow: hidden;
    }
    .crop-image {
        width: 224px;
        height: 150px;
        overflow: hidden;
    }

    .crop img {
        width: 320;
        height: 213;
        margin: -75px 0 0 -100px;
    }
  </style>
</head>

<body class="product-page sidebar-collapse">
  <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="../">
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
            </div>
          </li>
          <li class="nav-item">
            <a href="../upload" class="nav-link">
              <i class="material-icons">cloud_upload</i> Tải lên
            </a>
          </li>
          <?php if (!empty($user)) {
            echo '
              <li class="nav-item">
                <a href="../profile" class="nav-link">
                  Trang cá nhân
                </a>
              </li>
              <li class="button-container dropdown nav-item">
                <a class="dropdown-toggle nav-link btn btn-rose btn-round btn-block" data-toggle="dropdown">
                  <i class="material-icons">account_circle</i>'.$user.'
                </a>

                <div class="dropdown-menu dropdown-with-icons">
                  <a href="../logout" class="dropdown-item">
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
  <div class="page-header header-filter" data-parallax="true" filter-color="rose" style="background-image: url('http://localhost/qnushare/image/<?php echo $data['image'];?>');">
    <div class="container">
      <div class="row title-row">
        <div class="col-md-4 ml-auto">
          <!-- <button class="btn btn-white float-right"><i class="material-icons">shopping_cart</i> 0 Items</button> -->
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="main main-raised main-product">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active">
                <img src="http://localhost/qnushare/image/<?php echo $data['image'];?>">
              </div>
            </div>
            
          </div>
          <div class="col-md-6 col-sm-6">
            <h2 class="title"><?php echo $data['name'];?></h2>
            <h4 class="card-category text-warning"><?php echo $data['categories'];?></h4>
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <label>Người đăng</label><a class="dropdown-item">
                <i class="material-icons ">person</i> <?php echo $data['user'];?>
              </a> 
              </div>
              <div class="col-md-6 col-sm-6">
                <label>Lượt xem</label><a class="dropdown-item">
                <i class="material-icons ">remove_red_eye</i> <?php echo $data['views'];?>
              </a> 
              </div>
            </div>

            <div id="accordion" role="tablist">
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      Mô tả
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <p><?php echo $data['description'];?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row pull-right">
              <a href="<?php echo $data['file'];?>" target="_blank">
              	<button class="btn btn-rose btn-round">Tải xuống &#xA0;<i class="material-icons">cloud_download</i></button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="related-products">
        <h3 class="title text-center">Tài liệu cùng chuyên ngành</h3>
        <div class="row">
        <?php while ($data_cate = mysqli_fetch_array($query_show_cate)):?>
          <div class="col-lg-3 col-md-6">
            <div class="card card-product">
              <div class="card-header card-header-image">
                <a href="http://localhost/qnushare/post/<?php echo $data['slug'];?>">
                  <img class="img" src="http://localhost/qnushare/image/<?php echo $data_cate['image'];?>">
                </a>
              </div>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="http://localhost/qnushare/post/<?php echo $data_cate['slug'];?>"><?php echo $data_cate['name'];?></a>
                </h4>
              </div>
            </div>
          </div>
      	<?php endwhile?>
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
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
  <!--	Plugin for Small Gallery in Product Page -->
  <script src="../assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
  <!-- Plugins for presentation and navigation  -->
  <script src="../assets/demo/modernizr.js" type="text/javascript"></script>
  <script src="../assets/demo/vertical-nav.js" type="text/javascript"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
  <script src="../assets/demo/demo.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-kit.js?v=2.1.1" type="text/javascript"></script>
</body>

</html>