<?php

include "../lib/koneksi.php";
session_start();

$sql="SELECT * FROM  tb_admin WHERE username='" . $_SESSION['username'] . "'";
$qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);

$id = $_POST['id'];
$nm = $_POST['judul'];
$det = $_POST['detail'];
$tgl = date("Y-m-d h:i:sa");
$adm = $data['id_admin'];

$target = '../img/artikel/' ;
$sumber = $_FILES['gambar']['tmp_name'];
$gambar = $_FILES['gambar']['name'];
if (move_uploaded_file($sumber, $target.$gambar)){
	$query = "UPDATE tb_artikel SET id_admin='$adm',judul='$nm',isi='$det',gambar='$gambar',tanggal='$tgl'
				WHERE id_artikel='$id'";
	mysql_query($query, $koneksi)  or die ("SQL Error".mysql_error());
	echo "<script> alert('Data berhasil disimpan dan Gambar berhasil diupload');
		document.location.href='data_artikel.php' </script>" ;
}else{
	$query = "UPDATE tb_artikel SET id_admin='$adm',judul='$nm',isi='$det',tanggal='$tgl'
				WHERE id_artikel='$id'";
	mysql_query($query, $koneksi)  or die ("SQL Error".mysql_error());
	echo "<script> alert('Data berhasil disimpan');
		  document.location.href='data_artikel.php' </script>";
}
