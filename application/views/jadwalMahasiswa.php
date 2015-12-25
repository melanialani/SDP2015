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
				Jadwal Mahasiswa<br>
				Jurusan <?php echo $jurusanKajur; ?><br>	
			</h2>
		</div>
		
	
	<br>	
	<table align="center" border="0">
		<tr>
			<td style="text-align: left;"><label>Jurusan</label></td>
			<td style="padding-left: 7px; text-align: left;">: <?php echo $jurusanKajur; ?></td>
		</tr>
		<tr>
			<td style="text-align: left;"><label>NRP</label></td>
			<td style="padding-left: 7px; text-align: left;">: <?php echo $table->nrp; ?></td>
		</tr>
		<tr>
			<td style="text-align: left;"><label>Nama</label></td>
			<td style="padding-left: 7px; text-align: left;">: <?php echo $table->nama; ?></td>
		</tr>
		<tr>
			<td style="text-align: left;"><label>Semester</label></td>
			<td style="padding-left: 7px; text-align: left;">: <?php echo $table->semester; ?></td>
		</tr>
	</table>
	
	<?php 
		echo form_open('lihatMahasiswa/jadwalMahasiswa');
	
		foreach($listSemester as $row) 
		{ 
			$temp2='table'.$row->semester;
			
			if($$temp2->num_rows() >0)
			{
				echo "<br><br>";
				echo "<h4 style='margin-left:-790px'><b>SEMESTER " . $row->semester . "</b></h4>";
	?>
	<table class="table table-striped table-bordered" cellspacing="0" style='width:80%'>
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
			<td style='text-align:center;'><?php echo $nomor;?></td>
			<td width="35%"><?php echo $row->namaMataKuliah;?></td>
			<td style='text-align:center;'><?php echo $row->namaKelas;?></td>
			<td width="35%"><?php echo $row->namaDosen;?></td>
			<td style='text-align:center;'> 
				<?php 
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
				?> 
			</td>
			<?php
				$min = intval($row->jumlah_sks)*50;
				$nowTime = substr($row->jam_mulai,0,5);
				$addTime = strtotime("+{$min} minutes",strtotime($nowTime));
				$newTime = date('H:i:s',$addTime);
			?>
			<td style='text-align:center;' width="15%"><?php echo substr($row->jam_mulai,0,5)."-".substr($newTime,0,5);?></td>
			<td style='text-align:center;'><?php echo $row->namaRuangan;?></td>
		</tr>
		<?php $nomor++;} ?>
	</table>
	<?php } }?>
	
	<br>
	<?php 
		echo form_submit(array('name'=>'btnPrint','value'=>'Print','class'=>'btn btn-primary','style'=>'float:right;'));
		echo form_hidden('txtSiapa2', $siapa2);
		echo form_close(); 
	?>
</div>
