<?php
	/*
		Versi : 1.1
		Nama file : konfirmasiBatalTambahmahasiswa.php
		Nama program : view batal tambah drop
		Kelompok : Perwalian
		Nama Penulis: Ricky Said
		NRP : 213116261
		input : 
		output :
		tujuan :
		Tanggal Pembuatan : 14 November 2015
		
		
		Penjelasan Program:
		Tampilan view untuk konfirmasi batal, tambah, dan drop
		versi awal hanya select beberapa data dari database, jumlah sks, nomer, dan semester dari table masih belum sesuai
		karena database masih perlu diperbaiki
		button , textbox, masih belum diberi nama
		**new
		pengabbungan data dan pembuatan event click di nrp
	*/
	
	//load function controller untuk konfirmasiBatalTambah.php
	echo form_open('bataltambahdrop/konfirmasiBatalTambahMahasiswa/' . $nrp);
?>
<!doctype html>
<html>
	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sistem Informasi Mahasiswa STTS</title>
		<!--
			Load Program external, berupa bootstrap dan css, dan icon-icon yang diperlukan
		-->
		
		
	</head>
	<body style="background:#dfe7ff">
		
	<!--HEADER-->
	<!--
			Load View Header
	-->
	<?php
		//$this->load->view('header');
	?>
	
	
		
	<!--CONTENT-->
		<div class="container">
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading ">Daftar Matakuliah</div>
					<div class="panel-body">
						
						<div class="col-sm-12" style="background:white">
							<div class="col-sm-5" style="background:transparent">
								<?php
								foreach($datastudents as $datastudent)
								{	
									//semester,ips,total sks saat ini belum terselect
									echo 'NRP : ' .$datastudent->nrp . "<br>";
									echo 'Nama : ' .$datastudent->nama . "<br>";
									echo 'Semester : ' . $datastudent->semester . "<br>";
									$ipsemester = 0;
									foreach($ipsall as $ips)
									{
										if($ips->semester == $datastudent->semester - 1)
										{
											$ipsemester = $ips->ips;
										}
									}
									echo 'IPs : ' . $ipsemester . "<br>";
									
									echo 'IPk : ' .$datastudent->ipk . "<br>";
									echo 'Total SKS yang telah diambil : ' .$datastudent->total_sks . "<br>";
									$jumsks = 0;
									foreach($jadwalstudents as $jadwalstudent)
									{	
										//menghitung jumlah sks yang sedang diambil mahasiswa
										$jumsks +=  $jadwalstudent->sks;
									}
									echo 'Total SKS yang sedang diambil : ' . $jumsks ."<br>";
								}
								?>
							  </div>
							  
						  </div>
						  <div class="col-sm-6 col-md-offset-3" style="background:transparent">
								  <div class="panel panel-default">
									  <table class="table table-striped">
										<tr>
											<th>Kode Matkul</th>
											<th>Nama Matkul</th>
											<th>Semester</th>
											<th>SKS</th>
										</tr>
											<?php
											foreach($jadwalstudents as $jadwalstudent)
											{	
												//jadwal kuliah
												echo '<tr>';
												echo '<td>' . $jadwalstudent->mata_kuliah_id . '</td>';
												echo '<td>' . $jadwalstudent->nama_mata_kuliah . '</td>';
												echo '<td>' . $jadwalstudent->semester . '</td>';
												echo '<td>' . $jadwalstudent->sks . '</td>';
												echo '</tr>';
											}
											?>
									  </table>
								  </div>
							  </div>
						
						<table class="table table-striped">
							<tr>
								<th class='text-center'>No</th>
								<th class='text-center'>Matakuliah</th>
								<th class='text-center'>Semester</th>
								<th class='text-center'>Jenis Perubahan</th>
								<th class='text-center'>Jumlah SKS Matakuliah</th>
							</tr>
							<?php
							$no = 0;
							foreach($students as $student)
							{
								if($student->nrp == $nrp)
								{
									$no++;
									echo "<tr>";
									echo "<td class='text-center'>" . $no . "</td>";
									echo "<td class='text-center'>" . $student->nama_mata_kuliah . "</td>";
									echo "<td class='text-center'>" . $student->semester_mata_kuliah . "</td>";
									if($student->status_ambil == 'b')
									{
										echo "<td class='text-center'>Batal</td>";
										$jumsks-=$student->jumlah_sks_mata_kuliah;
									}
									else if($student->status_ambil == 't')
									{
										echo "<td class='text-center'>Tambah</td>";
										$jumsks+=$student->jumlah_sks_mata_kuliah;
									}
									else if($student->status_ambil == 'd')
									{
										echo "<td class='text-center'>Drop</td>";
										$jumsks-=$student->jumlah_sks_mata_kuliah;
									}
									
									
									echo "<td class='text-center'>" . $student->jumlah_sks_mata_kuliah . "</td>";
									echo "</tr>";
								}
							}
							
							
							?>
						</table>
					<div class = 'pull-right'>
						<?php
							
							echo 'Total SKS setelah perubahan mata kuliah : '. $jumsks .'<br>';
						?>
						


							<?php
								echo form_submit('tolak', 'Tolak',"class='btn btn-danger pull-right' style='float:left;margin:0px 0px 0px 20px;'");
								echo form_submit('konfirmasi', 'Konfirmasi',"class='btn btn-primary pull-right''");
							?>
					</div>
					</div>
					
				</div>	
			</div>
		</div>

		
	<!--FOOTER-->
	<!--
		Load View Footer
	-->
	<?php
		//$this->load->view('footer');
	?>

	<!--ROLE MODEL POP UP-->
		<!--<div class="modal fade" id = "login" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<p>Login</p>
					</div>
					<div class="modal-body">
						  <form class="form-signin">
							<label for="inputEmail" class="sr-only">NRP</label>
							<input type="email" id="inputEmail" class="form-control" placeholder="NRP" required="" autofocus="">
							<label for="inputPassword" class="sr-only">Password</label>
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
							<div class="checkbox">
							  <label>
								<input type="checkbox" value="remember-me"> Remember me
							  </label>
							</div>
						  </form>
					</div>
					<div class="modal-footer">
						<a class = "btn btn-primary" data-dismiss="modal">Login</a>
						<a class = "btn btn-default" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>-->
		
		<!-- javascript -->
		<!--
			Load file jquery
		-->

			
	</body>
</html>
<?php
	//tutup form
	echo form_close();
?>