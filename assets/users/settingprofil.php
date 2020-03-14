<?php
	include "../../lib/koneksi.php";
	session_start();
	if($_SESSION['roles'] == 'user'){
		$id_show = $_SESSION['id_member'] ;
		$ambildata = mysql_query("SELECT * from tb_member where id_member='$id_show' ") ;
		$row2 = mysql_fetch_array($ambildata);

?>
<?php
include("inc.header.php");
?><br>
				<!-- PEMANGGILAN DATA -->
			<div class="center" align="center">
			<div id="content" name="content"  style="float: none;">
				<div class="contentheader"> Setting Profil</div>
				<div class="contentbody" align="center">
				<form name="setting" method="post" action="settingprofil_proses.php">
				<div class="table-responsive">
				<table class="table">
					<tr>
						<th> ID Member </th>
						<td>  : </td>
						<td style="width: 250px;">
							 <input type="text" name="id" value="<?php echo $row2['id_member'] ?>" readonly>  </td>
					</tr>
					<tr>
						<th> Nama Lengkap</th>
						<td>  : </td>
						<td> <input type="text" name="nama_user" value="<?php echo $row2['nama'] ?> " required>  </td>
					</tr>
					<tr>
						<th> Jenis Kelamin </th>
						<td>  : </td>
						<td>
							<?php
								if($row2['jk'] == "L"){
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
						<td> <input type="text" rows="10" cols="30" name="alamat_user" value="<?php echo $row2['alamat'] ?>"required>
						</td>
					</tr>
					<tr>
						<th> No Telp </th>
						<td>  : </td>
						<td> <input type="text" maxlength="12" name="notelp_user" value="<?php echo $row2['kontak'] ?> " required>  </td>
					</tr>
					<tr>
						<th> Username </th>
						<td>  : </td>
						<td> <input type="text" name="uname" value="<?php echo $row2['username'] ?> " required>  </td>
					</tr>
					<tr>
						<th> Password </th>
						<td>  : </td>
						<td> <input type="password" name="pass" value="<?php echo $row2['password'] ?> " required>  </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
						<td> <button class="btn-primary btn-sm" type="submit" style="color:black;"> Submit </button></td>
					</tr>
				</table>
				</div>
				</form>
				</div>
			</div>
		</div><br><br>
			<!-- FOOTER -->
			<?php
				include("footer.php");
			?>
			<!-- FOOTER -->
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
