<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
  include 'config.php';
  include 'session.php';
  if ($user) {
    echo '<script> location.href="./";</script>';
  }

  if (isset($_POST['btnlogin'])) {
    $id = $_POST['id'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE (name = '$id' OR email = '$id') AND pass = '$pass'";
    $query = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($query);
    if ($num_rows > 0) {
      session_start();
      $_SESSION['user'] = $id;
      echo '<script> location.href="./";</script>';
    }else {
      $error = '<div class="alert alert-danger" role="alert">
                  <center>Sai mật khẩu/Tài khoản không tồn tại</center>
                </div>';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">


  <title>
    Đăng nhập
  </title>
  <?php include 'include/header.php';?>
  
  <div class="page-header header-filter" style="background-image: url('./assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
          <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="card card-login card-hidden">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Đăng nhập</h4>
                <!-- <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div> -->
              </div>
              <?php echo $error;?>
              
              <div class="card-body ">
                <!-- <p class="card-description text-center">Or Be Classical</p> -->
                <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Tên đăng nhập/Email" name="id" required oninvalid="this.setCustomValidity('Vui lòng nhập tên đăng nhập/email')" oninput="setCustomValidity('')">
                  </div>
                </span>
                <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')" oninput="setCustomValidity('')">
                  </div>
                </span>
              </div>
              <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-round" name="btnlogin">Đăng nhập</button>
              </div>
              <p class="card-description text-center">Bạn chưa có tài khoản? <a href="./signup">Đăng ký ngay</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
<?php include 'include/footer.php';?>