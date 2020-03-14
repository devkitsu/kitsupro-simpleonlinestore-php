<?php

include "../lib/koneksi.php";

$kd = $_POST['kd_produk'];
$kat = $_POST['kategori'];
$nm = $_POST['nm_produk'];
$det = $_POST['detail'];
$hrg = $_POST['harga'];
$stk = $_POST['stok'];

$target = '../img/produk/' ;
$sumber = $_FILES['gambar']['tmp_name'];
$gambar = $_FILES['gambar']['name'];
$file = move_uploaded_file($sumber, $target.$gambar);

$query = "INSERT INTO tb_produk (kd_produk,kd_kategori,nm_produk,detail,harga,gambar,stok)
						VALUES ('$kd','$kat','$nm','$det','$hrg','$gambar','$stk') ";
mysql_query($query, $koneksi)  or die ("SQL Error".mysql_error());
if ($query){
	echo "<script> alert('Data berhasil disimpan dan Gambar berhasil diupload');
		  document.location.href='data_produk.php' </script>" ;
}else{
	echo "<script> alert('Data gagal disimpan dan Gambar gagal diupload');
		  document.location.href='data_produk_tambah.php' </script>";
}
