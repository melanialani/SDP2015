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
				Daftar Mahasiswa<br>
				Jurusan <?php echo $jurusanKajur; ?><br>	
			</h2>
		</div>
		
		<br>
		<?php 
			echo form_open('lihatMahasiswa/daftarMahasiswa');
			echo "Tahun Angkatan : ". form_dropdown('ddAngkatan',$arrAngkatan,$selectedAngkatan)." ";
			echo form_submit(array('name'=>'btnChoose','value'=>'Choose','class'=>'btn btn-primary','style'=>'margin-left:10px'));
			echo form_close(); 
		?>
		
		<br>
		
		<table class="table table-striped table-bordered" cellspacing="0" style='width:auto'>
			<tr>
				<th>No.</th>
				<th>NRP</th>
				<th>Nama</th>
				<th></th>
			</tr>
			
			<?php $nomor=1; foreach($table as $row) { ?>
			<?php echo form_open('lihatMahasiswa/jadwalMahasiswa');?>	
			<tr>
				<td style='text-align:center;'> <?php echo $nomor;?> </td>
				<td style='text-align:center;'> <?php echo $row->nrp;?> </td>
				<td> <?php echo $row->nama; $nomor++;?> </td>
				<td style='text-align:center;'> <?php echo form_submit(array('name'=>'btnLihatJadwal','value'=>'Lihat Jadwal','class'=>'btn btn-primary')) ?></td>
			</tr>
			<?php 
				echo form_hidden('txtSiapa', $row->nrp);
				echo form_close();} 
			?>
		</table>
		
	</center>
</div>
	

