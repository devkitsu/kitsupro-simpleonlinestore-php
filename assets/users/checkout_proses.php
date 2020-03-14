<?php
  include('../../lib/koneksi.php');
  session_start();

  $carikode = mysql_query("SELECT max(kd_pesanan) from tb_pesanan") or die (mysql_error());
  $datakode = mysql_fetch_array($carikode);
  if($datakode){
      $nilaikode = substr($datakode[0], 3);
      $kode = (int) $nilaikode;
      $kode = $kode + 1;
      $hasilkode = "PSN".str_pad($kode, 5 , "0" , STR_PAD_LEFT)."MB";
  }else{
      $hasilkode = "PSN00001MB";
  }

  $idUser = $_GET['id_member'];
  $total = $_GET['total'];

  $queryTrolly = mysql_query("SELECT * FROM tb_keranjang WHERE id_member='$_SESSION[id_member]'");
  $tanggal = date("Y-m-d H:i:s");

  $barang = "";
  while($data = mysql_fetch_array($queryTrolly)){
    $queryBarang = mysql_query("SELECT * FROM tb_produk WHERE kd_produk='$data[kd_produk]'");
    $arrayBarang = mysql_fetch_array($queryBarang);
    $nama = $arrayBarang['nm_produk'];
    $jumlah = $data['jumlah'];
    $jumlahBarang = $arrayBarang['stok'] - $data['jumlah'];
    $updateJumlah = mysql_query("UPDATE tb_produk SET stok='$jumlahBarang' WHERE kd_produk='$data[kd_produk]'");
    $barang = $barang . $nama.", Jumlah : " . $jumlah."<br>" ;
  }

  $queryInsert = mysql_query("INSERT INTO tb_pesanan (kd_pesanan, id_member, daftar_produk, tgl_beli, total, status)
                                VALUES ('$hasilkode', '$_SESSION[id_member]', '$barang', '$tanggal', '$total',
                                        'belum bayar')")
                                or die (mysql_error());

  $query = mysql_query("DELETE FROM tb_keranjang WHERE id_member='$_SESSION[id_member]'");

  if($query){
    echo '
      <script>
      alert("Terima Kasih sudah Berbelanja, Silahkan cek menu transaksi untuk petunjuk pembayaran dan konfirmasi pembayaran. Semoga anda nyaman dengan layanan kami.!");
      window.location = "index_member.php";
      </script>
    ';
  }
 ?>
