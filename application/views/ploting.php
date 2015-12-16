<html>
<head>
	<title>Buka MataKuliah</title>

	<style>
		#kanan
		{
		width:74%;
		height:700px;
		left:0px;
		background-color: rgb(251,248,241);
		position:absolute;
		padding:0px 0px 10px 0px;
		overflow: scroll;
		}
		
		#tengah
		{
		width:50%;
		height:700px;
		left:25%;
		background-color: rgb(251,248,241);
		position:absolute;
		overflow: scroll;
		}
		
		#kiri
		{
		width:24%;
		height:700px;
		left:76%;
		background-color: rgb(251,248,241);
		position:absolute;
		overflow: scroll;
		}
	</style>	
</head>
<?php echo form_open('plottingdosen/index'); ?>

<div id="kanan">
<?php
	if($this->session->userdata('hide1') == 1){
	echo "Semester 1 " . form_submit('hide1','hide')."<br>";
	echo "<table class='table table-striped'> <tr> <td>mata kuliah</td> <td>dosen</td><td>dosen</td><td>dosen</td></tr>";
	$ke = 0;
	foreach($mata_kuliah1 as $i)
	{
		echo "<tr>";
		echo  "<td>".$i['nama']."</td>";
		echo "<td>".form_dropdown('dosen11'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen12'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen13'.$ke,$arrdosen)."</td>";
		$ke++;
	}
	echo "</table>";
	}else {echo "Semester 1 " . form_submit('hide1','tampil')."<br>";}
	
	if($this->session->userdata('hide2') == 1){
	echo "Semester 2 " . form_submit('hide2','hide')."<br>";
	echo "<table class='table table-striped'> <tr> <td>mata kuliah</td> <td>dosen</td><td>dosen</td><td>dosen</td></tr>";
	$ke = 0;
	foreach($mata_kuliah1 as $i)
	{
		echo "<tr>";
		echo  "<td>".$i['nama']."</td>";
		echo "<td>".form_dropdown('dosen21'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen22'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen23'.$ke,$arrdosen)."</td>";
		$ke++;
	}
	echo "</table>";
	}else {echo "Semester 2 " . form_submit('hide2','tampil')."<br>";}
	
	if($this->session->userdata('hide3') == 1){
	echo "Semester 3 " . form_submit('hide3','hide')."<br>";
	echo "<table class='table table-striped'> <tr> <td>mata kuliah</td> <td>dosen</td><td>dosen</td><td>dosen</td></tr>";
	$ke = 0;
	foreach($mata_kuliah1 as $i)
	{
		echo "<tr>";
		echo  "<td>".$i['nama']."</td>";
		echo "<td>".form_dropdown('dosen31'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen32'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen33'.$ke,$arrdosen)."</td>";
		$ke++;
	}
	echo "</table>";
	}else {echo "Semester 3 " . form_submit('hide3','tampil')."<br>";}
	
	if($this->session->userdata('hide4') == 1){
	echo "Semester 4 " . form_submit('hide4','hide')."<br>";
	echo "<table class='table table-striped'> <tr> <td>mata kuliah</td> <td>dosen</td><td>dosen</td><td>dosen</td></tr>";
	$ke = 0;
	foreach($mata_kuliah4 as $i)
	{
		echo "<tr>";
		echo  "<td>".$i['nama']."</td>";
		echo "<td>".form_dropdown('dosen41'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen42'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen43'.$ke,$arrdosen)."</td>";
		$ke++;
	}
	echo "</table>";
	}else {echo "Semester 4 " . form_submit('hide4','tampil')."<br>";}
	
	if($this->session->userdata('hide5') == 1){
	echo "Semester 5 " . form_submit('hide5','hide')."<br>";
	echo "<table class='table table-striped'> <tr> <td>mata kuliah</td> <td>dosen</td><td>dosen</td><td>dosen</td></tr>";
	$ke = 0;
	foreach($mata_kuliah5 as $i)
	{
		echo "<tr>";
		echo  "<td>".$i['nama']."</td>";
		echo "<td>".form_dropdown('dosen51'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen52'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen53'.$ke,$arrdosen)."</td>";
		$ke++;
	}
	echo "</table>";
	}else {echo "Semester 5 " . form_submit('hide5','tampil')."<br>";}
	
	if($this->session->userdata('hide6') == 1){
	echo "Semester 1 " . form_submit('hide6','hide')."<br>";
	echo "<table class='table table-striped'> <tr> <td>mata kuliah</td> <td>dosen</td><td>dosen</td><td>dosen</td></tr>";
	$ke = 0;
	foreach($mata_kuliah6 as $i)
	{
		echo "<tr>";
		echo  "<td>".$i['nama']."</td>";
		echo "<td>".form_dropdown('dosen61'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen62'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen63'.$ke,$arrdosen)."</td>";
		$ke++;
	}
	echo "</table>";
	}else {echo "Semester 6 " . form_submit('hide6','tampil')."<br>";}
	
	if($this->session->userdata('hide7') == 1){
	echo "Semester 7 " . form_submit('hide7','hide')."<br>";
	echo "<table class='table table-striped'> <tr> <td>mata kuliah</td> <td>dosen</td><td>dosen</td><td>dosen</td></tr>";
	$ke = 0;
	foreach($mata_kuliah7 as $i)
	{
		echo "<tr>";
		echo  "<td>".$i['nama']."</td>";
		echo "<td>".form_dropdown('dosen71'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen72'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen73'.$ke,$arrdosen)."</td>";
		$ke++;
	}
	echo "</table>";
	}else {echo "Semester 7 " . form_submit('hide7','tampil')."<br>";}
	
	if($this->session->userdata('hide8') == 1){
	echo "Semester 8 " . form_submit('hide8','hide')."<br>";
	echo "<table class='table table-striped'> <tr> <td>mata kuliah</td> <td>dosen</td><td>dosen</td><td>dosen</td></tr>";
	$ke = 0;
	foreach($mata_kuliah8 as $i)
	{
		echo "<tr>";
		echo  "<td>".$i['nama']."</td>";
		echo "<td>".form_dropdown('dosen81'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen82'.$ke,$arrdosen)."</td>";
		echo "<td>".form_dropdown('dosen83'.$ke,$arrdosen)."</td>";
		$ke++;
	}
	echo "</table>";
	}else {echo "Semester 8 " . form_submit('hide8','tampil')."<br>";}
	
	echo form_submit('simpan','simpan');
?>
</div>




<div id="kiri">
<?php
			echo "<table border=1> <tr> <td>nama dosen</td> <td>beban sks</td></tr>";
			foreach($dosenku as $i)
			{
			echo "<tr>";
			echo  "<td>".$i['nama']."</td>";
			echo  "<td>".$i['jumlah_sks_mengajar']."</td></tr>";
			}
			echo "</table>";
			
			?>
</div>
	
</html>