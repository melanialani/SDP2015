<html>
<head>
<?php
	require_once('header-pmb.php');
	require_once('header.php');
?>
<title>Portal Mahasiswa</title>
<style>
<?php require_once('portalmahasiswa_profile.css'); ?>
</style>
</head>

<body>

<nav class="navbar navbar-inverse" id="menubar">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav" id="menubar_ul1">
        <li><a href="<?php echo site_url('portalmahasiswa/home') ?>">Home</a></li>
        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
      		<ul class="dropdown-menu" id="menubar_ul2">
            	<li id="li"><a href="<?php echo site_url('portalmahasiswa/profile') ?>">Biodata</a></li>
            	<li><a href="<?php echo site_url('portalmahasiswa/logout') ?>">Logout</a></li>
            	
    		</ul>
        </li>
        <li><a href="#">Info Kuliah</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="container">	
	<div id="judul">
		<h2 style="margin: 0;">BIODATA</h2>
	</div>
	
				
	
	<?php echo form_open('portalmahasiswa/profile'); ?>
	
	<div id="datapribadi_container">
		<div id="datapribadi_title">
			Data Pribadi
		</div>
		<div id="datapribadi_isi">
			<?php 
			
			$titikDua = array('data' => ':', 'style' => "padding: 0px 10px;");
			
			$dataNama = array('data' => $nama, 'id' => 'nama');
			$this->table->add_row('Nama', $titikDua, $dataNama);
			$this->table->add_row('Jurusan', $titikDua, $jurusan);
			$this->table->add_row('Jenis Kelamin', $titikDua, $jenis_kelamin);
			$this->table->add_row('Tempat Lahir', $titikDua, $tempat_lahir);
			$this->table->add_row('Tanggal Lahir', $titikDua, $tanggal_lahir);
			
			$dataKewarganegaraan = array('data' => $kewarganegaraan, 'id' => 'kewarganegaraan');
			$this->table->add_row('Kewarganegaraan', $titikDua, $dataKewarganegaraan);
			
			$dataStatus_sosial = array('data' => $status_sosial, 'id' => 'status_sosial');
			$this->table->add_row('Status Sosial', $titikDua, $dataStatus_sosial);
			
			$dataAgama = array('data' => $agama, 'id' => 'agama');
			$this->table->add_row('Agama', $titikDua, $dataAgama);
			
			$dataAlamat = array('data' => $alamat, 'id' => 'alamat');
			$this->table->add_row('Alamat', $titikDua, $dataAlamat);
			
			$dataProvinsi = array('data' => $provinsi, 'id' => 'provinsi');
			$this->table->add_row('Provinsi', $titikDua, $dataProvinsi);
			
			$dataKota = array('data' => $kota, 'id' => 'kota');
			$this->table->add_row('Kota', $titikDua, $dataKota);
			
			$dataKodepos = array('data' => $kodepos, 'id' => 'kodepos');
			$this->table->add_row('Kode Pos', $titikDua, $dataKodepos);
			
			$dataNomor_hp = array('data' => $nomor_hp, 'id' => 'nomor_hp');
			$this->table->add_row('Nomor HP', $titikDua, $dataNomor_hp);
			
			$dataEmail = array('data' => $email, 'id' => 'email');
			$this->table->add_row('Email', $titikDua, $dataEmail);
			
			echo $this->table->generate();
			?>
		</div>
	</div>
	
	<fieldset id="datawali_container">
		<legend id="datawali_title">Data Orangtua/Wali</legend>
			<?php 
			$titikDua = array('data' => ':', 'style' => "padding: 0px 10px;");
			
			$dataNama_wali = array('data' => $nama_wali, 'id' => 'nama_wali');
			$this->table->add_row('Nama Orangtua/Wali', $titikDua, $dataNama_wali);
			
			$dataAlamat_wali = array('data' => $alamat_wali, 'id' => 'alamat_wali');
			$this->table->add_row('Alamat Orangtua/Wali', $titikDua, $dataAlamat_wali);
			
			$dataProvinsi_wali = array('data' => $provinsi_wali, 'id' => 'provinsi_wali');
			$this->table->add_row('Provinsi Orangtua/Wali', $titikDua, $dataProvinsi_wali);
			
			$dataKota_wali = array('data' => $kota_wali, 'id' => 'kota_wali');
			$this->table->add_row('Kota Orangtua/Wali', $titikDua, $dataKota_wali);
			
			$dataNomor_telp_wali = array('data' => $nomor_telp_wali, 'id' => 'nomor_telp_wali');
			$this->table->add_row('Nomor Telp Orangtua/Wali', $titikDua, $dataNomor_telp_wali);
			
			$dataPekerjaan_wali = array('data' => $pekerjaan_wali, 'id' => 'pekerjaan_wali');
			$this->table->add_row('Pekerjaan Orangtua/Wali', $titikDua, $dataPekerjaan_wali);
			
			echo $this->table->generate();
			?>
	</fieldset>
	
	<?php
	$disabled = "";
	if ($kategori == "0")
	{
		
		echo '<input type="button" class="btn btn-primary btn-lg disabled" id="btnEdit" name="btnEdit" value="Edit" />';
		echo '<font color="red" style="float: right; margin: 20px 20px 0px 0px;">anda tidak diperkenankan untuk mengedit profil anda<br>sebelum anda mendapat kategori</font>';
	}
	else
	{
		echo '<input type="submit" class="btn btn-primary btn-lg" id="btnEdit" name="btnEdit" value="Edit" />';
	}
	?>
	
	<input type="button" class="btn btn-primary btn-lg" id="btnCancel" name="btnCancel" value="Cancel" />
	
	<?php echo form_close(); ?>
	
	<?php require_once('footer.php'); ?>
</div>
</body>
<script>

$(document).ready(function()
{
<?php 
if ($kategori != "0")
{
?>
	$("#btnEdit").click(function() {
		if ($(this).val() == "Edit")
		{
			editMode();
			$("body").animate({ scrollTop: 0 }, "fast");
			
			$(this).val("Save");
			
			$("#btnCancel").css("visibility", "visible");
		}
		else
		{
			$("form").submit();
		}
		return false;
	});
	
	$("#btnCancel").click(function() {
		viewMode();
		$("#btnEdit").val("Edit");
		$(this).css("visibility", "hidden");
	});
<?php
}
?>
});


var allKota = [];
//buat masukno semua daftar kota ke array allKota di javascript
//tak buat format e adalah allKota['idProvinsi-idKota']
//nanti isi ne allKota adalah allKota['PROV01-KOT001'] = 'Kabupaten Aceh Barat', allKota['PROV01-KOT002'] = 'Kabupaten Aceh Barat Daya' dll
<?php 
	foreach ($queryKota as $row)
	{
		echo "allKota['" . $row->provinsi_id . "-" . $row->id . "'] = '" . $row->nama . "';\n";
	}
?>

function provinsiSelected(milik)
{
	var cbKota = "";
	if (milik == "mahasiswa")
	{
		cbKota = document.getElementById('cbkota');
	}
	else if (milik == "wali")
	{
		cbKota = document.getElementById('cbkota_wali');
	}
	cbKota.innerHTML = ""; //kosongkan dulu isi combobox cbKota
	
	var selected = "";
	
	if (milik == "mahasiswa")
	{
		selected = document.getElementById('cbprovinsi').value.split("-"); //selected = value item yg diselect di cbProvinsi
	}
	else if (milik == "wali")
	{
		selected = document.getElementById('cbprovinsi_wali').value.split("-");
	}
	
	for (var index in allKota) //index = 'PROV01-KOT001', 'PROV01-KOT002', dll
	{
		var id = index.split("-");
		//id[0] berarti yg diambil adalah yg kiri, yaitu PROV01, PROV02, dll
		//apakah PROV01 == value item yg diselect di cbProvinsi
		if (id[0] == selected[0]) 
		{
			var selectedKota = "";
			var currentKota = "";
			if (milik == "mahasiswa")
			{
				currentKota = "<?= $kota ?>";
			}
			else if (milik == "wali")
			{
				currentKota = "<?= $kota_wali ?>";
			}
			
			if (allKota[index] == currentKota)
			{
				selectedKota = " selected ";
			}
			
			cbKota.innerHTML += "<option value=" + allKota[index] + selectedKota + ">" + allKota[index] + "</option>";			
			//contoh hasil HTML nya adalah <option value='Kabupaten Aceh Barat'>Kabupaten Aceh Barat</option>
		}
	}
	
}

<?php
	$wni = "";
	$wna = "";
	if ($kewarganegaraan == "WNI")
	{
		$wni = "checked";
	}
	else {
		$wna = "checked";
	}
	$dataKewarganegaraan = "<label class='radio-inline' style='margin-right: 10px;'>";
	$dataKewarganegaraan .= "<input type='radio' name='kewarganegaraan' id='rbkewarganegaraan' " . $wni . " value='WNI' style='margin-top: 8px;'> WNI";
	$dataKewarganegaraan .= "</label>";
	$dataKewarganegaraan .= "<label class='radio-inline'>";
	$dataKewarganegaraan .= "<input type='radio' name='kewarganegaraan' id='rbkewarganegaraan' " . $wna . " value='WNA' style='margin-top: 8px;'> WNA";
	$dataKewarganegaraan .= "</label>";
	
	
	$optionStatus_sosial = array(
		'Single' => 'Single',
		'Menikah' => 'Menikah',
		'Duda' => 'Duda',
		'Janda' => 'Janda'
	);
	$paramStatus_sosial = 'class="form-control" name="status_sosial" id="cbstatus_sosial"';
	$dataStatus_sosial = form_dropdown('status_sosial', $optionStatus_sosial, $status_sosial, $paramStatus_sosial);
	$dataStatus_sosial = str_replace("\n", "", $dataStatus_sosial);
	
	
	$optionAgama = array(
		'Buddha' => 'Buddha',
		'Hindu' => 'Hindu',
		'Katolik' => 'Katolik',
		'Kristen' => 'Kristen',
		'Islam' => 'Islam'
	);
	$paramAgama = 'class="form-control" name="agama" id="cbagama"';
	$dataAgama = form_dropdown('agama', $optionAgama, $agama, $paramAgama);
	$dataAgama = str_replace("\n", "", $dataAgama);
	
	
	$optionProvinsi = "";
	foreach ($queryProvinsi as $row)
	{
		$optionProvinsi[$row->id . "-" . $row->nama] = $row->nama;
	}
	$paramProvinsi = 'class="form-control" name="provinsi" id="cbprovinsi"';
	$currentProvinsi = $provinsi_id . "-" . $provinsi;
	$dataProvinsi = form_dropdown('provinsi', $optionProvinsi, $currentProvinsi, $paramProvinsi);
	$dataProvinsi = str_replace("\n", "", $dataProvinsi);
	
	$optionKota = [];
	$paramKota = 'class="form-control" name="kota" id="cbkota"';
	$dataKota = form_dropdown('kota', $optionKota, $kota, $paramKota);
	$dataKota = str_replace("\n", "", $dataKota);
	
	
	$paramProvinsi_wali = 'class="form-control" name="provinsi_wali" id="cbprovinsi_wali"';
	$currentProvinsi_wali = $provinsi_wali_id . "-" . $provinsi_wali;
	$dataProvinsi_wali = form_dropdown('provinsi_wali', $optionProvinsi, $currentProvinsi_wali, $paramProvinsi_wali);
	$dataProvinsi_wali = str_replace("\n", "", $dataProvinsi_wali);
	
	$optionKota_wali = [];
	$paramKota_wali = 'class="form-control" name="kota_wali" id="cbkota_wali"';
	$dataKota_wali = form_dropdown('kota_wali', $optionKota_wali, $kota_wali, $paramKota_wali);
	$dataKota_wali = str_replace("\n", "", $dataKota_wali);
?>

function editMode()
{
	$("#container").css("height", "1100px");
	
	var value = "<?= $nama ?>";
	$("#nama").html("<input type='text' name='nama' id='txtnama' class='form-control' value='" + value + "'>");
	$("#txtnama").css("width", "250px");
	
	value = "<?= $kewarganegaraan ?>";
	$("#kewarganegaraan").html("<?= $dataKewarganegaraan ?>");
	$("#rbkewarganegaraan").css("width", "0px");
	
	value = "<?= $status_sosial ?>";
	$("#status_sosial").html('<?= $dataStatus_sosial ?>');
	$("#cbstatus_sosial").css("width", "90px");
	
	value = "<?= $agama ?>";
	$("#agama").html('<?= $dataAgama ?>');
	$("#cbagama").css("width", "100px");
	
	value = "<?= $alamat ?>";
	$("#alamat").html("<input type='text' name='alamat' id='txtalamat' class='form-control' value='" + value + "'>");
	$("#txtalamat").css("width", "380px");
	
	value = "<?= $provinsi ?>";
	$("#provinsi").html('<?= $dataProvinsi ?>');
	$("#cbprovinsi").css("width", "250px");
	$("#cbprovinsi").change(function() {
		provinsiSelected("mahasiswa");
	});
	
	value = "<?= $kota ?>";
	$("#kota").html('<?= $dataKota ?>');
	$("#cbkota").css("width", "250px");
	provinsiSelected('mahasiswa');
	
	value = "<?= $kodepos ?>";
	$("#kodepos").html("<input type='text' name='kodepos' id='txtkodepos' class='form-control' value='" + value + "'>");
	$("#txtkodepos").css("width", "70px");
	
	value = "<?= $nomor_hp ?>";
	$("#nomor_hp").html("<input type='text' name='nomor_hp' id='txtnomor_hp' class='form-control' value='" + value + "'>");
	$("#txtnomor_hp").css("width", "130px");
	
	value = "<?= $email ?>";
	$("#email").html("<input type='text' name='email' id='txtemail' class='form-control' value='" + value + "'>");
	$("#txtemail").css("width", "300px");
	
	value = $("#nama_wali").html();
	$("#nama_wali").html("<input type='text' name='nama_wali' id='txtnama_wali' class='form-control' value='" + value + "'>");
	$("#txtnama_wali").css("width", "250px");
	
	value = $("#alamat_wali").html();
	$("#alamat_wali").html("<input type='text' name='alamat_wali' id='txtalamat_wali' class='form-control' value='" + value + "'>");
	$("#txtalamat_wali").css("width", "380px");
	
	value = "<?= $provinsi_wali ?>";
	$("#provinsi_wali").html('<?= $dataProvinsi_wali ?>');
	$("#cbprovinsi_wali").css("width", "250px");
	$("#cbprovinsi_wali").change(function() {
		provinsiSelected("wali");
	});
	
	value = "<?= $kota_wali ?>";
	$("#kota_wali").html('<?= $dataKota_wali ?>');
	$("#cbkota_wali").css("width", "250px");
	provinsiSelected('wali');
	
	value = $("#nomor_telp_wali").html();
	$("#nomor_telp_wali").html("<input type='text' name='nomor_telp_wali' id='txtnomor_telp_wali' class='form-control' value='" + value + "'>");
	$("#txtnomor_telp_wali").css("width", "130px");
	
	value = $("#pekerjaan_wali").html();
	$("#pekerjaan_wali").html("<input type='text' name='pekerjaan_wali' id='txtpekerjaan_wali' class='form-control' value='" + value + "'>");
	$("#txtpekerjaan_wali").css("width", "200px");
}

function viewMode(){
	$("#container").css("height", "980px");
	
	$("#nama").html("<?php echo $nama; ?>");
	$("#kewarganegaraan").html("<?php echo $kewarganegaraan; ?>");
	$("#status_sosial").html("<?php echo $status_sosial; ?>");
	$("#agama").html("<?php echo $agama; ?>");
	$("#alamat").html("<?php echo $alamat; ?>");
	$("#provinsi").html("<?php echo $provinsi; ?>");
	$("#kota").html("<?php echo $kota; ?>");
	$("#kodepos").html("<?php echo $kodepos; ?>");
	$("#nomor_hp").html("<?php echo $nomor_hp; ?>");
	$("#email").html("<?php echo $email; ?>");
	
	$("#nama_wali").html("<?php echo $nama_wali; ?>");
	$("#alamat_wali").html("<?php echo $alamat_wali; ?>");
	$("#provinsi_wali").html("<?php echo $provinsi_wali; ?>");
	$("#kota_wali").html("<?php echo $kota_wali; ?>");
	$("#nomor_telp_wali").html("<?php echo $nomor_telp_wali; ?>");
	$("#pekerjaan_wali").html("<?php echo $pekerjaan_wali; ?>");
}
</script>
</html>