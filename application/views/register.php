<html>
<head>
<?php
	require_once("header-pmb.php");
	require_once("header.php");
?>
<title>PMB STTS | Register</title>
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
	
	h1{
		text-align:center;
		color: #3873ae;
	}
	
	hr {
		background-color: #3873ae;
		height: 5px;
	}
	
	#log{
		color: grey;
		float: left;
		border-right: 5px solid #3873ae;
		width: 400px;
		padding: 30px 0px 45px 60px;
	}
	
	#login{
		border: none;
		background-color: transparent;
		color: #3873ae;
	}
	
	#login:hover {
		color: #2b5987;
	}
	
	#reg{
		float: right;
		width: 300px;
		margin: 0px 50px 0px 0px;
	}
	
	#register_text {
		color: #3873ae;
		text-align: center;
	}
	
	tr {
		height: 10px;
	}
	
	#no_registrasi_text, #email_text {
		width: 110px;
		color: #2b5987;
	}
	
	#titikDua {
		width: 10px;
	}
	
	.form-control {
		height: 30px;
	}
	
	#submit {
		width: 100%;
		margin-top: 5px;
		font-size: 10pt;
		background-color: #3873ae;
		border: none;
	}
	
	#submit:hover {
		background-color: #2b5987;
	}
	
	#error_text {
		color: red;
		font-size: 11pt;
	}
</style>
</head>
<body>
<div id="container">
<?php
	echo "<h1>Selamat Datang<br>Calon Mahasiswa</h1><hr>";
	echo form_open('registration/toLogin');
	echo "<div id='log'>";
	echo "No Registrasi dapat dilihat pada formulir<br>pendaftaran.<br><br><br>Sudah melakukan register?";
	echo form_submit('submit','Login',"id='login'");
	echo "</div>";
	echo form_close();
	echo "<div id='reg'>";
	echo form_open('registration/verif',"id='regisForm'");
	echo "<h3 id='register_text'>Register</h3>";
	echo "<table width='100%'>";
	echo "<tr><td><label id='no_registrasi_text'>No Registrasi</label></td><td><label id='titikDua'>:</label></td><td> ".form_input('noreg','',"class='form-control'")."</td></tr>";
	echo "<tr><td align='right' colspan='3' id='error_text'>".form_error('noreg')."</td></tr>";
	echo "<tr><td><label id='email_text'>Email</label></td><td><label id='titikDua'>:</label></td><td>".form_input('email','',"class='form-control'")."</td></tr>";
	echo "<tr><td align='right' colspan='3' id='error_text'>".form_error('email')."</td></tr>";
	echo "</table>";
	echo form_submit('submit','REGISTER',"id='submit' class='btn btn-danger'");
	echo form_close();
	echo "</div>";
?>
</div>
</body>
<?php require_once("footer.php"); ?>
</html>