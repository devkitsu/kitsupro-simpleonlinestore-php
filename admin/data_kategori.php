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
					<a class="btn-secondary btn-sm" href="data_kategori_tambah.php"> Tambah</a>
					<tr>
						<th> No </th>
						<th> Kode </th>
						<th> Nama Kategori </th>
						<th> Gambar </th>
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

					$ambildatamobil = mysql_query("SELECT * from tb_kategori LIMIT $posisi, $batas") ;
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
						<td> <?php echo $data['kd_kategori'];    ?> </td>
						<td> <?php echo $data['nm_kategori'];    ?> </td>
						<td> <img width="100px" height="75px" src="../img/kategori/<?php echo $data['gambar']; ?> ">       </td>
						<td> <a class="btn-1 btn-sm" href="data_kategori_edit.php?kd_kategori=<?php echo $data['kd_kategori'];?> "> Edit</a>
							 <a class="btn-2 btn-sm" href="data_kategori_hapus.php?kd_kategori=<?php echo $data['kd_kategori']; ?>" onClick="return confirm('Apakah anda ingin menghapus kategori <?php echo $data['nm_kategori']; ?>? ')"> Hapus </a> </td>
					</tr>
				<?php $no++;} } ?> <!-- PHP TUTUP -->
				</table>
				</div>
				<div style="margin:5px 0px 10px 25px; float:left;">
				<?php
				$jml = mysql_num_rows(mysql_query("SELECT * from tb_kategori"));
				echo "Jumlah Data : <b>".$jml."</b>";
				?>
				</div>
				<div style="margin:5px 25px 50px 0px; float:right;">
				<?php
				$jml_hal = ceil($jml / $batas);
				for($i=1; $i<=$jml_hal;$i++){
					if($i != $hal){
						echo "<a href='datamobil.php?hal=$i'><button class='btn-pagination1'>$i</button> </a>";
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
		  location.href='../login.php';
		  </script>";
		exit();
}
?>
