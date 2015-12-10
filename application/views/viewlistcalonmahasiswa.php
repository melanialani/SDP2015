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
		bottom: -40px;
		min-height: 80px;
		background-color: #f5f5f5;
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
		margin: 30px 0px 0px 300px;
	}
	
	#title_line {
		border-bottom: 1px solid black;
		margin: 10px 0px 50px -100px;
		width: 1100px;
	}
	
	#status_label {
		margin: 0px 20px 0px 0px;
		font-size: 12pt;
		float: left;
	}
	
	#status_dropdown {
		width: 200px;
		float: left;
		height: 30px;
		padding-top: 5px;
		margin-top: -3px;
		margin-bottom: 20px;
	}
	
	#btnSimpan {
		float: right;
	}
	
	.table tbody tr:hover {
		background-color: #c5d9ec;
	}
	
	.btn1 {
		width: 100%;
		height: 100%;
		padding: 0;
		text-align: left;
		background-color: transparent;
		border: 0;
		white-space: normal;
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
	
	<h2 id="title">List Calon Mahasiswa</h2>
	<div id="title_line"></div>
	<div id="status_container">
	<?php
		$attrForm = array("id" => "formStatus");
		echo form_open('pimpinanPMB/listCalonMahasiswa', $attrForm);
		$attrStatus = 'id="status_dropdown" class="form-control"';
		echo "<label id='status_label'>Status :</label>";
		echo form_dropdown('status',
					array(
						'belum' => 'Belum Dikategorikan',
						'sudah' => 'Sudah Dikategorikan'
					),
			$dropdownStatus, $attrStatus);
		echo form_close();
		//----
		echo "</div>";
		echo form_open('pimpinanPMB/listCalonMahasiswa');
		
	?>
	
	<table class='table table-hover table-striped table-responsive'>
		<thead>
	<?php
			echo "<tr class='head'>";
			//No Registrasi
			echo form_open('pimpinanPMB/listCalonMahasiswa1');
			echo "<th width='90px'>".form_submit('submit','Nomor Registrasi',"class='btn1'")."</th>";
			if($sort=='asc'){
				echo form_hidden('sort','desc');
			}
			else{
				echo form_hidden('sort','asc');
			}
			echo form_hidden('status',$this->input->post('status'));
			echo form_hidden('field','nomor_registrasi_id');
			echo form_close();
			//Nama
			echo form_open('pimpinanPMB/listCalonMahasiswa1');		
			echo "<th>".form_submit('submit','Nama',"class='btn1'")."</th>";
			if($sort=='asc'){
				echo form_hidden('sort','desc');
			}
			else{
				echo form_hidden('sort','asc');
			}
			echo form_hidden('status',$this->input->post('status'));
			echo form_hidden('field','nama');
			echo form_close();
			//Nilai Mat
			echo form_open('pimpinanPMB/listCalonMahasiswa1');
			echo "<th width='80px'>".form_submit('submit','Nilai Mat',"class='btn1'")."</th>";
			if($sort=='asc'){
				echo form_hidden('sort','desc');
			}
			else{
				echo form_hidden('sort','asc');
			}
			echo form_hidden('status',$this->input->post('status'));
			echo form_hidden('field','nilai_mat');
			echo form_close();
			//Nilai Inggris
			echo form_open('pimpinanPMB/listCalonMahasiswa1');
			echo "<th width='80px'>".form_submit('submit','Nilai Inggris',"class='btn1'")."</th>";
			if($sort=='asc'){
				echo form_hidden('sort','desc');
			}
			else{
				echo form_hidden('sort','asc');
			}
			echo form_hidden('status',$this->input->post('status'));
			echo form_hidden('field','nilai_inggris');
			echo form_close();
			//Nilai Average
			echo form_open('pimpinanPMB/listCalonMahasiswa1');
			echo "<th width='80px'>".form_submit('submit','Nilai Average',"class='btn1'")."</th>";
			if($sort=='asc'){
				echo form_hidden('sort','desc');
			}
			else{
				echo form_hidden('sort','asc');
			}
			echo form_hidden('status',$this->input->post('status'));
			echo form_hidden('field','nilai_rata_rata');
			echo form_close();
			//Jurusan
			echo form_open('pimpinanPMB/listCalonMahasiswa1');
			echo "<th>".form_submit('submit','Jurusan',"class='btn1'")."</th>";
			if($sort=='asc'){
				echo form_hidden('sort','desc');
			}
			else{
				echo form_hidden('sort','asc');
			}
			echo form_hidden('status',$this->input->post('status'));
			echo form_hidden('field','jurusan');
			echo form_close();
			//Tahun Ajaran
			echo form_open('pimpinanPMB/listCalonMahasiswa1');
			echo "<th>".form_submit('submit','Tahun Ajaran',"class='btn1'")."</th>";
			if($sort=='asc'){
				echo form_hidden('sort','desc');
			}
			else{
				echo form_hidden('sort','asc');
			}
			echo form_hidden('status',$this->input->post('status'));
			echo form_hidden('field','thn');
			echo form_close();
			//Kategori
			echo form_open('pimpinanPMB/listCalonMahasiswa1');
			echo "<th width='90px'>".form_submit('submit','Kategori',"class='btn1'")."</th>";
			if($sort=='asc'){
				echo form_hidden('sort','desc');
			}
			else{
				echo form_hidden('sort','asc');
			}
			echo form_hidden('status',$this->input->post('status'));
			echo form_hidden('field','kategori');
			echo form_close();
		echo "</tr>";
	?>
		</thead>
		<tbody>
	<?php
		//----------------------------------------------
		if(isset($listCalonMahasiswa) && $listCalonMahasiswa!="")
		{
			
			if(count($listCalonMahasiswa)<=$end)
			{
				$end = count($listCalonMahasiswa)-1;
			}
			//harusnya ini pake foreach cuma karena mo pake paging jadnya yang $r-> tak ganti jadi $listcalonmahasiswa[index]-> , jdi klo mo balikin ke yang normal, for yang ada pake $i ini, gantien jadi foreach, yang $listcalonmahasiswa[index]-> jadi $r->
			//foreach ($listCalonMahasiswa as $r)
			for($i=$start;$i<$end;$i++)
			{ ?>
			<tr>
				<td><?php echo $listCalonMahasiswa[$i]->nomor_registrasi_id;?></td>
				<td><?php echo $listCalonMahasiswa[$i]->nama;?></td>
				<td><?php echo $listCalonMahasiswa[$i]->nilai_mat;?></td>
				<td><?php echo $listCalonMahasiswa[$i]->nilai_inggris;?></td>
				<td><?php echo $listCalonMahasiswa[$i]->nilai_rata_rata;?></td>
				<td><?php echo $listCalonMahasiswa[$i]->jurusan;?></td>
				<td><?php echo '20'.$listCalonMahasiswa[$i]->thn."/20".($listCalonMahasiswa[$i]->thn+1);?></td>
				<td><?php 
					if ($dropdownStatus=='belum' ||$dropdownStatus=="")
					{
						echo "  1".form_radio($listCalonMahasiswa[$i]->nomor_registrasi_id,'1',FALSE);
						echo "  2".form_radio($listCalonMahasiswa[$i]->nomor_registrasi_id,'2',FALSE);
						echo "  3".form_radio($listCalonMahasiswa[$i]->nomor_registrasi_id,'3',FALSE);
					}
					else
					{
						 echo $listCalonMahasiswa[$i]->kategori;
					}
				
				?></td>
			</tr>
	 <?php } 
			
		}
	echo "</tbody>";
	echo "</table>";
	//-------------------------------------MENAMPILKAN HALAMAN
	for($i=0;$i<count($listCalonMahasiswa)/10;$i++)
	{
		echo anchor(site_url('pimpinanPMB/listCalonMahasiswa').'/'.$i, "[".($i+1)."]");
	}
	//-----------------------------------------
	if(($dropdownStatus == "belum" || $dropdownStatus == "") && count($listCalonMahasiswa) > 0)
	{
		$attrBtnSimpan = 'id="btnSimpan" class="btn btn-primary"';
		echo form_submit('btnSimpan','SIMPAN', $attrBtnSimpan);
		echo form_close();
	}
	?>

</div>
<?php require_once('footer.php'); ?>
</body>
<script>
$(document).ready(function() {
	$("#status_dropdown").change(function() {
		$("#formStatus").submit();
	});
});
</script>
</html>