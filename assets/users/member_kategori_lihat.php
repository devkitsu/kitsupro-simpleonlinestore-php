<?php
	include '../../lib/koneksi.php';
	session_start();
	if(isset($_SESSION['roles']) == 'user'){
		$id_show = $_SESSION['id_member'] ;
		$ambildata = mysql_query("SELECT * from tb_member where id_member='$id_show' ") ;
		$row2 = mysql_fetch_array($ambildata);
?>
<?php
include("inc.header.php");
?><br>		<div class="center">
<div id="menumobil">
	<div class="judulmenu"> Menu Barang </div>
</div>
<br>
<?php

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
		$kd_kategori = $_GET['kd_kategori'];
		$sql=mysql_query("SELECT * from tb_produk where kd_kategori='$kd_kategori'");
while($data = mysql_fetch_array($sql)){
?>
	<div class="kontenspan">
		<div class="table-responsive">
	<table class="tableisi">
		<tr> <th> <?php echo $data['nm_produk']; ?> </th> </tr>
		<tr> <td> <a href="member_lihat.php?kd_produk=<?php echo $data['kd_produk'];?>"><img class="spangambar" src="../../img/produk/<?php echo $data['gambar'] ; ?> " alt="Foto" ></a>
		</td> </tr>
		<tr> <td class="tdharga"> Rp. <?php echo number_format($data['harga'],0,",",".") ;?>  </td> </tr>
		<tr> <td class="tdharga"><?php
			if($data['stok']=='0'){
				echo "Produk Tidak Tersedia";
			}else{
				echo "Stok Tersedia: "; echo $data['stok'];
			}
		?></td> </tr>
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
		<div id="ourteam" >
			<div class="center">
			<h1 class="judul-ourteam"> <i class="fa fa-users"> </i>KATEGORI LAIN</h1>
			<?php
			$query = mysql_query("SELECT * from tb_kategori where kd_kategori!='$kd_kategori'");
			$cek = mysql_num_rows($query);
			while($data = mysql_fetch_array($query)){
			?>
			<a href="member_kategori_lihat.php?kd_kategori=<?php echo $data['kd_kategori'];?>" class="layanan-kami2">
				<div class="isi2">
					<div class="text-content">
							<tr> <th><center> <?php echo $data['nm_kategori']; ?> </center></th> </tr><br>
					</div>
				</div><tr> <td> <img class="spangambar" src="../../img/kategori/<?php echo $data['gambar'] ; ?> " alt="Foto" >
				</td> </tr>
			</a>
			<?php } ?>
			<div class="clear"> </div>
			<div class="clear"> </div>
		</div></div>
		<!-- ABOUT  -->
		<!-- FOOTER -->
		<?php
			include("footer.php");
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
		}else{
		echo "User tidak ditemukan";
		session_destroy();
		}
	}

?>
