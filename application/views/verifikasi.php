<html>
<head>
<?php
	require_once("header-pmb.php");
	require_once("header.php");
?>
<title>PMB STTS | Verifikasi</title>
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
	
	h1 {
		text-align:center;
		color: #3873ae;
	}
	
	hr {
		background-color: #3873ae;
		height: 5px;
	}
	
	#left{
		color: grey;
		float: left;
		border-right: 5px solid #3873ae;
		width: 400px;
		padding: 30px 0px 30px 40px;
	}
	
	#reg{
		float: right;
		width: 300px;
		margin: 0px 50px 0px 0px;
	}
	
	#verifikasi_text {
		color: #3873ae;
		text-align: center;
	}
	
	tr {
		height: 10px;
	}
	
	#kode_text {
		width: 70px;
		color: #2b5987;
	}
	
	#titikDua {
		width: 10px;
	}
	
	.form-control {
		height: 30px;
	}
	
	#kirimUlang, #login {
		border: none;
		background-color: transparent;
		color: #3873ae;
		padding: 0;
		margin: 0px 0px 3px 5px;
		font-size: 12pt;
	}
	
	#kirimUlang:hover, #login:hover {
		color: #2b5987;
	}
	
	#verify {
		width: 100%;
		margin-top: 5px;
		background-color: #3873ae;
		border: none;
	}
	
	#verify:hover {
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
	echo "<div id='left'>";
	echo form_open('registration/resend');
	echo "<div id='ket'>";
	echo "Tidak menerima kode verifikasi? ";
	echo form_submit('submit','Kirim ulang',"id='kirimUlang'");
	echo form_hidden('noRegis',$noReg);
	echo form_hidden('Email',$email);
	echo "</div>";
	echo "<br><br>";
	echo form_close();
	echo form_open('registration/toLogin');
	echo "<div id='log'>";
	echo "Kembali ke halaman ";
	echo form_submit('submit','Login',"id='login'");
	echo "</div>";
	echo form_close();
	echo "</div>";
	echo "<div id='reg'>";
	echo form_open('registration/regis');
	echo "<h3 id='verifikasi_text'>Verifikasi</h3>";
	echo "<table width='100%'>";
	echo "<tr><td><label id='kode_text'>Kode</label></td><td><label id='titikDua'>:</label></td><td>".form_input('verif', '', 'class="form-control"')."</td></tr>";
	echo "<tr><td align='left' colspan='3' id='error_text'>".form_error('verif')."</td></tr>";
	echo "</table>";
	echo form_submit('submit','VERIFIKASI',"id='verify' class='btn btn-danger'");
	echo form_hidden('noRegis',$noReg);
	echo form_hidden('Email',$email);
	echo "</div>";
	echo form_close();
?>
</div>
</body>
<?php require_once("footer.php"); ?>
</html>