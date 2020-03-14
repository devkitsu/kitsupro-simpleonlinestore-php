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
				<div class="contentheader"> Setting Profil</div>
				<div class="contentbody" align="center">
				<form name="setting" method="post" action="settingprofil_proses.php">
				<table class="table"  width="700px">
					<tr>
						<th> ID</th>
						<td>  : </td>
						<td>
							 <input type="text" name="id_user" value="<?php echo $row['id_admin'] ?>" readonly>  </td>
					</tr>
					<tr>
						<th> Nama Lengkap</th>
						<td>  : </td>
						<td> <input type="text" name="nama_user" value="<?php echo $row['nama'] ?> " required>  </td>
					</tr>
					<tr>
						<th> Jenis Kelamin </th>
						<td>  : </td>
						<td> <?php
								if($row['jk'] == "L"){
									echo "
									<label>
									<input type='radio' name='jk_user' value='L' style='width: auto;' checked='true' required>Laki-laki
							   		</label>
							   		<label>
							 		<input type='radio' name='jk_user' value='P' style='width: auto;' required> Perempuan
							 		</label>";
								}else{
									echo "<label>
									<input type='radio' name='jk_user' value='L' style='width: auto;' required>Laki-laki
							   		</label>
							   		<label>
							 		<input type='radio' name='jk_user' value='P' style='width: auto;' checked='true' required> Perempuan
							 		</label>";
								}
							?>
						</td>
					</tr>
					<tr>
						<th> Alamat </th>
						<td>  : </td>
						<td> <textarea type="text" name="alamat_user" required>
							 <?php echo $row['alamat'] ?>  </textarea>
						</td>
					</tr>
					<tr>
						<th> No Telp </th>
						<td>  : </td>
						<td> <input type="text" maxlenght="12" name="notelp_user" value="<?php echo $row['kontak'] ?> " required>  </td>
					</tr>
					<tr>
						<th> Password </th>
						<td>  : </td>
						<td> <input type="password" name="pass" value="<?php echo $row['password'] ?> " required>  </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
						<td> <button class="btn-danger btn-sm" type="submit"> Simpan </button></td>
					</tr>
				</table>
				</form>
				</div>
			</div>
			<!-- ISI CONTENT  -->
		</body>
</html>

<?php
}else {
	echo "<script> alert('Forbidden Access');
		  location.href='../../index.php';
		  </script>";
		exit();
}
?>
