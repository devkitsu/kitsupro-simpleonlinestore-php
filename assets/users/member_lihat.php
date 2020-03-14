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
			<div class="judulmenu"> Detail Produk</div>
		</div>
		<br>
		<?php
		$kd_produk = $_GET['kd_produk'];
		$sql=mysql_query("SELECT tb_produk.*,tb_kategori.kd_kategori, tb_kategori.nm_kategori from tb_produk, tb_kategori where kd_produk='$kd_produk' and tb_produk.kd_kategori=tb_kategori.kd_kategori");
				$row=mysql_fetch_array($sql);{ ?>
			<a class="fa fa-chevron-left fa-2x" href="member_produk.php" style="text-decoration:none"> Kembali</a>
				  <h4><?php echo $row['nm_produk']; ?></h4>
				    <img style="align:top;margin-right:20px;"src="../../img/produk/<?php echo $row['gambar'] ; ?>" height="250" class="image-rounded" width="auto" />
					<p>Kode: <?php echo $row['kd_produk']; ?></p>
					<p>Kategori: <?php echo $row['nm_kategori']; ?></p>
                    <p>Spesifikasi Produk: <?php echo $row['detail']; ?></p>
                    <p>Harga Produk: Rp. <?php echo number_format ($row['harga'],0,",","."); ?></p>
                    <p>Stok Tersedia: <?php echo $row['stok']; ?></p>
					<?php
					if($row['stok'] > 0){
	                  echo '<a class="btn-beli" href="tambah_keranjang.php?kd_produk='.$row['kd_produk'].'&id_member='.$row2['id_member'].'">Masukkan Keranjang</a>
	                ';
	                }else{
	                  echo '
	                  <a class="btn-beli" style="color:grey;" disabled">Masukkan Keranjang</a>
	                ';
				}?>
                <?php } ?>
		</div>
		<div id="ourteam" >
			<div class="center">
			<h1 class="judul-ourteam"> <i class="fa fa-users"> </i>PRODUK LAIN</h1>
			<?php
			$query = mysql_query("SELECT * from tb_produk where kd_produk!='$kd_produk'");
			$cek = mysql_num_rows($query);
			while($data = mysql_fetch_array($query)){
			?>
			<a href="member_lihat.php?kd_produk=<?php echo $data['kd_produk'];?>" class="layanan-kami2">
				<div class="isi2">
					<div class="text-content">
							<tr> <th><center> <?php echo $data['nm_produk']; ?> </center></th> </tr><br>
					</div>
				</div><tr> <td> <img class="spangambar" src="../../img/produk/<?php echo $data['gambar'] ; ?> " alt="Foto" >
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
