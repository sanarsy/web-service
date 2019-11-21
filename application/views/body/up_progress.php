<!-- ======================================================== -->			
<script language="javascript" type="text/javascript">
    
	$(document).ready(function() {

		$("#id_teknisi").change(function(){
	 		// Put an animated GIF image insight of content	 		
		
			var data = {id_teknisi:$("#id_teknisi").val()};
			$.ajax({
					type: "POST",
					url : "<?php echo base_url().'select/select_view_job'?>",				
					data: data,
					success: function(msg){
						$('#div-order').html(msg);
					}
			});
		});   

	});

</script>

<!--try ============================================================================================================================================ -->
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
				<li class="active"> Update Progress Request </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-6">
					<div class="box">
						<div class="box-header with-border">
							<span class="box-title"></span>Request No : <?php echo $id_service;?>
						</div>
									<!-- /.box-header -->
						<div class="box-body">
							<table class="table table-bordered">
								<tr>
									<td> Tanggal </td>
									<td><?php echo $tanggal;?></td>	
								</tr>							
								<tr>
									<td> Request Category </td>
									<td><?php echo $category;?></td>	
								</tr>
								<tr>
									<td> Direquest oleh </td>
									<td><?php echo $reported;?></td>									
								</tr>	
							</table>
						</div>	
					</div>
				</div>
				<div class="col-md-6">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"></h3> Update Penanganan Request
						</div>
									<!-- /.box-header -->
						<div class="box-body">
							<form method="post" action="<?php echo base_url();?><?php echo $url;?>">
								<input type="hidden" class="form-control" name="id_service" value="<?php echo $id_service;?>">						
										<!-- /.form group -->
										<div class="box-body">														
											<label> Up Progress :</label>
											<select name="progress" class="form-control">
												<?php for ($i=$progress; $i<=100; $i+=10){?>
													<option value="<?php echo $i;?>">PROGRESS <?php echo $i;?> %</option>
												<?php }?>
											</select>
										</div>
										<div class="box-body">
											<div class="progress">
												<div class="progress-bar progress-bar-aqua progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $progress;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress;?>%">
													<span class="sr-only"><?php echo $progress;?> % Complete (Progress)</span>
												</div>
											</div>
										</div>	
										<div class="box-body col-sm-offset ">
											<label>Deskripsi Progress</label>
												<textarea class="form-control" name="deskripsi_progress" rows="3" placeholder=""></textarea>
										</div>
										<div class="box-body col-sm-offset col-sm-12">
											<div >
												<div class="checkbox">
													<label>
														<input type="checkbox" name="clickme" id="clickme"> isi data spesifikasi PC/Laptop & sparepart bila ada
													</label>
												</div>
											</div>
										</div>	
										<div class="box-body " id="showhide">
											<!--&nbsp;&nbsp;&nbsp;<input type="checkbox" name="clickme" id="clickme"> &nbsp; Click Me -->
											<div class="form-group">
												<label>Nama PC/Laptop</label>
													<input type="text" class="form-control" name="skomputer" value="<?php echo $skomputer;?>" placeholder="Enter ...">
											</div>
											<div class="form-group">
												<label>Sparepart yang digunakan</label>
													<input type="text" class="form-control" name="sparepart" value="<?php echo $sparepart;?>" placeholder="Enter ...">
											</div>
										</div>
										
											<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>	
											<script type='text/javascript'>
												$(window).load(function(){
												  $("#showhide").css("display","none");
												 
												$('#clickme').change(function(){
												  if (this.checked) {
													$('#showhide').fadeIn('slow');
												  } 
												  else {
													$('#showhide').fadeOut('slow');
												  }  
												});
												});
											</script>
										<div class="box-body">	
											<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="Simpan"><i class="fa fa-save" ></i> Simpan</button>
											<a href="<?php echo base_url();?>list_service/service_list" class="btn btn-flat btn-default btn_action" id="btn_cancel" title="Batal"><i class="fa fa-undo" ></i> Batal </a>
										</div>										
							</form>	
						</div>	
					</div>
				</div>
				<div id="div-order">
				</div>	
			</div>	
		</section>
	</div>	
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<h6>By Santoso</h6>
			</div>
			<h6><strong>Copyright &copy; 2017 - <?=date('Y') ?>,Service System.</strong>All rights reserved.</h6>
		</footer>				
</div>		

<!-- ====================================================== -->
	
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>


<?php $this->load->view('konfirmasi');?>

<script type="text/javascript">
$(document).ready(function(){

$(".hapus").click(function(){
var id = $(this).data('id');

$(".modal-body #mod").text(id);

});

});
</script>

