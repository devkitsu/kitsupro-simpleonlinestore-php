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
	<body>
	<h1 align="center" style="margin-top: 50px;margin-bottom: 50px;font-family: Web-Segoe-SemiBold ;color:#fff;"> FORM EDIT BARANG </h1>
		<div class="table-responsive">
		<?php
			$id_mobil = $_GET['id'];
			$query = mysql_query("SELECT * from tb_produk where kd_produk = '$id_mobil' ") ;
			$data = mysql_fetch_array($query);
		?>
			<form action="data_produk_edit_proses.php" method="post" enctype="multipart/form-data">
			<table class="table" align="center" width="700px">
				<tr>
						<th> Kode Barang </th>
						<td>  : </td>
						<td> <input type="text" name="kd_produk" value="<?php echo $data['kd_produk']; ?>" readonly  >
						</td>
				</tr>
					<tr>
							<th> Kode Kategori </th>
							<td>  : </td>
							<td> <input type="text" name="kategori" value="<?php echo $data['kd_kategori']; ?>" readonly  >
							</td>
					</tr>
				<tr>
						<th> Nama Barang</th>
						<td>  : </td>
						<td> <input type="text" name="nm_produk" value="<?php echo $data['nm_produk']; ?>" > </td>
				</tr>
				<tr>
						<th> Detail </th>
						<td>  : </td>
						<td> <TEXTAREA type="text" name="detail" style="width: 100% ;height: auto;" > <?php echo $data['detail']; ?> </TEXTAREA>  </td>
				</tr>
				<tr>
						<th> Harga </th>
						<td>  : </td>
						<td> <input type="text" name="harga" value="<?php echo $data['harga']; ?>" >  </td>
				</tr>
				<tr>
						<th> Gambar </th>
						<td>  : </td>
						<td>  <input type="file" name="gambar" >  <?php echo $data['gambar']; ?><br> <b>Harap Pilih Gambar Ukuran min. 200x200px</b></td>
				</tr>
					<tr>
							<th> Stok </th>
							<td>  : </td>
							<td> <input type="text" name="stok" value="<?php echo $data['stok']; ?>" >
							</td>
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
