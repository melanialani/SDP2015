<!DOCTYPE html>
<html lang="en">
<head>
<body>
<?php require_once('header-pmb.php'); ?>
<title>Pimpinan PMB</title>
<div id="container">

	<?php
		echo validation_errors();
		echo form_open('pimpinanPMB/login');
		echo "Email : " . form_input('txtEmail',$email) . "<br>";
		echo "Password : " . form_password('txtPassword',$password) . "<br>";
		echo form_submit('btnLogin','LOGIN') . "<br>";
		echo form_close();		
	?>

</div>

</body>
</html>