<?php
	include 'lib/koneksi.php';

	extract($_POST);
	$query = mysql_query('INSERT into tb_member (id_member,username,password,nama,alamat,jk,kontak,online) VALUES ("'.$ktp.'","'.$username.'",md5("'.$password.'"),"'.$nama.'","'.$alamat.'","'.$jk.'","'.$kontak.'","0") ') ;

	if($query) {
		echo "<script>alert('Data tersimpan');
		document.location.href='login.php'</script>";
	}else{
		echo "<script>alert('Data yang anda masukkan gagal !');
		document.location.href='signup.php' </script>";
	}
 ?>
