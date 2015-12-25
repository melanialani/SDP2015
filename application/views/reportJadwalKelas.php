<style>
	p { margin-bottom: 0px; }
</style>

<div class="container">
			
	<br>
	<br>
	
	<table  border="0">
		<tr>
			<td style="text-align: left;"><label><b>Tahun Ajaran</b></label></td>
			<td style="padding-left: 0px; text-align: left;"><label>: <?php echo $selectedSemesterYear; ?></label></td>
		</tr>
		<tr>
			<td style="text-align: left;"><label><b>Jurusan</b></label></td>
			<td style="padding-left: 0px; text-align: left;"><label>: <?php echo $jurusanKajur; ?></label></td>
		</tr>
		<tr>
			<td style="text-align: left;"><label><b>Ketua Jurusan</b></label></td>
			<td style="padding-left: 0px; text-align: left;"><label>: <?php echo $namaKajur; ?></label></td>
		</tr>		
	</table>
	
	<?php
		$totalClass=0;
		foreach($listSemester as $row) 
		{ 
			$temp2='table'.$row->semester;
			
			if($$temp2->num_rows() >0)
			{
				echo "<br><br>";
				echo "<h4 style='position:relative;left:120px'><b>Semester " . $row->semester . "</b></h4>";
	?>
	
	<table cellspacing='0' width='100%' border="1">
	<tr>
		<th>No.</th>
		<th>Nama Mata Kuliah</th>
		<th>SKS</th>
		<th>Kelas</th>
		<th>Hari</th>
		<th>Jam</th>
		<th>Ruangan</th>
	</tr>
		
	<?php $nomor=1; foreach($$temp2->result() as $row) { ?>
	<tr>
		<td style='text-align:center;'> <?php echo $nomor;?> </td>
		<td width="35%"> <?php echo $row->namaMataKuliah;?> </td>
		<td style='text-align:center;'> <?php echo $row->jumlah_sks;?> </td>
		<td style='text-align:center;'> <?php echo $row->namaKelas;?> </td>
		<?php 
			if($row->hari == 1)
			{
				echo "<td style='text-align:center;'>"."Senin"."</td>";
			}
			else if($row->hari == 2)
			{
				echo "<td style='text-align:center;'>"."Selasa"."</td>";
			}
			else if($row->hari == 3)
			{
				echo "<td style='text-align:center;'>"."Rabu"."</td>";
			}
			else if($row->hari == 4)
			{
				echo "<td style='text-align:center;'>"."Kamis"."</td>";
			}
			else if($row->hari == 5)
			{
				echo "<td style='text-align:center;'>"."Jumat"."</td>";
			}
		?>
		<td style='text-align:center;'> <?php echo substr($row->jam_mulai,0,5);?> </td>
		<td style='text-align:center;'> <?php echo $row->namaRuangan;?> </td>
	</tr>
	<?php $nomor++;$totalClass++;} ?>
	</table>
	<?php }}?>
	<br>
	<p align="right"><b><?php echo "Total Kelas:";?> </b> <?php echo $totalClass;?></p>
</div> <!-- End of Container -->