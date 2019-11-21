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
				<li class="active"> My Assignment Service </li>
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
							<h3 class="box-title"> My Assignment Service </h3>
							
						</div>														
								<div class="box-body">	
									<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">	
									<table id="example1" class="table table-bordered table-striped">									
										<thead>
											<tr>
												<th data-sortable="true" width="10px"> No</th>
												<th data-sortable="true">No.Service</th>
												<th data-sortable="true">Tanggal</th>
												<th data-sortable="true">Category Service</th>
												<th data-sortable="true">Progress (%)</th>
												<th data-sortable="true">Aksi</th>											
											</tr>
										</thead>
										<tbody>
											<?php $no = 0; foreach($datamyassignment as $row) : $no++;?>
												<tr style="font-size: 12px" >
													<td data-field="no" width="10px"><?php echo $no;?></td>
													<td data-field="id">
														<?php if($row->status==4)
														{?>
														<a href="<?php echo base_url();?>myassignment/service_detail/<?php echo $row->id_service;?>"><?php echo $row->id_service;?></a>
														<?php } else {
														echo $row->id_service;
														}
														?>
													</td>
													<td data-field="id"><?php echo $row->tgl_service;?></td>
													<td data-field="id"><?php echo $row->category;?></td>
													<td data-field="id">
														<?php if($row->progress<=90) {?>
																<span class="label bg-orange-active color-palette"><?php echo $row->progress;?></span>
														<?php }
															else if($row->status=100){?>
																<span class="label bg-blue-active color-palette"><?php echo $row->progress;?></span>
																	
														<?php } else
														{			
															echo "";
														}
														?>		
													</td>
													<td data-field="id">
														<?php if($row->status==4)
														 {?>														 
														<?php } else if($row->status==3){?>
														<a title="Setujui Service" class="ubah btn btn-success btn-xs" href="<?php echo base_url();?>myassignment/terima/<?php echo $row->id_service;?>"><span class="fa fa-check-square-o" ></span></a>
													&nbsp;	
														<a title="Pending Service" class="ubah btn btn-danger btn-xs" href="<?php echo base_url();?>myassignment/pending/<?php echo $row->id_service;?>"><span class="fa fa-times-circle" ></span></a>
														<?php } else if($row->status==5){?>
														<a title="Edit" class="ubah btn btn-success btn-xs" href="<?php echo base_url();?>myassignment/terima/<?php echo $row->id_service;?>"><span class="fa fa-check-square" ></span></a>
														<?php }?>
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
		<?php echo $this->session->flashdata("msg");?>

	
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


