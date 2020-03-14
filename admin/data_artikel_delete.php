<?php

include '../lib/koneksi.php';

$id_artikel = $_GET['id'];

$query = mysql_query("DELETE FROM tb_artikel where id_artikel = '$id_artikel'") ;

if ($query) {
	echo "<script> alert('Data berhasil dihapus !');
		  document.location.href = 'data_artikel.php' </script>" ;
}else{
	echo "<script> alert('Data gagal dihapus !');
		  document.location.href = 'data_artikel.php' </script>" ;
}


?>
