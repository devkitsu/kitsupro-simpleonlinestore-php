<?php
	include "../lib/koneksi.php";
	session_start();
?>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=0.1" />
	<?php
	include("inc.header.php");
	?>
		<body>
			<?php
			include("inc.head.php");
			?>
<?php
include("inc.menu.php");
?>
	<body>
	<h1 align="center" style="margin-top: 50px;margin-bottom: 50px;font-family: Web-Segoe-SemiBold ;color:#000;">ARTIKEL</h1>
	<div class="center">
	<?php
	$id_artikel = abs(intval($_GET['id']));
	$sql=mysql_query("select * from tb_artikel where id_artikel='$id_artikel'");
			$row=mysql_fetch_array($sql);{ ?>
			<div class="panel panel-info">
	<div align="left" >
		<a class="fa fa-chevron-left fa-1x" href="data_artikel.php" style="text-decoration:none"> Kembali</a>     |
			<a class="fa fa-pencil-square fa-1x" href="data_artikel_edit.php?id=<?php echo $row['id_artikel'];?> " style="text-decoration:none"> Edit</a></div></div>
			  <div align="center" sclass="panel-heading"><h4>Judul Artikel: <?php echo $row['judul']; ?></h4></div>
			  <div align="left" class="panel-body" >
				<img style="float:left;margin-right:20px;margin-left:20px"src="../img/artikel/<?php echo $row['gambar'] ; ?>" height="auto" weigth="auto" class="image-rounded" width="250" height="250" align="middle"/>
				<p><?php echo $row['isi']; ?></p>
			  </div>
		  </div><br><br>
			<?php } ?>
	<div class="clear"> </div>
	</body>
</html>
