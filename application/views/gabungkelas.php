<html>
<head>
	<title>Jadwal Ruang Kelas</title>

	<style>
		
	</style>	
</head>
<?php
	echo form_open('plottingdosen/gabungkelas'); ?>
	<center>
  <div class="row">
          <div class="panel-body">
            <p style="font-size:20pt" align="center"><b>
            Gabung Kelas<br>
            Jurusan <?php echo $major; ?><br>
            Semester <?php echo $semester['value']; ?><br>
            </b></p>
          </div>
          <hr class="endHeaderTable"></hr>
		<hr align='center', width='50%'>
		<div class='isi'>
    </center>
        	<center>
      <div class="panel-heading"><b>Daftar Kelas</b></div>
      <table style='width:60%', class="table table-striped">
				<tr align='left'>
					<td align='center'>
  						<span style='font-weight:bold'>Nama Mata Kuliah</span>
  					</td>
            <td align='center'>
              <span style='font-weight:bold'>Kelas</span>
            </td>
					<td align='center'>
  						<span style='font-weight:bold'>Dosen</span>
  					</td>
					<td align='center'>
  						<span style='font-weight:bold'>Ruangan</span>
  					</td>
  					<td align='center'>
  						<span style='font-weight:bold'>Hari</span>
  					</td>
            <td align='center'>
              <span style='font-weight:bold'>Jam</span>
            </td>
            <td align='center'>
              <span style='font-weight:bold'>Mahasiswa</span>
            </td>
            <td align='center'>
              <?php echo form_submit('sort', "Sort"); ?>
            </td>
  				</tr>
      <?php
  	 	foreach($classes as $class){
  	 		echo "<tr align='left'>
					<td align='left'>
  						<span>";
  			echo			$class->namaMataKuliah."</span>
  					</td>
            <td align='center'>
              <span>".$class->namaKelas."</span>
            </td>
					<td align='center'>
  						<span'>".$class->namaDosen."</span>
  					</td>
					<td align='center'>
  						<span'>".$class->namaRuangan."</span>
  					</td>
  					<td align='center'>
  						<span'>";
  			  if($class->hari == "1"){
                       echo "Senin"; 
              }else if($class->hari == "2"){
                       echo "Selasa"; 
              }
              else if($class->hari == "3"){
                       echo "Rabu"; 
              }
              else if($class->hari == "4"){
                       echo "Kamis"; 
              }
              else if($class->hari == "5"){
                       echo "Jumat"; 
              }
              else if($class->hari == "6"){
                       echo "Sabtu"; 
              }
              else if($class->hari == "7"){
                       echo "Minggu"; 
              }
              echo "</span>
  					</td>
            <td align='center'>
              <span>".$class->jam_mulai."</span>
            </td>
            <td align='center'>
              <span>".$class->jumlah_mahasiswa."</span>
            </td>
            <td align='center'>
            	";echo form_submit($class->idKelas, 'Gabung')."
            </td>
  				</tr>";
  		}	
      ?>
  		  </table>
  		</div>
      <?php echo form_close(); ?>
      <br>
</html>