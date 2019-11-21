<div class="wrapper">	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Dashboard
<!--			<small>Version 2.0</small>
-->			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> Dashboard </a></li>
				<li class="active"> Profile User </li>
			</ol>
		</section>
	
		<!-- Main content -->
		<section class="content">
			<!-- Info boxes -->
			<div class="row">
					<div class="col-md-7">
						<div class="box box-warning">
							<div class="box-body ">
								<div class="col-md-12">
									<div class="box box-widget widget-user" >
										<div class="widget-user-header " style="background: url('<?php echo base_url("assets/dist/img/photo.jpg"); ?>') center center;">
											<h3 class="widget-user-username text-white"><?php echo $this->session->userdata('nama');?></h3>
											<h5 class="widget-user-desc text-white"><?php echo $this->session->userdata('level');?></h5>
										</div>
										<div class="widget-user-image">
											<img class="img-circle" src="<?php echo base_url();?>uploads/<?php echo $this->session->userdata('photo');?>" alt="User Avatar" style="height: 80px; width: 80px" >
										</div>
										<div class="box-footer">
										</div>
									</div>     
								</div>
								<div class="col-md-6">
									<div class="box box-widget widget-user-2">
										<div class="">  
											<h3 class="">Detail User</h3>
										</div>
										<div class="box-footer no-padding">
											<ul class="nav nav-stacked">											
												<li><a href="#"><i class="fa fa-bullseye"></i> <?php echo $nik;?></a></li>
												<li><a href="#"><i class="fa fa-bullseye"></i> <?php echo $nama;?></a></li>
												<li><a href="#"><i class="fa fa-bullseye"></i> <?php echo $alamat;?></a></li>
												<li><a href="#"><i class="fa fa-bullseye"></i> <?php echo $jk;?></a></li>
											</ul>
										</div>
									</div>
									  <!-- /.widget-user -->
								</div>
								<div class="col-md-6">
									<div class="box box-widget widget-user-2">
										<div class="">
											<h3 class="">Informasi User</h3>
										</div>
										<div class="box-footer no-padding">
											<ul class="nav nav-stacked">
												<li><a href="#"><i class='fa fa-shield color-orange'></i> Status												
													<span class="pull-right badge bg-blue">Active</span></a>
												</li>
												<li><a href="#"><i class='fa fa-history'></i> Divisi <span class="pull-right "> <?php echo $divisi;?></span></a></li>												
											</ul>
										</div>
									</div>
									<a href="<?php echo base_url();?>user_edit/edit/<?php echo $user;?>"><button type="button" class="btn btn-block btn-info btn-flat"> Ubah Password </button> </a>
									  <!-- /.widget-user -->
								</div>          
							</div>
						<!--/box body -->
						</div>
					 <!--/box -->
					</div>
				
			</div>
		<?php echo $this->session->flashdata("msg");?>
		</section>	
	</div>	
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<h6>By Santoso</h6>
			</div>
			<h6><strong>Copyright &copy; 2017 - <?=date('Y') ?>,Service System.</strong>All rights reserved.</h6>
		</footer>
</div>


