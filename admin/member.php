<?php
include ("../trust/config.php");
include ("../trust/head.php");
include ("../trust/main.php");
?>

<?php
if(!isset($_SESSION["username"])){ // nếu chưa đăng nhập sẽ yêu cầu quay lại
    echo '<div class="container">
    <div class="row" style="margin-top: 10px; padding-bottom: 20px;">
      <div class="col-12">
      <div class="alert alert-warning" role="alert">
      Bạn chưa đăng nhập! cần đăng nhập mới có thể tiếp tục
</div>
      </div></div></div>';
    }else{  // đã đăng nhập sẽ kiểm tra xem phải admin không                        
        $username = $_SESSION['username'];
        $sql = $connect->query("SELECT * FROM user WHERE username='$username' AND level='2'");
        if(mysqli_num_rows($sql)>0){    // sau khi kiểm tra đúng level 2 thì sẽ hiên
        $row = mysqli_fetch_array($sql);
 ?>




<?php

///////////////// Add Thành Viên
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="addmember") {
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

    }
}

///////////////// Kết thúc Add thành viên

if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="edit") {
		$search1 = $connect->query("SELECT * FROM member WHERE iding='".$_GET['id']."'");
		$id = $_GET['id'];
        if(mysqli_num_rows($search1)>0){
            $editacc = mysqli_fetch_array($search1);

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$iding = $editacc['iding'];
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
    if(isset($_POST["tening"])) { $tening = $_POST['tening']; }
    if(isset($_POST["chucvu"])) { $chucvu = $_POST['chucvu']; }
    if(isset($_POST["team"])) { $team = $_POST['team']; }
    if(isset($_POST["tenthat"])) { $tenthat = $_POST['tenthat']; }
    if(isset($_POST["namsinh"])) { $namsinh = $_POST['namsinh']; }
    if(isset($_POST["quequan"])) { $quequan = $_POST['quequan']; }
    if(isset($_POST["avatar"])) { $avatar = $_POST['avatar']; }
    if(isset($_POST["ngayvaogang"])) { $ngayvaogang = $_POST['ngayvaogang']; }


    //Code xử lý, insert dữ liệu vào table
    if (empty($tening)) {
        echo '<div class="container">
        <div class="row">
    <div class="col-12">
    <div class="alert alert-danger" role="alert">
    Quan trọng nhất phải điền đầy đủ ID và Tên ING của thành viên vào!
    </div>
            </div>
        </div>
    </div>';
        } else {
            
    $sql = "UPDATE member SET tening='$tening', chucvu='$chucvu', team='$team', tenthat='$tenthat', namsinh='$namsinh', quequan='$quequan', avatar='$avatar', ngayvaogang='$ngayvaogang' WHERE iding='$iding'";

    if (mysqli_query($connect, $sql)) {
        echo '<div class="container">
        <div class="row">
    <div class="col-12">
    <div class="alert alert-success" role="alert">
Cập nhật dữ liệu Thành viên thành công!
</div>
            </div>
        </div>
    </div>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }
}

?>

<div class="container">
  <div class="row" style="padding-bottom: 20px;">
    <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
<h1>Chỉnh sửa thành viên ID: <?php echo $editacc['iding']; ?> | <?php echo $editacc['tening']; ?></h1>

<form action="" method="post">
<div class="row gx-3 gy-2 align-items-center" style="margin-bottom: 10px;">
<div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text" style="width: 100%;">ID ING: <?php echo $editacc['iding']; ?></div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">Tên ING</div>
      <input type="text" class="form-control" name="tening" value="<?php echo $editacc['tening']; ?>">
    </div>
  </div>
  <div class="col-sm-2">
  <select name="chucvu" class="form-select" aria-label="Default select example" style="padding: .375rem .75rem; width: 100%; border-radius: .25rem;">
  <option value="<?php echo $editacc['chucvu']; ?>" selected>Chức vụ <?php echo $editacc['chucvu']; ?></option>
  <option value="1">Queen</option>
  <option value="2">Knight</option>
  <option value="3">Bishop</option>
  <option value="4">Castle</option>
  <option value="5">Pawn</option>
</select>
  </div>
  <div class="col-sm-2">
  <select name="team" class="form-select" aria-label="Default select example" style="padding: .375rem .75rem; width: 100%; border-radius: .25rem;">
  <option value="<?php echo $editacc['team']; ?>" selected>Team <?php echo $editacc['team']; ?></option>
  <option value="1">Team 1</option>
  <option value="2">Team 2</option>
  <option value="X">Team X</option>
  <option value="420">420</option>
  <option value="Banana">Banana</option>
</select>
  </div>

  </div>

  <div class="row gx-3 gy-2 align-items-center">
  <div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">Tên Thật</div>
      <input type="text" class="form-control" name="tenthat" value="<?php echo $editacc['tenthat']; ?>">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">Năm Sinh</div>
      <input type="text" class="form-control" name="namsinh" value="<?php echo $editacc['namsinh']; ?>">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="input-group">
      <div class="input-group-text">Nơi ở</div>
      <input type="text" class="form-control" name="quequan" value="<?php echo $editacc['quequan']; ?>">
    </div>
  </div>
  <div class="col-sm-8" style="padding-top: 10px;">
    <div class="input-group">
      <div class="input-group-text">Link Avatar</div>
      <input type="text" class="form-control" name="avatar" value="<?php echo $editacc['avatar']; ?>">
    </div>
  </div>
  <div class="col-sm-4" style="padding-top: 10px;">
    <div class="input-group">
      <div class="input-group-text">Ngày Vào Gang</div>
      <input type="text" class="form-control" name="ngayvaogang" value="<?php echo $editacc['ngayvaogang']; ?>">
    </div>
  </div>

  </div>

  <div class="text-center" style="padding-top: 15px;">
  <button type="submit" class="btn btn-success">Cập nhật thay đổi</button> <a href="javascript:history.back()" class="btn btn-info">Cancel</a>
  </div>

</form><br>
<div class="alert alert-warning" role="alert">
  ID chỉ có thể xóa, không thể thay đổi, thành viên nào muốn thay đổi A/C báo lại em nha!
</div>
</div>
</div>
</div>




<?php
        } else {
            echo '<div class="container">
            <div class="row" style="padding-bottom: 20px;">
              <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
              Sai ID ING - ID Này không tồn tại trong hệ thống website BiBiGangster
              </div></div></div>';
        }
    }


//////// Del Member - iTem - Chiem Dong ///////////////
if ($act=="del") {
    $smember = $connect->query("SELECT * FROM member WHERE iding='".$_GET['id']."'");
    $id = $_GET['id'];
    if(mysqli_num_rows($smember)>0){
        $sql = "DELETE FROM `member` WHERE `member`.`iding` = $id";
        // Thực hiện câu truy vấn
        if (mysqli_query($connect, $sql)) {
            echo '<div class="container">
            <div class="row">
              <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
              <div class="alert alert-success" role="alert">
              Xóa bỏ Thành viên thành công!</div>
              </div></div></div>';
        } else {
            echo "Xóa thất bại: " . $conn->error;
        }
    } else {
        echo '<div class="container">
        <div class="row">
          <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
          <div class="alert alert-danger" role="alert">
          ID Thành viên này không còn tồn tại!</div>
          </div></div></div>';
    }
    $sitem = $connect->query("SELECT * FROM vatpham WHERE iding='".$_GET['id']."'");
    $id = $_GET['id'];
    if(mysqli_num_rows($sitem)>0){
        $sql = "DELETE FROM `vatpham` WHERE `vatpham`.`iding` = $id";
        // Thực hiện câu truy vấn
        if (mysqli_query($connect, $sql)) {
            echo '<div class="container">
            <div class="row">
              <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
              <div class="alert alert-success" role="alert">
              Xóa bỏ Vật phẩm cống hiến thành công!</div>
              </div></div></div>';
        } else {
            echo "Xóa thất bại: " . $conn->error;
        }
    }else {
        echo '<div class="container">
        <div class="row">
          <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
          <div class="alert alert-danger" role="alert">
          ID Thành viên này không có cống hiến vật phẩm!</div>
          </div></div></div>';
    }
    $sdiemdanh = $connect->query("SELECT * FROM chiemdong WHERE iding='".$_GET['id']."'");
    $id = $_GET['id'];
    if(mysqli_num_rows($sdiemdanh)>0){
        $sql = "DELETE FROM `chiemdong` WHERE `chiemdong`.`iding` = $id";
        // Thực hiện câu truy vấn
        if (mysqli_query($connect, $sql)) {
            echo '<div class="container">
            <div class="row">
              <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
              <div class="alert alert-success" role="alert">
              Xóa bỏ Thành Tích Chiếm Đóng Thành Công!</div>
              </div></div></div>';
        } else {
            echo "Xóa thất bại: " . $conn->error;
        }
    }else {
        echo '<div class="container">
        <div class="row">
          <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
          <div class="alert alert-danger" role="alert">
          ID Thành viên này không còn tồn tại!
</div>
          </div></div></div>';
    }
}









}   //////// Ket thuc ACT



/////////// Lay Danh Sach
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="member") {
?>
<div class="container">
    <div class="row">
<div class="col-12" style="background-color: #0078d5; padding: 2px 15px; color: #fff;">
    <h1> Danh Sách Thành Viên</h1>
</div></div>
<div class="row" style="background-color: #fff6e9d9; padding-top: 10px;">

<?php   ///////////// lấy danh sách
	$searchGame = $connect->query("SELECT * FROM `member` ORDER BY `chucvu` ASC");
	$searchGameRow = mysqli_num_rows($searchGame);
		if ($searchGameRow>0) {
			while ($game = mysqli_fetch_array($searchGame)) {
                if ($game['chucvu']=="0") {
                    $game['chucvu'] = "King";
                }elseif ($game['chucvu']=="1") {
                    $game['chucvu'] = "Queen";
                }elseif ($game['chucvu']=="2") {
                    $game['chucvu'] = "Knight";
                }elseif ($game['chucvu']=="3") {
                    $game['chucvu'] = "Bishop";
                }elseif ($game['chucvu']=="4") {
                    $game['chucvu'] = "Castle";
                }elseif ($game['chucvu']=="5") {
                    $game['chucvu'] = "Pawn";
                }
                if ($game['avatar']=="") {
                    $game['avatar'] = "https://media.discordapp.net/attachments/872979089127014400/895599990259470366/unknown.png";
                }
                if ($game['quequan']=="") {
                    $game['quequan'] = "Nay đây mai đó";
                }
                if ($game['team']=="") {
                    $game['team'] = "Không";
                }
?>

<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><img src="<?php echo $game['avatar'] ?>" style="vertical-align: middle;  width: 50px;  height: 50px;  border-radius: 50%;" alt=""> <?php echo $game['iding'] ?> | <?php echo $game['chucvu'] ?> | <?php echo $game['tening'] ?> | Team: <?php echo $game['team'] ?></h5>
        <p class="card-text">Họ Tên: <?php echo $game['tenthat'] ?> | 
                        Năm Sinh: <?php echo $game['namsinh'] ?> | 
                        Nơi ở: <?php echo $game['quequan'] ?> <br>
                    </p>

        <a href="#" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.47 7.78a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L9 4.81v7.44a.75.75 0 01-1.5 0V4.81L4.53 7.78a.75.75 0 01-1.06 0z"></path></svg> CĐ</a>
        <a href="#" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.47 7.78a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L9 4.81v7.44a.75.75 0 01-1.5 0V4.81L4.53 7.78a.75.75 0 01-1.06 0z"></path></svg> Bấm E</a>
        <a href="/admin/member.php?act=edit&id=<?php echo $game['iding'] ?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M10.75 9a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5h-1.5z"></path><path fill-rule="evenodd" d="M0 3.75C0 2.784.784 2 1.75 2h12.5c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0114.25 14H1.75A1.75 1.75 0 010 12.25v-8.5zm14.5 0V5h-13V3.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25zm0 2.75h-13v5.75c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V6.5z"></path></svg> Sửa TV</a> 
        <a href="/admin/vatpham.php?act=add&id=<?php echo $game['iding'] ?>" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M7.655 14.916L8 14.25l.345.666a.752.752 0 01-.69 0zm0 0L8 14.25l.345.666.002-.001.006-.003.018-.01a7.643 7.643 0 00.31-.17 22.08 22.08 0 003.433-2.414C13.956 10.731 16 8.35 16 5.5 16 2.836 13.914 1 11.75 1 10.203 1 8.847 1.802 8 3.02 7.153 1.802 5.797 1 4.25 1 2.086 1 0 2.836 0 5.5c0 2.85 2.045 5.231 3.885 6.818a22.075 22.075 0 003.744 2.584l.018.01.006.003h.002z"></path></svg> Cống Hiến</a> 
        
        <div style="padding-top: 8px;">
        <a href="#" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M13.03 8.22a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06 0L3.47 9.28a.75.75 0 011.06-1.06l2.97 2.97V3.75a.75.75 0 011.5 0v7.44l2.97-2.97a.75.75 0 011.06 0z"></path></svg> CĐ</a>
        <a href="#" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M13.03 8.22a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06 0L3.47 9.28a.75.75 0 011.06-1.06l2.97 2.97V3.75a.75.75 0 011.5 0v7.44l2.97-2.97a.75.75 0 011.06 0z"></path></svg> Bấm E</a>
        <a href="/admin/member.php?act=del&id=<?php echo $game['iding'] ?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="15"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg> Xóa TV</a>
        </div>


      </div>
    </div>
  </div>

<?php  
    }
        }else{
            echo '<div class="alert alert-info" role="alert">Không có thành viên nào được hiện thị!</div>';
        }
    }
}
    ?>

        </div>
    </div>
</div>
</div>

<?php
        }else{ // nếu không phải admin
            echo '<div class="container">
            <div class="row" style="margin-top: 10px; padding-bottom: 20px;">
              <div class="col-12">
              <div class="alert alert-warning" role="alert">
              Bạn có tài khoản đăng nhập nhưng không phải Ông Trùm, Liên hệ Hải Aka để được cấp quyền truy cập nha!
        </div>
              </div></div></div>';
            };
        };?>

<?php
include ("../trust/foot.php");
?>