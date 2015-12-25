<style>
	p { margin-bottom: 0px; }
</style>

<div class="container">
	
	<h3 align="center" style="padding-top: -25px">
	<?php echo "SEMESTER ".substr($choosenSemesterYear,0,5)." TAHUN AJARAN ".substr($choosenSemesterYear,5,10); ?>
	</h3>    
	
	<br>
	<br>
	<?php
		
		foreach($table as $row) {
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
	?>
		
		<table border="0" style="width:100%">
			<tr>
				<td style="text-align: left;"><label><b>Jurusan</b></label></td>
				<td style="text-align: left;"><label>: <?php echo $jurusanKajur; ?></label></td>
				<td style="text-align: left"><b><label>Ruangan</b></label></td>
				<td style="text-align: left"> <label>: <?php echo $row->namaRuangan; ?></label></td>
			</tr>
			<tr>
				<td style="text-align: left;"><label><b>Mata Kuliah</b></label></td>
				<td style="text-align: left;"><label>: <?php echo $row->namaMataKuliah; ?></label></td>
				<?php
						$min = intval($row->jumlah_sks)*50;
						$nowTime = substr($row->jam_mulai,0,5);
						$addTime = strtotime("+{$min} minutes",strtotime($nowTime));
						$newTime = date('H:i:s',$addTime);
				?>
				<td style="text-align: left;"><label><b>Hari / Jam</b></label></td>
				<td style="text-align: left;"><label>: <?php echo $namaHari." / ".substr($row->jam_mulai,0,5)."-".substr($newTime,0,5); ?></label></td>
			</tr>
			<tr>
				<td style="text-align: left;"><label><b>Dosen</b></label></td>
				<td style="text-align: left;"><label>: <?php echo $row->namaDosen; ?></label></td>
				<td style="text-align: left;"><label><b>Jumlah Mahasiswa</b></label></td>
				<td style="text-align: left;"><label>: <?php echo $jml_mhs; ?></label></td>
			</tr>
			<tr>		
		</table>
			
	<?php } ?>
		
	<br>
		
	<table cellspacing='0' width='100%' border="1">
		<tr>
			<th>No</th>
			<th>NRP</th>
			<th>Nama</th>
			<th colspan=14>Tanda Tangan</th>
		</tr>
		
		<?php $nomor=1; foreach($table2 as $row) { ?>
		<tr>
			<td style='text-align:center;'> <?php echo $nomor;?> </td>
			<td style='text-align:center;'> <?php echo $row->mahasiswa_nrp;?> </td>
			<td style="width:200px;"> <?php echo $row->nama; $nomor++;?> </td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
			<td> <?php echo "    "; ?></td>
		</tr>	
		<?php } ?>
		
	</table>
</div>
	