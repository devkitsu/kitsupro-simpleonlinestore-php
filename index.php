<?php
	include 'lib/koneksi.php';
	session_start();
?>

<html>
	<?php
		include"lib/head.php";
	?>
	<body>
<!-- HEADER -->
		<?php
			include"lib/header.php";
		?>
<!-- HEADER -->

		<!-- SLIDER -->
		<div id="slider">
			<div class="center">
				<h1> Selamat Datang di Toko Saya </h1>
				<h2> Jual Beli Meubel Berkualitas Secara Online</h2>
				<br>
				<h3> Untuk Melakukan Pembelian Silahkan Mendaftar Terlebih Dahulu </h3>
				<a href="signup.php" class="btn-primary" target="_blank"> DAFTAR </a>
			</div>
		</div>
		<!-- SLIDER -->

		<!-- CONTENT -->
		<?php
			include"lib/konten.php";
		?>
		<!-- CONTENT -->

		<!-- ABOUT  -->
		<div id="ourteam" >
			<div class="center">
			<h1 class="judul-ourteam"> <i class="fa fa-users"> </i> ABOUT US </h1>
			<div class="content-ourteam" >
				<div class="isi-ourteam" >
				<img src="img/ourteam1.jpg" class="foto-ourteam">
				<div class="nama-team"> Mr.X</div>
				<div class="jabatan-team"> Owner </div><br>
			</div>
			<font size="4" face="Web-Segoe" >
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
      			ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
      			laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
      			voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
      			non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</font>
			<div class="isi-ourteam2" >
			<div class="jabatan-team"> 	 </div>
		</div>
			<div class="clear"> </div>
		</div></div>
		<!-- ABOUT  -->

		<!-- FOOTER -->
		<br><br><br>
		<?php
			include"lib/footer.php";
		?>
		<!-- FOOTER -->
	</body>
	<!-- <script type="text/javascript" src="js/jquery.min.js"> </script>
	<script type="text/javascript" src="js/customjs.js"> </script> -->
</html>
