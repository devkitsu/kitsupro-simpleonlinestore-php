<?php

include "../../lib/koneksi.php";
extract($_POST);

$query = mysql_query("UPDATE tb_member SET nama = '$nama_user',
						 jk = '$jk_user',
						 alamat = '$alamat_user',
						 kontak = '$notelp_user',
						 username = '$uname',
						 password = '$pass'
						 WHERE id_member = '$id'") ;
if($query){
	echo "<script> alert('Data berhasil disimpan');
	document.location.href='index_member.php' </script>" ;

}else{
	echo "<script> alert('Data gagal disimpan');
	document.location.href='settingprofil.php' </script>" ;
}

?>
