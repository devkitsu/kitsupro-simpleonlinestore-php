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
			<div class="judulmenu"> Menu Artikel</div>
		</div>
		<br>
		<!-- PAGINATION -->
		<?php
		$query = mysql_query("SELECT * from tb_artikel");
		$cek = mysql_num_rows($query);
		while($data = mysql_fetch_array($query)){
		?>
		<a href="member_baca.php?id_artikel=<?php echo $data['id_artikel'];?>" class="layanan-kami2">
			<div class="isi2">
				<div class="text-content">
						<tr> <th><center> <?php echo $data['judul']; ?> </center></th> </tr><br>
						</td> </tr>
				</div>
			</div>
			<tr> <td> <img class="spangambar" src="../../img/artikel/<?php echo $data['gambar'] ; ?> " alt="Foto" ></td></tr>
		</a>
		<?php } ?>
		<div class="clear"> </div>
		<?php
		include("inc.konten.php");
		?>
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
		header("location:assets/admin/index_admin.php");
		}else{
		echo "User tidak ditemukan";
		session_destroy();
		}
	}

?>
