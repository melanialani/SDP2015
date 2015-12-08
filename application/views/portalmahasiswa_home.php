<!DOCTYPE html>
<html>
<head> 
<?php
	require_once('header-pmb.php'); 
	require_once('header.php');
?>
<title>Portal Mahasiswa</title>
<style>
<?php require_once('portalmahasiswa_home.css'); ?>	
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
	
	<div id="info">
		<?php
		$this->table->add_row('NRP', ': ' . $nrp);
		$this->table->add_row('Nama', ': ' . $nama);
		$this->table->add_row('Jurusan', ': ' . $jurusan);
		$this->table->add_row('Kategori', ': ' . $kategori);
		$this->table->add_row('USP', ': ' . $usp);
		$this->table->add_row('Jumlah SKS semester ini', ': ' . $sks);
		
		$template = array('cell_start' => '<td><h4>', 
						'cell_end' => '</h4></td>',
						'cell_alt_start' => '<td><h4>',
						'cell_alt_end' => '</h4></td>'
						);
		$this->table->set_template($template);
		echo $this->table->generate();
		?>
		
	</div>
	<div id="overall_progress">
		Overall Progress
		<div id="progressbar">
			<div id="belum_bar"></div>
			<div id="sudah_bar"></div>
			<div id="persen"><?php echo $persen; ?></div>
			<div id="sudah_notification"><?php echo $sudah_notification; ?></div>
			<div id="belum_notification"><?php echo $belum_notification; ?></div>
		</div>
	</div>
	
	<div style="height: 30px;"></div>
	
	<ul class="nav nav-tabs">
	 	<li class="active" id="home_tab"><a data-toggle="tab" href="#home">Berkas</a></li>
	  	<li id="keuangan_tab"><a data-toggle="tab" href="#keuangan">Keuangan</a></li>
	  	<li id="history_keuangan_tab"><a data-toggle="tab" href="#history_keuangan">History Keuangan</a></li>
	</ul>
	
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
		    <div style="height: 40px;"></div>
		    <div class="panel-group">
				<div class="panel panel-default" style="border: 1px solid black; border-radius: 10px; padding: 20px 20px 20px 20px;">
			    	<div class="panel-heading" id="panel-heading-berkas">
			    		
				        <a data-toggle="collapse" href="#coll_berkas" id="a-berkas">
				        	<div id="panel-heading-berkas-icon"><span class="glyphicon glyphicon-menu-down"></span></div>
				        	<div id="panel-heading-berkas-label">Upload Berkas</div>
				        </a>
				        <span class="glyphicon glyphicon-remove" id="panel-heading-berkas-status"></span>
					</div>
					<div id="coll_berkas" class="panel-collapse collapse in">
						<?php echo form_open_multipart('portalmahasiswa/home'); ?>
				        <h4>File ijazah</h4> <input type="file">
				        <h4 style="margin-top: 20px;">File SKHUN</h4> <input type="file">
				        <button type="submit" id="btn-save" class="btn btn-primary btn-lg">Save</button>
				       	</form>
					</div>
				</div>
			</div>
			<div style="height: 40px;"></div>
		</div>
		<div id="keuangan" class="tab-pane fade">
		    <div class="panel-group">
				<font style="font-size: 16pt;"><?php echo "Semester " . $currentSemester; ?>	</font>
				<div style="height: 20px;"></div>
					<?php $ctr_usp = 0; ?>
					<?php foreach ($tagihan as $row){ $ctr_usp++; ?>
					<div class="panel panel-default" style="border: 1px solid black; border-radius: 10px; padding: 20px; margin-bottom: 30px;">
						<div class="panel-heading" id="panel-heading-usp">
							
							<a data-toggle="collapse" href="#coll_usp<?= $ctr_usp ?>" id="a-usp">
								<div id="panel-heading-usp-icon"><span class="glyphicon glyphicon-menu-down"></span></div>
								<div id="panel-heading-usp-label"><?php 
								if(substr($row->tanggal_batas,5,2)=="08"||substr($row->tanggal_batas,5,2)=="02"){
									echo "Periode 1";
								}else if(substr($row->tanggal_batas,5,2)=="10"||substr($row->tanggal_batas,5,2)=="04"){
									echo "Periode 2";
								}else if(substr($row->tanggal_batas,5,2)=="12"||substr($row->tanggal_batas,5,2)=="06"){
									echo "Periode 3";
								}
								?>
								</div>
							</a>
							<?php 
							if($row->status =='0'){
								echo '<span class="glyphicon glyphicon-remove" id="panel-heading-usp-status" style="left: 150px;"></span>';
							}else{
								echo '<span class="glyphicon glyphicon-ok" id="panel-heading-spp-status" style="left: 150px;"></span>';
							}?>
							
						</div>
						<div id="coll_usp<?= $ctr_usp ?>" class="panel-collapse collapse in">
							<br>
							<?php echo "Total Biaya: ". "Rp " . number_format($row->jumlah, 2, ',', '.');?><br>
							<?php echo "Batas akhir: " . date ("d F Y ",strtotime($row->tanggal_batas));?><br>
							<?php echo "Status: "; if($row->status=="1") {echo "Lunas"; }else{ echo "Belum Lunas";}?>
						   
						</div>
					</div>
					<?php }?>
			</div>
					    
		</div>
	  	<div id="history_keuangan" class="tab-pane fade">
			<?php echo form_open('portalmahasiswa/home'); ?>
			<?php echo form_dropdown('semesterKe',array('1'=>'Semester 1','2'=>'Semester 2','3'=>'Semester 3','4'=>'Semester 4','5'=>'Semester 5')); ?>
			<?php echo form_submit('semester','Pindah');?>
			<?php echo form_close(); ?>
			
			<div style="height: 40px;"></div>
			<?php $ctr = 0; ?>
			<?php if ($pembayaran != "") { ?>
			<?php foreach($pembayaran as $row){ $ctr++;?>
		    <div class="panel-group">
				<div class="panel panel-default" style="border: 1px solid black; border-radius: 10px; padding: 20px; margin-bottom: 30px;">
			    	<div class="panel-heading" id="panel-heading-spp">
			    		
				        <a data-toggle="collapse" href="#coll_spp<?= $ctr ?>" id="a-spp">
				        	<div id="panel-heading-spp-icon"><span class="glyphicon glyphicon-menu-down"></span></div>
				        	<div id="panel-heading-spp-label"><?php echo "Semester " . $semester . " - "?>
							<?php 
							if(substr($row->id,0,3)=="UPP"){
								echo "USP";
							}else if(substr($row->tanggal_batas,5,2)=="08"||substr($row->tanggal_batas,5,2)=="02"){
								echo "Periode 1";
							}else if(substr($row->tanggal_batas,5,2)=="10"||substr($row->tanggal_batas,5,2)=="04"){
								echo "Periode 2";
							}else if(substr($row->tanggal_batas,5,2)=="12"||substr($row->tanggal_batas,5,2)=="06"){
								echo "Periode 3";
							}
							?>
							</div>
				        </a>
				        <!--<span class="glyphicon glyphicon-ok" id="panel-heading-spp-status"></span>-->
					</div>
					<br>
					<div id="coll_spp<?= $ctr ?>" class="panel-collapse collapse in">
						<?php echo "Biaya :". "Rp " . number_format($row->jumlah, 2, ',', '.'); ?><br>
						<?php echo "Tanggal pembayaran :". date ("d F Y ",strtotime($row->tanggal_bayar)); ?><br>
						<?php echo "Status pembayaran : Lunas"; ?>
					</div>
				</div>
			</div>
			<?php } 
				}
			?>
		</div>
	</div>
	
    <div class="panel-group">
		<div class="panel panel-default" style="border: 1px solid black; border-radius: 10px; padding: 20px 20px 10px 20px;">
	    	<div class="panel-heading" id="panel-heading-tips">
	    		
		        <a data-toggle="collapse" href="#coll_tips" id="a-tips">
		        	<div id="panel-heading-tips-icon"><span class="glyphicon glyphicon-menu-down"></span></div>
		        	<div id="panel-heading-tips-label">Tips</div>
		        </a>
		        <span class="glyphicon glyphicon-info-sign" id="panel-heading-tips-status"></span>
			</div>
			<div id="coll_tips" class="panel-collapse collapse in">
				<h4>Jika ingin mengganti informasi pada biodata anda, anda dapat melakukannya pada :</h4>
				<h4>Profile -> Biodata</h4>
				<h4>Edit field yang ingin anda ubah</h4><br>
				
				<h4>Jika ingin mengganti password, anda dapat melakukannya pada :</h4>
				<h4>Profile -> Account Settings</h4><br>
				
				<h4>Jika ingin logout, anda dapat melakukannya pada :</h4>
				<h4>Profile -> Logout</h4>
			</div>
		</div>
	</div>
</div>
<?php require_once('footer.php');?>
</body>
<script>
$(document).ready(function(event) {
	var progressbar_height = $("#progressbar").css('height');
	
	var sudah_height = $("#sudah_notification").css('height');
	$("#sudah_notification").css("margin-top", "-=" + sudah_height);
	
	var belum_height = $("#belum_notification").css('height');
	$("#belum_notification").css("margin-top", "-=" + belum_height);
	
	$("#sudah_bar").on("mouseenter", function( event ) {
		$("#sudah_notification").css("visibility", "visible");
	});
	
	$("#sudah_bar").on("mouseleave", function( event ) {
		$("#sudah_notification").css("visibility", "hidden");
	});
	
	$("#belum_bar").on("mouseenter", function( event ) {
		$("#belum_notification").css("visibility", "visible");
	});
	
	$("#belum_bar").on("mouseleave", function( event ) {
		$("#belum_notification").css("visibility", "hidden");
	});
	
	
	
	jQuery.fn.rotate = function(degrees) {
	    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
	                 '-moz-transform' : 'rotate('+ degrees +'deg)',
	                 '-ms-transform' : 'rotate('+ degrees +'deg)',
	                 'transform' : 'rotate('+ degrees +'deg)'});
	    return $(this);
	};
	
	var rotation = 0;
	var isExpanded = false;
	var doneRotating = true;
	
	
	$('#a-berkas').click(function() {
		if (doneRotating)
		{
			doneRotating = false;
			var timer = setInterval(function() {
				
				if (!isExpanded)
				{
					expand();
		    	}
		    	else
		    	{
		    		collapse();
		    	}
		    	
		    	if (doneRotating)
				{
					clearInterval(timer);
					isExpanded = !isExpanded;
				}
		    	
			}, 1);
			
		}
	});
	
	function expand()
	{
		if (rotation < 180)
		{
			rotation += 4;
	    	$('#panel-heading-berkas-icon').rotate(rotation);
    	}
    	else
    	{
       		doneRotating = true;
    	}
	}
	
	function collapse()
	{
		if (rotation > 0)
		{
			rotation -= 4;
	    	$('#panel-heading-berkas-icon').rotate(rotation);
    	}
    	else
    	{
    		doneRotating = true;
    	}
	}
	
});
</script>
</html>