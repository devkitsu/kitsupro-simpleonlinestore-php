<?php

	$user = "root" ;
	$pass = "";
	$db = "db_penjualan_meubel";
	$server = "localhost" ;


	$koneksi = mysql_connect($server,$user,$pass)
		or die ("Gagal terkoneksi ke database".mysql_error()) ;

	$pilihdb = mysql_select_db($db)
		or die ("Gagal memilih database".mysql_error()) ;



?>
