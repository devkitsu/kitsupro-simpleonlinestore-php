<?php
  include('../../lib/koneksi.php');
  session_start();
  $idBarang = $_GET['kd_produk'];
  $idUser = $_GET['id_member'];

  $query = mysql_query("SELECT harga FROM tb_produk WHERE kd_produk='$idBarang'");
  $data = mysql_fetch_array($query);
  $harga = $data['harga'];

  $query2 = mysql_query("SELECT kd_produk FROM tb_keranjang WHERE kd_produk='$idBarang' and id_member='$idUser'");
  $data2 = mysql_num_rows($query2);

if($data2==0){
  $queryInsert = mysql_query("INSERT INTO tb_keranjang (id_member, kd_produk, harga, jumlah) VALUES ('$idUser','$idBarang','$harga',1)");

  if($queryInsert){

          $query3 = mysql_query("SELECT harga,jumlah FROM tb_keranjang WHERE kd_produk='$idBarang'")
                  or die ("SQL Error".mysql_error());
          $data3 = mysql_fetch_array($query3);
          $totalhrg = $data3['harga']*$data3['jumlah'];

          $query4 = mysql_query("UPDATE tb_keranjang SET total='$totalhrg' WHERE kd_produk='$idBarang'")
                  or die ("SQL Error".mysql_error());
    header('location:keranjang.php');
  }
}else{
    $queryInsert = mysql_query("UPDATE tb_keranjang SET jumlah= jumlah+1 WHERE kd_produk='$idBarang' and id_member='$idUser'");

    if($queryInsert){
      header('location:keranjang.php');
    }
}



 ?>
