<?php
	include '../../lib/koneksi.php';
	session_start();
	if(isset($_SESSION['roles']) == 'user'){
		$id_show = $_SESSION['id_member'] ;
		$ambildata = mysql_query("SELECT * from tb_member where id_member='$id_show' ") ;
		$row2= mysql_fetch_array($ambildata);
?>

<?php
include("inc.header.php");
?><br>
		<div class="center">
		<div id="menumobil">
			<div class="judulmenu"> Baca Artikel </div>
		</div>
		<br>
		<?php
		$id_artikel = abs(intval($_GET['id_artikel']));
		$sql=mysql_query("select * from tb_artikel where id_artikel='$id_artikel'");
				$row=mysql_fetch_array($sql);{ ?>
			<a class="fa fa-chevron-left fa-2x" href="member_artikel.php" style="text-decoration:none"> Kembali</a>
				  <h4><?php echo $row['judul']; ?></h4>
				    <img style="align:top;margin-right:20px;"src="../../img/artikel/<?php echo $row['gambar'] ; ?>" height="250" class="image-rounded" width="auto" />
				    <p><?php echo $row['isi']; ?></p>
				<?php } ?>
		</div>
		<div id="ourteam" >
			<div class="center">
			<h1 class="judul-ourteam"> <i class="fa fa-users"> </i>ARTIKEL LAIN</h1>
			<?php
			$query = mysql_query("SELECT * from tb_artikel where id_artikel!='$id_artikel'");
			$cek = mysql_num_rows($query);
			while($data = mysql_fetch_array($query)){
			?>
			<a href="member_baca.php?id_artikel=<?php echo $data['id_artikel'];?>" class="layanan-kami2">
				<div class="isi2">
					<div class="text-content">
							<tr> <th><center> <?php echo $data['judul']; ?> </center></th> </tr><br>
					</div>
				</div><tr> <td> <img class="spangambar" src="../../img/artikel/<?php echo $data['gambar'] ; ?> " alt="Foto" >
				</td> </tr>
			</a>
			<?php } ?>
			<div class="clear"> </div>
			<div class="clear"> </div>
		</div></div>
		<!-- ABOUT  -->
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
		header("location:assets/admin/index.php");
		}else{
		echo "User tidak ditemukan";
		session_destroy();
		}
	}

?>
