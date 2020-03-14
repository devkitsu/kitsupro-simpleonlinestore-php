<?php
  include("../../lib/koneksi.php");
  session_start();

  $kode = $_POST['kode'];
  $total = $_POST['jumlah'];
  $id = $_POST['idTrolly'];

  $query = mysql_query("UPDATE tb_keranjang SET jumlah='$total', total='$total' WHERE kd_produk='$kode'")
            or die ("SQL Error".mysql_error());

        $query2 = mysql_query("SELECT harga,jumlah FROM tb_keranjang WHERE id_keranjang='$id' and kd_produk='$kode'");
        $data = mysql_fetch_array($query2);
        $totalhrg = $data['harga']*$data['jumlah'];

        $query3 = mysql_query("UPDATE tb_keranjang SET total='$totalhrg' WHERE id_keranjang='$id' and kd_produk='$kode'")
                or die ("SQL Error".mysql_error());
  if($query3){
    header('location:keranjang.php');
  }
 ?>
