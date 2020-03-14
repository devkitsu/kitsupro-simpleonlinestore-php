<?php

include '../../lib/koneksi.php';
session_start();

$kd = $_GET['id'];
$query = mysql_query(" SELECT *  FROM tb_pesanan where kd_pesanan = '$kd'") ;

?>
<body onload="window.print();" Layout="Landscape">
<center><h3>LAPORAN DATA PESANAN</h3></center>
<table border=1 width=100% align="center">
<thead>
		<tr>
			<th>No</th>
			<th>Kode Pesanan</th>
			<th>ID Member</th>
			<th>Daftar Produk</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Status</th>
		</tr>
	</thead>
<tbody>
<?php
	$sql = mysql_query("SELECT * from tb_pesanan where status!='belum bayar' and id_member='$kd' order by kd_pesanan") or die ("SQL Error".mysql_error());;

	$no =0;
	while ($data=mysql_fetch_array($sql)) {
	$no++;
    $pesan=$data['kd_pesanan'];
	$sql2 = mysql_query("SELECT id_member FROM tb_pesanan where kd_pesanan='$pesan' ORDER BY kd_pesanan")
			or die ("SQL Error".mysql_error());
			$data2=mysql_fetch_array($sql2);
?>
<tr class="odd gradeX">
	<td class="center"><?php echo $no; ?></td>
	<td><?php echo $data['kd_pesanan']; ?></td>
	<td><?php echo $data2['id_member']; ?></td>
	<td><?php echo $data['daftar_produk']; ?></td>
	<td><?php echo $data['tgl_beli']; ?></td>
	<td><?php echo "Rp. "; echo number_format($data['total'],0,",","."); ?></td>
	<td><?php echo $data['status']; ?></td>
</tr>
	<?php
	}
	?>
</tbody>
</table>
</body>
