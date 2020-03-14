<?php
	include '../../lib/koneksi.php';
	session_start();
	if($_SESSION['roles'] == "user"){

		$id_show = $_SESSION['id_member'] ;
		$ambildata = mysql_query("SELECT * from tb_member where id_member='$id_show' ") ;
		$row2 = mysql_fetch_array($ambildata);

		$query = mysql_query("SELECT * from tb_pesanan where id_member = '$id_show' ");
		$data2 = mysql_fetch_array($query)
?>

<?php
include("inc.header.php");
?><br>
		<div id="menumobil">
			<div class="judulmenu"> Daftar Pesanan </div>
		</div>
		<br>
		<div class="table-responsive" >
			<tr><a style="float:left; margin-left:62px" href="../laporan/pesanan_cetak.php?id=<?php echo $data2['id_member']?>" target="_blank" class='konfirmasi'>CETAK PESANAN</a>
			</tr><br><br>
			<form method="post" action="pesanan_konfirmasi.php" enctype="multipart/form-data">
			<table class="table" align="center" width="90%">
				<tr>
					<th align="center"> ID PESANAN </th>
					<th align="center"> TGL TRANSAKSI </th>
					<th align="center"> TOTAL HARGA </th>
					<th align="center" width="22%"> LAMPIRAN </th>
					<th align="center" width="16%"> STATUS PESANAN </th>
					<th align="center"> AKSI </th>
				</tr>

				<?php
				$querycash = mysql_query("SELECT * from tb_pesanan where id_member = '$id_show' ");

				// $datacash = mysql_fetch_array($querycash);
				// $querybiodata = mysql_query("SELECT * from tb_bio where id_user = '$id_show' ");
				// $databiodata = mysql_fetch_array($querybiodata);

				while($data1 = mysql_fetch_array($querycash)){
				$barang = $data1['daftar_produk'];
				$tanggal = date("d/m/y");
				?>
				<tr >
					<td><input type="text" class="input-responsive" name="id_beli" value="<?php echo $data1['kd_pesanan'];?>"
					readonly="true"</td>
					<td><input type="text" class="input-responsive" name="tgl_beli" value="<?php echo $tanggal ; ?>" readonly="true"> </td>
					<td><input type="text" class="input-responsive" name="harga_mobil" value="Rp. <?php echo number_format($data1['total'],0,",",".");?>"
					readonly="true">
				</td>
				<td><?php
				if($data1['gambar'] == null){
					echo "<input type=\"file\" class=\"input-responsive\" name=\"gambar\">";
				} else{
					echo "<input type=\"text\" class=\"input-responsive\" name=\"gambar\" align=\"center\" value=\"Sudah Upload Bukti Bayar\">";
				}?>
				</td>
					<td >
						<input type="text" class="input-responsive" name="status" value="<?php echo $data1['status']?>"
					readonly="true">
					</td>
					<td width="20%">
						<a href="pesanan_lihat.php?id=<?php echo $data1['kd_pesanan']?>" class='konfirmasi'>LIHAT</a><br><br>
						<?php
						if ($data1['status'] == "belum bayar") {
								echo "<button class=\"btn btn-beli\" style=\"color:black\">KONFIRMASI PEMBAYARAN</a> ";
							} else if ($data1['status'] == "dikirim") {
								echo "<a href=\"pesanan_sampai.php?id=$data1[kd_pesanan]\" class=\"konfirmasi\" >PESANAN SAMPAI</a>";
							}
						?>
					</td>
				</tr>
				<?php } ?>
			</table>
			</form>
		</div>

		*Ketentuan & Cara Pembayaran :
			<ul type="disc">
			<li>Setelah transaksi silahkan transfer ke Rekening <b> 0136940328102 (BRI) atau 849201856923 (MANDIRI)</b>.</li>
			<li>Jika sudah transfer maka lakukan kofirmasi pembayaran.</li>
			<li>Cetak bukti transaksi.</li>
			<li>Barang akan dikirim jika admin sudah verifikasi pembayaran anda.</li>
			<li>Lakukan konfirmasi jika barang sudah sampai.</li>
		</ul><br><br>

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
		echo "<script> alert('Forbidden Access') ;
		document.location.href='../../index.php' </script> " ;
		exit();
	}
?>
