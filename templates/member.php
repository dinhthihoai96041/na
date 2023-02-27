<div class="container">
    <div class="row">
<div class="col-12" style="background-color: #F4A261; margin-top: 20px; padding-left: 25px; color: #fff;">
    <h1> Danh Sách Thành Viên</h1>
</div></div>

<div class="row" style="background-color: #fff6e9d9; padding-top: 10px;">



<?php /////////// Khai  báo
	$searchGame = $connect->query("SELECT * FROM `member` ORDER BY `member`.`chucvu` ASC");
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
                    $game['avatar'] = "https://cdn.discordapp.com/attachments/882979839898955777/890525696454197299/bibi.png";
                }
                if ($game['quequan']=="") {
                    $game['quequan'] = "Nay đây mai đó";
                }
?>

<div class="col-sm-4" style="padding-bottom: 10px;">
    <div class="card">
        <div class="card-body">
        <h5 style="color: #2012f3;" class="card-title"><a class="text-info" href="/thanh-vien-<?php echo $game['iding'] ?>.html">
                <img class="rounded" src="<?php echo $game['avatar'] ?>" style="vertical-align: middle;  width: 50px;  height: 50px;" alt="">
                <?php echo $game['iding'] ?> | <?php echo $game['tening'] ?></a></h5>
            <p class="card-text">
            <i class="fas fa-award"></i> Chức Vụ: <b><?php echo $game['chucvu'] ?></b><br>
            <i class="fas fa-users"></i> Team: <b><?php echo $game['team'] ?></b>
            </p>        
    
            <p class="card-text">
            <i class="fas fa-id-card"></i> Họ Tên: <b><?php echo $game['tenthat'] ?></b><br>
            <i class="far fa-calendar-alt"></i> Năm Sinh: <b><?php echo $game['namsinh'] ?></b><br>
            <i class="fas fa-map-marker-alt"></i> Nơi ở: <b><?php echo $game['quequan'] ?></b>
            </p>
            
            <?php
if(!isset($_SESSION["username"])){ // nếu chưa đăng nhập sẽ yêu cầu quay lại
    }else{  // đã đăng nhập sẽ kiểm tra xem phải admin không                        
        $username = $_SESSION['username'];
        $sql = $connect->query("SELECT * FROM user WHERE username='$username' AND level='2'");
        if(mysqli_num_rows($sql)>0){    // sau khi kiểm tra đúng level 2 thì sẽ hiên
        $row = mysqli_fetch_array($sql);
 ?>
 <a href="/admin/vatpham.php?act=add&id=<?php echo $game['iding'] ?>" class="badge badge-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M7.655 14.916L8 14.25l.345.666a.752.752 0 01-.69 0zm0 0L8 14.25l.345.666.002-.001.006-.003.018-.01a7.643 7.643 0 00.31-.17 22.08 22.08 0 003.433-2.414C13.956 10.731 16 8.35 16 5.5 16 2.836 13.914 1 11.75 1 10.203 1 8.847 1.802 8 3.02 7.153 1.802 5.797 1 4.25 1 2.086 1 0 2.836 0 5.5c0 2.85 2.045 5.231 3.885 6.818a22.075 22.075 0 003.744 2.584l.018.01.006.003h.002z"></path></svg> Cống Hiến</a> 
 <a href="/admin/member.php?act=edit&id=<?php echo $game['iding'] ?>" class="badge badge-warning"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M10.75 9a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5h-1.5z"></path><path fill-rule="evenodd" d="M0 3.75C0 2.784.784 2 1.75 2h12.5c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0114.25 14H1.75A1.75 1.75 0 010 12.25v-8.5zm14.5 0V5h-13V3.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25zm0 2.75h-13v5.75c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V6.5z"></path></svg> Sửa TV</a> 
 <a href="/admin/member.php?act=del&id=<?php echo $game['iding'] ?>" class="badge badge-danger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="15"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg> Xóa TV</a>
<?php
        }else{ // nếu không phải admin
            };
        };?>

        </div>
    </div>
</div>

<?php
            }
        } else {
            echo 'Không có thành viên nào!';
        }
?>
</div>