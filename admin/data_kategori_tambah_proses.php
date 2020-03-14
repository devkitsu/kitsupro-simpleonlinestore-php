<?php
include "../lib/koneksi.php";
extract($_POST);
extract($_FILES);
$sumber = $_FILES['gambar']['tmp_name'];
$target = '../img/kategori/' ;
$nama_gambar = $_FILES['gambar']['name'];

$query = mysql_query ('INSERT INTO tb_kategori (kd_kategori,nm_kategori,gambar) VALUES
											("'.$kode.'","'.$nm_kategori.'","'.$nama_gambar.'") ');
if ($query){
	$movefile = move_uploaded_file($sumber, $target.$nama_gambar);
	if($movefile){
	echo "<script> alert('Data berhasil disimpan dan Gambar berhasil diupload');
		  document.location.href='data_kategori.php' </script>" ;
	}else{
	echo "<script> alert('Gambar gagal diupload !');
		  document.location.href='data_kategori_tambah.php' </script>";
	}
}else{
	echo "<script> alert('Data gagal disimpan dan Gambar gagal diupload');
		  document.location.href='data_kategori_tambah.php' </script>";
}
