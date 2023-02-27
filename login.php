<?php
include ("trust/config.php");
include ("trust/head.php");
include ("trust/main.php");
?>

<?php 
    if (isset($_POST['username'])){
        $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($connect,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connect,$password);
        $query = "SELECT * FROM `user` WHERE username='$username' and password='".md5($password)."'";
    $result = mysqli_query($connect,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: /admin");
            }else{
        echo '
<div class="container">
  <div class="row">
    <div class="col-12" style="background-color: #fe0081a6; padding: 5px; padding-top: 20px; margin-top: 20px; border-radius: 10px; color: #fff;">
    <h2 style="text-align: center;">Welcome to Admin Panel</h2>
    <div class="alert alert-warning" role="alert">
    Tên đăng nhập hoặc mật khẩu không đúng! Liệu bạn đã được cấp tài khoản?</div>
    <form action="" method="post" name="login">

    <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label text-right"><b>ID</b></label>
    <div class="col-sm-5">
      <input type="text" name="username" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-4 col-form-label text-right"><b>Password</b></label>
    <div class="col-sm-5">
      <input type="password" name="password" class="form-control" id="inputPassword3">
    </div>
  </div>
    <center><button type="submit" name="submit" class="btn btn-success"> <<<<<< Đăng Nhập >>>>>> </button></center>
    </form>
    <br>
    <div class="alert alert-primary d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
    <div>
     <b> Bạn chưa có tài khoản?</b> vậy thì bạn không có quyền đăng nhập rồi hahahaaaa! <a href="/" class="alert-link">Click quay lại trang chủ!</a>
    </div>
  </div>
    </div>
  </div>
</div>


';
        }
    }else{
        ?>

 


<div class="container">
  <div class="row">
    <div class="col-12" style="background-color: #fe0081a6; padding: 5px; padding-top: 20px; margin-top: 20px; border-radius: 10px; color: #fff;">
    <h2 style="text-align: center;">Welcome to Admin Panel</h2><br>
    <form action="" method="post" name="login">

    <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-4 col-form-label text-right"><b>ID</b></label>
    <div class="col-sm-5">
      <input type="text" name="username" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-4 col-form-label text-right"><b>Password</b></label>
    <div class="col-sm-5">
      <input type="password" name="password" class="form-control" id="inputPassword3">
    </div>
  </div>
    <center><button type="submit" name="submit" class="btn btn-success"> <<<<<< Đăng Nhập >>>>>> </button></center>
    </form>
    <br>
    <div class="alert alert-primary d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
    <div>
     <b> Bạn chưa có tài khoản?</b> vậy thì bạn không có quyền đăng nhập rồi hahahaaaa! <a href="/" class="alert-link">Click quay lại trang chủ!</a>
    </div>
  </div>
    </div>
  </div>
</div>




        <?php
    }
?>

<?php
include ("trust/foot.php");
?>