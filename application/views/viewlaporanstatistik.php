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
		min-height: 100vh;
		position: relative;
		margin-bottom: -20px;
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
		padding-bottom: 100px;
		width: 900px;
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
	
	#title {
		margin: 30px 0px 0px 320px;
	}
	
	#title_line {
		border-bottom: 1px solid black;
		margin: 10px 0px 50px -100px;
		width: 1100px;
	}
	
	#filter_label {
		margin: 0px 20px 0px 0px;
		font-size: 12pt;
		float: left;
	}
	
	#cbKiri, #cbKanan {
		float: left;
		height: 30px;
		padding-top: 5px;
		margin-top: -3px;
		margin-bottom: 20px;
	}
	
	#cbKiri {
		width: 120px;
	}
	
	#cbKanan {
		margin-left: 10px;
		width: 230px;
	}
	
	#btnGo {
		margin: -3px 0px 0px 0px;
	}
	
	.table tbody tr:hover {
		background-color: #c5d9ec;
	}
	
	.btnSubmit {
		width: 100%;
		height: 100%;
		padding: 0;
		text-align: left;
		background-color: transparent;
		border: 0;
	}
	
	.head {
		padding: 0;
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
		<li style="margin: 15px 0px 0px 700px;">
			<?php echo form_open("pimpinanpmb/logout"); ?>
			<a id="logout"><span style="color: #999999;" class="glyphicon glyphicon-log-out"></span><input type="submit" name="btnLogout" value="Logout" style="background-color: transparent; border: none; color: #999999;"></a>
			<?php echo form_close(); ?>
		</li>
      </ul>
    </div>
  </div>
</nav>
	
<div id="container">
	<h2 id="title">Laporan Statistik</h2>
	<div id="title_line"></div>
	
	<?php
		echo form_open('pimpinanPMB/laporanStatistik');
		echo "<label id='filter_label'>Filter By :</label>";
		$pilihan = array(
		'all' => 'All',
		'provinsi' => 'Provinsi',
		'kota' => 'Kota',
		'jurusan'=>'Jurusan'
		);
		echo form_dropdown('cbKiri', $pilihan, '', 'id="cbKiri" class="form-control"');
		echo form_dropdown('cbKanan', [], '', 'id="cbKanan" class="form-control"');
		echo form_submit('btnGo', "GO!", 'id="btnGo" class="btn btn-primary btn-sm"');
		echo form_close();
		
		echo "<table class='table table-hover table-striped table-responsive'>";
		if($kiri=='jurusan'){
			
			echo '<thead><tr><th>'.$kiri.'</th><th>Jumlah</th></tr></thead>';
			echo "<tbody>";
			
			if ($kanan == "all")
			{
				foreach($allJurusan as $r){
					echo form_open('pimpinanPMB/laporan2');
					echo "<tr class='head'><td>".form_submit('submit', $r->jurusan, "class='btnSubmit'").'</td><td>'.$r->jumlah.'</td></tr>';
					echo form_hidden('by',$kiri);
					echo form_hidden('bywhat',$r->jurusan);
					echo form_hidden('kanan',$r->kurikulum);
					echo form_close();
				}
			}
			else
			{
				foreach($allJurusan as $r){
					if ($kanan == $r->kurikulum)
					{
						echo form_open('pimpinanPMB/laporan2');
						echo "<tr class='head'><td>".form_submit('submit', $r->jurusan, "class='btnSubmit'").'</td><td>'.$r->jumlah.'</td></tr>';
						echo form_hidden('by',$kiri);
						echo form_hidden('bywhat',$r->jurusan);
						echo form_hidden('kanan',$r->kurikulum);
						echo form_close();
					}
				}
			}
			
			echo "</tbody>";
		}
		else if($kiri=='kota' or $kiri=='provinsi'){
			echo '<thead><tr><th>'.$kiri.'</th><th>Jumlah</th></tr></thead>';
			echo "<tbody>";		
			if($kanan=='all'){
				foreach($allStatistik as $r){				
					echo form_open('pimpinanPMB/laporan2');
					echo "<tr class='head'><td>".form_submit('submit', $r->nama,"class='btnSubmit'").'</td><td>'.$r->jumlah.'</td></tr>';
					echo form_hidden('by',$kiri);
					echo form_hidden('bywhat',$r->id);
					echo form_hidden('kanan',$r->id);
					echo form_close();
				}		
			}
			else if($kanan!='all'){
				
				foreach($allStatistik as $r){				
					if($kanan==$r->id){
						echo form_open('pimpinanPMB/laporan2');
						echo "<tr class='head'><td>".form_submit('submit', $r->nama,"class='btnSubmit'").'</td><td>'.$r->jumlah.'</td></tr>';
						echo form_hidden('by',$kiri);
						echo form_hidden('bywhat',$r->id);
						echo form_hidden('kanan',$kanan);
						echo form_close();
					}
				}
			}
			echo "</tbody>";
		}
		else{
			echo "<thead>";
			echo form_open('pimpinanPMB/laporan2');
			echo "<tr class='head'><td>".form_submit('submit',"Total Mahasiswa","class='btnSubmit'").'</td><td>'.$TotalMhs.'</td></tr>';
			echo form_hidden('by','all');
			echo form_hidden('bywhat','');
			echo form_hidden('kanan','');
			echo form_close();
			echo "</thead>";
		}
		//----
		
		echo "</table>";
	?>
		
	<?php
		
	?>

</div>

<?php require_once('footer.php'); ?>	
</body>

<script>
$(document).ready(function()
{
	$("#cbKanan").fadeOut(0); //hilangkan cbKanan
	$("#btnGo").css("position", "absolute"); //posisi harus absolute supaya bisa diotak atik left dan height nya ketika animate
	$("#btnGo").css("left", "420px"); //set left nya untuk pertama kali
	var allProvinsi = <?php echo json_encode($allProvinsi);?>;
	var allKota = <?php echo json_encode($allKota);?>;
	var allJurusan = <?php echo json_encode($allJurusan);?>;
	var kiri='<?php echo $kiri; ?>';
	var kanan='<?php echo $kanan; ?>';
	
	if(kiri!=''){
		$("#cbKiri").val(kiri);
		$("#cbKanan").val(kanan);
	}
	var selected= document.getElementById('cbKiri').value;
	
	$("#cbKiri").change(cbKiriSelected);
	
	function cbKiriSelected()
	{
		selected= document.getElementById('cbKiri').value; //var selected = value item yg diselect di cbKiri
		if (selected != "all")
		{
			$("#btnGo").animate({left: '660px'}, 200); //button geser kanan selama 200ms dengan cara left nya diubah dari 100px menjadi 300px 
			$("#cbKanan").fadeOut(0); //dihilangkan supaya bisa dibuat efek kemunculan
			cbKanan.innerHTML = ""; //kosongkan dulu isi combobox cbKanan
			
			if (selected == "provinsi")
			{
				var newopt= $('<option value="all">All</option>');
				$("#cbKanan").append(newopt);
				for(var i=0;i<allProvinsi.length;i++){
					var newopt= $('<option value="'+allProvinsi[i].id+'">'+allProvinsi[i].nama+'</option>');
					$("#cbKanan").append(newopt);
				}
			}
			else if (selected == "kota") //allKota[index], berarti index adalah KOT001, KOT002, dll
			{	
				var newopt= $('<option value="all">All</option>');
				$("#cbKanan").append(newopt);
				for(var i=0;i<allKota.length;i++){
					var newopt= $('<option value="'+allKota[i].id+'">'+allKota[i].nama+'</option>');
					$("#cbKanan").append(newopt);
				}
			}
			else if (selected == "jurusan") //allKota[index], berarti index adalah KOT001, KOT002, dll
			{
				var newopt= $('<option value="all">All</option>');
				$("#cbKanan").append(newopt);
				for(var i=0;i<allJurusan.length;i++){
					var newopt= $('<option value="'+allJurusan[i].kurikulum+'">'+allJurusan[i].jurusan+'</option>');
					$("#cbKanan").append(newopt);
				}
			}
			
			$("#cbKanan").fadeIn(400);
			
			$("#cbKanan").val(kanan);
			if ($("#cbKanan option:selected").text() == "") //jika yg diselect tidak ketemu di combobox
			{
				$("#cbKanan")[0].selectedIndex = 0; //select yg index 0
			}
			
		}
		else //jika yg diselect adalah all, hilangkan cbKanan dan button kembali ke kiri
		{
			$("#btnGo").animate({left: '420px'}, 200);
			$("#cbKanan").fadeOut(400);
		}
	}
	
	if (selected != "all")
	{
		cbKiriSelected();
		
	}
});
</script>

</html>