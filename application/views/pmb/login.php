<html>
<head>
<?php
	require_once('header-pmb.php'); 
	require_once('header_.php');
?>
<title>PMB STTS | Login</title>
<style>

	body {
		font-family: 'Open Sans', sans-serif;
		min-height: 100vh;
		position: relative;
	}
	
	footer {
		position: absolute;
		bottom: 0px;
		min-height: 80px;
		background-color: #f5f5f5;
		margin-top: 10px;
		font-size: 12px;
		width: 100%;
	}
	
	#container {
		width: 800px;
		margin: 0 auto;
	}
	
	#log{
		text-align:left;
		width: 400px;
		margin: 0px 0px 0px 0px;
		float: left;
		border-right: 5px solid #3873ae;
		padding: 0px 40px 0px 50px;
	}
	
	#reg {
		float: right;
		color: grey;
		margin: 50px 70px 0px 0px;
		
	}
	
	#btn{
		border: none;
		background-color: transparent;
		color: #3873ae;
	}
	
	#btn:hover {
		color: #2b5987;
	}
	
	#login {
		width: 100%;
		margin-top: 5px;
		font-size: 10pt;
		background-color: #3873ae;
		border: none;
	}
	
	#login:hover {
		background-color: #2b5987;
	}
	
	h1{
		text-align:center;
		color: #3873ae;
	}
	
	hr {
		background-color: #3873ae;
		height: 5px;
		
	}
	
	#login_text {
		color: #3873ae;
		text-align: center;
	}
	
	tr {
		height: 40px;
	}

	#email_text, #pass_text {
		width: 70px;
		color: #2b5987;
	}
	
	#titikDua {
		width: 10px;
	}
	
	.form-control {
		height: 30px;
	}
</style>
</head>
<body>
<div id="container">
<?php
	echo "<h1>Selamat Datang<br>Calon Mahasiswa</h1><hr>";
	
	echo "<div id='log'>";
	echo form_open('registration/login',"id='loginForm'");
	echo "<h3 id='login_text'>Login</h3>";
	echo "<table width='100%'>";
	echo "<tr><td><label id='email_text'>Email</label></td><td><label id='titikDua'>:</label></td><td> ".form_input('email','',"placeholder='Contoh: mark@gmail.com' class='form-control'")."</td></tr>";
	echo "<tr><td><label id='pass_text'>Password</label></td><td><label id='titikDua'>:</label></td><td>".form_password('pass','',"class='form-control'")."</td></tr>";
	echo "</table>";
	echo form_submit('submit','LOGIN',"id='login' class='btn btn-danger'");
	echo form_close();
	echo "</div>";
	
	echo "<div id='reg'>";
	echo form_open('registration/toRegister');
	echo "Pendaftaran Online dapat dilakukan<br>apabila calon mahasiswa telah<br>melakukan pendaftaran dan pembayaran<br>formulir. ";
	echo form_submit('submit','Register',"id='btn'");
	echo form_close();
	echo "</div>";
	
?>
</div>
</body>
<?php require_once('footer.php'); ?>
</html>