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
				<table class="table">
					<br>
					<a class="btn-secondary btn-sm" href="data_produk_tambah.php"> Tambah</a>
					<tr>
						<th> No </th>
						<th> Kode </th>
						<th> Kategori</th>
						<th> Nama Barang </th>
						<th> Detail </th>
						<th> Harga </th>
						<th> Gambar </th>
						<th> Stok </th>
						<th> Aksi </th>
					</tr>

				<!-- SCRIPT PHP -->

				<?php
					// PAGINATION
					$no = 1;
					$batas = 5;
					$hal = @$_GET['hal'];
					if(empty($hal)){
						$posisi = 0;
						$hal = 1;
					}else{
						$posisi = ($hal - 1) * $batas;
					}

					$ambildatamobil = mysql_query("SELECT tb_produk.*, tb_kategori.kd_kategori,tb_kategori.nm_kategori from tb_produk, tb_kategori
													where tb_produk.kd_kategori=tb_kategori.kd_kategori LIMIT $posisi, $batas") ;
					$no = $posisi + 1;
					$cek = mysql_num_rows($ambildatamobil);
					if($cek < 1){
						echo "DATA TIDAK DITEMUKAN";
					}else{
					while($data = mysql_fetch_array($ambildatamobil)){
				?>
				<!-- SCRIPT PHP -->
					<tr>
						<td> <?php echo $no; ?> </td>
						<td> <?php echo $data['kd_produk'];    ?> </td>
						<td> <?php echo $data['nm_kategori'];    ?> </td>
						<td> <?php echo $data['nm_produk'];    ?> </td>
						<td> <?php echo $data['detail'];    ?> </td>
						<td> Rp.<?php echo number_format($data['harga'],0,",",","); ?> </td>
						<td> <img width="100px" height="75px" src="../img/produk/<?php echo $data['gambar']; ?> ">       </td>
						<td> <?php echo $data['stok'];    ?> </td>
						<td> <a class="btn-1 btn-sm" href="data_produk_edit.php?id=<?php echo $data['kd_produk'];?> "> Edit</a>
							 <br><br>
							 <a class="btn-2 btn-sm" href="data_produk_delete.php?id=<?php echo $data['kd_produk']; ?>" onClick="return confirm('Apakah anda ingin menghapus barang bernama <?php echo $data['nm_produk']; ?>? ')"> Hapus </a> </td>
					</tr>
				<?php $no++;} } ?> <!-- PHP TUTUP -->


				</table>
				</div>
				<div style="margin:5px 0px 10px 25px; float:left;">
				<?php
				$jml = $cek;
				echo "Jumlah Data : <b>".$jml."</b>";
				?>
				</div>
				<div style="margin:5px 25px 50px 0px; float:right;">
				<?php
				$jml_hal = ceil($jml / $batas);
				for($i=1; $i<=$jml_hal;$i++){
					if($i != $hal){
						echo "<a href='data_produk.php?hal=$i'><button class='btn-pagination1'>$i</button> </a>";
					}else{
						echo "<button class='btn-pagination2'><b> $i</b> </button>";
					}
				}
				?>

				</div>

				</div>

			</div>

			<!-- ISI CONTENT  -->
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
