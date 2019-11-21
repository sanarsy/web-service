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
				<li class="active"> List Service </li>
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
							<a><h3 class="box-title">List Service</h3></a>
						<!--	<a  href="<?php //echo base_url();?>list_service/pdflistservice" class="pull-right btn bg-orange btn-sm" target="_blank">Pdf</a> -->
						</div>
														
								<div class="box-body">
								<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">
									<table id="example1" class="table table-bordered table-striped">
									
										<thead>
										<tr>
											<th data-sortable="true" style="width:10px"> No </th>
											<th data-field="idd3" data-sortable="true">No. Service</th>
											<th data-field="iddds" data-sortable="true">Service By</th>
											<th data-field="idddXs" data-sortable="true">Divisi</th>
											<th data-sortable="true">Tanggal</th>
											<th data-sortable="true">Status</th>
											
										</tr>
										</thead>
										<tbody>
											<?php $no = 0; foreach($datalist_service as $row) : $no++;?>
												<tr style="font-size: 12px" >
													<td data-field="no" width="10px"><?php echo $no;?></td>
													<td data-field="id">

													<?php if($row->status==2)
													{?>
													<a href="<?php echo base_url();?>list_service/pilih_teknisi/<?php echo $row->id_service;?>"><?php echo $row->id_service;?></a>
													<?php } else {?>
													<a href="<?php echo base_url();?>list_service/view_progress_teknisi/<?php echo $row->id_service;?>"><?php echo $row->id_service;?></a>
													<?php }?>
													
													</td>
													
													<td data-field="iddsd" ><?php echo $row->nama;?></td>
													<td data-field="iddsd"><?php echo $row->nama_divisi;?></td>
													<td data-field="id"><?php echo $row->tgl_service;?></td>
													<td data-field="id">
													<?php 
														if ($row->status==2) {?>
																<span class="label bg-green-active color-palette">APPROVAL INTERNAL</span>
														<?php }
														//{ echo "APPROVAL INTERNAL";}
														else if($row->status==3) {?> 
																<span class="label bg-fuchsia-active color-palette">MENUNGGU APPROVAL TEKNISI</span>
														<?php }
														//{ echo "MENUNGGU APPROVAL TEKNISI";}
														else if($row->status==4) {?> 
																<span class="label bg-yellow-active color-palette">PROSSES TEKNISI</span>
														<?php }
														//{ echo "PROSSES TEKNISI";}
														else if($row->status==5) {?>
																<span class="label bg-orange-active color-palette">PENDING TEKNISI</span>
														<?php }
														//{ echo "PENDING TEKNISI";}
														else if($row->status==6) {?>
																<span class="label bg-blue color-palette">SOLVED TEKNISI</span>
														<?php }
														//{ echo "SOLVED TEKNISI";}
														else if($row->status==7) {?>
																<span class="label bg-lime-active color-palette">SOLVED USER</span>
														<?php }else
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