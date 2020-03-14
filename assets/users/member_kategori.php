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
?><br>

		<div class="center">
		<div id="menumobil">
			<div class="judulmenu"> Menu Kategori </div>
		</div>
		<br>

		<?php
		// PAGINATION
		$query = mysql_query("SELECT * from tb_kategori");
		$cek = mysql_num_rows($query);
		while($data = mysql_fetch_array($query)){
		?>
		<a href="member_kategori_lihat.php?kd_kategori=<?php echo $data['kd_kategori'];?>" class="layanan-kami2">
			<div class="isi2">
				<div class="text-content">
						<tr> <th><center> <?php echo $data['nm_kategori']; ?> </center></th> </tr>
				</div>
			</div>
			<tr> <td> <img class="spangambar" src="../../img/kategori/<?php echo $data['gambar'] ; ?> " alt="Foto" ></td></tr>
		</a>
		<?php } ?>
		<div class="clear"> </div>
		<!-- PAGINATION -->

		<div style="margin:5px 0px 10px 25px; float:left;">
				<?php
				$jml = mysql_num_rows(mysql_query("SELECT * from tb_kategori"));
				echo "Jumlah Data : <b>".$jml."</b>";
				?>
		</div>
		<div style="margin:5px 25px 50px 0px; float:right;">
		</div>
		</div>

		<?php
		include("inc.konten.php");
		?>
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
		if($_SESSION['roles'] == "admin"){
		header("location:assets/admin/index_admin.php");
		}else{
		echo "User tidak ditemukan";
		session_destroy();
		}
	}

?>
