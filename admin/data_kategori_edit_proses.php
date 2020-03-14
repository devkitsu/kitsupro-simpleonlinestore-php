<?php
include "../lib/koneksi.php";
extract($_POST);
extract($_FILES);
$sumber = $_FILES['gambar']['tmp_name'];
$target = '../img/kategori/' ;
$nama_gambar = $_FILES['gambar']['name'];
if (move_uploaded_file($sumber, $target.$nama_gambar)){
	$query = mysql_query ("UPDATE tb_kategori SET nm_kategori = '$nm_kategori',
								gambar = '$nama_gambar' where kd_kategori = '$kode'") ;
	echo "<script> alert('Data berhasil disimpan dan Gambar berhasil diupload');
		  document.location.href='data_kategori.php' </script>" ;
	}else{
	$query = mysql_query ("UPDATE tb_kategori SET nm_kategori = '$nm_kategori'
								where kd_kategori = '$kode'") ;
	echo "<script> alert('Data berhasil disimpan');
		document.location.href='data_kategori.php' </script>" ;
	}
