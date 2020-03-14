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
	<h1 align="center" style="margin-top: 50px;margin-bottom: 50px;font-family: Web-Segoe-SemiBold ;color:#000;"> FORM TAMBAH BARANG </h1>
		<div class="table-responsive">
			<form action="data_produk_tambah_proses.php" method="post" enctype="multipart/form-data">
			<table class="table" align="center" width="700px">
				<tr>
						<th> Kode Barang </th>
						<td>  : </td>
						<td> <input type="text" name="kd_produk" required> </td>
				</tr>
                <tr>
						<th> Kategori</th>
						<td>  : </td>
						<td>
                        <select name="kategori"><option value="">Pilih Kategori</option>
                            <?php
                            $prov = mysql_query("SELECT * FROM tb_kategori");
                            while($hasil = mysql_fetch_array($prov)){?>
                                <option value="<?php echo $hasil["kd_kategori"]?>">
                                    <?php echo $hasil["nm_kategori"]?>
                                </option>
                            <?php
                        }
                        ?>
                        </select></td>
                </tr>
				<tr>
						<th> Nama Barang </th>
						<td>  : </td>
						<td> <input type="text" name="nm_produk" required> </td>
				</tr>
				<tr>
						<th> Detail </th>
						<td>  : </td>
						<td> <textarea name="detail" required>Detail Barang</textarea> </td>
				</tr>
				<tr>
						<th> Harga </th>
						<td>  : </td>
						<td> <input type="number" name="harga" required></td>
				</tr>
				<tr>
						<th> Gambar </th>
						<td>  : </td>
						<td> <input type="file" name="gambar" >  <b>Harap Pilih Gambar Ukuran min. 200x200px</b> </td>
				</tr>
				<tr>
						<th> Stok </th>
						<td>  : </td>
						<td> <input type="number" name="stok" required> </td>
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
