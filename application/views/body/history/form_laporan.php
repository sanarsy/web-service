
<div class="wrapper">	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Dashboard
<!--			<small>Version 2.0</small>
-->	
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> Dashboard </a></li>
				<li class="active"> Laporan History </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
<!-- ============================================================================================================================================ -->			
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header">
						<h5><i class='fa fa-file-text-o fa-fw'></i> Laporan History</h5>
						<hr />
						<?php echo form_open('laporan', array('id' => 'FormLaporan')); ?>
						<div class="box-body table-responsive">
						
					  <!-- Date -->
						<div class="form-group">
							<label> Dari Tanggal :</label>
									<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div> 
									<input type="text" name="tanggal_awal" class="form-control tanggal" id='tanggal_dari' required="" placeholder="Date " value="<?=set_value('tanggal');?>"/>
								</div> 
							<!-- /.input group -->
						</div>
						<div class="form-group">
							<label> Sampai Tanggal :</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="tanggal_akhir" class="form-control tanggal" id='tanggal_sampai' required="" placeholder="Date " value="<?=set_value('tanggal');?>"/>
								</div> 
							<!-- /.input group -->
						</div>
						<input type="submit" name="" class="btn btn-default pull-right" value="Cetak">
					
						<?php echo form_close(); ?>

						<br />
						<div id='result'></div>
					</div>
				</div>
			</div>
			</div>
		</section>
	</div>
</div>		
<p class='footer'><?php echo config_item('web_footer'); ?></p>

<link rel="stylesheet" type="text/css" href="<?php echo config_item('plugin'); ?>datetimepicker/jquery.datetimepicker.css"/>
<script src="<?php echo config_item('plugin'); ?>datetimepicker/jquery.datetimepicker.js"></script>
<script>
$('#tanggal_dari').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d',
	closeOnDateSelect:true
});
$('#tanggal_sampai').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d',
	closeOnDateSelect:true
});

$(document).ready(function(){
	$('#FormLaporan').submit(function(e){
		e.preventDefault();

		var TanggalDari = $('#tanggal_dari').val();
		var TanggalSampai = $('#tanggal_sampai').val();

		if(TanggalDari == '' || TanggalSampai == '')
		{
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-dialog').addClass('modal-sm');
			$('#ModalHeader').html('Oops !');
			$('#ModalContent').html("Tanggal harus diisi !");
			$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
			$('#ModalGue').modal('show');
		}
		else
		{
			var URL = "<?php echo site_url('laporan/laporan/penjualan'); ?>/" + TanggalDari + "/" + TanggalSampai;
			$('#result').load(URL);
		}
	});
});
</script>
<script type="text/javascript">
$(document).ready(function () {
	if($(".tanggal").length)
	{
		$(".tanggal").datepicker({
			format: "dd-mm-yyyy",
			showAnim:"slide",
			autoclose: true,
            todayHighlight: true,
      		orientation: "bottom auto",
      		todayBtn: true,
     		todayHighlight: true,

		});
	}
});
</script>