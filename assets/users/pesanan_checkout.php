<?php
	include '../../lib/koneksi.php';
	session_start();
	if(isset($_SESSION['roles']) == 'user'){
		$id_show = $_SESSION['id_member'] ;
		$ambildata = mysql_query("SELECT * from tb_member where id_member='$id_show' ") ;
		$row2 = mysql_fetch_array($ambildata);
?>
<?php
include("inc.header.php");
?><br>		<div class="center">
		<div id="menumobil">
			<div class="judulmenu">Checkout Pesanan</div>
		</div>
		<?php
            $idUser = $_GET['id_member'];
            $cart = $_GET['id_keranjang'];

		  	$query_trolly = mysql_query("SELECT * FROM tb_keranjang WHERE id_member='$_SESSION[id_member]' ");

          while($arrayTrolly = mysql_fetch_array($query_trolly)){
			$queryProduk = "SELECT * FROM tb_produk WHERE kd_produk='$arrayTrolly[kd_produk]'";
		    $query_Produk = mysql_query($queryProduk,$koneksi);
			$arrayProduk = mysql_fetch_array($query_Produk);
            ?>
            <style type="text/css">
                table {
                    border-collapse: collapse;
                }
                td {
                    border-bottom: 1px solid blue;
                        border-top:none;
                            border-right:none;
                                border-left:none;
                }
                th{
                    border-bottom: 1px solid blue;
                        border-top:none;
                            border-right:none;
                                border-left:none;
                }
                input {
                    border: none;
                }
            </style>
        <?php
        echo '
        <form name="setting" method="post" action="checkout_proses.php">
        <table width="50%" align="center">
        <input type="text" name="idTrolly" value="'.$arrayTrolly['id_keranjang'].'" hidden="hidden">
        <input type="text" name="idUser" value="'.$arrayTrolly['id_member'].'" hidden="hidden">
        <tr>
        <b><br>
             <th>Nama Barang: </th>
             <td><input type="text" name="nm_barang" value="'.$arrayProduk['nm_produk'].'"readonly></td>
        </tr>
        <tr>
             <th>Harga: </th>
             <td><input type="text" name="harga" value="Rp.'.number_format($arrayProduk['harga'],0,",",".").'"readonly></td>
        </tr>
        <tr>
             <th>Jumlah: </th>
             <td><input type="text" name="jumlah" value="'.$arrayTrolly['jumlah'].'"readonly></td>
        </tr>
        ';
    }
    ?><?php
        $queryTotalBayar = mysql_query("SELECT SUM(total) FROM tb_keranjang WHERE id_member='$_SESSION[id_member]'");
        $arrayTotal = mysql_fetch_array($queryTotalBayar);

        $query_trolly2 = mysql_query("SELECT * FROM tb_keranjang WHERE id_member='$_SESSION[id_member]' ");
        $arrayTrolly2 = mysql_fetch_array($query_trolly2);

        $queryProduk = mysql_query("SELECT * FROM tb_member WHERE id_member='$arrayTrolly2[id_member]'");
        $arrayProduk = mysql_fetch_array($queryProduk);
        echo '
        <tr>
             <th></th>
             <td></td>
        </tr>
        <tr>
             <th>Nama Pemesan: </th>
             <td><input type="text" name="nama" value="'.$arrayProduk['nama'].'"readonly></td>
        </tr>
        <tr>
             <th>Alamat: </th>
             <td><input type="text" name="alamat" value="'.$arrayProduk['alamat'].'"readonly></td>
        </tr>
        <tr>
             <th>Kontak: </th>
             <td><input type="text" name="kontak" value="'.$arrayProduk['kontak'].'"readonly></td>
        </tr>
        <tr>
             <th></th>
             <td></td>
        </tr>
        <tr>
            <th>Total Bayar : </th>
            <td><input type="text" name="total" value="Rp. '.number_format($arrayTotal[0],0,",",".").'" readonly></td>
        </tr>
        </table></form>
			<center>
            <a type="submit" class="btn-beli" href="checkout_proses.php?id_member='.$_SESSION['id_member'].'&&total='.$arrayTotal[0].'">Bayar Pesanan</a>
            <a class="btn-beli" href="keranjang.php">Kembali ke Keranjang</a>';
     ?>
         <br><br><br>
			<!-- FOOTER -->
		<br><br><br>
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
		if($_SESSION['roles'] == "admin"){
		header("location:assets/admin/index.php");
		}else{
		header("location:../../index.php");
		session_destroy();
		}
	}

?>
