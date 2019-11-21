<script language="javascript" type="text/javascript">
    
	$(document).ready(function() {

		$("#id_kategori").change(function(){
	 		// Put an animated GIF image insight of content
		
			var data = {id_kategori:$("#id_kategori").val()};
			$.ajax({
					type: "POST",
					url : "<?php echo base_url().'select/select_sub_kategori'?>",				
					data: data,
					success: function(msg){
						$('#div-order').html(msg);
					}
			});
		});   

	});

</script>

<!-- Tampilan -->

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
				<li class="active"> Create Service </li>
			</ol>
		
		</section>
	<!-- try ------------------------------------------------------------------------------------------------------------------------>
<!-- Body -->
		<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-info">							
						<!-- try 2222 ======================================================================================================================= >
						<!-- Main content -->
							<section class="content">
								<div class="row">									
									<!-- /.box-body -->
										<form method="post" action="<?php echo base_url();?><?php echo $url;?>">
											<input type="hidden" class="form-control" name="id_service" value="<?php echo $id_service;?>">
												<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user;?>">	
												<div class="col-md-12">
													<div class="box box-warning">
														<div class="box-header with-border">
															<h3 class="box-title">Dibuat Oleh</h3>
														</div>
														<!-- /.box-header -->
														<div class="box-body">
																<!-- text input -->
																<div class="form-group col-md-3">
																	<label>Nik :</label>
																	<input class="form-control" name="nama" placeholder="Nama" value="<?php echo $id_user;?>" disabled="disabled" />
																</div>
																<div class="form-group col-md-3">
																	<label> Divisi :</label>
																	<td width="180"><input class="form-control" name="divisi" placeholder="Cabang" value="<?php echo $divisi;?>" disabled="disabled" /></td>
																</div>

																<!-- textarea -->
																<div class="form-group col-md-3">
																	<label>Nama :</label>
																	<input class="form-control" name="nama" placeholder="Nama" value="<?php echo $nama;?>" disabled="disabled" />
																</div>
														</div>	
													</div>
												</div>
												<div class="col-md-12">
												<!-- /.box-body -->																																				
													<div class="box box-warning">
														<div class="box-header with-border">
															<h3 class="box-title">Service Job</h3>
														</div>
														<div class="box-body">
																
															<div class="form-group col-sm-6">
																<label>Date:</label>
																<div class="input-group date">
																	<div class="input-group-addon">
																		<i class="fa fa-calendar"></i>
																	</div>
																	<input type="text" class="form-control pull-right" name="tanggal_service" value="<?php echo $tanggal_service;?>" id="datepicker">
																</div>
															<!-- /.input group -->
															</div>
																<div class="form-group col-md-6">
																	<label>Nama Barang</label>
																	<?php echo form_dropdown('id_barang',$dd_barang, $id_barang, ' id="id_barang" required class="form-control"');?>
																</div>
																
																<div class="form-group col-sm-12">
																	<label> Detail Service :</label>
																	<textarea class="form-control" name="problem_detail" rows="8" placeholder="Detail Diskripsi"><?php echo $problem_detail;?></textarea>
																</div>
														</div>	
													</div>								
												</div>
												<div class="box-body" >
													&nbsp <button type="submit" class="btn bg-orange btn-flat margin">Simpan</button>
													<a href="<?php echo base_url();?>myservice/myservice_list"  class="btn btn-default btn-flat">Batal</a>		
												</div>
												
										</form>	

								</div>							 
							</section>
						</div>
					</div>	
				</div>		
			<!-- /.content -->				
		</section>		
	</div>
	
	
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<h6>By Santoso</h6>
		</div>
			<h6><strong>Copyright &copy; 2017 - <?=date('Y') ?>,Service System.</strong>All rights reserved.</h6>
	</footer>
</div>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
