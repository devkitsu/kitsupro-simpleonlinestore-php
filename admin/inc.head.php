<div id="headeradmin">
    <div class="centeradmin">
    <div class="judul">
        <a href="#"> Admin <span> Dashboard </span> </a>
    </div>

    <!-- ADMINBAR -->
    <div class="adminbar">

    <!-- PENGAMBILAN DATA -->
    <?php
    $id_show = $_SESSION['username'] ;
    $ambildata = mysql_query("SELECT * from tb_admin where username='$id_show' ") ;
    $row = mysql_fetch_array($ambildata);
    ?>

    <!-- PEMANGGILAN DATA -->
    <span> <?php echo $row['username']; ?> </span>
    &nbsp;<a href="logout.php"> [LOGOUT] </a>
    <div class="clear"> </div>
    </div>
    <!-- ADMINBAR -->

    </div> <!-- END CLASS centeradmin -->
</div>
