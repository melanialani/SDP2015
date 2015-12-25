<html>
<head>
	<title>Jadwal Ruang Kelas</title>

	<style>
		
	</style>	
</head>
<?php
	echo form_open('plottingdosen/pemisahankelas'); ?>
	<center>
  <div class="row">
          <div class="panel-body">
            <p style="font-size:20pt" align="center"><b>
            Pisah Kelas<br>
            Jurusan <?php echo $major; ?><br>
            Semester <?php echo $semester['value']; ?><br>
            </b></p>
          </div>
          <hr class="endHeaderTable"></hr>
		<hr align='center', width='50%'>
		<div class='isi'>
    </center>
    <center>
    <div class="panel-body">
            <p>
            <?php echo form_hidden('mainClassID', $selectedClass->idKelas); ?>
            <?php echo form_hidden('mainClassName', $selectedClass->namaKelas); ?>
            <?php echo form_hidden('idCourses', $selectedClass->idMataKuliah); ?>
            Mata Kuliah : <?php echo $selectedClass->namaMataKuliah ?><br>
            Kelas : <?php echo $selectedClass->namaKelas ?><br>
            Waktu : <?php if($selectedClass->hari == "1"){
                              echo "Senin"; 
                      }else if($selectedClass->hari == "2"){
                              echo "Selasa"; 
                        }
                      else if($selectedClass->hari == "3"){
                              echo "Rabu"; 
                        }
                        else if($selectedClass->hari == "4"){
                              echo "Kamis"; 
                        }
                      else if($selectedClass->hari == "5"){
                          echo "Jumat"; 
                      }
                      else if($selectedClass->hari == "6"){
                          echo "Sabtu"; 
                      }
                      else if($selectedClass->hari == "7"){
                          echo "Minggu"; 
                      }
                      echo " - ".$selectedClass->jam_mulai;
                      ?><br>
            Dosen : <?php echo $selectedClass->namaDosen ?>
            </p>
          </div>
    </center>
    <div class="panel-heading", align="left">Insert Kelas</div>
    <center>
    <table style='width:60%', class="table table-striped">
        <tr>
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
              "; echo form_dropdown('time', $time);
            ?>
          </tr>
        </table>
        <?php  echo form_submit('SplitClass', 'Pisah');
              echo form_submit('cancel', 'Cancel'); ?>
        </div>
        </center>
        <br><hr class="endHeaderTable"></hr><br>
  		  </table>
  		</div>
      <br>
</html>