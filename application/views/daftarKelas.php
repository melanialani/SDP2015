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
				Daftar Kelas<br>
				Jurusan <?php echo $jurusanKajur; ?><br>	
			</h2>
		</div>
		
		<br>
		<?php echo form_open('lihatAbsensi/daftarKelas');?>
		<?php echo "Tahun Ajaran : ". form_dropdown('ddSemesterYear',$arrSemesterYear,$selectedSemesterYear,'style="margin-right:20px"'); ?>
		<?php 
			$options = array(
				'All' => 'All',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8'
			);
						
			echo "Semester : ".form_dropdown('ddSemester', $options, $selectedSemester)."<br>";
			echo form_submit(array('name'=>'btnChoose','value'=>'Choose','class'=>'btn btn-primary','style'=>'margin-top:15px'));
			echo form_close(); 
		?>
		
		<br>
		<table class="table table-striped table-bordered" cellspacing="0" style='width:auto'>
			<tr>
				<th>No.</th>
				<th>Semester</th>
				<th>Nama Mata Kuliah</th>
				<th>Kelas</th>
				<th></th>
			</tr>
			
			<?php $nomor=1; foreach($table as $row) { ?>
			<?php echo form_open('lihatAbsensi/daftarAbsensi');?>	
			<tr>
				<td style='text-align:center;'> <?php echo $nomor;?> </td>
				<td style='text-align:center;'> <?php echo $row->semester;?> </td>
				<td> <?php echo $row->namaMataKuliah;?> </td>
				<td style='text-align:center;'> <?php echo $row->namaKelas;?> </td>
				<td style='text-align:center;'> <?php echo form_submit(array('name'=>'btnLihatAbsensi','value'=>'Lihat Absensi','class'=>'btn btn-primary')) ?></td>
				
			</tr>
			<?php 
				echo form_hidden('txtSiapa', $row->id); 
				echo form_hidden('txtChoosenSemesterYear', $choosenSemesterYear);
				echo form_close();
				$nomor++;} 
			?>
		
		</table>
	</center>
</div>
