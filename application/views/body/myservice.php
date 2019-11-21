<?php
// atribut popup
        $atts = array(
            'width' => '800',
            'height' => '550',
            'scrollbars' => 'yes',
			'status' => 'no',
            'resizable' => 'no',
            'screenx' => '100',
            'screeny' => '30'
			
        );

?>
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
				<li class="active"> My Service </li>
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
							<h3 class="box-title"> My Service</h3>
						</div>		
								<div class="box-body">
									<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th data-field="no" data-sortable="true" width="10px"> No.</th>
											<th data-field="idd" data-sortable="true">No. Service</th>
											<th data-field="iddd" data-sortable="true">Tanggal</th>
											<th data-field="idddd" data-sortable="true">Category Service</th>
											<th data-field="idxddddd" data-sortable="true">Progress (%)</th>
											<th data-field="idddddd" data-sortable="true"> Status</th>
											<th data-field="iddfdddd" data-sortable="true">Aksi</th>
											<th data-field="iddfdddd" data-sortable="true">Print</th>
											
										</tr>
										</thead>
										<tbody>
											<?php $no = 0; foreach($datamyservice as $row) : $no++;?>
												<tr style="font-size: 12px" >
													<td data-field="no" width="10px"><?php echo $no;?></td>
													<td data-field="id"><a href="<?php echo base_url();?>myservice/myservice_detail/<?php echo $row->id_service;?>"><?php echo $row->id_service;?></a></td>
													<td data-field="id"><?php echo $row->tgl_service;?></td>
													<td data-field="id"><?php echo $row->jenis;?></td>
													<td data-field="id"><span class="label label-primary"><?php echo $row->progress;?></span></td>
													<td data-field="id">
														<?php if($row->status==1) {?>
																<span class="label bg-red-active color-palette">Menunggu Disetujui</span>
														<?php }
															else if($row->status==2){?>
																<span class="label bg-green-active color-palette">Disetujui</span>
														<?php }			
															//{ echo "DISETUJUI";}
															else if($row->status==0){?>
																<span class="label bg-navy color-palette">service Ditolak</span>
														<?php }
															//{ echo "service DITOLAK";}
															else if($row->status==3){?>
																<span class="label bg-fuchsia-active color-palette">Menunggu Approval Teknisi</span>
														<?php }
															//{ echo "MENUNGGU APRROVAL TEKNISI";}
															else if($row->status==4) {?>
																<span class="label bg-yellow-active color-palette">Prosess Teknisi</span>
														<?php }
															//{ echo "PROSES TEKNISI";} // jika solved 
															else if($row->status==5) {?>
																<span class="label bg-orange-active color-palette">Pending Teknisi</span></a>
														<?php }
															//{ echo "PENDING TEKNISI";}
															else if($row->status==6) {?>
																<span class="label bg-blue color-palette">Solved Teknisi</span>
														<?php }
															//{ echo "PENDING TEKNISI";}
															else if($row->status==7) {?>
																<span class="label bg-lime-active color-palette">Diterima User</span>			
														<?php } else
														{			
															echo "";
														}
														?>		
													</td>
													<td>
												
													<?php if($row->status==6 AND 7) 
														{?>												
														<a title="Solved by User" class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>myservice/approval_user/<?php echo $row->id_service;?>"><span class="fa fa-check-square-o" ></span></a>	
														<td>
														<a data-toggle="modal"  title="Hapus Kontak" class="print_kartu" href="<?php echo base_url();?>pdf/kartu/<?php echo $row->id_service;?>"><span class="glyphicon glyphicon-print"></span></a>
														</td>
													<?php } else if($row->status==7)
														{?>
														<td>
														<a data-toggle="modal"  title="print" class="print_kartu" href="<?php echo base_url();?>pdf/kartu/<?php echo $row->id_service;?>"><span class="glyphicon glyphicon-print"></span></a>
														</td>
														<?php } else if($row->status==1)
														{?>
														<a href="<?php echo base_url('service/edit/');?><?php echo $row->id_service; ?>" class="btn  btn-success btn-xs fa fa-edit"> edit</a>
														&nbsp;&nbsp;
														<a href="<?php echo base_url('service/delService/');?>/<?php echo $row->id_service;?>
														"class="btn  btn-warning btn-xs fa fa-trash-o"
														onClick="return confirm('Yakin Ingin Menghapus ID (<?php echo $row->id_service; ?>) ? ... ')"> Hapus
														</a>
														<td>
														<a data-toggle="modal"  title="Hapus Kontak" class="print_kartu" href="<?php echo base_url();?>pdf/kartu/<?php echo $row->id_service;?>"><span class="glyphicon glyphicon-print"></span></a>
														</td>
													<?php } else {echo "";}
														?>
													</td>	
												</tr>
											<?php endforeach;?>
										</tbody>
									</table>
								</div>
								</div>
					</div>
					<?php echo $this->session->flashdata("msg");?>
						
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
<!-- ======================================================= -->
<div class="modal fade" id="dialog-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel"><span class="fa fa-file-pdf-o"></span>&nbsp;Form Job Service</h4>
			</div>
			<div class="modal-body" id="MyModalBody">
		...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>  Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- akhir kode modal dialog -->

	<script>
	$(document).ready(function() {
		// ketika tombol detail ditekan
		$('.print_kartu').on("click", function(){
		// ambil nilai id dari link print
		var no_daftar= this.id;
		$("#MyModalBody").html('<iframe src="<?php echo base_url();?>pdf/kartu/'+no_daftar+'" frameborder="no" width="570" height="400"></iframe>');
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
      'autoWidth'   : true,
	
    })
  })
</script>




	
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


