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
				<table>
				<tr>
					<td> <a class="btn-1" href="laporan.php?member" target="_blank"> CETAK DATA MEMBER
					</a></td>
					<td> <a class="btn-2" href="laporan.php?produk" target="_blank"> CETAK DATA BARANG
					</a> </td>
					<td> <a class="btn-3" href="laporan.php?pesanan" target="_blank"> CETAK DATA PESANAN
					</a> </td>
				</tr>
				<tr>
				</tr>
				</table>
				</div>
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
