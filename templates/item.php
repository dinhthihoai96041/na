<?php
///////////////////// End View item
/////////////////// item v2 ///////////////
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="item") {
        $id = $_GET['id'];
        ?>
        <div class="container">
        <div class="row" style="background-color: #F4A261; margin-top: 20px; padding-left: 25px; color: #fff;">
        <h1 class="bd-title" id="content">Bảng Cống Hiến</h1>
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
            echo '<div class="alert alert-danger" role="alert">Thành viên này chưa có vật phẩm nào cống hiến <a href="javascript:history.back()" class="alert-link">Quay lại trang thành viên!</a>!
          </div>';
            }

            ?></div></div>
            <div class="col-4" style="padding-right: 0px;">
            <div class="card text-white bg-success mb-3">
  <div class="card-header" style="font-size: 20px; font-weight: 500; text-align: center;"><a href="/thanh-vien-<?php echo $member['iding'] ?>.html"><b style="color: #003e65;">[<?php echo $member['iding'] ?>] BiBi | <?php echo $member['tening'] ?></b></a></div>
  <div class="card-body">
        ID ING: <b><?php echo $member['iding'] ?></b><br>
        Tên ING: <b><?php echo $member['tening'] ?></b><br>
        Chức Vụ: <b><?php echo $member['chucvu'] ?></b><br><br>

        <?php    //////////// Thanh tich chiem dong
        $searchcd = $connect->query("SELECT * FROM chiemdong WHERE iding='$id'");
        if(mysqli_num_rows($searchcd)>0){
            $cd = mysqli_fetch_array($searchcd);
            ?><h5 class="card-title">Thành Tích Chiếm Đóng</h5>
            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M7.998 14.5c2.832 0 5-1.98 5-4.5 0-1.463-.68-2.19-1.879-3.383l-.036-.037c-1.013-1.008-2.3-2.29-2.834-4.434-.322.256-.63.579-.864.953-.432.696-.621 1.58-.046 2.73.473.947.67 2.284-.278 3.232-.61.61-1.545.84-2.403.633a2.788 2.788 0 01-1.436-.874A3.21 3.21 0 003 10c0 2.53 2.164 4.5 4.998 4.5zM9.533.753C9.496.34 9.16.009 8.77.146 7.035.75 4.34 3.187 5.997 6.5c.344.689.285 1.218.003 1.5-.419.419-1.54.487-2.04-.832-.173-.454-.659-.762-1.035-.454C2.036 7.44 1.5 8.702 1.5 10c0 3.512 2.998 6 6.498 6s6.5-2.5 6.5-6c0-2.137-1.128-3.26-2.312-4.438-1.19-1.184-2.436-2.425-2.653-4.81z"></path></svg> <b style="color: #ef2f2f; font-size: 20px;">[<?php echo $cd['diemdanh'] ?>]</b> Lần Tham Gia Chiếm Đóng<br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M8.834.066C7.494-.087 6.5 1.048 6.5 2.25v.5c0 1.329-.647 2.124-1.318 2.614-.328.24-.66.403-.918.508A1.75 1.75 0 002.75 5h-1A1.75 1.75 0 000 6.75v7.5C0 15.216.784 16 1.75 16h1a1.75 1.75 0 001.662-1.201c.525.075 1.067.229 1.725.415.152.043.31.088.475.133 1.154.32 2.54.653 4.388.653 1.706 0 2.97-.153 3.722-1.14.353-.463.537-1.042.668-1.672.118-.56.208-1.243.313-2.033l.04-.306c.25-1.869.265-3.318-.188-4.316a2.418 2.418 0 00-1.137-1.2C13.924 5.085 13.353 5 12.75 5h-1.422l.015-.113c.07-.518.157-1.17.157-1.637 0-.922-.151-1.719-.656-2.3-.51-.589-1.247-.797-2.01-.884zM4.5 13.3c.705.088 1.39.284 2.072.478l.441.125c1.096.305 2.334.598 3.987.598 1.794 0 2.28-.223 2.528-.549.147-.193.276-.505.394-1.07.105-.502.188-1.124.295-1.93l.04-.3c.25-1.882.189-2.933-.068-3.497a.922.922 0 00-.442-.48c-.208-.104-.52-.174-.997-.174H11c-.686 0-1.295-.577-1.206-1.336.023-.192.05-.39.076-.586.065-.488.13-.97.13-1.328 0-.809-.144-1.15-.288-1.316-.137-.158-.402-.304-1.048-.378C8.357 1.521 8 1.793 8 2.25v.5c0 1.922-.978 3.128-1.933 3.825a5.861 5.861 0 01-1.567.81V13.3zM2.75 6.5a.25.25 0 01.25.25v7.5a.25.25 0 01-.25.25h-1a.25.25 0 01-.25-.25v-7.5a.25.25 0 01.25-.25h1z"></path></svg> <b style="color: #ef2f2f; font-size: 20px;">[<?php echo $cd['bame'] ?>]</b> Lần Bấm được E</p> 
            <?php
        } else {
            echo 'Thành viên này không có trong danh sách chiếm đóng!';
        }
        ?>
        <div class="card-header" style="font-size: 20px; font-weight: 500; text-align: center; color: #ffa800;">Avatar</div>
        <img src="<?php echo $member['avatar'] ?>" style="width: 100%;" alt="">
  </div></div>
            
            </div>
            <?php

        }else {
        echo 'Không có ID này trong danh sách thành viên</div>';
        }
        echo '</div></div>';
    }
}
//////////////////// end item v2 //////////////




///////// View item
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="allitem") {
echo '<div class="container">
<div class="row" style="background-color: #F4A261; margin-top: 20px; padding-left: 25px; color: #fff;">
<h1 class="bd-title" id="content">Kho Cống Hiến</h1>
</div>
<div class="row">
<div class="col-12" style="background-color: #fea70045; padding: 5px;">';
           $searchItemName = $connect->query("SELECT * FROM `name_item` ORDER BY `name_item`.`id` ASC");
           $searchItemNameRow = mysqli_num_rows($searchItemName);
		    if ($searchItemNameRow>0) {
			while ($itemname = mysqli_fetch_array($searchItemName)) {
                $item_name = $itemname['it_name'];
                $showallitem = $connect->query("SELECT SUM(item_sl) AS all_item_sl FROM vatpham WHERE item_name='$item_name'");
            if(mysqli_num_rows($showallitem)>0){
                $item = mysqli_fetch_array($showallitem); {
                    if ($item['all_item_sl']=="") {
                        $item['all_item_sl'] = "0";
                    }elseif ($item['all_item_sl']=="0") {
                        $item['all_item_sl'] = "0";
                    }
?>
<div class="list_item">
<img src="<?php echo $itemname['img_item'] ?>" style="width: 100px; margin-bottom: -5px;" alt=""><br>
        
        [<b style="color: deeppink; font-size: 16px;"><?php echo $item['all_item_sl'] ?></b>]
        <br>
        <?php echo $itemname['show_name'] ?>
    </div>
<?php
                }
            } /////// item_sl
            }
        }

echo '</div></div></div>';
        }
    }
///////////////////// End View item














///////// View member item
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="tvitem") {
echo '<div class="container">
<div class="row" style="background-color: #F4A261; margin-top: 20px; padding-left: 25px; color: #fff;">
<h1 class="bd-title" id="content">Kho Cống Hiến</h1>
</div>
<div class="row" style="background-color: #fea70045; padding: 5px;">
';

$sMem = $connect->query("SELECT * FROM `member` ORDER BY `chucvu` ASC");
$sMemRow = mysqli_num_rows($sMem);
 if ($sMemRow>0) {
 while ($mem = mysqli_fetch_array($sMem)) {
     echo '<div class="col-4" style="background-color: #7ba6ddad;padding: 5px;
     color: #0f5132;
     font-size: 13px;
     border: 2px solid #fea600;margin: 5px;">';
    echo $mem['iding']; echo '<br>';
     $id = $mem['iding'];
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
            <?php echo $tenshow['show_name'] ?>
            <?php
        }
            }
        }
echo '</div>';
        }
    }


echo '</div></div>';
    }
}
///////////////////// View member item

if (isset($_GET['search'])) {
	$id = $_GET['search'];

        ?>
        <div class="container">
        <div class="row" style="background-color: #F4A261; margin-top: 20px; padding-left: 25px; color: #fff;">
        <div class="col-8"><h1 class="bd-title" id="content">Bảng Cống Hiến</h1></div>


        <?php
if(!isset($_SESSION["username"])){ // nếu chưa đăng nhập sẽ yêu cầu quay lại
    }else{  // đã đăng nhập sẽ kiểm tra xem phải admin không                        
        $username = $_SESSION['username'];
        $sql = $connect->query("SELECT * FROM user WHERE username='$username' AND level='2'");
        if(mysqli_num_rows($sql)>0){    // sau khi kiểm tra đúng level 2 thì sẽ hiên
        $row = mysqli_fetch_array($sql);
 ?><div class="col-4">
 <a href="/admin/vatpham.php?act=add&id=<?php echo $id ?>" class="badge badge-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M7.655 14.916L8 14.25l.345.666a.752.752 0 01-.69 0zm0 0L8 14.25l.345.666.002-.001.006-.003.018-.01a7.643 7.643 0 00.31-.17 22.08 22.08 0 003.433-2.414C13.956 10.731 16 8.35 16 5.5 16 2.836 13.914 1 11.75 1 10.203 1 8.847 1.802 8 3.02 7.153 1.802 5.797 1 4.25 1 2.086 1 0 2.836 0 5.5c0 2.85 2.045 5.231 3.885 6.818a22.075 22.075 0 003.744 2.584l.018.01.006.003h.002z"></path></svg> Cống Hiến</a> 
 <a href="/admin/member.php?act=edit&id=<?php echo $id ?>" class="badge badge-warning"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M10.75 9a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5h-1.5z"></path><path fill-rule="evenodd" d="M0 3.75C0 2.784.784 2 1.75 2h12.5c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0114.25 14H1.75A1.75 1.75 0 010 12.25v-8.5zm14.5 0V5h-13V3.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25zm0 2.75h-13v5.75c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V6.5z"></path></svg> Sửa TV</a> 
 <a href="/admin/member.php?act=del&id=<?php echo $id ?>" class="badge badge-danger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="15"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg> Xóa TV</a></div>
<?php
        }else{ // nếu không phải admin
            };
        };?>



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
            echo '<div class="alert alert-danger" role="alert">Thành viên này chưa có vật phẩm nào cống hiến <a href="javascript:history.back()" class="alert-link">Quay lại trang thành viên!</a>!
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

        <?php    //////////// Thanh tich chiem dong
        $searchcd = $connect->query("SELECT * FROM chiemdong WHERE iding='$id'");
        if(mysqli_num_rows($searchcd)>0){
            $cd = mysqli_fetch_array($searchcd);
            ?><h5 class="card-title">Thành Tích Chiếm Đóng</h5>
            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M7.998 14.5c2.832 0 5-1.98 5-4.5 0-1.463-.68-2.19-1.879-3.383l-.036-.037c-1.013-1.008-2.3-2.29-2.834-4.434-.322.256-.63.579-.864.953-.432.696-.621 1.58-.046 2.73.473.947.67 2.284-.278 3.232-.61.61-1.545.84-2.403.633a2.788 2.788 0 01-1.436-.874A3.21 3.21 0 003 10c0 2.53 2.164 4.5 4.998 4.5zM9.533.753C9.496.34 9.16.009 8.77.146 7.035.75 4.34 3.187 5.997 6.5c.344.689.285 1.218.003 1.5-.419.419-1.54.487-2.04-.832-.173-.454-.659-.762-1.035-.454C2.036 7.44 1.5 8.702 1.5 10c0 3.512 2.998 6 6.498 6s6.5-2.5 6.5-6c0-2.137-1.128-3.26-2.312-4.438-1.19-1.184-2.436-2.425-2.653-4.81z"></path></svg> <b style="color: #ef2f2f; font-size: 20px;">[<?php echo $cd['diemdanh'] ?>]</b> Lần Tham Gia Chiếm Đóng<br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M8.834.066C7.494-.087 6.5 1.048 6.5 2.25v.5c0 1.329-.647 2.124-1.318 2.614-.328.24-.66.403-.918.508A1.75 1.75 0 002.75 5h-1A1.75 1.75 0 000 6.75v7.5C0 15.216.784 16 1.75 16h1a1.75 1.75 0 001.662-1.201c.525.075 1.067.229 1.725.415.152.043.31.088.475.133 1.154.32 2.54.653 4.388.653 1.706 0 2.97-.153 3.722-1.14.353-.463.537-1.042.668-1.672.118-.56.208-1.243.313-2.033l.04-.306c.25-1.869.265-3.318-.188-4.316a2.418 2.418 0 00-1.137-1.2C13.924 5.085 13.353 5 12.75 5h-1.422l.015-.113c.07-.518.157-1.17.157-1.637 0-.922-.151-1.719-.656-2.3-.51-.589-1.247-.797-2.01-.884zM4.5 13.3c.705.088 1.39.284 2.072.478l.441.125c1.096.305 2.334.598 3.987.598 1.794 0 2.28-.223 2.528-.549.147-.193.276-.505.394-1.07.105-.502.188-1.124.295-1.93l.04-.3c.25-1.882.189-2.933-.068-3.497a.922.922 0 00-.442-.48c-.208-.104-.52-.174-.997-.174H11c-.686 0-1.295-.577-1.206-1.336.023-.192.05-.39.076-.586.065-.488.13-.97.13-1.328 0-.809-.144-1.15-.288-1.316-.137-.158-.402-.304-1.048-.378C8.357 1.521 8 1.793 8 2.25v.5c0 1.922-.978 3.128-1.933 3.825a5.861 5.861 0 01-1.567.81V13.3zM2.75 6.5a.25.25 0 01.25.25v7.5a.25.25 0 01-.25.25h-1a.25.25 0 01-.25-.25v-7.5a.25.25 0 01.25-.25h1z"></path></svg> <b style="color: #ef2f2f; font-size: 20px;">[<?php echo $cd['bame'] ?>]</b> Lần Bấm được E</p> 
            <?php
        } else {
            echo 'Thành viên này không có trong danh sách chiếm đóng!';
        }
        ?>
        <div class="card-header" style="font-size: 20px; font-weight: 500; text-align: center; color: #ffa800;">Avatar</div>
        <img src="<?php echo $member['avatar'] ?>" style="width: 100%;" alt="">
  </div></div>
            
            </div>
            <?php

        }else {
        echo 'Không có ID này trong danh sách thành viên</div>';
        }
        echo '</div></div>';
}

/////////////////// item v2 ///////////////

//////////////////// end item v2 //////////////







?>