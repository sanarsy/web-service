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
				<li class="active"> Progress Service </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-6">
					<div class="box">
						<div class="box-header with-border">
							<span class="box-title"></span>No. Nota Service : <?php echo $id_service;?>
						</div>
									<!-- /.box-header -->
						<div class="box-body">
							<table class="table table-bordered">
								<tr>
							<!--	<//?php //print_r(); ?> -->
									<td> Tanggal Service</td>
									<td><?php echo date('d-m-Y H:i:s', strtotime($tanggal));?></td>	
								</tr>
								<tr>
									<td> Nik </td>
									<td><?php echo $nik;?></td>										
								</tr>
								<tr>
									<td> Nama </td>
									<td><?php echo $nama;?></td>										
								</tr>					
								<tr>
									<td> Category Service </td>
									<td><?php echo $category;?></td>	
								</tr>
								<tr>
									<td> Problem Detail</td>
									<td><?php echo $problem_detail;?></td>	
								</tr>		
							</table>
						</div>	
					</div>
				</div>
				<div class="col-md-6">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"></h3> View Progress
						</div>
									<!-- /.box-header -->
						<div class="box-body">
							<table class="table table-bordered">
								<tr>									
									<th>Date Prosess </th>
									<th>Date Solved </th>
									<th>Progress</th>
									<th style="width: 40px">Label</th>
								</tr>
								<tr>
									<td><?php if($tanggal_proses == "0000-00-00 00:00:00") { echo "BELUM DI PROSES"; }
										else
										{?>
										<?php echo date('d-m-Y H:i:s', strtotime($tanggal_proses));?>
										<?php }?>
									</td>
									<td><?php if($tanggal_solved == "0000-00-00 00:00:00") {  } else {?>
										<?php echo date('d-m-Y H:i:s', strtotime($tanggal_solved));?>
										<?php }?>
									</td>
									<td>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-success" aria-valuenow="<?php echo $progress;?>" style="width:<?php echo $progress;?>%"></div>
										</div>
									</td>
									<td><span class="badge bg-red"> <?php echo $progress;?> %</span></td>
								</tr>								
							</table>
						</div>	
					</div>
				</div>
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"> System Tracking Request</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive ">
							<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">
							<table class="table table-hover">
								<tr>
									<th>No.</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th>Deskripsi</th>
									<th>Oleh</th>
								</tr>
								<?php $no = 0; foreach($data_trackingservice as $row) : $no++;?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $row->tgl_service;?></td>
									<td><?php echo $row->status;?></td>
									<td><?php echo $row->deskripsi;?></td>
									<td><?php echo $row->nama;?></td>
								</tr>
								<?php endforeach;?>
							</table>
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

