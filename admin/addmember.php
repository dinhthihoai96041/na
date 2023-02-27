<?php
include ("../trust/config.php");
include ("../trust/head.php");
include ("../trust/main.php");
?>

<?php
if(!isset($_SESSION["username"])){ // nếu chưa đăng nhập sẽ yêu cầu quay lại
    echo 'Chưa đăng nhập mà mò vào đây làm gì? Đăng nhập đi rồi vào đây nha!';
    }else{  // đã đăng nhập sẽ kiểm tra xem phải admin không                        
        $username = $_SESSION['username'];
        $sql = $connect->query("SELECT * FROM user WHERE username='$username' AND level='2'");
        if(mysqli_num_rows($sql)>0){    // sau khi kiểm tra đúng level 2 thì sẽ hiên
        $row = mysqli_fetch_array($sql);
 ?>

<?php
//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$iding = "iding";
$tening = "tening";
$chucvu = "chucvu";
$team = "team";
$tenthat = "tenthat";
$namsinh = "namsinh";
$quequan = "quequan";
$avatar = "avatar";
$ngayvaogang = "ngayvaogang";
$trn_date = date("Y-m-d H:i:s");

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["iding"])) { $iding = $_POST['iding']; }
    if(isset($_POST["tening"])) { $tening = $_POST['tening']; }
    if(isset($_POST["chucvu"])) { $chucvu = $_POST['chucvu']; }
    if(isset($_POST["team"])) { $team = $_POST['team']; }
    if(isset($_POST["tenthat"])) { $tenthat = $_POST['tenthat']; }
    if(isset($_POST["namsinh"])) { $namsinh = $_POST['namsinh']; }
    if(isset($_POST["quequan"])) { $quequan = $_POST['quequan']; }
    if(isset($_POST["avatar"])) { $avatar = $_POST['avatar']; }
    if(isset($_POST["ngayvaogang"])) { $ngayvaogang = $_POST['ngayvaogang']; }

    //Code xử lý, insert dữ liệu vào table
    if (empty($iding) || empty($tening)) {
    echo '<div class="container">
    <div class="row">
<div class="col-12">
<div class="alert alert-success" role="alert">
Quan trọng nhất phải điền đầy đủ ID và Tên ING của thành viên vào!
</div>
        </div>
    </div>
</div>';
    } else {
        $sql = $connect->query("SELECT * FROM member WHERE iding='$iding'");
        if(mysqli_num_rows($sql)>0){
        echo '<div class="container">
        <div class="row">
    <div class="col-12">
    <div class="alert alert-success" role="alert">
ID Thành Viên này đã bị trùng, có thể vào danh sách thành viên để chỉnh sửa!
</div>
            </div>
        </div>
    </div>';
        } else {
        $sql = "INSERT INTO member (iding, tening, chucvu, team, tenthat, namsinh, quequan, avatar, ngayvaogang, trn_date)
        VALUES ('$iding', '$tening', '$chucvu', '$team', '$tenthat', '$namsinh', '$quequan', '$avatar', '$ngayvaogang', '$trn_date')";
        $sql3 = "INSERT INTO chiemdong (iding) VALUES ('$iding')";
        if (mysqli_query($connect, $sql3)) {
            echo '<div class="container">
            <div class="row">
        <div class="col-12">
        <div class="alert alert-success" role="alert">
  Dữ liệu thành viên đã được thêm thành công vào sql Chiếm Đóng
</div>
                </div>
            </div>
        </div>';
            } else {
            echo "Error: " . $sql3 . "<br>" . mysqli_error($connect);
                }

        if (mysqli_query($connect, $sql)) {
        echo '<div class="container">
        <div class="row">
    <div class="col-12">
    <div class="alert alert-success" role="alert">
Dữ liệu thành viên đã được thêm thành công vào sql Member!
</div>
            </div>
        </div>
    </div>';
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }
        }
    }
}

//Đóng database
mysqli_close($connect);
?>



<div class="container">
  <div class="row">
    <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
<h1>Thêm thành viên</h1>
<form action="" method="post">
<div class="alert alert-danger" role="alert"><label>Thông tin bắt buộc! </label>
<div class="row gx-3 gy-2 align-items-center" style="margin-bottom: 10px;">
<div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">ID ING</div>
      <input type="text" class="form-control" name="iding" placeholder="VD: 24024">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">Tên ING</div>
      <input type="text" class="form-control" name="tening" placeholder="VD: Carrot">
    </div>
  </div>
  <div class="col-sm-2">
  <select name="chucvu" class="form-select" aria-label="Default select example" style="padding: .375rem .75rem; width: 100%; border-radius: .25rem;">
  <option value="" selected>Chức Vụ?</option>
  <option value="1">Queen</option>
  <option value="2">Knight</option>
  <option value="3">Bishop</option>
  <option value="4">Castle</option>
  <option value="5">Pawn</option>
</select>
  </div>
  <div class="col-sm-2">
  <select name="team" class="form-select" aria-label="Default select example" style="padding: .375rem .75rem; width: 100%; border-radius: .25rem;">
  <option value="" selected>Thuộc Team?</option>
  <option value="VIP">VIP</option>
  <option value="1">Team 1</option>
  <option value="2">Team 2</option>
  <option value="X">Team X</option>
  <option value="420">420</option>
  <option value="Banana">Banana</option>
</select>
  </div>

  </div></div>
  <div class="alert alert-info" role="alert"><label>Thông tin thêm, có cũng được không có cũng chẳng sao! </label>
  <div class="row gx-3 gy-2 align-items-center">
  <div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">Tên Thật</div>
      <input type="text" class="form-control" name="tenthat" placeholder="">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">Năm Sinh</div>
      <input type="text" class="form-control" name="namsinh" placeholder="VD: 1992 of 22/02/1992">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">Nơi ở</div>
      <input type="text" class="form-control" name="quequan" placeholder="">
    </div>
  </div>
  <div class="col-sm-8" style="padding-top: 10px;">
    <div class="input-group">
      <div class="input-group-text">Link Avatar</div>
      <input type="text" class="form-control" name="avatar" placeholder="">
    </div>
  </div>
  <div class="col-sm-4" style="padding-top: 10px;">
    <div class="input-group">
      <div class="input-group-text">Ngày Vào Gang</div>
      <input type="text" class="form-control" name="ngayvaogang" placeholder="VD: 20/08/2021">
    </div>
  </div>

  </div>
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-success">Gửi dữu liệu</button>
  </div>
</form>

        </div>
    </div>
</div>




















<?php
        }else{ // nếu không phải admin
            echo 'Bạn có tài khoản đăng nhập nhưng không phải Ông Trùm, Liên hệ Hải Aka để được cấp quyền truy cập nha!';
            };
        };?>

<?php
include ("../trust/foot.php");
?>