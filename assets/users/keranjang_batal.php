<?php
include('../../lib/koneksi.php');

$idTrolly = $_GET['idTrolly'];

$query = mysql_query("DELETE FROM tb_keranjang WHERE id_keranjang='$idTrolly' ");

if($query){
  header('location:keranjang.php');
}


 ?>
