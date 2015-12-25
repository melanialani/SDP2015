<style>
	p { margin-bottom: 0px; }
</style>

<div class="container">
	<br>
	<br>
	<table border="0">
		<tr>
			<td style="text-align: left;"><label><b>Jurusan</b></label></td>
			<td style="padding-left: 7px; text-align: left;"><label>: <?php echo $jurusanKajur; ?></label></td>
		</tr>
		<tr>
			<td style="text-align: left;"><label><b>NRP</b></label></td>
			<td style="padding-left: 7px; text-align: left;"><label>: <?php echo $table->nrp; ?></label></td>
		</tr>
		<tr>
			<td style="text-align: left;"><label><b>Nama</b></label></td>
			<td style="padding-left: 7px; text-align: left;"><label>: <?php echo $table->nama; ?></label></td>
		</tr>
		<tr>
			<td style="text-align: left;"><label><b>Semester</b></label></td>
			<td style="padding-left: 7px; text-align: left;"><label>: <?php echo $table->semester; ?></label></td>
		</tr>
	</table>
			
	<?php foreach($listSemester as $row) { ?>
		
		<?php 
			$temp2='table'.$row->semester;
			
			if($$temp2->num_rows() >0)
			{
				echo "<br>";
				echo "<h4 style='position:relative;left:120px'><b>Semester " . $row->semester . "</b></h4>";
		?>
		
		
		<table cellspacing='0' width='100%' border="1">
		<tr>
			<th>No.</th>
			<th>Nama Mata Kuliah</th>
			<th>Kelas</th>
			<th>Dosen</th>
			<th>Hari</th>
			<th>Jam</th>
			<th>Ruang</th>
			
		</tr>
		<?php $nomor=1; foreach($$temp2->result() as $row) { ?>
		<tr>
			<td style='text-align:center;'> <?php echo $nomor;?> </td>
			<td width="30%"> <?php echo $row->namaMataKuliah;?> </td>
			<td style='text-align:center;'> <?php echo $row->namaKelas;?> </td>
			<td width="30%"> <?php echo $row->namaDosen;?> </td>
			<td style='text-align:center;'> <?php 
				$namaHari="";
				if($row->hari == 1)
				{
					$namaHari="Senin";
				}
				else if($row->hari == 2)
				{
					$namaHari="Selasa";
				}
				else if($row->hari == 3)
				{
					$namaHari="Rabu";
				}
				else if($row->hari == 4)
				{
					$namaHari="Kamis";
				}
				else if($row->hari == 5)
				{
					$namaHari="Jumat";
				}
				
				echo $namaHari;
				
			?> </td>
			<?php
				$min = intval($row->jumlah_sks)*50;
				$nowTime = substr($row->jam_mulai,0,5);
				$addTime = strtotime("+{$min} minutes",strtotime($nowTime));
				$newTime = date('H:i:s',$addTime);
			?>
			<td width="15%" style='text-align:center;'> <?php echo substr($row->jam_mulai,0,5)."-".substr($newTime,0,5);?> </td>
			<td style='text-align:center;'> <?php echo $row->namaRuangan;?> </td>
		</tr>
		<?php $nomor++;} ?>
		</table>
		<?php } }?>
		
		</div>
	</div>
	</center>

