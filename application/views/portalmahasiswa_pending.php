<html>
<head> 
<?php
	require_once('header-pmb.php');
	require_once('header.php');
?>
<title>PMB STTS || Portal Mahasiswa</title>
<style>
<?php require('portalmahasiswa_home.css'); ?>

#menubar {
	background-color: #3873ae;
	border: 0;
}

#menubar_ul1 {
	margin-left: 100px;
}

#menubar_ul1 li a{
	color: #FFFFFF;
}

#menubar_ul1 li:hover {
	background-color: #2b5987;
}

#menubar_ul2 {
	background-color: #3873ae;
}

.dropdown ul li:hover > a{
	background-color: #2b5987;
}

body {
	font-family: 'Open Sans', sans-serif;
	min-height: 100vh;
	position: relative;
}

.footer {
	position: absolute;
	bottom: 0px;
	font-size: 12px;
	width: 100%;
}

</style>
</head>
<body>
<nav class="navbar navbar-inverse" id="menubar">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav" id="menubar_ul1">
        <li><a href="<?php echo site_url('portalmahasiswa/home') ?>">Home</a></li>
        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
      		<ul class="dropdown-menu" id="menubar_ul2">
            	<li id="li"><a href="<?php echo site_url('portalmahasiswa/profile') ?>">Biodata</a></li>
            	<li><a href="<?php echo site_url('portalmahasiswa/logout') ?>">Logout</a></li>
            	
    		</ul>
        </li>
        <li><a href="#">Info Kuliah</a></li>
      </ul>
    </div>
  </div>
</nav>

<h1 style="padding-left: 50px;"><br>Status kategori : Pending</h1>
</body>
<?php require_once('footer.php'); ?>
</html>