<?php
	include "lib/koneksi.php";
	session_start();
	extract($_POST);
	$q = mysql_query("select * from tb_member where username='$username' and password=MD5('$password')");
	$r = mysql_fetch_array ($q);
	$q2 = mysql_query("select * from tb_admin where username='$username' and password=MD5('$password')");
	$row = mysql_fetch_array ($q2);
if (mysql_num_rows($q) == 1) {
    $_SESSION['id_member'] = $r['id_member'];
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['roles'] = 'user';
	$update_log = mysql_query("UPDATE tb_member SET online ='1' WHERE username = '$username'");
    header('location:assets/users/index_member.php');
}
elseif (mysql_num_rows($q2) == 1) {
    $_SESSION['id_admin'] = $row['id_admin'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['roles'] = 'admin';
	$update_log = mysql_query("UPDATE tb_admin SET online ='1' WHERE username = '$username'");
    header('location:admin/index_admin.php');
}else {
    echo "Login Gagal";
}
?>
