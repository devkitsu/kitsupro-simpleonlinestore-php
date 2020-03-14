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
		<form action="" method="post">
			<input type="submit" name="submit" class="search btn-cari" value="Cari">
			<input type="search" name="search" class="search" placeholder="Masukkan nama barang">
		</form>
			<div class="judulmenu"> Menu Produk </div>
		</div>
		<br>

		<?php
		$submit = @$_POST['submit']; /* BUTTON CARI */
		$search = @$_POST['search'];

		// PAGINATION
			$no = 1;
			$batas = 6;
			$hal = @$_GET['hal'];
				if(empty($hal)){
					$posisi = 0;
					$hal = 1;
				}else{
					$posisi = ($hal - 1) * $batas;
				}
		if($submit){
			if($search != ""){
				$query = mysql_query("SELECT * from tb_produk where nm_produk like '%$search%' ORDER by kd_produk asc");
			}else{
				$query = mysql_query("SELECT * from tb_produk ORDER by kd_produk asc LIMIT $posisi,$batas ");
			}
		}else{
			$query = mysql_query("SELECT * from tb_produk ORDER by kd_produk asc LIMIT $posisi,$batas ");
		}

		$cek = mysql_num_rows($query);
		if($cek < 1){
			echo "Data yang anda cari tidak ditemukan !";
		}

		while($data = mysql_fetch_array($query)){
		?>
			<div class="kontenspan">
				<div class="table-responsive">
			<table class="tableisi">
				<tr> <th> <?php echo $data['nm_produk']; ?> </th> </tr>
				<tr> <td> <img class="spangambar" src="img/produk/<?php echo $data['gambar'] ; ?> " alt="Foto" >
				</td> </tr>
				<tr> <td class="tdspek"> <?php echo $data['detail']; ?> </td> </tr>
				<tr> <td class="tdharga"> Rp. <?php echo number_format($data['harga'],0,",",".") ;?>  </td> </tr>
			</table>
				</div>
			</div>
		<?php } ?>
		<div class="clear"> </div>
		<!-- PAGINATION -->

		<div style="margin:5px 0px 10px 25px; float:left;">
				<?php
				$jml = mysql_num_rows(mysql_query("SELECT * from tb_produk"));
				echo "Jumlah Data : <b>".$jml."</b>";
				?>
		</div>
		<div style="margin:5px 25px 50px 0px; float:right;">
				<?php
				$jml_hal = ceil($jml / $batas);
				for($i=1; $i<=$jml_hal;$i++){
					if($i != $hal){
						echo "<a href='index_produk.php?hal=$i'><button class='btn-pagination1'>$i</button> </a>";
					}else{
						echo "<button class='btn-pagination2'><b> $i</b> </button>";
					}
				}
				?>
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
