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
				<li class="active"> Home </li>
			</ol>
		</section>
	
		<!-- Main content -->
		<section class="content">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3><?php echo $jml_service;?></h3>
							<p><strong>Service System</strong></p>
						</div>
						<div class="icon">
							<i class="ion ion-social-whatsapp-outline"></i>
						</div>
					<a href="<?php echo base_url();?>list_service_user/service_list_user" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
			<!-- /.col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-purple">
						<div class="inner">
							<h3><?php echo $notif_usert;?></h3>
							<p><strong>My Service</strong></p>
						</div>
						<div class="icon">
							<i class="fa fa-file-text-o"></i>
						</div>
					<a href="<?php echo base_url();?>myservice/myservice_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>  
				  </div>
				</div>				
			<!-- /.col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo $notif_usert2;?></h3>
							<p><strong>My Service Prosses</strong></p>
						</div>
						<div class="icon">
							<i class="fa fa-spinner"></i>
						</div>
					<a href="<?php echo base_url();?>myservice/myservice_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
				  </div>
				</div>
			<!-- /.col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php echo $notif_usert3;?></h3>
							<p><strong>My Service Solved</strong></p>
						</div>
						<div class="icon">
							<i class="fa fa-check-circle-o"></i>
						</div>
					<a href="<?php echo base_url();?>myservice/myservice_list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
				  </div>
				</div>
			</div>
		<!-- /.row -->
			<div class="row">
				<div class="col-md-12">
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title"></h3><strong>Inline Charts Service</strong>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			
								</div>
						</div>
					<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-xs-6 col-md-3 text-center">
									<input type="text" class="knob" value="<?php echo round($jml_service_solved,2);?>" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#3c8dbc" data-readonly="true">
									<div class="knob-label">Service Solved</div>
								</div>
								<!-- ./col -->
								<div class="col-xs-6 col-md-3 text-center">
									<input type="text" class="knob" value="<?php echo round($jml_service_process,2);?>" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#f56954" data-readonly="true">
										<div class="knob-label">Service On Prosess</div>
								</div>
								<!-- ./col -->
								<div class="col-xs-6 col-md-3 text-center">
									<input type="text" class="knob" value="<?php echo round($jml_service_app_int,2);?>" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#00a65a" data-readonly="true">
										<div class="knob-label">Service Waiting Approval</div>
								</div>
								<!-- ./col -->
								<div class="col-xs-6 col-md-3 text-center">
									<input type="text" class="knob" value="<?php echo round($jml_service_app_tek,2);?>" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#f39c12" data-readonly="true">
										<div class="knob-label">Waiting Approval Technition</div>
								</div>
							<!-- ./col -->
							</div>
						  <!-- /.row -->
						</div>
					<!-- ./box-body -->
						<div class="box-footer">
							<div class="row">
								<div class="col-sm-3 col-xs-6">
									<div class="description-block border-right">
										<span class="description-percentage text-green"><strong><?php echo round($jml_service_solved,2);?> %</strong></span>
										<h5 class="description-header">Service Solved</h5>
									</div>
								<!-- /.description-block -->
								</div>
							<!-- /.col -->
								<div class="col-sm-3 col-xs-6">
									<div class="description-block border-right">
										<span class="description-percentage text-red"><?php echo round($jml_service_process,2);?> %</span>
										<h5 class="description-header">Service On Prosess</h5>
									</div>
								<!-- /.description-block -->
								</div>
							<!-- /.col -->
								<div class="col-sm-3 col-xs-6">
									<div class="description-block border-right">
										<span class="description-percentage text-green"><?php echo round ($jml_service_app_int,2);?> %</span>
										<h5 class="description-header">Service Waiting Approval</h5>
									</div>									
								<!-- /.description-block -->
								</div>
							<!-- /.col -->
								<div class="col-sm-3 col-xs-6">
									<div class="description-block">
										<span class="description-percentage text-yellow"><?php echo round($jml_service_app_tek,2);?> %</span>
										<h5 class="description-header">Waiting Approval Technition</h5>
									</div>
								<!-- /.description-block -->
								</div>
							</div>
						<!-- /.row -->
						</div>
					<!-- /.box-footer -->
					
					</div>
				<!-- /.box -->
				</div>
			<!-- /.col -->
			</div>
		<!-- /.row -->
		</section>	
	</div>	
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<h6>By Santoso</h6>
			</div>
			<h6><strong>Copyright &copy; 2017 - <?=date('Y') ?>,Service System.</strong>All rights reserved.</h6>
		</footer>
</div>
