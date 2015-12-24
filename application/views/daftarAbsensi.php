<style type="text/css">	
	th
	{
		text-align:center;
	}	
</style>
	
<div class="container">		
	<center>
		<div class="page-header">
			<h2>		
				Daftar Absensi<br>
				Jurusan <?php echo $jurusanKajur; ?><br>	
			</h2>
		</div>

		<?php echo form_open('lihatAbsensi/daftarAbsensi');?>
		
		<br>
		<?php 
			foreach($table as $row) 
			{ 
				$dayName="";
				if($row->hari == 1)
				{
					$dayName="Senin";
				}
				else if($row->hari == 2)
				{
					$dayName="Selasa";
				}
				else if($row->hari == 3)
				{
					$dayName="Rabu";
				}
				else if($row->hari == 4)
				{
					$dayName="Kamis";
				}
				else if($row->hari == 5)
				{
					$dayName="Jumat";
				}
				else if($row->hari == 6)
				{
					$dayName="Sabtu";
				}
				else if($row->hari == 7)
				{
					$dayName="Minggu";
				}
		?>
		
			<table align="center" border="0">
				<tr>
					<td style="text-align:left;"><label>Jurusan</label></td>
					<td style="padding-left: 7px; text-align: left;">: <?php echo $jurusanKajur; ?></td>
				</tr>
				<tr>
					<td style="text-align: left;"><label>Nama Mata Kuliah</label></td>
					<td style="padding-left: 7px; text-align: left;">: <?php echo $row->namaMataKuliah; ?></td>
				</tr>
				<tr>
					<td style="text-align: left;"><label>Dosen</label></td>
					<td style="padding-left: 7px; text-align: left;">: <?php echo $row->namaDosen; ?></td>
				</tr>
				<tr>
					<td style="text-align: left;"><label>Ruangan</label></td>
					<td style="padding-left: 7px; text-align: left;">: <?php echo $row->namaRuangan; ?></td>
				</tr>
				<tr>
					<?php
						$min = intval($row->jumlah_sks)*50;
						$nowTime = substr($row->jam_mulai,0,5);
						$addTime = strtotime("+{$min} minutes",strtotime($nowTime));
						$newTime = date('H:i:s',$addTime);
					?>
					<td style="text-align: left;"><label>Hari / Jam</label></td>
					<td style="padding-left: 7px; text-align: left;">: <?php echo $dayName." / ".substr($row->jam_mulai,0,5)."-".substr($newTime,0,5); ?></td>
				</tr>
				<tr>
					<td style="text-align: left;"><label>Jumlah Mahasiswa</label></td>
					<td style="padding-left: 7px; text-align: left;">: <?php echo $jml_mhs; ?></td>
				</tr>
			</table>
			
		<?php } ?>
		
		<br>
		
		<table class="table table-striped table-bordered" cellspacing="0" style='width:80%'>
		<tr>
			<th>No</th>
			<th>NRP</th>
			<th>Nama</th>
			<th colspan=14>Tanda Tangan</th>
		</tr>
		<?php $nomor=1; foreach($table2 as $row) { ?>
		<tr>
			<td style='text-align:center;'> <?php echo $nomor;?> </td>
			<td style="text-align:center;"> <?php echo $row->mahasiswa_nrp;?> </td>
			<td> <?php echo $row->nama; $nomor++;?> </td>
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
		
		<br>
		<?php 
			echo form_submit(array('name'=>'btnPrint','value'=>'Print','class'=>'btn btn-primary','style'=>'float:right;'));
			echo form_hidden('txtChoosenSemesterYear', $choosenSemesterYear); 
			echo form_hidden('txtSiapa2', $siapa2); 
			echo form_close(); 
		?>
	</center>
</div>
	


