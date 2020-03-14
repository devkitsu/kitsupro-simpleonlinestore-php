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
			<div class="judulmenu"> Menu Kategori </div>
		</div>
		<br>

		<?php
		// PAGINATION
		$query = mysql_query("SELECT * from tb_kategori");
		$cek = mysql_num_rows($query);
		while($data = mysql_fetch_array($query)){
		?>
		<a href="" class="layanan-kami2">
			<div class="isi2">
				<div class="text-content">
						<tr> <th><center> <?php echo $data['nm_kategori']; ?> </center></th> </tr>
				</div>
			</div>
			<tr> <td> <img class="spangambar" src="img/kategori/<?php echo $data['gambar'] ; ?> " alt="Foto" ></td></tr>
		</a>
		<?php } ?>
		<div class="clear"> </div>
		<!-- PAGINATION -->

		<div style="margin:5px 0px 10px 25px; float:left;">
				<?php
				$jml = mysql_num_rows(mysql_query("SELECT * from tb_kategori"));
				echo "Jumlah Data : <b>".$jml."</b>";
				?>
		</div>
		<div style="margin:5px 25px 50px 0px; float:right;">
		</div>
		</div>

		<!-- CONTENT -->
		<?php
			include"lib/konten.php";
		?>
		<!-- CONTENT -->

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
