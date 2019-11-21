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
				<li class="active"> Ubah User </li>
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
										<form method="post" action="<?php echo base_url();?><?php echo $url;?>"  enctype="multipart/form-data">
											<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user;?>">
											
												<div class="box box-danger">
													
													<div class="box-header with-border">
														<h3 class="box-title"> Ubah User </h3>
													</div>														
													<!-- /.form group -->
														
													<div class="box-body">														
														<label> Nama </label>
														<input type="nama" class="form-control" name="" readonly value="<?php echo $nama;?>" >
													</div>
													<div class="box-body">														
														<label> Nik </label>
														<input type="nik" class="form-control" name="nik" readonly value="<?php echo $nik;?>" >
													</div>
													<div class="box-body">														
														<label> Password </label>
														<input type="password" class="form-control" name="password" value="" required id="password">														
													</div>
													&nbsp;&nbsp;	<span class="login100-title p-b-15">
															<input type="checkbox" onclick="myFunction()">						
																Show Password
														</span>
														<script>
														function myFunction() {
															var x = document.getElementById("password");
															if (x.type === "password") {
																x.type = "text";
															} else {
																x.type = "password";
															}
														}
														</script>
													<div class="box-body">														
														<label> Image </label>
														<input type="file" class="form-control" name="photo" value="<?php echo $photo;?>" required >
													</div>
													
										<!--			<div class="box-body">														
														<label> Level </label>
														<?php //echo form_dropdown('id_level',$dd_level,$id_level, ' id="id_level" required class="form-control" disabled');?>
													</div>
											-->		
												
													<div class="box-body">	
														<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="Simpan"><i class="fa fa-save" ></i> Simpan</button>
														<a href="<?php echo base_url();?>home" class="btn btn-flat btn-default btn_action" id="btn_cancel" title="Batal"><i class="fa fa-undo" ></i> Batal </a>
													</div>
												</div>
										</form>									
									</div>																			
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


