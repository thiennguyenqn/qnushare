<?php
  include 'config.php';
  include 'session.php';
  if (empty($user)) {
    echo '<script> location.href="./login";</script>';
  }

  $sql = "SELECT * FROM document WHERE user = '$user' AND status = 1";
  $query = mysqli_query($conn, $sql);

  $sql_queue = "SELECT * FROM document WHERE user = '$user' AND status = 2";
  $query_queue = mysqli_query($conn, $sql_queue);

  $sql_cancel = "SELECT * FROM document WHERE user = '$user' AND status = 0";
  $query_cancel = mysqli_query($conn, $sql_cancel);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Trang cá nhân - QNU SHARE
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
</head>

<body class="profile-page sidebar-collapse">
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
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('./assets/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="./assets/img/faces/christian.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title"><?php echo $user;?></h3>
                <h6>Trang cá nhân</h6>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p><i>"Sống không phải để tồn tại. Sống là để trải nghiệm"</i></p>
        </div>
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                    <i class="material-icons">camera</i> Tài liệu đã duyệt
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                    <i class="material-icons">palette</i> Tài liệu chờ duyệt
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                    <i class="material-icons">favorite</i> Tài liệu bị từ chối
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="tab-content tab-space">
          <div class="tab-pane active text-center gallery" id="studio">
            <div class="row">
              <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Tên tài liệu</th>
                        <th>Danh mục</th>
                        <th>Lượt xem</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $count = 1; while ($data = mysqli_fetch_array($query)):?>
                    <tr>
                        <td class="text-center"><?php echo $count;?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo $data['categories'];?></td>
                        <td><?php echo $data['views'];?></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                            </button>
                        </td>
                    </tr>
                  <?php $count++; endwhile?>
                </tbody>
            </table>
            </div>
          </div>
          <div class="tab-pane text-center gallery" id="works">
            <div class="row">
              <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Tên tài liệu</th>
                        <th>Danh mục</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $count = 1; while ($data = mysqli_fetch_array($query_queue)):?>
                    <tr>
                        <td class="text-center"><?php echo $count;?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo $data['categories'];?></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                            </button>
                        </td>
                    </tr>
                  <?php $count++; endwhile?>
                </tbody>
            </table>
            </div>
          </div>
          <div class="tab-pane text-center gallery" id="favorite">
            <div class="row">
              <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Tên tài liệu</th>
                        <th>Danh mục</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $count = 1; while ($data = mysqli_fetch_array($query_cancel)):?>
                    <tr>
                        <td class="text-center"><?php echo $count;?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo $data['categories'];?></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                            </button>
                        </td>
                    </tr>
                  <?php $count++; endwhile?>
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'include/footer.php';?>