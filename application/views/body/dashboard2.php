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
