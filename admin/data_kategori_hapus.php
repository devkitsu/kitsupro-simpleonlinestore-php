<?php
include '../lib/koneksi.php';
$kd_kategori = $_GET['kd_kategori'];
$query = mysql_query("DELETE FROM tb_kategori where kd_kategori = '$kd_kategori'") ;
if ($query) {
	echo "<script> alert('Data berhasil dihapus !');
		  document.location.href = 'data_kategori.php' </script>" ;
}else{
	echo "<script> alert('Data gagal dihapus !');
		  document.location.href = 'data_kategori.php' </script>" ;
}
?>
