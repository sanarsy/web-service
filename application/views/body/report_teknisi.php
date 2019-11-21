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
				<li class="active"> Progress Teknisi </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<!-- /.box-header -->
							<a href="<?php echo base_url();?>dashboard_teknisi/teknisi_view"><h3 class="box-title"> Progress Teknisi </h3></a>
						<!--	<a href="<?php echo base_url();?>dashboard_teknisi/pdfreportteknisi/</?php echo $id_teknisi;?>" class="pull-right btn bg-orange btn-sm" target="_blank">Pdf</a> -->
						</div>
								<div class="box-body">
									<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th>No.</th>
											<th>Tanggal Prosess</th>
											<th>Request By</th>
											<th>divisi</th>
											<th>Progress</th>										
										</tr>
										</thead>
										<tbody>
											<?php $no = 0; foreach($datareportteknisi as $row) : $no++;?>
												<tr style="font-size: 12px" >
													<td><?php echo $no;?></td>
													<td><?php echo $row->tgl_proses;?></td>
													<td><?php echo $row->nama;?></td>
													<td><?php echo $row->nama_divisi;?></td>
													<td>
														<?php if($row->progress<=99) {?>
															<div class="progress">
															<div class="progress-bar progress-bar-aqua progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $row->progress;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row->progress;?>%">
															<span><?php echo $row->progress;?> % Complete (Progress)</span>
															</div>
														</div>
														<?php }
															else if($row->progress=100){?>
															<div class="progress">
															<div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="<?php echo $row->progress;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row->progress;?>%">
															<span><?php echo $row->progress;?> % Complete (Progress)</span>
															</div>
														<?php } else
														{			
															echo "";
														}
														?>	
													</td>												
												</tr>
											<?php endforeach;?>
										</tbody>
									</table>
									</div>
								</div>
					</div>		
				</div>
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


<!-- ===========================================================================================================================  -->
		
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

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>	

