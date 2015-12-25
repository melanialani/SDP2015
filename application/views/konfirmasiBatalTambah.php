<?php
	/*
		Versi : 1.1
		Nama file : konfirmasiBatalTambah.php
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
	echo form_open('bataltambahdrop/konfirmasiBatalTambah');
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
					<div class="panel-heading ">Daftar Nama Mahasiswa</div>
					<div class="panel-body">
						<table class="table table-striped">
							<tr>
								<th class='text-center'>No</th>
								<th class='text-center'>NRP Mahasiswa</th>
								<th class='text-center'>Nama Mahasiswa</th>
								<th class='text-center'>Semester</th>
								<th class='text-center'>Matakuliah Tambah</th>
								<th class='text-center'>Matakuliah Batal</th>
								<th class='text-center'>Matakuliah Drop</th>
								<th class='text-center'>Total SKS Semester ini</th>
							</tr>
							
							<?php
							//hasil select database, berupa daftar mahasiswa yang melakukan batal tambah
								$no = 1;
								foreach($listallstudents as $listallstudent)
								{	
									echo "<tr>";
									echo "<td class='text-center'>$no</td>";
									$no++;
									echo "<td class='text-center'>";
									echo anchor('bataltambahdrop/konfirmasiBatalTambahMahasiswa/'.$listallstudent->nrp,  $listallstudent->nrp, 'class="link-class"');
									echo "</td>";
									echo "<td class='text-center'>". $listallstudent->nama_mahasiswa ."</td>";
									echo "<td class='text-center'>5</td>";
									
									
									echo "<td class='text-center'>";
									foreach($students as $student)
									{
										if($student->status_ambil == 't' and $student->nrp == $listallstudent->nrp)
										{
											echo '<li>' . $student->nama_mata_kuliah . '</li>';
										}
									}
									echo ".</td>";
									echo "<td class='text-center'>";
									foreach($students as $student)
									{
										if($student->status_ambil == 'b' and $student->nrp == $listallstudent->nrp)
										{
											echo '<li>' . $student->nama_mata_kuliah . '</li>';
										}
									}
									echo ".</td>";
									echo "<td class='text-center'>";
									foreach($students as $student)
									{
										if($student->status_ambil == 'd' and $student->nrp == $listallstudent->nrp)
										{
											echo '<li>' . $student->nama_mata_kuliah . '</li>';
										}
									}
									echo ".</td>";
									$jumsks = 0;
									foreach($jadwalstudents as $jadwalstudent)
									{	
										//menghitung jumlah sks yang sedang diambil mahasiswa
										if($jadwalstudent->nrp == $listallstudent->nrp)
										{
											$jumsks +=  $jadwalstudent->sks;
										}
									}
									echo "<td class='text-center'>" . $jumsks . "</td>";
									echo "</tr>";
									
								}
								//history
								foreach($listhistories as $listhistory)
								{	
									//echo "<tr class = 'success'>";
									foreach($students as $student)
									{
										if(($student->status_ambil == 'x' or $student->status_ambil == 'y' or $student->status_ambil == 'z') and $student->nrp == $listhistory->nrp)
										{
											
											echo "<tr class = 'danger'>";
											break;
										}
										else if (($student->status_ambil == 'T' or $student->status_ambil == 'B' or $student->status_ambil == 'D') and $student->nrp == $listhistory->nrp)
										{
											echo "<tr class = 'success'>";
											break;
										}
									}
									echo "<td class='text-center'>$no</td>";
									$no++;
									echo "<td class='text-center'>";
									echo $listhistory->nrp;
									echo "</td>";
									echo "<td class='text-center'>". $listhistory->nama_mahasiswa ."</td>";
									echo "<td class='text-center'>5</td>";
									
									
									echo "<td class='text-center'>";
									foreach($students as $student)
									{
										if(($student->status_ambil == 'y' or $student->status_ambil == 'T') and $student->nrp == $listhistory->nrp)
										{
											echo '<li>' . $student->nama_mata_kuliah . '</li>';
										}
									}
									echo ".</td>";
									echo "<td class='text-center'>";
									foreach($students as $student)
									{
										if(($student->status_ambil == 'x' or $student->status_ambil == 'B') and $student->nrp == $listhistory->nrp)
										{
											echo '<li>' . $student->nama_mata_kuliah . '</li>';
										}
									}
									echo ".</td>";
									echo "<td class='text-center'>";
									foreach($students as $student)
									{
										if(($student->status_ambil == 'z' or $student->status_ambil == 'D') and $student->nrp == $listhistory->nrp)
										{
											echo '<li>' . $student->nama_mata_kuliah . '</li>';
										}
									}
									echo ".</td>";
									$jumsks = 0;
									
									foreach($jadwalstudents as $jadwalstudent)
									{	
										//menghitung jumlah sks yang sedang diambil mahasiswa
										//echo $listhistory->nrp;
										if($jadwalstudent->nrp == $listhistory->nrp)
										{
											$jumsks +=  $jadwalstudent->sks;
										}
									}
									echo "<td class='text-center'>" . $jumsks . "</td>";
									echo "</tr>";
									
								}
								
							?>	
						</table>
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