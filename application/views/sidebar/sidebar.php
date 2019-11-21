<body class="hold-transition skin-blue sidebar-mini">
		<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
						<!-- Sidebar user panel -->
							<div class="user-panel">
								<div class="pull-left image">
									<img src="<?php echo base_url("assets/Login_v17/images/icons/kk.png"); ?>" class="img-circle" alt="User Image">
								</div>
								<div class="pull-left info">
									<p>PT. XYZ</p>
									<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
								</div>
							</div>
<?php if($this->session->userdata('level')=="ADMIN")
{?>
<!-- sidebar menu: : style can be found in sidebar.less -->
							<ul class="sidebar-menu" data-widget="tree">

									<li class="header">MAIN NAVIGATION</li>
										<li class="treeview">
										<li><a href="<?php echo base_url();?>home"><i class="fa fa-home text-aqua"></i> <span>HOME</span></a></li>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>Service Job</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>service/add"><i class="fa fa-yelp text-yellow"></i> Create Service </a></li>
												<li><a href="<?php echo base_url();?>myservice/myservice_list"><i class="fa fa-circle-o text-aqua"></i> My Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_usert)) { echo "0"; }else{ echo $notif_usert;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>list_service/service_list"><i class="fa fa-circle-o text-yellow"></i> List Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_service)) { echo "0"; }else{ echo $notif_list_service;} ?></small></a></li>																						
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>ST Barang IT</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>stbarang/stbarang_list"><i class="fa fa-yelp text-yellow"></i> Serah Terima Barang  
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_st)) { echo "0"; }else{ echo $notif_list_st;} ?></small></a></li>																						
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>List Service</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>myservice/myservice_list"><i class="fa fa-circle-o text-aqua"></i> My Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_usert)) { echo "0"; }else{ echo $notif_usert;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>list_service/service_list"><i class="fa fa-circle-o text-yellow"></i> List Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_service)) { echo "0"; }else{ echo $notif_list_service;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>approval/approval_list"><i class="fa fa-circle-o text-aqua"></i> Approval Service 
												<span class="label label-primary" style="float:right;"><?php if(empty($notif_approval)) { echo "0"; }else{ echo $notif_approval;} ?></span></a></li>
												<li><a href="<?php echo base_url();?>myassignment/myassignment_list"><i class="fa fa-circle-o text-aqua"></i> My Assignment Service
												<span class="label label-primary" style="float:right;"><?php if(empty($notif_assignment2)) { echo "0"; }else{ echo $notif_assignment2;} ?></span></a></li>
												<li><a href="<?php echo base_url();?>dashboard_teknisi/teknisi_view"><i class="fa fa-circle-o text-red"></i> <span>Progress Teknisi</span></a></li>
												<li><a href="<?php echo base_url();?>lap_request/request_lap"><i class="fa fa-circle-o text-red"></i><span>&nbsp;Laporan Service</span></a></li>													
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-bullseye text-aqua"></i> <span> <strong> History Input User </strong> </span>
												<i class="fa fa-angle-left pull-right"></i>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>mjs/wd_history/history_wd"><i class="fa fa-file-code-o text-red"></i><span>&nbsp;Laporan History</span></a></li>
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-folder"></i> <span><strong> MASTER DATA </strong></span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>user/user_list"><i class="fa fa-users text-aqua"></i> Akses User </a></li>
												<li><a href="<?php echo base_url();?>karyawan/karyawan_list"><i class="fa fa-odnoklassniki-square text-aqua"></i> User </a></li>
												<li><a href="<?php echo base_url();?>jabatan/jabatan_list"><i class="fa fa-list-alt"></i> Title/Jabatan </a></li>
												<li><a href="<?php echo base_url();?>divisi/divisi_list"><i class="fa fa-windows"></i> Divisi </a></li>
												<li><a href="<?php echo base_url();?>teknisi/teknisi_list"><i class="fa fa-odnoklassniki"></i> Teknisi </a></li>
												<li><a href="<?php echo base_url();?>barang/barang_list"><i class="fa fa-windows"></i> Barang </a></li>
												<li><a href="<?php echo base_url();?>informasi/informasi_list"><i class="fa fa-circle-o text-blue"></i> <span>Informasi</span></a></li>
												<li><a href="<?php echo base_url();?>kondisi/kondisi_list"><i class="fa fa-question-circle text-blue"></i> Urgency/SLA </a></li>
											</ul>
										</li>
										<li class="header">LABELS</li>
										<li><a href="<?php echo base_url();?>informasi_view"><i class="fa fa-slideshare text-blue"></i> <span><strong> HDNews </strong></span></a></li>
										<!-- <li><a href="//localhost/ahp"><i class="fa fa-external-link text-blue"></i> <span><strong> AHP System </strong></span></a></li>
										<!--									<li><a href="<?php// echo base_url();?>dashboard_laporan/laporan_view"><i class="fa fa-circle-o text-red"></i> <span>Teknisi</span></a></li> -->
							</ul>
				<!-- /.sidebar -->
 <!-- Akses Login untuk Teknisi -->
<?php 
}else if($this->session->userdata('level')=="TEKNISI"){?>
				<!-- sidebar menu: : style can be found in sidebar.less -->
							<ul class="sidebar-menu" data-widget="tree">
									<li class="header">MAIN NAVIGATION</li>
										<li class="treeview">
										<li><a href="<?php echo base_url();?>home"><i class="fa fa-home text-aqua"></i> <span>HOME</span></a></li>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>Service Job</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>service/add"><i class="fa fa-yelp text-yellow"></i> Create Service </a></li>
												<li><a href="<?php echo base_url();?>myservice/myservice_list"><i class="fa fa-circle-o text-aqua"></i> My Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_usert)) { echo "0"; }else{ echo $notif_usert;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>list_service/service_list"><i class="fa fa-circle-o text-yellow"></i> List Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_service)) { echo "0"; }else{ echo $notif_list_service;} ?></small></a></li>																						
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>Penyerahan Barang IT</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>stbarang/stbarang_list"><i class="fa fa-yelp text-yellow"></i> Penyerahan Barang  
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_st)) { echo "0"; }else{ echo $notif_list_st;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>stbarang/stbarang_list2"><i class="fa fa-yelp text-yellow"></i> List Terima Barang  
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_st)) { echo "0"; }else{ echo $notif_list_st;} ?></small></a></li>		
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>List Service</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>myservice/myservice_list"><i class="fa fa-circle-o text-aqua"></i> My Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_usert)) { echo "0"; }else{ echo $notif_usert;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>list_service/service_list"><i class="fa fa-circle-o text-yellow"></i> List Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_service)) { echo "0"; }else{ echo $notif_list_service;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>approval/approval_list"><i class="fa fa-circle-o text-aqua"></i> Approval Service 
												<span class="label label-primary" style="float:right;"><?php if(empty($notif_approval)) { echo "0"; }else{ echo $notif_approval;} ?></span></a></li>
												<li><a href="<?php echo base_url();?>myassignment/myassignment_list"><i class="fa fa-circle-o text-aqua"></i> My Assignment Service
												<span class="label label-primary" style="float:right;"><?php if(empty($notif_assignment2)) { echo "0"; }else{ echo $notif_assignment2;} ?></span></a></li>
												<li><a href="<?php echo base_url();?>dashboard_teknisi/teknisi_view"><i class="fa fa-circle-o text-red"></i> <span>Progress Teknisi</span></a></li>
												<li><a href="<?php echo base_url();?>lap_request/request_lap"><i class="fa fa-circle-o text-red"></i><span>&nbsp;Laporan Service</span></a></li>													
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-bullseye text-aqua"></i> <span> <strong> History Input User </strong> </span>
												<i class="fa fa-angle-left pull-right"></i>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>mjs/wd_history/history_wd"><i class="fa fa-file-code-o text-red"></i><span>&nbsp;Laporan History</span></a></li>
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-folder"></i> <span><strong> MASTER DATA </strong></span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>user/user_list"><i class="fa fa-users text-aqua"></i> Akses User </a></li>
												<li><a href="<?php echo base_url();?>karyawan/karyawan_list"><i class="fa fa-odnoklassniki-square text-aqua"></i> User </a></li>
												<li><a href="<?php echo base_url();?>jabatan/jabatan_list"><i class="fa fa-list-alt"></i> Title/Jabatan </a></li>
												<li><a href="<?php echo base_url();?>divisi/divisi_list"><i class="fa fa-windows"></i> Divisi </a></li>
												<li><a href="<?php echo base_url();?>teknisi/teknisi_list"><i class="fa fa-odnoklassniki"></i> Teknisi </a></li>
												<li><a href="<?php echo base_url();?>barang/barang_list"><i class="fa fa-windows"></i> Barang </a></li>
												<li><a href="<?php echo base_url();?>informasi/informasi_list"><i class="fa fa-circle-o text-blue"></i> <span>Informasi</span></a></li>
												<li><a href="<?php echo base_url();?>kondisi/kondisi_list"><i class="fa fa-question-circle text-blue"></i> Urgency/SLA </a></li>
											</ul>
										</li>
										<li class="header">LABELS</li>
										<li><a href="<?php echo base_url();?>informasi_view"><i class="fa fa-slideshare text-blue"></i> <span><strong> HDNews </strong></span></a></li>
										<!-- <li><a href="//localhost/ahp"><i class="fa fa-external-link text-blue"></i> <span><strong> AHP System </strong></span></a></li>
										<!--									<li><a href="</?php// echo base_url();?>dashboard_laporan/laporan_view"><i class="fa fa-circle-o text-red"></i> <span>Teknisi</span></a></li> -->
							</ul>
<!-- Akses Login untuk User 1 -->	
<?php 
}else if($this->session->userdata('level')=="MANAGER"){?>
				<!-- sidebar menu: : style can be found in sidebar.less -->
							<ul class="sidebar-menu" data-widget="tree">
									<li class="header">MAIN NAVIGATION</li>
										<li class="treeview">
										<li><a href="<?php echo base_url();?>home"><i class="fa fa-home text-aqua"></i> <span>HOME</span></a></li>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>Service Job</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>service/add"><i class="fa fa-yelp text-yellow"></i> Create Service </a></li>
												<li><a href="<?php echo base_url();?>myservice/myservice_list"><i class="fa fa-circle-o text-aqua"></i> My Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_usert)) { echo "0"; }else{ echo $notif_usert;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>list_service/service_list"><i class="fa fa-circle-o text-yellow"></i> List Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_service)) { echo "0"; }else{ echo $notif_list_service;} ?></small></a></li>																						
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>Penyerahan Barang IT</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>stbarang/stbarang_list"><i class="fa fa-yelp text-yellow"></i> Penyerahan Barang  
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_st)) { echo "0"; }else{ echo $notif_list_st;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>stbarang/stbarang_list2"><i class="fa fa-yelp text-yellow"></i> List Terima Barang  
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_st)) { echo "0"; }else{ echo $notif_list_st;} ?></small></a></li>		
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>List Service</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>myservice/myservice_list"><i class="fa fa-circle-o text-aqua"></i> My Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_usert)) { echo "0"; }else{ echo $notif_usert;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>list_service/service_list"><i class="fa fa-circle-o text-yellow"></i> List Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_service)) { echo "0"; }else{ echo $notif_list_service;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>approval/approval_list"><i class="fa fa-circle-o text-aqua"></i> Approval Service 
												<span class="label label-primary" style="float:right;"><?php if(empty($notif_approval)) { echo "0"; }else{ echo $notif_approval;} ?></span></a></li>
												<li><a href="<?php echo base_url();?>myassignment/myassignment_list"><i class="fa fa-circle-o text-aqua"></i> My Assignment Service
												<span class="label label-primary" style="float:right;"><?php if(empty($notif_assignment2)) { echo "0"; }else{ echo $notif_assignment2;} ?></span></a></li>
												<li><a href="<?php echo base_url();?>dashboard_teknisi/teknisi_view"><i class="fa fa-circle-o text-red"></i> <span>Progress Teknisi</span></a></li>
												<li><a href="<?php echo base_url();?>lap_request/request_lap"><i class="fa fa-circle-o text-red"></i><span>&nbsp;Laporan Service</span></a></li>													
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-bullseye text-aqua"></i> <span> <strong> History Input User </strong> </span>
												<i class="fa fa-angle-left pull-right"></i>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>mjs/wd_history/history_wd"><i class="fa fa-file-code-o text-red"></i><span>&nbsp;Laporan History</span></a></li>
											</ul>
										</li>
										
										<li class="header">LABELS</li>
										<li><a href="<?php echo base_url();?>informasi_view"><i class="fa fa-slideshare text-blue"></i> <span><strong> HDNews </strong></span></a></li>
										<!-- <li><a href="//localhost/ahp"><i class="fa fa-external-link text-blue"></i> <span><strong> AHP System </strong></span></a></li>
										<!--									<li><a href="</?php// echo base_url();?>dashboard_laporan/laporan_view"><i class="fa fa-circle-o text-red"></i> <span>Teknisi</span></a></li> -->
							</ul>
<!-- Akses Login untuk User 1 -->
<?php 
} else if($this->session->userdata('level')=="USER"){?>
	<!-- sidebar menu: : style can be found in sidebar.less -->
							<ul class="sidebar-menu" data-widget="tree">
									<li class="header">MAIN NAVIGATION</li>
										<li class="treeview">
										<li><a href="<?php echo base_url();?>home"><i class="fa fa-home text-aqua"></i> <span>HOME</span></a></li>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>Service Job</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo base_url();?>service/add"><i class="fa fa-yelp text-yellow"></i> Create Service </a></li>
												<li><a href="<?php echo base_url();?>myservice/myservice_list"><i class="fa fa-circle-o text-aqua"></i> My Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_usert)) { echo "0"; }else{ echo $notif_usert;} ?></small></a></li>
												<li><a href="<?php echo base_url();?>list_service/service_list"><i class="fa fa-circle-o text-yellow"></i> List Service 
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_service)) { echo "0"; }else{ echo $notif_list_service;} ?></small></a></li>																						
											</ul>
										</li>
										<li class="treeview">
											<a href="#">
												<i class="fa fa-edit"></i> <span>Penyerahan Barang IT</span>
												<span class="pull-right-container">
													<i class="fa fa-angle-left pull-right"></i>
												</span>
											</a>
											<ul class="treeview-menu">
										<!--		<li><a href="</?php echo base_url();?>stbarang/stbarang_list"><i class="fa fa-yelp text-yellow"></i> Penyerahan Barang  
												<small class="label bg-orange" style="float:right;"></?php if(empty($notif_list_st)) { echo "0"; }else{ echo $notif_list_st;} ?></small></a></li>
										-->		<li><a href="<?php echo base_url();?>stbarang/stbarang_list2"><i class="fa fa-yelp text-yellow"></i> List Terima Barang  
												<small class="label bg-orange" style="float:right;"><?php if(empty($notif_list_st)) { echo "0"; }else{ echo $notif_list_st;} ?></small></a></li>		
											</ul>
										</li>
										
										<li class="header">LABELS</li>
										<li><a href="<?php echo base_url();?>informasi_view"><i class="fa fa-slideshare text-blue"></i> <span><strong> HDNews </strong></span></a></li>
										<!-- <li><a href="//localhost/ahp"><i class="fa fa-external-link text-blue"></i> <span><strong> AHP System </strong></span></a></li>
										<!--									<li><a href="</?php// echo base_url();?>dashboard_laporan/laporan_view"><i class="fa fa-circle-o text-red"></i> <span>Teknisi</span></a></li> -->
							</ul>

<?php }?>
				</section>	
			</aside>
<!-- ./wrapper -->
</body>
			
	

    