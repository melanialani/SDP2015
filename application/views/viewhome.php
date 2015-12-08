<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require_once('header-pmb.php');
	require_once('headerdosen.php'); 
?>
<title>Pimpinan PMB</title>
<style>
	body {
		font-family: 'Open Sans', sans-serif;
		position: relative;
		min-height: 100vh;
		margin-bottom: -20px;
	}
	
	footer {
		position: absolute;
		bottom: 0;
		min-height: 80px;
		background-color: #f5f5f5;
		margin-top: 10px;
		font-size: 12px;
		width: 100%;
	}
	
	#container {
		padding-bottom: 100px;
		width: 800px;
		margin: 0 auto;
	}
	
	.headerDosen {
		height: 90px;
		padding: 10px 0px 0px 10px;
	}
	
	#menubar {
		border-radius: 0;
		border: 0;
	}
	
	#menubar_ul1 {
		margin-left: 100px;
	}
	
	#menubar_ul2 {
		background-color: #222222;
	}
	
	.dropdown ul li a {
		color: white;
	}
	
	.dropdown ul li:hover > a{
		background-color: black;
		color: white;
	}
	
	label {
		font-size: 11pt;
	}
	
</style>
</head>
<body>

<nav class="navbar navbar-inverse" id="menubar">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav" id="menubar_ul1">
        <li><a href="<?php echo site_url('pimpinanPMB/home') ?>">Home</a></li>
        <li><a href="<?php echo site_url('pimpinanPMB/listcalonmahasiswa') ?>">List Calon Mahasiswa</a></li>
        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
      		<ul class="dropdown-menu" id="menubar_ul2">
            	<li id="li"><a href="<?php echo site_url('pimpinanPMB/laporan') ?>">Laporan Calon Mahasiswa</a></li>
            	<li><a href="<?php echo site_url('pimpinanPMB/laporanstatistik') ?>">Laporan Statistik</a></li>	
    		</ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="container">

	<?php
		echo "<br><br>";
		
		echo "<label id='notifikasi_text'>NOTIFIKASI :</label><br>";
		if (isset($listUncategorized) && (count($listUncategorized))!=0)
		{
			echo "<label>";
			$jumlah = count($listUncategorized);
			echo anchor(site_url('pimpinanPMB/listcalonmahasiswa'), "* ".$jumlah . " Calon Mahasiswa Belum di Kategorikan"). " ";
			
			if ($jumlah==0)
			{
				echo " - ";				
			}
			echo "</label>";
		}
	?>

</div>

<?php
	require_once('footer.php');
?>

</body>
</html>