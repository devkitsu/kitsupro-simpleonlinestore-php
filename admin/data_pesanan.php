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
					<tr>
						<th> No </th>
						<th> ID Pesanan </th>
						<th> Nama Member </th>
						<th> Tgl Beli </th>
						<th> Lampiran </th>
						<th> Status </th>
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

					$ambildatapembeli = mysql_query("SELECT * from tb_pesanan order by kd_pesanan LIMIT $posisi,$batas ") ;
					$no = 1 + $posisi;
					while($data = mysql_fetch_array($ambildatapembeli)){
					$id_user = $data['id_member'];
					$ambilbiodatapembeli = mysql_query("SELECT * from tb_member where id_member = $id_user ");
					$data2 = mysql_fetch_array($ambilbiodatapembeli);
				?>
				<!-- SCRIPT PHP -->
					<tr>
						<td> <?php echo $no; ?> </td>
						<td> <?php echo $data['kd_pesanan'];    ?> </td>
						<td> <?php echo $data2['nama']; ?> </td>
						<td> <?php echo $data['tgl_beli'];  ?> </td>
						<td> <img width="100px" height="75px" src="../img/konfirmasi/<?php echo $data['gambar']; ?> "> </td>
						<td> <?php echo $data['status']; ?> </td>
						<td>
							<a class="btn-2 btn-sm" href="data_pesanan_lihat.php?id=<?php echo $data['kd_pesanan']; ?>" > Lihat </a><br><br>
							<a class="btn-2 btn-sm" href="data_pesanan_update.php?id=<?php echo $data['kd_pesanan']; ?>" > konfirmasi </a><br><br>
							 <a class="btn-2 btn-sm" href="data_pesanan_hapus.php?id=<?php echo $data['kd_pesanan']; ?>" onClick="return confirm('Apakah anda ingin menghapus pesanan <?php echo $data['kd_pesanan']; ?>? ')"> Hapus </a> </td>
					</tr>
				<?php $no++; } ?> <!-- PHP TUTUP -->
				</table>
				</div>

				<!-- PAGINATION -->
				<div style="margin:5px 0px 0px 0px; float:left;">
				<?php
				$jml = mysql_num_rows(mysql_query("SELECT * from tb_member"));
				echo "Jumlah Data : <b>".$jml."</b>";
				?>
				</div>
				<div style="margin:5px 25px 50px 0px; float:right;">
				<?php
				$jml_hal = ceil($jml / $batas);
				for($i=1; $i<=$jml_hal;$i++){
					if($i != $hal){
						echo "<a href='datapembeli.php?hal=$i'><button class='btn-pagination1'>$i</button> </a>";
					}else{
						echo "<button class='btn-pagination2'><b> $i</b> </button>";
					}
				}
				?>
				</div>
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
