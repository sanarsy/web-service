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
				<li class="active"> Teknisi View </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-default color-palette-box">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-tag"></i> Teknisi View </h3>
						</div>
						<div class="box-body">
							
							<!-- Info boxes -->
						<div class="row">
						<?php $no = 0; foreach($datateknisi as $row) : $no++;?>
							<div class="col-lg-3 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-aqua">
									<div class="inner">
										<h3><?php echo $no;?></h3>
										<p><strong><?php echo $row->nama;?></strong></p>
									</div>
									<div class="icon">
										<i class="ion ion-social-whatsapp-outline"></i>
									</div>
								<a href="<?php echo base_url();?>dashboard_teknisi/report_teknisi/<?php echo $row->id_teknisi;?>" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<?php endforeach;?>	
						</div>		
						
						</div>				
					</div>
						
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

