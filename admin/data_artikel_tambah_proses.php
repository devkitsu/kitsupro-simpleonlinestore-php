<?php

include "../lib/koneksi.php";
session_start();

$sql="SELECT * FROM  tb_admin WHERE username='" . $_SESSION['username'] . "'";
$qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);

$nm = $_POST['judul'];
$det = $_POST['detail'];
$tgl = date("Y-m-d h:i:sa");
$adm = $data['id_admin'];

$target = '../img/artikel/' ;
$sumber = $_FILES['gambar']['tmp_name'];
$gambar = $_FILES['gambar']['name'];
$file = move_uploaded_file($sumber, $target.$gambar);

$query = "INSERT INTO tb_artikel (id_admin,judul,isi,gambar,tanggal)
						VALUES ('$adm','$nm','$det','$gambar','$tgl') ";
mysql_query($query, $koneksi)  or die ("SQL Error".mysql_error());
if ($query){
	echo "<script> alert('Data berhasil disimpan dan Gambar berhasil diupload');
		  document.location.href='data_artikel.php' </script>" ;
}else{
	echo "<script> alert('Data gagal disimpan dan Gambar gagal diupload');
		  document.location.href='data_artikel_tambah.php' </script>";
}
