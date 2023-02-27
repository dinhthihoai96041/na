<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello BiBi Gangster!</title>
    	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:800|Roboto:400,500,700&display=swap" rel="stylesheet">
	
	<!-- FontAwesome JS-->
	<script defer src="assets/fontawesome/js/all.min.js"></script>

	<!-- Theme CSS -->  
	<link id="theme-style" rel="stylesheet" href="assets/css/theme.css">
  
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">-->
    <script src="https://kit.fontawesome.com/a2e849e0f0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body class="hib">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





<div class="bg-light" style="position: -webkit-sticky; position: sticky; top: 0; z-index: 100;">
<div class="container">
<div class="row">
<div class="col-12">
  <nav class="navbar2 navbar-expand-lg navbar-light bg-light">
  <a class="activelink" href="/"><img src="https://cdn.discordapp.com/attachments/882979839898955777/890525696454197299/bibi.png" width="50" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"  style="font-size: 18px;font-weight: bold;">
      <li class="nav-item" style="padding-left: 10px;">
        <a class="nav-link2" href="/thanh-vien.html"><i class="far fa-address-book"></i> Thành Viên</a>
      </li>
      <li class="nav-item">
        <a class="nav-link2" href="/chiem-dong.html"><i class="fas fa-chess-rook"></i> Chiếm Đóng</a>
      </li>
      <li class="nav-item">
        <a class="nav-link2" href="/kho-cong-hien.html"><i class="fas fa-box"></i> Cống Hiến</a>
      </li>
    </ul>

<?php
if(!isset($_SESSION["username"])){
    //echo '<div class="nav__profile2"><a href="/login.php">Login</a></div>';
}else{
                        $username = $_SESSION['username'];
						$sql = $connect->query("SELECT * FROM user WHERE username='$username'");
						if(mysqli_num_rows($sql)>0){
							$row = mysqli_fetch_array($sql);
							echo '';
                            $username = $_SESSION['username'];
								$sql = $connect->query("SELECT * FROM user WHERE username='$username' AND level='2'");
								if(mysqli_num_rows($sql)>0){
									$row = mysqli_fetch_array($sql);
                                    echo '
                                    <li class="nav-item dropdown" style="list-style: none;">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Admin CP
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="/admin">Admin CP</a>
                                      <a class="dropdown-item" href="/admin/member.php?act=member">Danh Sách TV</a>
                                      <a class="dropdown-item" href="/admin/member.php?act=addmember">Thêm Thành Viên</a>
                                      <a class="dropdown-item" href="/admin/chiemdong.php">Chiếm Đóng</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="/logout.php">Thoát</a>
                                    </div>
                                  </li>';
								}else{
									echo '';
										}
						};
						
 };
?>


    <form class="form-inline my-2 my-lg-0" action="/item.html">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search ID ING" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>
</div></div></div>