<?php
include '../lib/koneksi.php';
?>
<style type="text/css">
td, th{
	text-align: center;
}
</style>
<?php if(isset($_GET['member'])){ ?>

<body onload="window.print();" Layout="Portrait">
<center><h3>LAPORAN DATA MEMBER</h3></center>
<table border=1 width=100% align="center">
<thead>
		<tr>
			<th>No</th>
			<th>ID</th>
			<th>Username</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>JK</th>
			<th>Kontak</th>
		</tr>
	</thead>
<tbody>
<?php
	$sql = "SELECT * FROM tb_member ORDER BY id_member";
	$qry = mysql_query($sql, $koneksi)
		or die ("SQL Error".mysql_error());
		$no = 0;
	while ($data=mysql_fetch_array($qry)) {
	$no++;
?>
<tr class="odd gradeX">
	<td class="center"><?php echo $no; ?></td>
	<td><?php echo $data['id_member']; ?></td>
	<td><?php echo $data['username']; ?></td>
	<td><?php echo $data['nama']; ?></td>
	<td><?php echo $data['alamat']; ?></td>
	<td><?php echo $data['jk']; ?></td>
	<td><?php echo $data['kontak']; ?></td>
</tr>
</tr>
</tr>
	<?php
	}
	?>
</tbody>
</table>
</body>
<?php } ?>

<?php if(isset($_GET['produk'])){ ?>
<body onload="window.print();" Layout="Portrait">
<center><h3>LAPORAN DATA BARANG</h3></center>
<table border=1 width=100% align="center">
<thead>
		<tr>
			<th>No</th>
			<th>Kode Produk</th>
			<th>Kategori</th>
			<th>Nama Barang</th>
			<th>Detail</th>
			<th>Harga</th>
			<th>Stok</th>
		</tr>
	</thead>
<tbody>
<?php
	$sql = mysql_query("SELECT * FROM tb_produk ORDER BY kd_produk")
			or die ("SQL Error".mysql_error());
	$no = 0;
	while ($data=mysql_fetch_array($sql)) {
	$no++;

	$kategori=$data['kd_kategori'];
	$sql2 = mysql_query("SELECT nm_kategori FROM tb_kategori where kd_kategori='$kategori' ORDER BY kd_kategori")
			or die ("SQL Error".mysql_error());
			$data2=mysql_fetch_array($sql2);
?>
<tr class="odd gradeX">
	<td class="center"><?php echo $no; ?></td>
	<td><?php echo $data['kd_produk']; ?></td>
	<td><?php echo $data2['nm_kategori']; ?></td>
	<td><?php echo $data['nm_produk']; ?></td>
	<td><?php echo $data['detail']; ?></td>
	<td>RP. <?php echo number_format($data['harga'],0,",",","); ?></td>
	<td><?php echo $data['stok']; ?></td>
</tr>
	<?php
	}
	?>
</tbody>
</table>
</body>
<?php } ?>


<?php if(isset($_GET['pesanan'])){ ?>
<body onload="window.print();" Layout="Landscape">
<center><h3>LAPORAN DATA PESANAN</h3></center>
<table border=1 width=100% align="center">
<thead>
		<tr>
			<th>No</th>
			<th>Kode Pesanan</th>
			<th>ID Member</th>
			<th>ID Admin</th>
			<th>Daftar Produk</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Status</th>
		</tr>
	</thead>
<tbody>
<?php
	$sql = mysql_query("SELECT * from tb_pesanan order by kd_pesanan") or die ("SQL Error".mysql_error());;

	$no =0;
	while ($data=mysql_fetch_array($sql)) {
	$no++;

	$member=$data['id_member'];
	$admin=$data['id_admin'];
	$pesan=$data['kd_pesanan'];
	$sql2 = mysql_query("SELECT id_member, id_admin FROM tb_pesanan where kd_pesanan='$pesan' ORDER BY kd_pesanan")
			or die ("SQL Error".mysql_error());
			$data2=mysql_fetch_array($sql2);
?>
<tr class="odd gradeX">
	<td class="center"><?php echo $no; ?></td>
	<td><?php echo $data['kd_pesanan']; ?></td>
	<td><?php echo $data2['id_member']; ?></td>
	<td><?php echo $data2['id_admin']; ?></td>
	<td><?php echo $data['daftar_produk']; ?></td>
	<td><?php echo $data['tgl_beli']; ?></td>
	<td><?php echo $data['total']; ?></td>
	<td><?php echo $data['status']; ?></td>
</tr>
	<?php
	}
	?>
</tbody>
</table>
</body>
<?php } ?>
