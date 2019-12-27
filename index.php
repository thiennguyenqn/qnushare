<?php
  require_once 'config.php';
  include 'session.php';
  $sql = "SELECT * FROM DOCUMENT ORDER BY VIEWS DESC LIMIT 3";
  $query = mysqli_query($conn, $sql);

  $sql_show_all = "SELECT * FROM DOCUMENT ORDER BY id DESC LIMIT 3";
  $query_show_all = mysqli_query($conn, $sql_show_all);
  
  $id = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    QNU SHARE - Trang chủ
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-kit.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <link href="./assets/demo/vertical-nav.css" rel="stylesheet" />
  <style>
    .cropimage {
        width: 320px;
        height: 220px;
        overflow: hidden;
    }
    .crop-image {
        width: 320px;
        height: 220px;
        overflow: hidden;
    }

    .crop img {
        width: 320;
        height: 213;
        margin: -75px 0 0 -100px;
    }
  </style>
</head>

<body class="ecommerce-page sidebar-collapse">
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
  <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('./assets/img/examples/clark-street-merc.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <div class="brand">
            <h1 class="title">QNU SHARE</h1>
            <h4>Nơi chia sẻ tài liệu dành cho sinh viên
              <b>QNU</b></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="section">
      <div class="container">
        <div class="row">
            <div class="col-md-7">
              <span>
                <h3><i class="material-icons">whatshot</i> Xem nhiều nhất</h3>
              </span>
            </div>
          </div>
          <div class="row">
          <?php while ($data = mysqli_fetch_array($query)):?>
            <div class="col-md-4">
              <div class="card card-blog">
                <div class="card-header card-header-image cropimage">
                  <a href="./post/<?php echo $data['slug'];?>">
                    <img src="./image/<?php echo $data['image'];?>" alt="">
                  </a>
                  <div class="card-title">
                    <a href="./post/<?php echo $data['slug'];?>"><?php echo $data['name'];?></a>
                  </div>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-warning"><?php echo $data['categories'];?></h6>
                  <a>
                    <i class="material-icons">remove_red_eye</i> <?php echo $data['views'];?>
                  </a> 
                </div>
              </div>
            </div>
          <?php endwhile?>
      </div>
    </div>
    <!-- section -->
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <!--     *********    PROFILE CARDS     *********      -->
              <div class="cards">
                <div class="container">
                  <div class="title">
                    <span>
                      <h3><i class="material-icons">fiber_new</i> Mới nhất</h3>
                    </span>
                  </div>
                  <div class="row">
                    <!--Phân trang-->
                    <?php
                    $query = mysqli_query($conn, 'SELECT * FROM document ORDER BY id DESC');
                    $sodong = mysqli_num_rows($query);
                    $sodl = 6;
                    $sotrang = $sodong/$sodl;
                    if (isset($_GET['page'])) {
                      $pageselected = $_GET['page'];
                    }else{
                      $pageselected = 0;
                    }
                    $locafirst = $pageselected*$sodl;
                    $paging = mysqli_query($conn, "SELECT * FROM document ORDER BY id DESC LIMIT $locafirst, $sodl");
                    $num_post = mysqli_num_rows($paging);
                    if ($num_post < 3) {
                      while ($data = mysqli_fetch_array($paging)) {
                      echo '<div class="col-md-6">                   
                        <div class="card card-blog">
                          <div class="card-header card-header-image crop-image">
                            <a href="./post/'.$data['slug'].'">
                              <img src="./image/'.$data['image'].'"/>
                            </a>
                          </div>
                          <div class="card-body">
                            <h6 class="card-category text-warning">'.$data['categories'].'</h6>
                            <h4 class="card-title">
                              <a href="./post/'.$data['slug'].'">'.$data['name'].'</a>
                            </h4>                 
                          </div>
                        </div>
                        </div>';
                    }}elseif ($num_post < 2) {
                      while ($data = mysqli_fetch_array($paging)) {
                      echo '<div class="col-md-12">                   
                        <div class="card card-blog">
                          <div class="card-header card-header-image crop-image">
                            <a href="./post/'.$data['slug'].'">
                              <img src="./image/'.$data['image'].'"/>
                            </a>
                          </div>
                          <div class="card-body">
                            <h6 class="card-category text-warning">'.$data['categories'].'</h6>
                            <h4 class="card-title">
                              <a href="./post/'.$data['slug'].'">'.$data['name'].'</a>
                            </h4>                    
                          </div>
                        </div>
                        </div>';
                    }}else{
                      while ($data = mysqli_fetch_array($paging)) {
                        echo '<div class="col-md-4">                   
                          <div class="card card-blog">
                            <div class="card-header card-header-image crop-image">
                              <a href="./post/'.$data['slug'].'">
                                <img src="./image/'.$data['image'].'"/>
                              </a>
                            </div>
                            <div class="card-body">
                              <h6 class="card-category text-warning">'.$data['categories'].'</h6>
                              <h4 class="card-title">
                                <a href="./post/'.$data['slug'].'">'.$data['name'].'</a>
                              </h4>                   
                            </div>
                          </div>
                          </div>';
                    }}
                    
                    ?>
                  </div>
                </div>
              </div> 
          </div>
        </div> 
      </div>
    </div>
  </div>
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <div class="brand">
            <?php
                echo '
                      <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="./">Trang đầu</a></li>';
                        for ($i=1; $i <=$sotrang ; $i++) { 
                          $j = $i+1;
                      echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$j.'</a></li>';}                  
                      echo '</ul>
                      ';?>
            
          </div>
        </div>
      </div>
      <!--Hết phân trang-->

<!--   <div class="section section-blog">
    <div class="container">
      <h2 class="section-title">Latest Articles</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-header card-header-image">
              <a href="#pablo">
                <img src="./assets/img/dg6.jpg" alt="">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-rose">Trends</h6>
              <h4 class="card-title">
                <a href="#pablo">Learn how to wear your scarf with a floral print shirt</a>
              </h4>
              <p class="card-description">
                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-header card-header-image">
              <a href="#pablo">
                <img src="./assets/img/dg10.jpg" alt="">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-rose">Fashion week</h6>
              <h4 class="card-title">
                <a href="#pablo">Katy Perry was wearing a Dolce &amp; Gabanna arc dress</a>
              </h4>
              <p class="card-description">
                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-header card-header-image">
              <a href="#pablo">
                <img src="./assets/img/dg9.jpg" alt="">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-rose">Fashion week</h6>
              <h4 class="card-title">
                <a href="#pablo">Check the latest fashion events and which are the trends</a>
              </h4>
              <p class="card-description">
                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="subscribe-line subscribe-line-image" data-parallax="true" style="background-image: url(&apos;./assets/img/examples/ecommerce-header.jpg&apos;);">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="text-center">
            <h3 class="title">QNU SHARE</h3>
            <p class="description">
              Nơi chia sẻ tài liệu dành cho sinh viên QNU
            </p>
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
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src=".assets/js/plugins/bootstrap-tagsinput.js"></script>
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