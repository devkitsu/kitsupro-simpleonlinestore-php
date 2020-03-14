<?php
	include '../../lib/koneksi.php';
	session_start();
	if($_SESSION['username'] == ''){
		echo "<script> alert('Forbidden Access') ;
		document.location.href='../../index.php' </script> " ;
		exit();
	}
		$id_show = $_SESSION['id_member'] ;
		$ambildata = mysql_query("SELECT * from tb_member where id_member='$id_show' ") ;
		$row2 = mysql_fetch_array($ambildata);
?>
<?php
include("inc.header.php");
include("inc.konten.php");
?>

		<!-- ABOUT  -->
		<div id="ourteam" >
			<div class="center">
			<h1 class="judul-ourteam"> <i class="fa fa-users"> </i> ABOUT US </h1>
			<div class="content-ourteam" >
				<div class="isi-ourteam" >
				<img src="../../img/ourteam1.jpg" class="foto-ourteam">
				<div class="nama-team"> Mr.X</div>
				<div class="jabatan-team"> Owner </div><br>
			</div>
			<font size="4" face="Web-Segoe" >
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
				ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
				laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
				voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
				non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</font>
		</div>
			<div class="clear"> </div>
		</div></div>
		<!-- ABOUT  -->
		<!-- FOOTER -->
		<br><br><br>
		<?php
		include("footer.php");
		?>
		<!-- FOOTER -->

	</body>
	<!-- <script type="text/javascript" src="../../js/jquery.min.js"> </script>
	<script type="text/javascript" src="../../js/customjs.js"> </script> -->


</html>
