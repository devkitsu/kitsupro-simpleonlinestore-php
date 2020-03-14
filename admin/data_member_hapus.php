<?php
include '../lib/koneksi.php';
$id_member = $_GET['id_member'];
$query = mysql_query("DELETE FROM tb_member where id_member = '$id_member'") ;
if ($query) {
	echo "<script> alert('Data berhasil dihapus !');
		  document.location.href = 'data_member.php' </script>" ;
}else{
	echo "<script> alert('Data gagal dihapus !');
		  document.location.href = 'data_member.php' </script>" ;
}
?>
