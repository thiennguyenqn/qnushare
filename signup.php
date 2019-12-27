<?php
  include 'config.php';
  include 'session.php';
  if ($user) {
    echo '<script> location.href="./";</script>';
  }
  if (isset($_POST['btnsignup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE name = '$name' OR email = '$email'";
    $query = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($query);
    if ($num_rows == 0) {
      $sql_insert = "INSERT INTO USER VALUES (NULL, '".$name."', '".$email."', '".$password."', 0)";
      $query_insert = mysqli_query($conn, $sql_insert);
      mysqli_close();
      echo '<script> location.href="./success";</script>';
    }else {
      $error = '<div class="alert alert-danger" role="alert">
                  <center>Tên đăng nhập/email đã tồn tại</center>
                </div>';
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Đăng ký - QNU SHARE
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
          <li class="button-container nav-item iframe-extern">
            <a href="./login"class="btn btn-rose btn-round btn-block">
              <i class="material-icons">account_circle</i> Đăng nhập
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" filter-color="purple" style="background-image: url('./assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-signup">
            <h2 class="card-title text-center">Đăng ký</h2>
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
                  <h4>Bạn đã có tài khoản? <a href="./login">Đăng nhập ngay</a></h4>
                  <?php echo $error;?>
                  <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>

                        <input type="text" class="form-control" placeholder="Tên đăng nhập..." name="name" required oninvalid="this.setCustomValidity('Vui lòng nhập tên đăng nhập')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">mail</i>
                          </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email..." name="email" required oninvalid="this.setCustomValidity('Vui lòng nhập đúng địa chỉ email')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input type="password" placeholder="Mật khẩu..." class="form-control" name="password" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')" oninput="setCustomValidity('')"/>
                      </div>
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
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-round" name="btnsignup" disabled>Đăng ký ngay</button>
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
<?php include "include/footer.php";?>