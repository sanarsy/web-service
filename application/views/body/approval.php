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
				<li class="active"> Approval Service </li>
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
							<a><h3 class="box-title"> Approval Service </h3></a>						
						</div>														
								<div class="box-body">	
									<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">	
									<table id="example1" class="table table-bordered table-striped">									
										<thead>
											<tr>
												<th data-sortable="true" width="10px"> No</th>
												<th data-sortable="true">No. Service</th>
												<th data-sortable="true">Tanggal</th>
												<th data-sortable="true">Di Buat</th>
												<th data-sortable="true">Category</th>
												<th data-sortable="true">Status</th>
												<th data-field="iddddddD" data-sortable="true">Aksi</th>											
											</tr>
										</thead>
										<tbody>
											<?php $no = 0; foreach($dataapproval as $row) : $no++;?>
												<tr style="font-size: 12px" >
													<td data-field="no" width="10px"><?php echo $no;?></td>
													<td data-field="id"><a href="<?php echo base_url();?>myservice/myservice_detail/<?php echo $row->id_service;?>"><?php echo $row->id_service;?></a></td>
													<td data-field="id"><?php echo $row->tgl_service;?></td>
													<td data-field="id"><?php echo $row->nama;?></td>
													<td data-field="id"><?php echo $row->category;?></td>
													<td data-field="idS"><?php 
														if($row->status==1) {?> 
															<span class="label bg-red-active color-palette">Menunggu Approval Service</span>
														<?php }
														//echo "MENUNGGU APPROVAL ";}
														else if($row->status==0) {?>
															<span class="label bg-navy-active color-palette">Service Dibatalkan</span>
														<?php } else
														{
															echo "";
														}
															//{ echo "TIDAK APPROVAL";}
														
														?>
													</td>
														<?php if($row->status == 1)
														{?>
													<td>
														<a title="Setujui Service" class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>approval/approval_yes/<?php echo $row->id_service;?>"><span class="fa fa-check-square-o" ></span></a>
													&nbsp;
														<a title="Batalkan Service" class="hapus btn btn-danger btn-xs" href="<?php echo base_url();?>approval/approval_no/<?php echo $row->id_service;?>"><span class="fa fa-times-circle"></span></a>
													</td>
														<?php } else if($row->status == 2) {?>
													<td>
														<a title="Batalkan Service" class="hapus btn btn-danger btn-xs" href="<?php echo base_url();?>approval/approval_no/<?php echo $row->id_service;?>"><span class="fa fa-times-circle"></span></a>
													</td>
														<?php } else if($row->status == 0) {?>
													<td>
														<a title="Kembali Setujui Service" class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>approval/approval_reaction/<?php echo $row->id_service;?>"><span class="fa fa-share-square-o" ></span></a>
													</td>
														<?php }?>
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