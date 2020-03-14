<?php
	include "../lib/koneksi.php";
	session_start();
	if($_SESSION['roles'] == 'admin'){
?>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=0.1" />
	<?php
	include("inc.header.php");
	?>
		<body>
			<?php
			include("inc.head.php");
			?>
<?php
include("inc.menu.php");
?>
			<!-- ISI CONTENT  -->
			<div id="content" name="content" >
				<div class="contentheader"> Dashboard Admin</div>
				<div class="contentbody" align="center">
				<div class="table-responsive">
					<br>
					<?php
					$kd = $_GET['id'];
					$sql=mysql_query("SELECT * from tb_pesanan where kd_pesanan='$kd'");
					$row=mysql_fetch_array($sql); ?>
						<a class="fa fa-chevron-left fa-2x" href="data_pesanan.php" style="text-decoration:none"> Kembali</a>
							  <h4><?php echo $row['kd_pesanan']; ?></h4>
							  <p>ID Member: <?php echo $row['id_member']; ?></p>
							  <p>Daftar Produk: <?php echo $row['daftar_produk']; ?></p>
							  <p>Tanggal Pembelian: <?php echo $row['tgl_beli']; ?></p>
							  <p>Total Harga: Rp. <?php echo number_format ($row['total'],0,",","."); ?></p>
							  <p>Status Pembayaran: <?php echo $row['status']; ?></p>
							  <p>Bukti Pembayaran</p>
							    <img style="align:top;margin-right:20px;"src="../img/konfirmasi/<?php echo $row['gambar'] ; ?>" height="300" class="image-rounded" width="auto" />
								<br><br>
				</div>
			</div>
			<!-- ISI CNTENT  -->
		</body>
</html>

<?php
}else {
	echo "<script> alert('Forbidden Access');
		  location.href='../index.php';
		  </script>";
		exit();
}
?>
