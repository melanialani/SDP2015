<!DOCTYPE html>
<html>
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
		margin: 30px 0px 0px 280px;
	}
	
	#title_line {
		border-bottom: 1px solid black;
		margin: 10px 0px 50px -100px;
		width: 1100px;
	}
	
	#add_label, #filter_label {
		margin: 0px 20px 0px 0px;
		font-size: 12pt;
		float: left;
	}
	
	#filter_label {
		margin-top: -5px;
	}
	
	#add_dropdown, #cbKiri, #cbKanan {
		width: 180px;
		float: left;
		height: 30px;
		padding-top: 5px;
		margin-top: -3px;
		margin-bottom: 20px;
	}
	
	#cbKiri, #cbKanan {
		margin-top: -8px;
	}
	
	#btnGo_add {
		margin: -3px 0px 0px 15px;
	}
	
	#filter_label {
		clear: both;
	}
	
	#cbKiri {
		width: 120px;
	}
	
	#cbKanan {
		margin-left: 10px;
		width: 230px;
	}
	
	#btnGo {
		margin: 12px 0px 0px 10px;
	}
	
	#table_header {
		width: 100%;
		background-color: white;
		border: 0;
		text-align: left;
		white-space: normal;
	}
	
	.table tbody tr:hover {
		background-color: #c5d9ec;
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
	<h2 id="title">Laporan Calon Mahasiswa</h2>
	<div id="title_line"></div>
	
	<?php
		echo form_open('pimpinanPMB/laporan');
		echo "<label id='add_label'>Add/Remove View :</label>";
		$attrAdd = 'id="add_dropdown" class="form-control"';
		echo form_dropdown('view',
				array(
					'nomor_registrasi_id' => 'Nomor Registrasi',
					'provinsi' => 'Provinsi',
					'kota' => 'Kota',
					'jurusan' => 'Jurusan',
					'kewarganegaraan' => 'Kewarganegaraan',
					'kategori' => 'Kategori',
					'informasi_kurikulum_id'=>'Tahun Ajaran'
				),
			$dropdownView, $attrAdd);
		$attrBtnGo_add = 'id="btnGo_add" class="btn btn-primary btn-sm"';
		echo form_submit('btnGo_add','GO', $attrBtnGo_add) . "<br>";
		echo form_hidden('listview',$listview);
		echo form_close();
		echo form_open('pimpinanPMB/laporan');
		echo "<label id='filter_label'>Filter By :</label>";
		$pilihan = array(
		'all' => 'All',
		'provinsi' => 'Provinsi',
		'kota' => 'Kota',
		'jurusan' => 'Jurusan'
		);
		echo form_dropdown('cbKiri', $pilihan, '', 'id="cbKiri" class="form-control"');
		echo form_dropdown('cbKanan', [], '', 'id="cbKanan" class="form-control"');
		echo form_submit('btnGo', "GO!", 'id="btnGo" class="btn btn-primary btn-sm"');
		echo form_hidden('listview', $listview);
		echo form_close();
		//----
		
		echo "<br>";
		$tableview = explode('|',$listview);
		echo "<table class='table table-hover table-striped table-responsive' id='tablemhs'>";
		echo "<thead>";
		echo "<tr id='head'>";
		if ($sort == "asc")
		{
			$sort = "desc";
		}
		else {
			$sort = "asc";
		}
		for($i=0;$i<count($tableview)-1;$i++)
		{
			echo "<th>";
			echo form_open('pimpinanPMB/laporan1');
			
			if ($tableview[$i] == "informasi_kurikulum_id")
			{
				echo form_submit('submit', "Tahun Ajaran",'id="table_header"');
			}
			else if ($tableview[$i] == "nomor_registrasi_id")
			{
				echo form_submit('submit', "Nomor Registrasi",'id="table_header"');
			}
			else
			{
				echo form_submit('submit', ucwords(str_replace("_", " ", $tableview[$i])),'id="table_header"');
			}
			echo form_hidden('listview',$listview);
			echo form_hidden('sort',$sort);
			echo form_hidden('field',$tableview[$i]);
			echo form_hidden('by',$by);
			echo form_hidden('bywhat',$bywhat);
			echo form_hidden('kanan',$kanan);
			echo form_close();
			echo "</th>";
			
		}
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		if(isset($arrobj) && $arrobj!="")
		{
			foreach ($arrobj as $r)
			{ 
				echo "<tr class='isi'>";
				for($i=0;$i<count($tableview)-1;$i++)
				{
					
					if($tableview[$i]=='informasi_kurikulum_id'){
						echo "<td>20".$r->$tableview[$i]."/20".($r->$tableview[$i]+1)."</td>";
					}
					else{
						echo "<td>".$r->$tableview[$i]."</td>";
					}
				}
				echo "</tr>";
				
			} 
			
		}
		echo "</tbody>";
		echo "</table>";
	?>

</div>
<?php require_once('footer.php'); ?>

</body>

<script>
$(document).ready(function()
{
	$("#cbKanan").fadeOut(0); //hilangkan cbKanan
	$("#btnGo").css("position", "absolute"); //posisi harus absolute supaya bisa diotak atik left dan height nya ketika animate
	$("#btnGo").css("left", "400px"); //set left nya untuk pertama kali
	var allProvinsi = <?php echo json_encode($allProvinsi);?>;
	var allKota = <?php echo json_encode($allKota);?>;
	var allJurusan = <?php echo json_encode($allJurusan);?>;
	var mhs=<?php echo json_encode($arrobj);?>;
	var field=<?php echo json_encode($tableview);?>;
	var kiri='<?php echo $by; ?>';
	var kanan='<?php echo $kanan; ?>';
	if(kiri!=''){
		$("#cbKiri").val(kiri);
		$("#cbKanan").val(kanan);
	}
	var selected = document.getElementById('cbKiri').value;
	$("#cbKiri").change(cbKiriSelected);
	
	function cbKiriSelected()
	{
		selected = document.getElementById('cbKiri').value; //var selected = value item yg diselect di cbKiri
		
		if (selected != "all")
		{
			$("#btnGo").animate({left: '650px'}, 200); //button geser kanan selama 200ms dengan cara left nya diubah dari 100px menjadi 300px 
			$("#cbKanan").fadeOut(0); //dihilangkan supaya bisa dibuat efek kemunculan
			cbKanan.innerHTML = ""; //kosongkan dulu isi combobox cbKanan
			
			if (selected == "provinsi")
			{
				for(var i=0;i<allProvinsi.length;i++){
					var newopt= $('<option value="'+allProvinsi[i].id+'">'+allProvinsi[i].nama+'</option>');
					$("#cbKanan").append(newopt);
				}
			}
			else if (selected == "kota") //allKota[index], berarti index adalah KOT001, KOT002, dll
			{
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
			$("#btnGo").animate({left: '400px'}, 200);
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