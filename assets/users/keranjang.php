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
			<div class="judulmenu">Keranjang</div>
		</div>
		<?php
		  $queryKeranjang = mysql_query("SELECT * FROM tb_keranjang WHERE id_member='$_SESSION[id_member]' ");
		  $jumlah = mysql_num_rows($queryKeranjang);

		  if($jumlah > 0){
			$queryTrolly = "SELECT * FROM tb_keranjang WHERE id_member='$_SESSION[id_member]'";
		  $query_trolly = mysql_query($queryTrolly,$koneksi);
		  while($arrayTrolly = mysql_fetch_array($query_trolly)){
			$queryProduk = "SELECT * FROM tb_produk WHERE kd_produk='$arrayTrolly[kd_produk]'";
		    $query_Produk = mysql_query($queryProduk,$koneksi);
			$arrayProduk = mysql_fetch_array($query_Produk);
			echo '
			  <tr>
				<td><img style="float:left; margin-right:20px;" src="../../img/produk/'.$arrayProduk['gambar'].'" height="200px" width="200px"></td>
				<td>
				  <h4><strong>'.$arrayProduk['nm_produk'].'</strong></h4>
				  <h5><strong>Harga</strong><span class="titik-harga">:</span> Rp. '.number_format($arrayProduk['harga'],0,",",".").'</h5>
				  <form action="keranjang_update.php" method="post">
				  <div class="form-group">
					  <label for="jumlah"><strong>Jumlah </strong><span class="titik-total">: &nbsp &nbsp</span></label>
					  <input type="text" name="kode" value="'.$arrayProduk['kd_produk'].'" hidden="hidden">
					  <input type="text" name="harga" value="'.$arrayProduk['harga'].'" hidden="hidden">
					  <input type="text" name="idTrolly" value="'.$arrayTrolly['id_keranjang'].'" hidden="hidden">
					  <input type="number" value="'.$arrayTrolly['jumlah'].'" name="jumlah" min="1" max="'.$arrayProduk['stok'].'" style="margin-left:-1vw">
					  <button type="submit" class="btn-beli" style="color:black;">Update</button></div>
					  <h5><strong>Total</strong><span class="titik-total">: Rp. '.number_format(($arrayTrolly['harga']*$arrayTrolly['jumlah']),0,",",".").'</span></h5>
					</form>
				  </td>
				<td><a class="btn-beli" style="color:black;" href="keranjang_batal.php?idTrolly='.$arrayTrolly['id_keranjang'].'">Batal Beli</a></td>
			  </tr><br><br><br><br><br>
			';
		  }
		  ?>
		  <tr id="total-bayar">
			<?php
			$queryTotalBayar = mysql_query("SELECT SUM(total) FROM tb_keranjang WHERE id_member='$_SESSION[id_member]'");
			$arrayTotal = mysql_fetch_array($queryTotalBayar);
			echo '
			  <td>
				<h4><strong>Total Bayar : Rp. '.number_format($arrayTotal[0],0,",",".").'</strong></h4>
			  </td>
			';
			 ?>
			<td></td>
			<td></td>
		  </tr>
		  <?php
		  $belumAda = 0;
		}else{
		  $belumAda = 1;
		  echo '
			<div class="">
			  <div class="col-xs-5" style="background: #6cd83a;height: 10vh; color:white; line-height:10vh;border-radius:10px; text-align:center">
				<p>Keranjang Masih Kosong !!!</p>
			  </div>
			</div>
			';
		  }
		 ?>
		 <?php
		 if($belumAda==0){
			 $query = mysql_query("SELECT * FROM tb_keranjang WHERE id_member='$_SESSION[id_member]' ");
   		  $data2 = mysql_fetch_array($query);
		   echo '
		   <a class="btn-beli" style="color:black;" href="pesanan_checkout.php?id_member='.$_SESSION['id_member'].'&&id_keranjang='.$data2['id_keranjang'].'">Checkout</a>
		   <a class="btn-beli" style="color:black;" href="member_produk.php">Kembali Berbelanja</a>
		  ';
		 }


		  ?>
<br>
			<div class="center">
			<h1 class="judul-ourteam"> <i class="fa fa-users"> </i>DAFTAR PRODUK</h1>
			<?php
			$query = mysql_query("SELECT * from tb_produk");
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
		</div></div>

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
