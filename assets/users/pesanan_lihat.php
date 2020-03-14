<?php
	include '../../lib/koneksi.php';
	session_start();
	if($_SESSION['roles'] == "user"){

		$id_show = $_SESSION['id_member'] ;
		$ambildata = mysql_query("SELECT * from tb_member where id_member='$id_show' ") ;
		$row2 = mysql_fetch_array($ambildata);

        $kd=$_GET['id'];
		$query = mysql_query("SELECT * from tb_pesanan where kd_pesanan = '$kd' ");
		$data2 = mysql_fetch_array($query)
?>

<?php
include("inc.header.php");
?><br>
		<div id="menumobil">
			<div class="judulmenu"> DETAIL PESANAN: <?php echo $data2['kd_pesanan']; ?> </div>
		</div>
		<br>
        <a class="fa fa-chevron-left fa-2x" href="transaksi.php" style="text-decoration:none"> Kembali</a><br><br>
        <style type="text/css">
        p {
            display: block;
margin-top: 1em;
margin-bottom: 1em;
margin-left: 5em;
margin-right: 0;
font-size: 17px;
}
        </style>
              <p margin-left="20px">ID Member: <?php echo $data2['id_member']; ?></p>
              <p>Daftar Produk: <?php echo $data2['daftar_produk']; ?></p>
              <p>Tanggal Pembelian: <?php echo $data2['tgl_beli']; ?></p>
              <p>Total Harga: Rp. <?php echo number_format ($data2['total'],0,",","."); ?></p>
              <p>Status Pembayaran: <?php echo $data2['status']; ?></p>
              <p>Bukti Pembayaran: </p>
                <img style="align:top;margin-left:5em;"src="../../img/konfirmasi/<?php echo $data2['gambar'] ; ?>" height="300" class="image-rounded" width="auto" />
                <br><br>
			<!-- FOOTER -->
			<?php
				include("footer.php");
			?>
			<!-- FOOTER -->
	</body>
	<!-- <script type="text/javascript" src="../../js/jquery.min.js"> </script>
	<script type="text/javascript" src="../../js/customjs.js"> </script> -->
</html>

<?php
	}else{
		echo "<script> alert('Forbidden Access') ;
		document.location.href='../../index.php' </script> " ;
		exit();
	}
?>
