<!--JUDUL DAN ICON UNTUK WEB STTS-->
<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css");?>"> 
<link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>">
<script src="<?php echo base_url("assets/bootstrap/js/respon.js");?>"></script>
<link rel="icon" href="<?php echo base_url("assets/images/icon.png");?>">

<!--LOGO STTS-->
<div class="header">
<!--<p class="navbar-text">Sistem Informasi Mahasiswa</p>--><!-- <a class="navbar-brand" rel="home" href="#"-->
<?php $stylebutton=array('class'=>'customNavbar','name'=>'home','value'=>'echo '); ?>
<!-- <input type='image' src='<?php echo base_url("assets/images/logo.png");?>'  onFocus='form.submit' name='home'/>-->
<!-- <input type="submit" name="home" class="customNavbar" value=""><img src="<?php echo base_url("assets/images/logo.png");?>"/></input>-->
<input type="image" src='<?php echo base_url("assets/images/logo.png");?>' name="home" onChange='form.submit'/> 
<!-- <a href=""> <input type="submit" class="customNavbar" name="home"><img src="<?php echo base_url("assets/images/logo.png");?>"/></input> </a>-->
</div>