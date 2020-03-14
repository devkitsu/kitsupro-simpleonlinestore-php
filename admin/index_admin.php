<?php
	include "../lib/koneksi.php";
	session_start();
	if($_SESSION['username'] == ''){
		echo "<script> alert('Forbidden Access') ;
		document.location.href='../login.php' </script> " ;
		exit();
	}
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
				<?php
				if($row['username'] == null ){
					echo "
					<h2 align='center' style=padding-top:125px;>
					<a href='settingprofil.php' style='text-decoration:none;'> SETTING PROFIL TERLEBIH DAHULU <br>[KLIK DISINI]</a>
					</h2>
					";
				}else{
					?>
				<table class="table">
					<tr>
						<th> ID</th>
						<td>  : </td>
						<td> <?php echo $row['id_admin'] ?> </td>
					</tr>
					<tr>
						<th> Nama Lengkap</th>
						<td>  : </td>
						<td> <?php echo $row['nama'] ?> </td>
					</tr>
					<tr>
						<th> Jenis Kelamin </th>
						<td>  : </td>
						<td> <?php if($row['jk'] == 'L'){ echo "Laki-laki";}else{ echo "Perempuan";} ?> </td>
					</tr>
					<tr>
						<th> Alamat </th>
						<td>  : </td>
						<td> <?php echo $row['alamat'] ?> </td>
					</tr>
					<tr>
						<th> No Telp </th>
						<td>  : </td>
						<td> <?php echo $row['kontak'] ?> </td>
					</tr>
				</table>
				<?php } ?>
				</div>
			</div>
			<!-- ISI CONTENT  -->
		</body>
</html>
