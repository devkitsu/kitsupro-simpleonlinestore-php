<?php

include '../lib/koneksi.php';

$kd_produk = $_GET['id'];

$query = mysql_query("DELETE FROM tb_produk where kd_produk = '$kd_produk'") ;

if ($query) {
	echo "<script> alert('Data berhasil dihapus !');
		  document.location.href = 'data_produk.php' </script>" ;
}else{
	echo "<script> alert('Data gagal dihapus !');
		  document.location.href = 'data_produk.php' </script>" ;
}


?>
