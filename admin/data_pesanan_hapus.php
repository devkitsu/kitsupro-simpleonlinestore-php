<?php

include '../lib/koneksi.php';
$kd = $_GET['id'];
$query = mysql_query("DELETE FROM tb_pesanan where kd_pesanan = '$kd'") ;

if ($query) {
	echo "<script> alert('Data berhasil dihapus !');
		  document.location.href = 'data_pesanan.php' </script>" ;
}else{
	echo "<script> alert('Data gagal dihapus !');
		  document.location.href = 'data_pesanan.php' </script>" ;
}
?>
