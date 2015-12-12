<?php
/* -----------------------------------------------------
Nama   				: reportProsentaseDosen_view.php
Pembuat 			: Nancy Yonata
Tanggal Pembuatan 	: 7 Desember 2015
Edit 				: 12 Desember 2015 (Melengkapi dokumentasi pada source code) 

----------------------------------------------------- */
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<?php echo form_open('confirmation/printToPDFPercentageDosen'); ?>
            <div class='row'>
                <div class="col-md-12">
                    <?php if($this->session->flashdata('alert')){
                        echo '<div class="alert alert-'.$this->session->flashdata('alert_level').'" role="alert">'.$this->session->flashdata('alert').'</div>';
                    }?>
                    <div class="page-header"><h1>Report Prosentase Nilai Dosen</h1></div>
                    <?php 
						echo 'Dosen : '.form_dropdown('ddDosen',$Dosen,$selectedDosen,"id='ddDosen'")."<br/><br/>";
					?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                         <th>Kode MK</th>
                         <th width="20">SKS</th>
						 <th>Mata Kuliah</th>
                         <th>A</th>
						 <th>B</th>
						 <th>C</th>
						 <th>D</th>
						 <th>E</th>
						 
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
					<?php
						
						 echo form_submit([
						'id' => 'btnCetak',
						'name' => 'btnCetak',
						'class' => 'btn btn-primary'
						], 'Cetak');
					
					?>
				</div>
			</div>
			<?php echo form_close(); ?>
        </div>
    </div>
</div>

	<script type="text/javascript">
		var table;
		$(document).ready(function() {
		  table = $('#table').DataTable({ 
			
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"bFilter": false,
			/*-----------------------------------------------------------------------
				memanggil function ajax_prosentaseDosen pada controller confirmation
				dan melempar isi combobox dosen sebagai paramater
			------------------------------------------------------------------------*/
			"ajax": {
				"url": "<?php echo site_url('confirmation/ajax_prosentaseDosen/')?>"+"/"+$("#ddDosen").val(),
				"type": "POST"
			},

			
			"columnDefs": [
			{ 
			  "targets": [-1,-2,-3,-4,-5],
			  "orderable": false //set not orderable
			},
			]
		  });
		  /*----------------------------------------
		  melakukan reload table saat terjadi perubahan
		  pada combobox dosen
		  ----------------------------------------*/
		  $('#ddDosen').on('change',function (){
				var end = this.value;
				reload_table();
		  });
		});
		
		/*------------------------------------------
		 akan memanggil function ajax_prosentaseDosen
		 pada saat reload_table
		--------------------------------------------*/
		function reload_table()
		{
			table.ajax.url("<?php echo site_url('confirmation/ajax_prosentaseDosen/')?>"+"/"+$("#ddDosen").val());
			table.ajax.reload(null,false); //reload datatable ajax
		}
	</script>