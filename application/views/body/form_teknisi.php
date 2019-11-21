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
				<li class="active"> Tambah Teknisi </li>
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
									<div class="col-md-6">
									<!-- /.box-body -->
										<form method="post" action="<?php echo base_url();?><?php echo $url;?>">
											<input type="hidden" class="form-control" name="id_teknisi" value="<?php echo $id_teknisi;?>">
												<div class="box box-danger">
													<div class="box-header with-border">
														<h3 class="box-title"> Tambah Teknisi </h3>
													</div>														
													<!-- /.form group -->
														
													<div class="box-body">														
														<label> Nama User :</label>
														<?php echo form_dropdown('id_karyawan',$dd_karyawan, $id_karyawan, ' id="id_karyawan" required class="form-control"');?>
													</div>
													<div class="box-body">														
														<label> Spesialis :</label>
														<select class="form-control select2" name="spesialis" style="width: 100%;">
														  <option selected="selected">Hardware</option>
														  <option>Software</option>
														  <option>MIS</option>
														</select>
													</div>
													<div class="box-body">	
														<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="Simpan"><i class="fa fa-save" ></i> Simpan</button>
														<a href="<?php echo base_url();?>teknisi/teknisi_list" class="btn btn-flat btn-default btn_action" id="btn_cancel" title="Batal"><i class="fa fa-undo" ></i> Batal </a>
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



		