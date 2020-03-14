<?php

include '../../lib/koneksi.php';
session_start();

$kd = $_GET['id'];

$query = mysql_query(" UPDATE tb_pesanan SET status='selesai' where kd_pesanan = '$kd'") ;

if ($query) {
	echo "<script> alert('Pesanan berhasil diverifikasi !');
		  document.location.href = 'transaksi.php' </script>" ;
}else{
	echo "<script> alert('Pesanan gagal diverifikasi !');
		  document.location.href = 'transaksi.php' </script>" ;
}


?>
