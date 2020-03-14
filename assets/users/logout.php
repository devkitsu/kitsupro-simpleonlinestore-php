<?php
	session_start();
	include "../../lib/koneksi.php";
//ini merupakan code untuk menampilkan username berdasarkan session yang aktif
$username=$_SESSION['username'];
//untuk mengupdate field online menjadi 0
$update = mysql_query("UPDATE tb_member SET online='0' WHERE username='$username'");
//untuk mengakhiri sessionnya
session_destroy();
header("location:../../index.php");
exit();
?>
