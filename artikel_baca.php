<?php
	include 'lib/koneksi.php';
	session_start();
	if(isset($_SESSION['roles']) == null){
?>

<html>
<?php
	include"lib/head.php";
?>

	<body>
		<?php
			include"lib/header2.php";
		?>

		<div class="center">
		<div id="menumobil">
			<div class="judulmenu"> Menu Artikel </div>
		</div>
		<br>
		<?php
		$id_artikel = abs(intval($_GET['id_artikel']));
		$sql=mysql_query("select * from tb_artikel where id_artikel='$id_artikel'");
				$row=mysql_fetch_array($sql);{ ?>
				<div class="panel panel-info">
		<div align="left" >
			<a class="fa fa-chevron-left fa-2x" href="index_artikel.php" style="text-decoration:none"> Kembali</a></div>
				  <div class="panel-heading"><h4><?php echo $row['judul']; ?></h4></div>
				  <div class="panel-body">
				    <img style="float:left;margin-right:20px;"src="img/artikel/<?php echo $row['gambar'] ; ?>" height="auto" weigth="auto" class="image-rounded" width="250" height="250"/>
				    <p><?php echo $row['isi']; ?></p>
				  </div>
				</div>
				<?php } ?>
		<div class="clear"> </div>
		</div>

		<!-- FOOTER -->
		<?php
			include"lib/footer.php";
		?>
		<!-- FOOTER -->

	</body>
	<!-- <script type="text/javascript" src="../../js/jquery.min.js"> </script>
	<script type="text/javascript" src="../../js/customjs.js"> </script> -->
</html>

<?php
	}else{
		if($_SESSION['roles'] == "admin"){
		header("location:assets/admin/index.php");
		}elseif($_SESSION['roles'] == "user"){
		header("location:assets/users/index.php");
		}else{
		echo "User tidak ditemukan";
		session_destroy();
		}
	}

?>
