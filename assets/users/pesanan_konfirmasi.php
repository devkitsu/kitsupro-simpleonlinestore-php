<?php

include "../../lib/koneksi.php";
session_start();

$sql="SELECT * FROM  tb_pesanan WHERE id_member='" . $_SESSION['id_member'] . "'";
$qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);

$adm = $_POST['id_beli'];

$target = '../../img/konfirmasi/' ;
$sumber = $_FILES['gambar']['tmp_name'];
$gambar = $_FILES['gambar']['name'];
$file = move_uploaded_file($sumber, $target.$gambar);

$query = "UPDATE tb_pesanan set gambar='$gambar', status='lunas' where kd_pesanan='$adm' ";
mysql_query($query, $koneksi)  or die ("SQL Error".mysql_error());
if ($query){
	echo "<script> alert('Konfirmasi Pembayaran Berhasil');
		  document.location.href='transaksi.php' </script>" ;
}else{
	echo "<script> alert('Konfirmasi Pembayaran Gagal');
		  document.location.href='transaksi.php' </script>";
}
