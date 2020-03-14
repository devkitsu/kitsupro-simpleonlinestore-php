<?php

include '../lib/koneksi.php';

$kd = $_GET['id'];

$query = mysql_query(" UPDATE tb_pesanan SET status='dikirim' where kd_pesanan = '$kd'") ;

if ($query) {
	echo "<script> alert('Pesanan berhasil diverifikasi !');
		  document.location.href = 'data_pesanan.php' </script>" ;
}else{
	echo "<script> alert('Pesanan gagal diverifikasi !');
		  document.location.href = 'data_pesanan.php' </script>" ;
}


?>
