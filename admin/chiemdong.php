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
///////////////////// THem Diem CD
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="dd") {
        $id = $_GET['id'];
        $sql2 = "UPDATE chiemdong SET `diemdanh`= `diemdanh` + '1' WHERE iding='".$_GET['id']."'";
        if (mysqli_query($connect, $sql2)) {
            echo "<div class='container'>
            <div class='row' style='margin-top: 10px; padding-bottom: 20px;'>
              <div class='col-12'>
              <div class='alert alert-success' role='alert'>
              Bạn Đã Điểm Danh Thành Công Cho ID: $id !
        </div>
              </div></div></div>";
        ///header('Location:cd.php');
        } else {
            echo '<div class="container">
            <div class="row" style="margin-top: 10px; padding-bottom: 20px;">
              <div class="col-12">
              <div class="alert alert-warning" role="alert">
              ID Người chơi này không tồn tại?
        </div>
              </div></div></div>';
        }
    }
}
///////////////////// THem Diem CD

///////////////////// Xóa điểm Danh
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="xdd") {
        $id = $_GET['id'];
        $sql2 = "UPDATE chiemdong SET `diemdanh`= `diemdanh` - '1' WHERE iding='".$_GET['id']."'";
        if (mysqli_query($connect, $sql2)) {
            echo "<div class='container'>
            <div class='row' style='margin-top: 10px; padding-bottom: 20px;'>
              <div class='col-12'>
              <div class='alert alert-danger' role='alert'>
              Bạn Đã Xóa 1 Điểm Danh Của Thành Viên ID: $id !
        </div>
              </div></div></div>";
        ///header('Location:cd.php');
        } else {
            echo '<div class="container">
            <div class="row" style="margin-top: 10px; padding-bottom: 20px;">
              <div class="col-12">
              <div class="alert alert-warning" role="alert">
              ID Người chơi này không tồn tại?
        </div>
              </div></div></div>';
        }
    }
}
///////////////////// Xóa điểm Danh
?>





<?php
///////////////////// THem Diem BAM E
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="e") {
        $id = $_GET['id'];
        $sql2 = "UPDATE chiemdong SET `bame`= `bame` + '1' WHERE iding='".$_GET['id']."'";
        if (mysqli_query($connect, $sql2)) {
        echo "<div class='container'>
        <div class='row' style='margin-top: 10px; padding-bottom: 20px;'>
          <div class='col-12'>
          <div class='alert alert-success' role='alert'>
          Bạn đã +1 Điểm Bấm E cho ID $id !
    </div>
          </div></div></div>";
        ///header('Location:cd.php');
        } else {
            echo '<div class="container">
            <div class="row" style="margin-top: 10px; padding-bottom: 20px;">
              <div class="col-12">
              <div class="alert alert-warning" role="alert">
              ID Người chơi này không tồn tại?
        </div>
              </div></div></div>';
        }
    }
}
///////////////////// THem Diem BAM E
///////////////////// THem Diem BAM E
if (isset($_GET['act'])) {
	$act = $_GET['act'];
	if ($act=="xe") {
        $id = $_GET['id'];
        $sql2 = "UPDATE chiemdong SET `bame`= `bame` - '1' WHERE iding='".$_GET['id']."'";
        if (mysqli_query($connect, $sql2)) {
        echo "<div class='container'>
        <div class='row' style='margin-top: 10px; padding-bottom: 20px;'>
          <div class='col-12'>
          <div class='alert alert-danger' role='alert'>
          Bạn đã Xóa -1 Điểm Bấm E của ID $id !
    </div>
          </div></div></div>";
        ///header('Location:cd.php');
        } else {
            echo '<div class="container">
            <div class="row" style="margin-top: 10px; padding-bottom: 20px;">
              <div class="col-12">
              <div class="alert alert-warning" role="alert">
              ID Người chơi này không tồn tại?
        </div>
              </div></div></div>';
        }
    }
}
///////////////////// THem Diem BAM E
?>


<?php
// Câu SQL lấy danh sách chiemdong
$sqlcd = "SELECT * FROM chiemdong ORDER BY diemdanh DESC";


// Thực thi câu truy vấn và gán vào $result
$resultcd = mysqli_query($connect, $sqlcd);


// Kiểm tra số lượng record trả về có lơn hơn 0
// Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
if (mysqli_num_rows($resultcd) > 0) {
    echo '<div class="container">
    <div class="row">
<div class="col-12" style="background-color: #FFA726; margin-top: 10px; padding: 2px 15px; color: #fff;">
    <h1> TOP Thành Viên Chiếm Đóng</h1>
</div></div>
<div class="row" style="background-color: #fff6e9d9; padding-top: 10px;">';
    // Sử dụng vòng lặp while để lặp kết quả
    while($cd = mysqli_fetch_assoc($resultcd)) {
        // Câu SQL lấy danh sách member
        $sqlm = "SELECT * FROM member WHERE iding='".$cd["iding"]."'";
        $resultm = mysqli_query($connect, $sqlm);
            $mem = mysqli_fetch_array($resultm);
            if ($mem['avatar']=="") {
                $mem['avatar'] = "https://cdn.discordapp.com/attachments/882979839898955777/890525696454197299/bibi.png";
            }
            if ($mem['chucvu']=="0") {
                $mem['chucvu'] = "King";
            }elseif ($mem['chucvu']=="1") {
                $mem['chucvu'] = "Queen";
            }elseif ($mem['chucvu']=="2") {
                $mem['chucvu'] = "Knight";
            }elseif ($mem['chucvu']=="3") {
                $mem['chucvu'] = "Bishop";
            }elseif ($mem['chucvu']=="4") {
                $mem['chucvu'] = "Castle";
            }elseif ($mem['chucvu']=="5") {
                $mem['chucvu'] = "Pawn";
            }
        ?>
            <div class="col-sm-4" style="padding-bottom: 10px;">
                <div class="card">
                    <div class="card-body">
                    <h5 style="color: #2012f3;" class="card-title">
                <img src="<?php echo $mem['avatar'] ?>" style="vertical-align: middle;  width: 50px;  height: 50px;  border-radius: 50%;" alt="">
                <?php echo $cd['iding'] ?> | <?php echo $mem['tening'] ?></h5>
                <p class="card-text"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M14.064 0a8.75 8.75 0 00-6.187 2.563l-.459.458c-.314.314-.616.641-.904.979H3.31a1.75 1.75 0 00-1.49.833L.11 7.607a.75.75 0 00.418 1.11l3.102.954c.037.051.079.1.124.145l2.429 2.428c.046.046.094.088.145.125l.954 3.102a.75.75 0 001.11.418l2.774-1.707a1.75 1.75 0 00.833-1.49V9.485c.338-.288.665-.59.979-.904l.458-.459A8.75 8.75 0 0016 1.936V1.75A1.75 1.75 0 0014.25 0h-.186zM10.5 10.625c-.088.06-.177.118-.266.175l-2.35 1.521.548 1.783 1.949-1.2a.25.25 0 00.119-.213v-2.066zM3.678 8.116L5.2 5.766c.058-.09.117-.178.176-.266H3.309a.25.25 0 00-.213.119l-1.2 1.95 1.782.547zm5.26-4.493A7.25 7.25 0 0114.063 1.5h.186a.25.25 0 01.25.25v.186a7.25 7.25 0 01-2.123 5.127l-.459.458a15.21 15.21 0 01-2.499 2.02l-2.317 1.5-2.143-2.143 1.5-2.317a15.25 15.25 0 012.02-2.5l.458-.458h.002zM12 5a1 1 0 11-2 0 1 1 0 012 0zm-8.44 9.56a1.5 1.5 0 10-2.12-2.12c-.734.73-1.047 2.332-1.15 3.003a.23.23 0 00.265.265c.671-.103 2.273-.416 3.005-1.148z"></path></svg> Chức vụ: <?php echo $mem['chucvu'] ?> ♥ Team: <?php echo $mem['team'] ?></p>
                <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M7.998 14.5c2.832 0 5-1.98 5-4.5 0-1.463-.68-2.19-1.879-3.383l-.036-.037c-1.013-1.008-2.3-2.29-2.834-4.434-.322.256-.63.579-.864.953-.432.696-.621 1.58-.046 2.73.473.947.67 2.284-.278 3.232-.61.61-1.545.84-2.403.633a2.788 2.788 0 01-1.436-.874A3.21 3.21 0 003 10c0 2.53 2.164 4.5 4.998 4.5zM9.533.753C9.496.34 9.16.009 8.77.146 7.035.75 4.34 3.187 5.997 6.5c.344.689.285 1.218.003 1.5-.419.419-1.54.487-2.04-.832-.173-.454-.659-.762-1.035-.454C2.036 7.44 1.5 8.702 1.5 10c0 3.512 2.998 6 6.498 6s6.5-2.5 6.5-6c0-2.137-1.128-3.26-2.312-4.438-1.19-1.184-2.436-2.425-2.653-4.81z"></path></svg> <b style="color: #ef2f2f; font-size: 20px;">[<?php echo $cd['diemdanh'] ?>]</b> Lần Tham Gia Chiếm Đóng<br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M8.834.066C7.494-.087 6.5 1.048 6.5 2.25v.5c0 1.329-.647 2.124-1.318 2.614-.328.24-.66.403-.918.508A1.75 1.75 0 002.75 5h-1A1.75 1.75 0 000 6.75v7.5C0 15.216.784 16 1.75 16h1a1.75 1.75 0 001.662-1.201c.525.075 1.067.229 1.725.415.152.043.31.088.475.133 1.154.32 2.54.653 4.388.653 1.706 0 2.97-.153 3.722-1.14.353-.463.537-1.042.668-1.672.118-.56.208-1.243.313-2.033l.04-.306c.25-1.869.265-3.318-.188-4.316a2.418 2.418 0 00-1.137-1.2C13.924 5.085 13.353 5 12.75 5h-1.422l.015-.113c.07-.518.157-1.17.157-1.637 0-.922-.151-1.719-.656-2.3-.51-.589-1.247-.797-2.01-.884zM4.5 13.3c.705.088 1.39.284 2.072.478l.441.125c1.096.305 2.334.598 3.987.598 1.794 0 2.28-.223 2.528-.549.147-.193.276-.505.394-1.07.105-.502.188-1.124.295-1.93l.04-.3c.25-1.882.189-2.933-.068-3.497a.922.922 0 00-.442-.48c-.208-.104-.52-.174-.997-.174H11c-.686 0-1.295-.577-1.206-1.336.023-.192.05-.39.076-.586.065-.488.13-.97.13-1.328 0-.809-.144-1.15-.288-1.316-.137-.158-.402-.304-1.048-.378C8.357 1.521 8 1.793 8 2.25v.5c0 1.922-.978 3.128-1.933 3.825a5.861 5.861 0 01-1.567.81V13.3zM2.75 6.5a.25.25 0 01.25.25v7.5a.25.25 0 01-.25.25h-1a.25.25 0 01-.25-.25v-7.5a.25.25 0 01.25-.25h1z"></path></svg> <b style="color: #ef2f2f; font-size: 20px;">[<?php echo $cd['bame'] ?>]</b> Lần Bấm được E</p> 

                <a href="/admin/chiemdong.php?act=dd&id=<?php echo $cd['iding']; ?>" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.47 7.78a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L9 4.81v7.44a.75.75 0 01-1.5 0V4.81L4.53 7.78a.75.75 0 01-1.06 0z"></path></svg> Điểm Danh</a>
                <a href="/admin/chiemdong.php?act=e&id=<?php echo $cd['iding']; ?>" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.47 7.78a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L9 4.81v7.44a.75.75 0 01-1.5 0V4.81L4.53 7.78a.75.75 0 01-1.06 0z"></path></svg> Bấm E</a>
                <div style="padding-top: 8px;">
                <a href="/admin/chiemdong.php?act=xdd&id=<?php echo $cd['iding']; ?>" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M13.03 8.22a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06 0L3.47 9.28a.75.75 0 011.06-1.06l2.97 2.97V3.75a.75.75 0 011.5 0v7.44l2.97-2.97a.75.75 0 011.06 0z"></path></svg> Xóa Điểm Danh</a>
                <a href="/admin/chiemdong.php?act=xe&id=<?php echo $cd['iding']; ?>" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M13.03 8.22a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06 0L3.47 9.28a.75.75 0 011.06-1.06l2.97 2.97V3.75a.75.75 0 011.5 0v7.44l2.97-2.97a.75.75 0 011.06 0z"></path></svg> Xóa Bấm E</a>
                    </div>
                    </div>
                </div>
            </div>
    <?php
            
    }
} else {
    echo "Không có dữ liệu nào!";
}

 echo '</div> </div>';

?>




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