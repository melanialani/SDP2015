<!DOCTYPE html>
<html>
<head>
<?php
	require_once('header-pmb.php'); 
	include_once('header_.php');
?>
<title>PMB STTS | Form Pendaftaran</title>

<style>
#tanggalLahir > div:hover {
	cursor: pointer;
}

#tanggalLahir > input:hover {
	cursor: pointer;
}

#container {
	width: 800px;
	margin: 0 auto;
}

#datapribadi_container, #datasekolah_container, #datawali_container {
	border: 2px solid #4169E1;
	width: inherit;
	padding-bottom: 25px;
}

#datapribadi_container {
	margin-top: -30px;
}

#datapribadi_title, #datasekolah_title, #datawali_title {
	width: 190px;
	border: 0px;
	margin-left: 300px;
	margin-top: 20px;
	font-size: 18pt;
	text-align: center;
}

#datawali_title {
	width: 260px;
	margin-left: 270px;
}

label {
	font-size: 12pt;
	font-weight: normal;
}

.form-group {
	margin-bottom: 0;
}

.form-control {
	height: 25px;
	padding-bottom: 0px;
	padding-top: 2px;
	margin-top: 6px;
}

.control-label {
	width: 330px;
}

#btnDaftar {
	float: right;
	margin: -20px 0px 0px 0px;
}

footer {
	position: absolute;
	bottom: -120px;
}

</style>
</head>
<body>

<?php echo $cetak; ?>
<div id="container">
	
	<h1 align="center">FORM PENDAFTARAN</h1><br>	
	<form id="contactForm" class="form-horizontal" method="post" novalidate="" enctype="multipart/form-data">
		
		<fieldset id="datapribadi_container">
			<legend id="datapribadi_title">Data Pribadi</legend>
			
			<div class="form-group" style="margin-top: -10px;">
				<label for="namaLengkap" class="col-sm-5 control-label">Nama Lengkap</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="namaLengkap" id="namaLengkap" placeholder="Contoh: Mark Zuckerberg">
				</div>
				<div class="help-block with-errors"></div>
			</div>
			
			<div class="form-group">
				<label for="jk" class="col-sm-5 control-label">Jenis Kelamin</label>
				<div class="col-sm-5">
					<label class="radio-inline">
						<input type="radio" name="jk" id="jk" value="L"> Laki - Laki
					</label>
					<label class="radio-inline" style="width: 170px;">
						<input type="radio" name="jk" id="jk" value="P"> Perempuan
					</label>
				</div>
			</div>
			
			<div class="form-group">
				<label for="tempatLahir" class="col-sm-5 control-label">Tempat Lahir</label>
				<div class="col-sm-5">
					<select class="form-control" name="tempatLahir" style="width: 250px;">
					<?php foreach($queryKota as $data) {?>
						<option value="<?php echo $data->nama; ?>"><?php echo $data->nama; ?></option>
					<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="tanggallahir" class="col-sm-5 control-label">Tanggal Lahir</label>
				<div class="col-sm-5">
					<div id="tanggalLahir" class="input-group date">
						<input class="form-control" type="text" name="tanggalLahir" id="tanggalLahir_text" readonly style="background-color: white;"/>
						<div class="input-group-addon" style="height: 0px; width: 0px;">
							<span class="glyphicon glyphicon-calendar"></span>
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="kewarganegaraan" class="col-sm-5 control-label">kewarganegaraan</label>
				<div class="col-sm-5">
					<label class="radio-inline">
						<input type="radio" name="kewarganegaraan" id="kewarganegaraan" value="WNI"> WNI
					</label>
					<label class="radio-inline" style="width: 120px;">
						<input type="radio" name="kewarganegaraan" id="kewarganegaraan" value="WNA"> WNA
					</label>
				</div>
			</div>
			
			<div class="form-group">
				<label for="statusSosial" class="col-sm-5 control-label">Status</label>
				<div class="col-sm-5">
					<select class="form-control" name="statusSosial" style="width: 100px;">
						<option value="single">Single</option>
						<option value="menikah">Menikah</option>
						<option value="duda">Duda</option>
						<option value="janda">Janda</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="agama" class="col-sm-5 control-label">Agama</label>
				<div class="col-sm-5">
					<select class="form-control" name="agama" style="width: 100px;">
						<option value="kristen">Kristen</option>
						<option value="katolik">Katolik</option>
						<option value="islam">Islam</option>
						<option value="budha">Budha</option>
						<option value="hindu">Hindu</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="alamat" class="col-sm-5 control-label">Alamat</label>
				<div class="col-sm-5" style="width: 430px;">
					<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Contoh: Ngagel Jaya Tengah 73-77 Surabaya" style="width: 400px;">
				</div>
			</div>
			
			<div class="form-group">
				<label for="provinsi" class="col-sm-5 control-label">Provinsi</label>
				<div class="col-sm-5">
					<select class="form-control" name="provinsi" id="provinsi" onChange="provinsiSelected()" style="width: 250px;">
					<?php foreach($queryProvinsi as $data) {?>
						<option value="<?php echo $data->id . '-' . $data->nama; ?>"><?php echo $data->nama; ?></option>
					<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="kota" class="col-sm-5 control-label">Kota</label>
				<div class="col-sm-5">
					<select class="form-control" name="kota" id="kota" style="width: 250px;"></select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="kodePos" class="col-sm-5 control-label">Kode Pos</label>
				<div class="col-sm-5" style="width: 250px;">
					<input type="text" class="form-control" name="kodePos" id="kodePos" placeholder="Contoh: 60223" style="width: 130px; padding-right: 15px;">
				</div>
			</div>
			
			<div class="form-group">
				<label for="noHp" class="col-sm-5 control-label">Nomor HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="noHp" id="noHp" placeholder="Contoh: 08155290322">
				</div>
			</div>
			
			<div class="form-group">
				<label for="foto" class="col-sm-5 control-label">Foto 4x6</label>
				<div class="col-sm-5" style="margin-top: 6px;">
					<span><input name="foto" id="foto" type="file" accept="image/jpg, image/JPG,image/JPEG, image/jpeg" required/></span>
				</div>
				<label for="foto" class="col-sm-5 control-label"></label>
				<div class="col-sm-5" style="margin-top: 6px;">
					<img id="foto_image">
				</div>
			</div>
			
			<div class="form-group">
				<label for="rapor" class="col-sm-5 control-label">Rapor</label>
				<div class="col-sm-5" style="margin-top: 6px;">
					<span><input name="rapor" id="rapor" type="file" accept="image/jpg, image/JPG,image/JPEG, image/jpeg"  required/></span>
				</div>
				<label for="rapor" class="col-sm-5 control-label"></label>
				<div class="col-sm-5" style="margin-top: 6px;">
					<img id="rapor_image">
				</div>
			</div>
			
			<div class="form-group">
				<label for="nilaiMat" class="col-sm-5 control-label">Nilai Matematika</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="nilaiMat" id="nilaiMat" placeholder="0-100" style="width: 100px;">
				</div>
			</div>
			
			<div class="form-group">
				<label for="nilaiIng" class="col-sm-5 control-label">Nilai Inggris</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="nilaiIng" id="nilaiIng" placeholder="0-100" style="width: 100px;">
				</div>
			</div>
			
			<div class="form-group">
				<label for="akteKelahiran" class="col-sm-5 control-label">Akte Kelahiran</label>
				<div class="col-sm-5" style="margin-top: 6px;">
					<span><input name="akteKelahiran" id="akteKelahiran" type="file" accept="image/jpg, image/JPG,image/JPEG, image/jpeg"  required/></span>
				</div>
				<label for="akteKelahiran" class="col-sm-5 control-label"></label>
				<div class="col-sm-5" style="margin-top: 6px;">
					<img id="akteKelahiran_image">
				</div>
			</div>
			
			<div class="form-group">
				<label for="kartuKeluarga" class="col-sm-5 control-label">Kartu Keluarga</label>
				<div class="col-sm-5" style="margin-top: 6px;">
					<span><input name="kartuKeluarga" id="kartuKeluarga" type="file" accept="image/jpg, image/JPG,image/JPEG, image/jpeg"  required/></span>
				</div>
				<label for="kartuKeluarga" class="col-sm-5 control-label"></label>
				<div class="col-sm-5" style="margin-top: 6px;">
					<img id="kartuKeluarga_image">
				</div>
			</div>
			
			<div class="form-group">
				<label for="jurusan" class="col-sm-5 control-label">Pilihan Jurusan</label>
				<div class="col-sm-5">
					<select class="form-control" name="jurusan">
						<?php foreach($queryJurusan as $data) {?>
						<option value="<?php echo $data->id; ?>"><?php echo $data->jurusan; ?></option>
					<?php } ?>
					</select>
				</div>
			</div>
	 	</fieldset>
	 	
	 	<fieldset id="datasekolah_container">
	 		<legend id="datasekolah_title">Data Sekolah</legend>
		 		
			<div class="form-group" style="margin-top: -10px;">
				<label for="namaSekolah" class="col-sm-5 control-label">Nama Sekolah</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="namaSekolah" id="namaSekolah" placeholder="Contoh: SMA Kristen Petra 1">
				</div>
			</div>
			
			<div class="form-group">
				<label for="alamatSekolah" class="col-sm-5 control-label">Alamat Sekolah</label>
				<div class="col-sm-5" style="width: 430px;">
					<input type="text" class="form-control" name="alamatSekolah" id="alamatSekolah" placeholder="Contoh: Bukit Darmo Boulevard kav. 808 Surabaya" style="width: 400px;">
				</div>
			</div>
			
			<div class="form-group">
				<label for="provinsiSekolah" class="col-sm-5 control-label">Provinsi Sekolah</label>
				<div class="col-sm-5">
					<select class="form-control" name="provinsiSekolah" id="provinsiSekolah" onChange="provinsiSekolahSelected()" style="width: 250px;">
					<?php foreach($queryProvinsiSekolah as $data) {?>
						<option value="<?php echo $data->id . '-' . $data->nama; ?>"><?php echo $data->nama; ?></option>
					<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="kotaSekolah" class="col-sm-5 control-label">Kota Sekolah</label>
				<div class="col-sm-5">
					<select class="form-control" name="kotaSekolah" id="kotaSekolah" style="width: 250px;">
					
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="kodePosSekolah" class="col-sm-5 control-label">Kode Pos Sekolah</label>
				<div class="col-sm-5" style="width: 300px;">
					<input type="text" class="form-control" name="kodePosSekolah" id="kodePosSekolah" placeholder="Contoh: 60223" style="width: 130px; padding-right: 15px;">
				</div>
			</div>
			
			<div class="form-group">
				<label for="noTelpSekolah" class="col-sm-5 control-label">Nomor Telepon Sekolah</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="noTelpSekolah" id="noTelpSekolah" placeholder="Contoh: 0317535544">
				</div>
			</div>
		</fieldset>
		
		<fieldset id="datawali_container">
			<legend id="datawali_title">Data Orangtua/Wali</legend>
			
			<div class="form-group" style="margin-top: -10px;">
				<label for="relasi" class="col-sm-5 control-label">Relasi dengan Calon Mahasiswa</label>
				<div class="col-sm-5">
					<label class="radio-inline">
						<input type="radio" name="relasi" id="relasi" value="O"> Orangtua
					</label>
					<label class="radio-inline" style="width: 120px;">
						<input type="radio" name="relasi" id="relasi" value="W"> Wali
					</label>
				</div>
			</div>
			
			<div class="form-group">
				<label for="namaWali" class="col-sm-5 control-label">Nama Orangtua/Wali</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" name="namaWali" id="namaWali" placeholder="Contoh: Lee Kuan Yew">
				</div>
			</div>
			
			<div class="form-group">
				<h4><label for="alamatWali" class="col-sm-5 control-label">Alamat Orangtua/Wali</label></h4>
				<div class="col-sm-5" style="width: 430px;">
					<input type="text" class="form-control" name="alamatWali" id="alamatWali" placeholder="Contoh: Ngagel Jaya Tengah 73-77 Surabaya" style="width: 400px; margin-top: 3px;">
				</div>
			</div>
			
			<div class="form-group">
				<label for="provinsiWali" class="col-sm-5 control-label">Provinsi Orangtua/Wali</label>
				<div class="col-sm-5">
					<select class="form-control" name="provinsiWali" id="provinsiWali" onChange="provinsiWaliSelected()" style="width: 250px;">
					<?php foreach($queryProvinsiWali as $data) {?>
						<option value="<?php echo $data->id . '-' . $data->nama; ?>"><?php echo $data->nama; ?></option>
					<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="kotaWali" class="col-sm-5 control-label">Kota Orangtua/Wali</label>
				<div class="col-sm-5">
					<select class="form-control" name="kotaWali" id="kotaWali" style="width: 250px;">
				
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="kodePosWali" class="col-sm-5 control-label">Kode Pos Orangtua/Wali</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="kodePosWali" id="kodePosWali" placeholder="Contoh: 60223" style="width: 130px; padding-right: 15px;">
				</div>
			</div>
			
			<div class="form-group">
				<label for="noHpWali" class="col-sm-5 control-label">Nomor Telepon Orangtua/Wali</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="noHpWali" id="noHpWali" placeholder="Contoh: 08155290322">
				</div>
			</div>
			  
			<div class="form-group">
				<label for="pekerjaanWali" class="col-sm-5 control-label">Pekerjaan Orangtua/Wali</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="pekerjaanWali" id="pekerjaanWali" placeholder="Pekerjaan Orangtua/Wali">
				</div>
			</div>
		</fieldset>
		
		<br><br>
		<input type="submit" class="col-sm-3 btn btn-small btn-primary" id="btnDaftar" name="daftar" value="DAFTAR">
			
	</form>

</div>
<script>
function readURL(input, fileApa)
{
	if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			if(fileApa == "foto")
			{
				$('#foto_image').attr('width', '100px');
				$('#foto_image').attr('height', '100px');
				$('#foto_image').attr('src', e.target.result);
			}
			if(fileApa == "rapor")
			{
				$('#rapor_image').attr('width', '100px');
				$('#rapor_image').attr('height', '100px');
				$('#rapor_image').attr('src', e.target.result);
			}
			if(fileApa == "kartuKeluarga")
			{
				$('#kartuKeluarga_image').attr('width', '100px');
				$('#kartuKeluarga_image').attr('height', '100px');
				$('#kartuKeluarga_image').attr('src', e.target.result);
			}
			if(fileApa == "akteKelahiran")
			{
				$('#akteKelahiran_image').attr('width', '100px');
				$('#akteKelahiran_image').attr('height', '100px');
				$('#akteKelahiran_image').attr('src', e.target.result);
			}
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#foto").change(function() {
	readURL(this, "foto");
});

$("#rapor").change(function() {
	readURL(this, "rapor");
});

$("#kartuKeluarga").change(function() {
	readURL(this, "kartuKeluarga");
});

$("#akteKelahiran").change(function() {
	readURL(this, "akteKelahiran");
});
</script>

<?php require('footer.php'); ?>	

</body>
<?php require('footer-pendaftaran.php'); ?>
