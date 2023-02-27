<?php
include ("../trust/config.php");
include ("../trust/head.php");
include ("../trust/main.php");
?>

<?php
if(!isset($_SESSION["username"])){ // nếu chưa đăng nhập sẽ yêu cầu quay lại
    echo '<div class="alert alert-warning" role="alert">Chưa đăng nhập mà mò vào đây làm gì? Đăng nhập đi rồi vào đây nha!</div>';
    }else{  // đã đăng nhập sẽ kiểm tra xem phải admin không                        
        $username = $_SESSION['username'];
        $sql = $connect->query("SELECT * FROM user WHERE username='$username' AND level='2'");
        if(mysqli_num_rows($sql)>0){    // sau khi kiểm tra đúng level 2 thì sẽ hiên
        $row = mysqli_fetch_array($sql);
 ?>




<div class="container">
    <div class="row">
        <div class="col-12" style="background-color: #FFA726; margin-top: 10px; padding: 2px 15px; color: #fff;">
            <h1> Admin Control Panel</h1>
        </div>
    </div>

    <div class="row" style="background-color: #fff6e9d9; padding: 10px;">
    <a href="/admin/member.php?act=addmember"  class="btn btn-outline-success" style="width: 30%; margin: 10px;">Thêm Thành Viên</a>
    <a href="/admin/member.php?act=member"  class="btn btn-outline-success" style="width: 30%; margin: 10px;">Danh Sách Thành Viên</a>
    <a href="/admin/chiemdong.php"  class="btn btn-outline-danger" style="width: 30%; margin: 10px;">Chiếm Đóng</a>
    </div>
</div>



















<?php
        }else{ // nếu không phải admin
            echo '<div class="alert alert-success" role="alert">Bạn có tài khoản đăng nhập nhưng không phải Ông Trùm, Liên hệ Hải Aka để được cấp quyền truy cập nha!</div>';
            };
        };?>

<?php
include ("../trust/foot.php");
?>