<?php
	include "../lib/koneksi.php";
	session_start();
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
	<h1 align="center" style="margin-top: 50px;margin-bottom: 50px;font-family: Web-Segoe-SemiBold ;color:#000;"> FORM TAMBAH KATEGORI </h1>
		<div class="table-responsive">
		<?php
			$carikode = mysql_query('SELECT max(kd_kategori) from tb_kategori') or die (mysql_error());
			$datakode = mysql_fetch_array($carikode);
			if($datakode){
				$nilaikode = substr($datakode[0], 3);
				$kode = (int) $nilaikode;
				$kode = $kode + 1;
				$hasilkode = "KAT".str_pad($kode, 3 , "0" , STR_PAD_LEFT);
			}else{
				$hasilkode = "KAT001";
			}
		?>
			<form action="data_kategori_tambah_proses.php" method="post" enctype="multipart/form-data">
			<table class="table" align="center">
				<tr>
						<th> Kode</th>
						<td>  : </td>
						<td> <input type="text" name="kode" value="<?php echo $hasilkode; ?>" readonly required > </td>
				</tr>
				<tr>
						<th> Nama Kategori </th>
						<td>  : </td>
						<td> <input type="text" name="nm_kategori" required> </td>
				</tr>
				<tr>
						<th> Gambar </th>
						<td>  : </td>
						<td> <input type="file" name="gambar" >  <b>Harap Pilih Gambar Ukuran min. 200x200px</b> </td>
				</tr>
				<tr>
						<td> </td>
						<td> </td>
						<td> <button class="btn-danger btn-sm" type="submit"> Submit </button> </td>
				</tr>
			</table>
			</form>
		</div>
	</body>
</html>
