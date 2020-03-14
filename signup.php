<html>
	<head>
		<title> YourBrand | Online shop for meubel </title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/custom.css">
	<style type="text/css">
		body{
			background-image: url('img/test.jpg') ;
			background-size: 100%;
		}
	</style>
	</head>
	<body>
		<div class="container">
		<center>
			<div class="well well-lg" style="margin-top: 50px;width: 500px;background-color:#ffffff;">
				<h1 align="center" style="color: #000;"> Form Pendaftaran Member </h1>
					<span class="glyphicon glyphicon-user fa-3x " style="background-color:#cccccc; padding: 35px 40px 40px 40px;border-radius: 50%;">
					</span>
				<br><br>
				<form method="post" name="signup" action="signup_proses.php" align="left">
					<div class="input-group" >
							<span class="input-group-addon"><i class="fa fa-address-card fa-fw"> </i> </span>
							 <input  class="form-control" pattern="[0-9]{16}" type="text" name="ktp" placeholder="No. KTP" maxlength="16" required>
					</div>
					<br>
					<div class="input-group" >
							<span class="input-group-addon"><i class="fa fa-user fa-fw"> </i> </span>
							 <input  class="form-control" type="text" name="nama" placeholder="Nama" maxlength="16" required>
					</div>
					<br>
					<div class="input-group" >
						<span style="text-align:left" class="input-group-addon"><i class="fa fa-genderless fa-fw"> </i> Jenis Kelamin &nbsp;
					<label class="radio-inline"><input type="radio" name="jk" value="L" checked>L</label>
				    <label class="radio-inline"><input type="radio" name="jk" value="P">P</label></span>
					</div>
					<br>
					<div class="input-group" >
							<span class="input-group-addon"><i class="fa fa-address-book fa-fw"> </i> </span>
							 <input  class="form-control" type="text" name="alamat" placeholder="Alamat" maxlength="50" required>
					</div>
					<br>
					<div class="input-group" >
							<span class="input-group-addon"><i class="fa fa-phone fa-fw"> </i> </span>
							 <input  class="form-control" type="text" name="kontak" placeholder="Kontak" maxlength="16" required>
					</div>
					<br>
					<div class="input-group" >
							<span class="input-group-addon"> <i class="fa fa-asterisk fa-fw"> </i> </span>
							 <input  class="form-control" type="text" name="username" placeholder="Username" maxlength="10" required>
					</div>
					<br>
					<div class="input-group" >
							<span class="input-group-addon"><i class="fa fa-key fa-fw"> </i> </span>
							 <input  class="form-control" type="password" name="password" placeholder="Password" required>
					</div>
					<br>
						<button class="btn-primary btn-sm" type="submit"> Daftar </button>
						<button class="btn-danger btn-sm" type="reset"> Reset </button>
					</div>
				</form>
			</div>
			</center>
		</div>
	</body>
</html>
