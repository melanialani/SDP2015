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
				Jadwal Ruang Kelas<br>
				Jurusan <?php echo $jurusanKajur; ?><br>	
			</h2>
		</div>
        
		<br>
		<?php 
			echo form_open('master/masterJadwalKelas');
			echo "Tahun Ajaran : ". form_dropdown('ddSemesterYear',$arrSemesterYear,$selectedSemesterYear)."";
			echo form_submit(array('name'=>'btnChoose','value'=>'Choose','class'=>'btn btn-primary','style'=>'margin-left:10px'));
			echo form_close(); 
			
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
				<th>SKS</th>
				<th>Kelas</th>
				<th>Hari</th>
				<th>Jam</th>
				<th>Ruangan</th>
				<th></th>
			</tr>
			
			<?php 
				$nomor=1; foreach($$temp2->result() as $row) {
				echo form_open('master/masterJadwalKelas');
			?>
			<tr>
				<td style="text-align:center;"> <?php echo $nomor;?> </td>
				<td width="35%"> <?php echo $row->namaMataKuliah;?> </td>
				<td style="text-align:center;"> <?php echo $row->jumlah_sks;?> </td>
				<td style="text-align:center;"> <?php echo $row->namaKelas;?> </td>
					
			<?php 
				if($idSiapa == '')
				{
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

					echo "<td style='text-align:center;'>".substr($row->jam_mulai,0,5)."</td>";
					echo "<td style='text-align:center;'>".$row->namaRuangan."</td>";
					echo form_hidden('txtChoosenSemesterYear', $choosenSemesterYear);
					echo "<td style='text-align:center;'>".form_submit(array('name'=>'btnEdit','value'=>'Edit','class'=>'btn btn-primary'))."</td>"; 
					
				}
				else
				{
					if($idSiapa == $row->id)
					{
						$options = array(
						  '1'  => 'Senin',
						  '2'    => 'Selasa',
						  '3'   => 'Rabu',
						  '4' => 'Kamis',
						  '5' => 'Jumat',
						);
						
						$options2 = array(
							'06:30:00' => '06:30',
							'08:00:00' => '08:00',
							'10:30:00' => '10:30',
							'13:00:00' => '13:00',
							'15:30:00' => '15:30',
							'18:00:00' => '18:00'
						);
			?>		
						<td style='text-align:center;'> <?php echo form_dropdown('ddHari', $options, $selectedHari);?> </td>
						<td style='text-align:center;'> <?php echo form_dropdown('txtJam',$options2,$selectedJam);?> </td>
						<td style='text-align:center;'> <?php echo form_dropdown('ddRuangan',$daftarRuangan,$selectedRuangan);?> </td>
						<?php echo form_hidden('txtChoosenSemesterYear', $choosenSemesterYear); ?>
						<td> <?php echo form_submit(array('name'=>'btnSave','value'=>'Save','class'=>'btn btn-primary'))." ".
						form_submit(array('name'=>'btnCancel','value'=>'Cancel','class'=>'btn btn-primary')); ?> </td> 
						
					<?php		
					} //punya if
					
					else
					{
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
					
						echo "<td style='text-align:center;'>".substr($row->jam_mulai,0,5)."</td>";
						echo "<td style='text-align:center;'>".$row->namaRuangan."</td>";
						echo form_hidden('txtChoosenSemesterYear', $choosenSemesterYear);
						echo "<td>".form_submit(array('name'=>'btnEdit','value'=>'Edit','class'=>'btn btn-primary'))."</td>"; 
		
					}
						
				}
			?>
					
			</tr>
				
			<?php 
				echo form_hidden('txtSiapa', $row->id);
				echo form_close();
				$nomor++;} 
			?>
				
		</table>
		<?php } }?>
		<br>
		<?php 
			echo form_open('master/masterJadwalKelas');
			echo form_hidden('txtChoosenSemesterYear', $choosenSemesterYear);		
			echo form_submit(array('name'=>'btnPrint','value'=>'Print','class'=>'btn btn-primary','style'=>'float:right;')); 
			echo form_close(); 
		?>
		
	</center>
</div>
