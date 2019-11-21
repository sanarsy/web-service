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
				<li class="active"> Tambah Informasi </li>
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
									<div class="col-md-9">
									<!-- /.box-body -->
										<form method="post" action="<?php echo base_url();?><?php echo $url;?>"  enctype="multipart/form-data">
											<input type="hidden" class="form-control" name="id_informasi" value="<?php echo $id_informasi;?>">
												<div class="box box-danger">
													<div class="box-header with-border">
														<h3 class="box-title"> Tambah Informasi </h3>
													</div>														
													<!-- /.form group -->
													<div class="box-body">														
														<label> Subject:</label>
														<input class="form-control" name="subject" placeholder="Subject" value="<?php echo $subject;?>" required>
													</div>
													<div class="box-body">
														<textarea class="form-control" name="pesan" style="height: 200px"><?php echo $pesan;?></textarea>
													</div>
													<div class="box-body">														
														<label> File :</label>
														<input type="file" class="form-control" name="file_informasi" value="<?php echo $file_informasi;?>" accept="image/*">
													</div>
													<div class="box-body">	
														<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="Simpan"><i class="fa fa-save" ></i> Simpan</button>
														<a href="<?php echo base_url();?>informasi/informasi_list" class="btn btn-flat btn-default btn_action" id="btn_cancel" title="Batal"><i class="fa fa-undo" ></i> Batal </a>
													</div>
												</div>	
										</form>														
										<!-- /.box-body -->										
									</div>												
									<!-- /.box -->																			
								</div>											
								<!-- /.col (right) -->    
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


<!-- ================================================================================================================================= -->



<script language="javascript" type="text/javascript">
    
	$(document).ready(function() {

		$("#id_divisi").change(function(){
	 		// Put an animated GIF image insight of content
		
			var data = {id_divisi:$("#id_divisi").val()};
			$.ajax({
					type: "POST",
					url : "<?php echo base_url().'select/select_divisi'?>",				
					data: data,
					success: function(msg){
						$('#div-order').html(msg);
					}
			});
		});   

	});

</script>			


