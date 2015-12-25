<!-- Bootstrap core and JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
<script>
	
$(document).ready(function() {
	$('#tanggalLahir').datepicker({
		format: "dd-mm-yyyy"
	});
	
	 $('#contactForm').bootstrapValidator({
		container: '#messages',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			namaLengkap: {
				validators: {
					notEmpty: {
						message: 'Nama tidak boleh kosong'
					}
				}
			},
			jk: {
				validators: {
					notEmpty: {
						message: 'Pilih Jenis Kelamin Anda'
					}
				}
			},
			kewarganegaraan: {
				validators: {
					notEmpty: {
						message: 'Pilih Kewarganegaraan Anda'
					}
				}
			},
			alamat: {
				validators: {
					notEmpty: {
						message: 'Alamat tidak boleh kosong'
					}
				}
			},
			kodePos: {
				validators: {
					notEmpty: {
						message: 'Kode Pos tidak boleh kosong'
					},
					digits: {
						message: 'Kode Pos hanya boleh berisi angka'
					},
					stringLength: {
						min: 5,
						max: 5,
						message: 'Kode Pos harus 5 digit'
					}
				}
			},
			noHp: {
				validators: {
					notEmpty: {
						message: 'Nomor HP tidak boleh kosong'
					},
					digits: {
						message: 'Nomor HP hanya boleh berisi angka'
					},
					stringLength: {
						max: 12,
						message: 'Nomor HP maksimal 12 digit'
					}
				}
			},
			nilaiMat: {
				validators: {
					notEmpty: {
						message: 'Nilai Matematika tidak boleh kosong'
					},
					integer: {
						message: 'Nilai Matematika harus bilangan bulat positif (0-100)'
					},
					greaterThan: {
						value: 0,
						inclusive: false,
						message: 'Nilai Matematika harus lebih dari sama dengan 0'
					},
					lessThan: {
						value: 100,
						inclusive: false,
						message: 'Nilai Matematika harus kurang dari sama dengan 100'
					}
				}
			},
			nilaiIng: {
				validators: {
					notEmpty: {
						message: 'Nilai Inggris tidak boleh kosong'
					},
					integer: {
						message: 'Nilai Inggris harus bilangan bulat positif (0-100)'
					},
					greaterThan: {
						value: 0,
						inclusive: false,
						message: 'Nilai Inggris harus lebih dari sama dengan 0'
					},
					lessThan: {
						value: 100,
						inclusive: false,
						message: 'Nilai Inggris harus kurang dari sama dengan 100'
					}
				}
			},
			namaSekolah: {
				validators: {
					notEmpty: {
						message: 'Nama Sekolah tidak boleh kosong'
					}
				}
			},
			alamatSekolah: {
				validators: {
					notEmpty: {
						message: 'Alamat Sekolah tidak boleh kosong'
					}
				}
			},
			kodePosSekolah: {
				validators: {
					notEmpty: {
						message: 'Kode Pos Sekolah tidak boleh kosong'
					},
					digits: {
						message: 'Kode Pos Sekolah hanya boleh berisi angka'
					},
					stringLength: {
						min: 5,
						max: 5,
						message: 'Kode Pos Sekolah harus 5 digit'
					}
				}
			},
			noTelpSekolah: {
				validators: {
					notEmpty: {
						message: 'Nomor Telepon Sekolah tidak boleh kosong'
					},
					digits: {
						message: 'Nomor Telepon Sekolah hanya boleh berisi angka'
					},
					stringLength: {
						max: 12,
						message: 'Nomor Telepon Sekolah maksimal 12 digit'
					}
				}
			},
			relasi: {
				validators: {
					notEmpty: {
						message: 'Pilih Orangtua/Wali'
					}
				}
			},
			namaWali: {
				validators: {
					notEmpty: {
						message: 'Nama Orangtua/Wali tidak boleh kosong'
					}
				}
			},
			alamatWali: {
				validators: {
					notEmpty: {
						message: 'Alamat Orangtua/Wali tidak boleh kosong'
					}
				}
			},
			kodePosWali: {
				validators: {
					notEmpty: {
						message: 'Kode Pos Orangtua/Wali tidak boleh kosong'
					},
					digits: {
						message: 'Kode Pos Orangtua/Wali hanya boleh berisi angka'
					},
					stringLength: {
						min: 5,
						max: 5,
						message: 'Kode Pos Orangtua/Wali harus 5 digit'
					}
				}
			},
			pekerjaanWali: {
				validators: {
					notEmpty: {
						message: 'Pekerjaan Orangtua/Wali tidak boleh kosong'
					}
				}
			},
			noHpWali: {
				validators: {
					notEmpty: {
						message: 'Nomor Telepon Orangtua/Wali tidak boleh kosong'
					},
					digits: {
						message: 'Nomor Telepon Orangtua/Wali hanya boleh berisi angka'
					},
					stringLength: {
						max: 12,
						message: 'Nomor Telepon Orangtua/Wali maksimal 12 digit'
					}
				}
			}
		}
	});
	
});
	
	
	var cbKota = document.getElementById('kota');
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
	
	provinsiSelected(); //supaya secara default juga nampilin kota yg sesuai provinsi, ga nunggu combobox provinsi dipilih
	
	function provinsiSelected()
	{
		cbKota.innerHTML = ""; //kosongkan dulu isi combobox cbKota
		
		var selected = document.getElementById('provinsi').value.split("-"); //var selected = value item yg diselect di cbProvinsi
		for (var index in allKota) //index = 'PROV01-KOT001', 'PROV01-KOT002', dll
		{
			var id = index.split("-");
			
			//id[0] berarti yg diambil adalah yg kiri, yaitu PROV01, PROV02, dll
			//apakah PROV01 == value item yg diselect di cbProvinsi
			//selected[0] = id provinsi, selected[1] = nama provinsi
			if (id[0] == selected[0]) 
			{
				cbKota.innerHTML += "<option value='" + allKota[index] + "'>" + allKota[index] + "</option>";
				//contoh hasil HTML nya adalah <option value='Kabupaten Aceh Barat'>Kabupaten Aceh Barat</option>
			}
		}
	}
	
	var cbKota1 = document.getElementById('kotaSekolah');
	var allKota1 = [];
	
	<?php 
		foreach ($queryKotaSekolah as $row)
		{
			echo "allKota1['" . $row->provinsi_id . "-" . $row->id . "'] = '" . $row->nama . "';\n";
		}
	?>
	
	provinsiSekolahSelected(); 
	
	function provinsiSekolahSelected()
	{
		cbKota1.innerHTML = ""; 
		
		var selected = document.getElementById('provinsiSekolah').value.split("-"); 
		for (var index in allKota1) 
		{
			var id = index.split("-");
			
			if (id[0] == selected[0]) 
			{
				cbKota1.innerHTML += "<option value='" + allKota1[index] + "'>" + allKota1[index] + "</option>";
				
			}
		}
	}
	
	var cbKota2 = document.getElementById('kotaWali');
	var allKota2 = [];
	
	<?php 
		foreach ($queryKotaWali as $row)
		{
			echo "allKota2['" . $row->provinsi_id . "-" . $row->id . "'] = '" . $row->nama . "';\n";
		}
	?>
	
	provinsiWaliSelected(); 
	
	function provinsiWaliSelected()
	{
		cbKota2.innerHTML = ""; 
		
		var selected = document.getElementById('provinsiWali').value.split("-"); 
		for (var index in allKota2) 
		{
			var id = index.split("-");
			
			if (id[0] == selected[0]) 
			{
				cbKota2.innerHTML += "<option value='" + allKota2[index] + "'>" + allKota2[index] + "</option>";
			
			}
		}
	}
</script>
  </body>
</html>