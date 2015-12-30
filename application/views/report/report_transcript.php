<style>
	p { margin-bottom: 0px; }
</style>

<div class="container">
	<table align="center" border="0">
		<tr>
			<th style="text-align: left;"><label><b>NRP</b></label></th>
			<th style="padding-left: 7px; text-align: left;"><label>: <?php echo $nrp; ?></label></th>
		</tr>
		<tr>
			<th style="text-align: left;"><label><b>Nama</b></label></th>
			<th style="padding-left: 7px; text-align: left;"><label>: <?php echo $nama; ?></label></th>
		</tr>
		<tr>
			<th style="text-align: left;"><label><b>IPK</b></label></th>
			<th style="padding-left: 7px; text-align: left;"><label>: <?php echo $ipk; ?></label></th>
		</tr>
		<tr>
			<th style="text-align: left;"><label><b>Total SKS</b></label></th>
			<th style="padding-left: 7px; text-align: left;"><label>: <?php echo $total_sks; ?></label></th>
		</tr>
	</table>
	
	<?php for($i = 1; $i <= $jumlah_semester; $i++) {
		echo "<h4>SEMESTER " . $i . "</h4>";
		
		echo "\n <table id='table_transcript' class='table table-striped table-bordered' cellspacing='0' border='1' width='100%'> \n";
		echo "	<thead> \n";
		echo "		<tr> \n";
		echo "			<th><p align='center'> Kode </p></th> \n";
		echo "			<th><p align='center'> Mata Kuliah </p></th> \n";
		echo "			<th><p align='center'> SKS </p></th> \n";
		echo "			<th><p align='center'> Grade </p></th> \n";
		echo "		</tr> \n";
		echo "	</thead> \n";
		echo "	<tbody> \n";
		
		if (count($semester[$i]) == 0){
			echo "<tr><th colspan='4'><p align='center' style='font-weight:normal;'>Tidak ada mata kuliah yang diambil</p></th></tr>";
		} else {
			for($j = 0; $j < count($semester[$i]); $j++) {
				echo "		<tr> \n";
				echo "			<th><p align='center' style='font-weight:normal;'>" . $semester[$i][$j]['id'] . " </p></th> \n";
				echo "			<th><p align='center' style='font-weight:normal;'>" . $semester[$i][$j]['nama'] . " </p></th> \n";
				echo "			<th><p align='center' style='font-weight:normal;'>" . $semester[$i][$j]['jumlah_sks'] . " </p></th> \n";
				echo "			<th><p align='center' style='font-weight:normal;'>" . $semester[$i][$j]['nilai_grade'] . " </p></th> \n";
				echo "		</tr> \n \n";
			}
		}
		
		echo "	</tbody> \n";
		echo "</table> \n";
	} ?>
	
</div> <!-- End of Container -->