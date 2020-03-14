<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=0.1" />
		<title> YourBrand | Online shop for meubel</title>
	<link rel="stylesheet" href="../../css/custom.css">
	<link rel="stylesheet" href="../../css/custom2.css">
 	<link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css">
 	<style type="text/css">
 		#header-user{
 			background-color: #262626;
 			height: 50px;
 			color: #fff;
 			box-shadow: 0px 5px 5px #cccccc;
 		}
 		.header-profile{
 			float: right;
 			margin-right: 25px;
 			margin-top: 15px;
 			font-family: "Web-Segoe-Light";
 		}
 		.header-profile a{
 			color: #1a1aff;
 			text-decoration: none;
 		}
 	</style>
	</head>
	<body>
		<div id="header-user">
			<div style="float: left;font-family:'Web-Segoe-Light';margin:15px 0px 0px 15px;">
			<a href="settingprofil.php" style="text-decoration: none;color: #fff;"> Setting Profile </a> </div>
			<div class="header-profile">
				Halo, Selamat Datang
				<?php
				if($row2['nama'] != null){
				echo $row2['nama'] ; ?> ||
				<?php
				echo "<a href='logout.php'> [ Logout ]</a>" ;
				}else{
				echo "Untuk kenyamanan berbelanja silahkan lengkapi data terlebih dahulu <a href='settingprofil.php'> >Klik disini< </a> ";
				echo "<a href='logout.php'> [ Logout ]</a>" ;
				}
				?>
			</div>
		</div>
		<div id="header">
			 <div class="center">
			 <!-- Logo -->
			 	<div class="logo">
			 		<a href="index_member.php" ><img src="../../img/logo.png"></a>
			 	</div>
			 <!-- Logo -->
			 	<!-- Navbar -->
			 	<div class="navbar">
			 	<ul>
			 		<li> <a href="index_member.php"> Home </a></li>
			 		<li>  <a href="index_member.php#layanan" >Menu</a>	</li>
			 		<li> <a href="index_member.php#ourteam"> About Us </a></li>
			 		<li> <a href="transaksi.php"> Transaksi</a></li>
			 		<li> <a href="keranjang.php" class="fa fa-shopping-cart fa-2x"></a></li>
			 		<li style="background-color:#ff4343 ;border-radius: 5%;">
			 	</ul>
			 	</div>
			 	<!-- Tutup Navbar -->
			 	<div class="clear"> </div>
			 </div>
		</div>

		<!-- SLIDER -->
		<div id="slider">
			<div class="center">
				<h1> Selamat Datang di Toko Saya </h1>
				<h2> Jual Beli Meubel Berkualitas Secara Online</h2>
			</div>
		</div>
		<!-- SLIDER -->
