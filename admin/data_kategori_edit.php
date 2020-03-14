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
	<h1 align="center" style="margin-top: 50px;margin-bottom: 50px;font-family: Web-Segoe-SemiBold ;color:#000;"> FORM EDIT KATEGORI </h1>
		<div class="table-responsive">
		<?php
			$kd_kategori = $_GET['kd_kategori'];
			$query = mysql_query("SELECT * from tb_kategori where kd_kategori = '$kd_kategori' ") ;
			$data = mysql_fetch_array($query);
		?>
			<form action="data_kategori_edit_proses.php" method="post" enctype="multipart/form-data">
			<table class="table" align="center">
				<tr>
						<th> Kode </th>
						<td>  : </td>
						<td> <input type="text" name="kode" value="<?php echo $data['kd_kategori']; ?>" readonly  >
						</td>
				</tr>
				<tr>
						<th> Nama Kategori </th>
						<td>  : </td>
						<td> <input type="text" name="nm_kategori" value="<?php echo $data['nm_kategori']; ?>" > </td>
				</tr>
				<tr>
						<th> Gambar </th>
						<td>  : </td>
						<td>  <input type="file" name="gambar" >  <?php echo $data['gambar']; ?> <br><b>Harap Pilih Gambar Ukuran min. 200x200px</b></td>
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
