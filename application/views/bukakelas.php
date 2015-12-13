<html>
<head>
	<title>Jadwal Ruang Kelas</title>

	<!--<style>
	     	
	</style>-->	
</head>
<?php
	echo form_open('plottingdosen/bukakelas'); ?>
	<center>
  <div class="row">
          <div class="panel-body">
            <p style="font-size:20pt" align="center"><b>
            Buka Tutup Kelas<br>
            Jurusan <?php echo $major; ?><br>
            Semester <?php echo $semester['value']; ?><br>
            </b></p>
          </div>
          <hr class="endHeaderTable"></hr>
		<hr align='center', width='50%'>
		<div class='isi'>
    </center>
    <div class="panel-heading", align="center"><b>Insert Kelas</b></div>
    <center>
    <table style='width:60%', class="table table-striped">
				<tr>
					<td align='center'>
  						Nama Mata Kuliah :
  					</td>
  					<td align='center'>
  						Dosen : 
  					</td>
  					<td align='center'>
  						Ruang :
  					</td>
  					<td align='center'>
  						Hari :
  					</td>
  					<td align='center'>
  						Waktu :
  					</td>
  					<td align='center'>
  					</td>
  				</tr>
  				<tr>
          <?php echo"
					<td align='center'>
  						"; echo form_dropdown('coursesName', $coursesName); echo "	
  					</td>
  					<td align='center'>
 		             	"; echo form_dropdown('lecturersName', $lecturersName); echo "
  					</td>
  					<td align='center'>
  						"; echo form_dropdown('roomsName', $roomsName); echo "
            	</select>
  					</td>
  					<td align='center'>
  					"; echo form_dropdown('days', $days); echo "
  					</td>
  					<td align='center'>
  						"; echo form_dropdown('time', $time); echo "
  					</td>
  					<td align='center'>
  						"; echo form_submit('insertClass', 'Insert');
  					echo "</td>"
            ?>
  				</tr>
  			</table>
        </div>
  			</center>
        <br><hr class="endHeaderTable"></hr><br>
			<center>
      <div class="panel-heading"><b>Daftar Kelas</b></div>
      <table style='width:60%', class="table table-striped">
				<tr align='left'>
					<td align='center'>
  						<span style='font-weight:bold'><?php echo form_submit("Mata_Kuliah", "Nama Mata Kuliah"); ?></span>
  					</td>
            <td align='center'>
              <span style='font-weight:bold'><?php echo form_submit('Kelas', "Kelas"); ?></span>
            </td>
					<td align='center'>
  						<span style='font-weight:bold'><?php echo form_submit('Dosen', "Dosen"); ?></span>
  					</td>
					<td align='center'>
  						<span style='font-weight:bold'><?php echo form_submit('Ruangan', "Ruangan"); ?></span>
  					</td>
  					<td align='center'>
  						<span style='font-weight:bold'><?php echo form_submit('Hari', "Hari"); ?></span>
  					</td>
            <td align='center'>
              <span style='font-weight:bold'><?php echo form_submit('Jam_Mulai', "Jam"); ?></span>
            </td>
            <td align='center'>
              <span style='font-weight:bold'><?php echo form_submit('Jumlah_Mahasiswa', "Mahasiswa"); ?></span>
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
  						<span'>";if($class->hari == "1"){
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
            ";$js = "onClick='some_function()'";echo form_submit($class->idKelas, 'Tutup',$js)."
            </td>
  				</tr>";
  		}	
      echo form_close();
      ?>
      <script>
          function some_function()
          {
             $("#confirmation").modal();
          }
      </script>
  		  </table>
  		</div>
      <br>
      <div class="modal fade" id = "confirmation" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p>Submit Confirmation</p>
        </div>
        <div class="modal-body">
        Are You Sure You Want to Submit This?
        </div>
        <div class="modal-footer">
          <a class = "btn btn-primary" name="btnOk" data-dismiss="modal">Ok</a>
          <a class = "btn btn-default" name="btnCancel" data-dismiss="modal">Cancel</a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- javascript -->
  <script src="<?php echo base_url()?>assets/js/jquery-latest.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</html>