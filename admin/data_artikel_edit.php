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
	<h1 align="center" style="margin-top: 50px;margin-bottom: 50px;font-family: Web-Segoe-SemiBold ;color:#000;"> FORM EDIT ARTIKEL </h1>
		<div class="table-responsive">
		<?php
			$id_mobil = $_GET['id'];
			$query = mysql_query("SELECT * from tb_artikel where id_artikel = '$id_mobil' ") ;
			$data = mysql_fetch_array($query);
		?>
			<form action="data_artikel_edit_proses.php" method="post" enctype="multipart/form-data">
			<table class="table" align="center" width="700px">
				<input type="text" name="id" value="<?php echo $data['id_artikel']; ?>" hidden="hidden">
				<tr>
						<th> Judul</th>
						<td>  : </td>
						<td> <input type="text" name="judul" value="<?php echo $data['judul']; ?>" > </td>
				</tr>
				<tr>
						<th> Isi Konten </th>
						<td>  : </td>
						<td> <TEXTAREA type="text" name="detail" style="width: 100% ;height: auto;" > <?php echo $data['isi']; ?> </TEXTAREA>  </td>
				</tr>
				<tr>
						<th> Gambar </th>
						<td>  : </td>
						<td>  <input type="file" name="gambar" >  <?php echo $data['gambar']; ?></td>
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
