<?php
include "../lib/koneksi.php";
extract($_POST);
$query = mysql_query("UPDATE tb_admin SET nama = '$nama_user', jk = '$jk_user',
						 alamat = '$alamat_user', kontak = '$notelp_user',
						 password = MD5('$pass') WHERE id_admin = '$id_user'") ;
if($query){
	echo "<script> alert('Data berhasil disimpan');
	document.location.href='index_admin.php' </script>" ;

}else{
	echo "<script> alert('Data gagal disimpan');
	document.location.href='index_admin.php' </script>" ;
}

?>
