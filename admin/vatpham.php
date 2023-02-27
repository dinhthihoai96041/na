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
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="add") {
        $id = $_GET['id'];
        $search1 = $connect->query("SELECT * FROM member WHERE iding='$id'");
        if(mysqli_num_rows($search1)>0){
            $member = mysqli_fetch_array($search1);
            
            /////// Khai Bao Gia tri
            $iding = $member['iding'];
            $item_name = "item_name";
            $item_sl = "item_sl";
            $it_date = date("H:i:s D-m-y");

            //// Form submit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST["item_name"])) { $item_name = $_POST['item_name']; }
                if(isset($_POST["item_sl"])) { $item_sl = $_POST['item_sl']; }
                if(isset($_POST["it_date"])) { $it_date = $_POST['it_date']; }
                //// Xu ly du lieu
                if (empty($item_name)) {
                    echo 'Can phai chon vat pham';
                    } else {
                        $sql = $connect->query("SELECT * FROM `vatpham` WHERE `item_name`='$item_name' AND `iding`='$iding'");
                        if(mysqli_num_rows($sql)>0){
                            /// ton tai thi update
                            $sql ="UPDATE vatpham SET `item_sl`= `item_sl` + '$item_sl' WHERE iding='$iding' AND `item_name`='$item_name'";
                            if (mysqli_query($connect, $sql)) {
                                echo '<div class="container">
                                <div class="row">
                                  <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
                                  <div class="alert alert-success" role="alert">
                                  Dữ liệu đã được cập nhật thành công!</div>
                                  </div></div></div>';
                                } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                                    }
                        }else {
                            /// khong ton tai thi add
                            $sql2 = "INSERT INTO vatpham (iding, item_name, item_sl, it_date) VALUES ('$iding', '$item_name', '$item_sl', '$it_date')";
                            if (mysqli_query($connect, $sql2)) {
                                echo '<div class="container">
                                <div class="row">
                                  <div class="col-12" style="background-color: #d1e3f2b0; padding: 10px; margin-top: 20px; border-radius: 10px; color: #fff;">
                                  <div class="alert alert-success" role="alert">
                                  Dữ liệu đã được thêm thành công!</div>
                                  </div></div></div>';
                                } else {
                                echo "Error: " . $sql2 . "<br>" . mysqli_error($connect);
                                    }
                        }
                    }
                }
                
?>

<div class="container">
    <div class="row">
<div class="col-12" style="background-color: #071f36; padding: 2px 15px; color: #fff; margin-top: 10px;">
    <h1> Cập nhật vật phẩm cho TV ID: <?php echo $member['iding']; ?> | <?php echo $member['tening']; ?></h1>
</div></div>

<form style="padding-top: 10px; background-color: #00437dc7;" action="" method="post" class="row g-3 needs-validation" novalidate>
  
<div class="col-md-6">
    <label for="validationCustomUsername" class="form-label"></label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">ID ING</span>
      <input type="text" class="form-control" name="iding" value="<?php echo $member['iding']; ?>" readonly>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomUsername" class="form-label"></label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">Tên ING</span>
      <input type="text" class="form-control" name="iding" value="<?php echo $member['tening']; ?>" readonly>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustomUsername" class="form-label"></label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">Vật Phẩm</span>
      <select  name="item_name" class="form-control" required>
      <option selected disabled value="">Chọn...</option>
      <?php 
      $searchG = $connect->query("SELECT * FROM `name_item` ORDER BY `it_name` ASC");
      $searchGRow = mysqli_num_rows($searchG);
          if ($searchGRow>0) {
              while ($gam = mysqli_fetch_array($searchG)) {
                echo '<option value="'.$gam['it_name'].'">'.$gam['show_name'].'</option>';
              }
            }
      ?>
    </select>
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom05" class="form-label"></label>
    <div class="input-group has-validation">
      <span class="input-group-text">Số Lượng</span>
      <input type="text" class="form-control" name="item_sl" value="">
    </div>
  </div>
  
  <div class="col-12" style="margin: 20px 10px;">
    <button class="btn btn-success" type="submit">Thêm Vật Phẩm</button> <a href="javascript:history.back()" class="btn btn-info">Cancel</a>
  </div>
</form>










<div class="container">
        <div class="row" style="background-color: #fea600; border-top-left-radius: 20px; border-top-right-radius: 20px; margin-top: 10px; padding-left: 25px; color: #006ad0;">
        <h1 class="bd-title" id="content">Vật Phẩm</h1>
</div>
    <div class="row">
        <div class="col-8" style="background-color: #fea70045; padding: 5px;">
        <?php
        $search1 = $connect->query("SELECT * FROM member WHERE iding='$id'");
        if(mysqli_num_rows($search1)>0){
            echo '<div class="main_item2">';
            $member = mysqli_fetch_array($search1);
            if ($member['chucvu']=="0") {
                $member['chucvu'] = "King";
            }elseif ($member['chucvu']=="1") {
                $member['chucvu'] = "Queen";
            }elseif ($member['chucvu']=="2") {
                $member['chucvu'] = "Knight";
            }elseif ($member['chucvu']=="3") {
                $member['chucvu'] = "Bishop";
            }elseif ($member['chucvu']=="4") {
                $member['chucvu'] = "Castle";
            }elseif ($member['chucvu']=="5") {
                $member['chucvu'] = "Pawn";
            }
        $search = $connect->query("SELECT * FROM `vatpham` WHERE iding='$id' ORDER BY item_sl DESC");
        $searchRow = mysqli_num_rows($search);
		if ($searchRow>0) {
			while ($vatpham = mysqli_fetch_array($search)) {
                //// Tim ten vatpham
                $item_name = $vatpham['item_name'];
                $search2 = $connect->query("SELECT * FROM name_item WHERE it_name='$item_name'");
        if(mysqli_num_rows($search2)>0){
            $tenshow = mysqli_fetch_array($search2);    
?>
<div class="list_item">
<img src="<?php echo $tenshow['img_item'] ?>" style="width: 70px; margin-bottom: -5px;" alt=""><br>
        
        [<b style="color: deeppink; font-size: 16px;"><?php echo $vatpham['item_sl'] ?></b>]
        <br>
        <?php echo $tenshow['show_name'] ?>
    </div>
        

 
<?php
                } else {
                    echo '<div class="list_item">Có Vật Phẩm Chưa Đặt Tên</div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Thành viên này chưa có vật phẩm nào cống hiến <a href="/" class="alert-link">Quay lại trang thành viên!</a>!
          </div>';
            }

            ?></div></div>
            <div class="col-4" style="padding-right: 0px;">
            <div class="card text-white bg-success mb-3">
  <div class="card-header" style="font-size: 20px; font-weight: 500; text-align: center;"><a href="/item.php?act=item&id=<?php echo $member['iding'] ?>"><b style="color: #003e65;">[<?php echo $member['iding'] ?>] BiBi | <?php echo $member['tening'] ?></b></a></div>
  <div class="card-body">
        ID ING: <b><?php echo $member['iding'] ?></b><br>
        Tên ING: <b><?php echo $member['tening'] ?></b><br>
        Chức Vụ: <b><?php echo $member['chucvu'] ?></b><br><br>
        <h5 class="card-title">Thành Tích Chiếm Đóng</h5><br>
        <p class="card-text"></p>
        <div class="card-header" style="font-size: 20px; font-weight: 500; text-align: center; color: #ffa800;">Avatar</div>
        <img src="<?php echo $member['avatar'] ?>" style="width: 100%;" alt="">
  </div></div>
            
            </div>
            <?php

        }else {
        echo 'Không có ID này trong danh sách thành viên</div>';
        }
        echo '</div></div>';
        ?>


























<?php


        } else {
            echo '<div class="container">
            <div class="row">
        <div class="col-12">
        <div class="alert alert-success" role="alert">
    ID Thành Viên này không tồn tại!
    </div>
                </div>
            </div>
        </div>';
        }
    } ////// ket thuc act add
} ////// Ket thuc ACT additem





?>


<?php
        }else{ // nếu không phải admin
            echo '<div class="container">
            <div class="row" style="margin-top: 10px; padding-bottom: 20px;">
              <div class="col-12">
              <div class="alert alert-warning" role="alert">Bạn có tài khoản đăng nhập nhưng không phải Ông Trùm, Liên hệ Hải Aka để được cấp quyền truy cập nha! </div>
              </div></div></div>';
            };
        };?>

<?php
include ("../trust/foot.php");
?>