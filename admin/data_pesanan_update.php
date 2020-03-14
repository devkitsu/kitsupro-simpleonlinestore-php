<?php

include '../lib/koneksi.php';
session_start();

$kd = $_GET['id'];

$query = mysql_query(" UPDATE tb_pesanan SET id_admin='$_SESSION[id_admin]', status='dikirim' where kd_pesanan = '$kd'") ;

if ($query) {
	echo "<script> alert('Pesanan berhasil diverifikasi !');
		  document.location.href = 'data_pesanan.php' </script>" ;
}else{
	echo "<script> alert('Pesanan gagal diverifikasi !');
		  document.location.href = 'data_pesanan.php' </script>" ;
}


?>
