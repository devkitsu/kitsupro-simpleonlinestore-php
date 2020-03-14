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
	<h1 align="center" style="margin-top: 50px;margin-bottom: 50px;font-family: Web-Segoe-SemiBold ;color:#000;"> FORM TAMBAH ARTIKEL </h1>
		<div class="table-responsive">
			<form action="data_artikel_tambah_proses.php" method="post" enctype="multipart/form-data">
			<table class="table" align="center" width="700px">
				<tr>
						<th> Judul</th>
						<td>  : </td>
						<td> <input type="text" name="judul" required> </td>
				</tr>
				<tr>
						<th> Isi Konten</th>
						<td>  : </td>
						<td> <textarea name="detail" required>Konten</textarea> </td>
				</tr>
				<tr>
						<th> Gambar </th>
						<td>  : </td>
						<td> <input type="file" name="gambar" required>  </td>
				</tr>
				<tr>
						<th> Admin</th>
						<td>  : </td>
						<td> <input type="text" name="admin" value="<?php echo $_SESSION['username'];?>" readonly required> </td>
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
