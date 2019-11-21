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
				<li class="active"> HDNews </li>
			</ol>
		
		</section>
	<!-- try ------------------------------------------------------------------------------------------------------------------------>
<!-- Body -->
		<section class="content">
				<div class="row">					
						<div class="col-md-12">
							<!-- The time line -->
							<ul class="timeline">
								<!-- timeline time label -->
								<li class="time-label">
									 
								</li>
								<!-- /.timeline-label -->
								<?php $no = 0; foreach($datainformasi as $row) : $no++;?>
							<!-- timeline item -->
								<li>								
									<i class="fa fa bg-orange"><img class="img-circle" src="<?php echo base_url();?>uploads/<?php echo $this->session->userdata('photo');?>" alt="User Avatar" style="height: 25px; width: 25px" ></i>
										<div class="timeline-item">
											<span class="time"><i class="fa fa-clock-o"></i> <?php echo $row->tanggal;?></span>
												<h3 class="timeline-header"><a href="#"><?php echo $row->subject;?></a></h3>
													<div class="timeline-body">
														<?php echo $row->pesan;?></b>
													</div>
																								
												<div>
												<?php if($row->status==1){?> 
													<p align="center"><img class="img" src="<?php echo base_url();?>uploads/news/<?php echo $row->file_informasi;?>" alt="User Avatar">
												<?php } else if($row->status==0)
													{ echo "";
													}
												?>
												</div>
												<br>										
										</div>									
								</li>
							  <?php endforeach;?>	
							  
							<!--<//?php 
//	echo "<b>Menampilkan nilai variabel Looping</b> <br>";
//	$x=-6;
//	for ($i=$x; $i <= 10; $i++)
//		{ 
//			if ( $i == 6 )
//			{
//				continue;
//			}
			
//		echo "\$i = $i <br>";
//	}

?>  -->
							  
							  
							  
						</div>
						<!-- /.box-body -->
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

		