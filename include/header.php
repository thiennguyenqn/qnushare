<?php
	
?>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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

<body class="login-page sidebar-collapse">
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
              <li class="button-container dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link btn btn-rose btn-round btn-block" data-toggle="dropdown">
                  '.$user.'
                </a>
                <div class="dropdown-menu dropdown-with-icons">
                  <a href="./profile" class="dropdown-item">
                    Trang cá nhân
                  </a>
                </div>
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