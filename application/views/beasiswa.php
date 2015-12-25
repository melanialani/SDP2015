<div class="container-fluid" style="width: 85%; margin: 0 auto;">
	<div class="row">
		<h2> Beasiswa </h2>
	</div>
	<!-- Notification goes here. -->
	<?php
		if($this->session->flashdata('error_beasiswa') == 'Mahasiswa sudah terdaftar pada beasiswa lain.'){
			$errorDiv = "<div class='alert alert-danger fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		  		<strong>ERROR!</strong> Mahasiswa Sudah Terdaftar beasiswa lain!.
				</div>";
			echo $errorDiv;
		}
		if($this->session->flashdata('error_beasiswa') == 'Semua field harus diisi.'){
			$errorDiv = "<div class='alert alert-danger fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		  		<strong>ERROR!</strong> Semua field harus diisi!.
				</div>";
			echo $errorDiv;
		}
	?>
	<div class="row">
		<?php echo form_open('masterbau/beasiswa'); ?>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<!-- row untuk masing masing element input -->
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="text-align:right;">
					<h4> Nama Beasiswa :</h4>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<?php
					echo form_dropdown('cbBeasiswa', $arrayBeasiswa, '', 'class=form-control');
					?>
				</div>
			</div>
			<!-- row untuk masing masing element input -->
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="text-align:right;">
					<h4> NRP Mahasiswa :</h4>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<?php
					$attributes = array('name'=>'txtNRP', 'placeholder'=>'Masukkan NRP mahasiswa', 'class'=>'form-control');
					echo form_input($attributes);
					?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<?php
			$attributes = array('name'=>'btnSubmit', 'value'=>'Submit', 'class'=>'btn btn-default', 'style'=>'background: #664400; color: white; float:right; margin-right:2vw;');
			echo form_submit($attributes);
		?>
	</div>
	<?php echo form_close(); ?>
	<div class="row" style="margin-top: 1vw; background: #33cc33">
		<table width="100%" class="table table-striped table-bordered" id="dtbKurikulum" cellspacing="0">
        	<thead>
	            <tr>
	                <th>NRP</th>
	                <th>Beasiswa</th>
	            </tr>
			</thead>
        	<tfoot>
	            <tr>
	                <th>NRP</th>
	                <th>Beasiswa</th>
	            </tr>
        	</tfoot>
        	<tbody>
        	<?php
        		for($a = 0; $a < count($table); $a++){
					echo "<tr>";
					echo "<td>"; echo $table[$a]['NRP']; echo "</td>";
					echo "<td>"; echo $table[$a]['beasiswa']; echo "</td>";
					echo "</tr>";
				}
        	?>
        	</tbody>
        </table>
	</div>
	</div>
</div>