<html>
<!--JUDUL DAN ICON UNTUK WEB STTS-->
	<head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!--JUDUL DAN ICON UNTUK WEB STTS-->
		<link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
		<script src="<?php echo base_url("assets/bootstrap/js/respon.js");?>"></script>
		<link rel="icon" href="<?php echo base_url("assets/images/icon.png");?>">

		<link rel="icon" href="<?php echo base_url("assets/images/icon.ico");?>">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

	</head>
<body>
    <?php if($this->session->userdata('user_role') == 'mahasiswa'){ ?>
        <div class="header">
            <a href="<?php echo site_url('/'); ?>"></a><img
                src="<?php echo base_url("assets/images/logo.png"); ?>"/></a>
        </div>
    <?php
    }
    else { ?>
        <div class="headerDosen">
            <a href="<?php echo site_url('/');?>"></a><img src="<?php echo base_url("assets/images/logodosen.png");?>"/></a>
        </div>
    <?php } 
		$this->load->view('pmb/navbar');
	?>

