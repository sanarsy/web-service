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
				<li class="active">Data List Penyerahan Barang </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
						<a href="<?=base_url('')?>stbarang/add" style="margin-bottom:10px;" type="button" class="btn btn-sm btn-primary" name="tambah_data"><i class="fa fa-plus-circle" aria-hidden="true">
							</i> Tambah Penyerahan Barang</a>
						</div>
						<div class="box-body">
							<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th data-field="no" data-sortable="true" width="10px"> No </th>
										<th data-field="id" data-sortable="true">No Penyerahan</th>
										<th data-field="id" data-sortable="true">ID Barang</th>
										<th data-field="id" data-sortable="true">Nama Barang</th>
									<!--	<th data-field="id" data-sortable="true">Jenis</th> -->
										<th data-field="id" data-sortable="true">Spesifikasi</th>
										<th data-field="id" data-sortable="true">Tgl Penyerahan</th>
										<th data-field="id" data-sortable="true">Nama Penerima</th>
										<th data-field="id" data-sortable="true">Keterangan</th>
										<th data-field="id" data-sortable="true">Status</th>
										<th width="130px">Aksi</th>
									</tr>
								</thead>
									<tbody>
											<?php $no = 0; foreach($datastbarang as $row) : $no++;?>
											<tr style="font-size: 12px">
												<td data-field="no" width="10px"><?php echo $no;?></td>
												<td data-field="id" ><?php echo $row->id_st;?></td>
												<td data-field="id"><?php echo $row->id_barang;?></td>
												<td data-field="id"><?php echo $row->nama_barang;?></td>
												<!--<td data-field="id"></?php echo $row->jenis;?></td>-->
												<td data-field="id"><?php echo $row->ket;?></td>
												<td data-field="id"><?php echo $row->tgl_st;?></td>
												<td data-field="id"><?php echo $row->nama;?></td>
												<td data-field="id"><?php echo $row->keterangan;?></td>
												<td data-field="id">
													<?php if($row->status==1 || $row->status==0 ) {?>
															<span class="label bg-blue-active color-palette">proses</span>
													<?php }
														else if($row->status==2 || $row->status==4 ) {?>
															<span class="label bg-navy-active color-palette">telah diterima</span>
													<?php }
														else if($row->status==3) {?>
															<span class="label bg-navy-active color-palette">proses</span>
													<?php } else
													{			
														echo "";
													}
													?>		
												</td>											
											
												<td >
												<?php if($row->status==1) 
														{?>
													<a href="<?php echo base_url('stbarang/edit/');?><?php echo $row->id_st; ?>" class="btn  btn-success btn-xs fa fa-edit"> edit</a> 
													<a href="<?php echo base_url('stbarang/delstbarang/');?>/<?php echo $row->id_st;?>
														"class="btn  btn-warning btn-xs fa fa-trash-o"
														onClick="return confirm('Yakin Ingin Menghapus ID (<?php echo $row->id_st; ?>) ? ... ')"> Hapus
													</a>
												<?php } else if($row->status==2)
														{?>
														<a data-toggle="modal"  title="print bukti serah terima" class="print_kartu" href="<?php echo base_url();?>pdf/kartu2/<?php echo $row->id_st;?>"><span class="glyphicon glyphicon-print"></span></a>
													
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
				</div>
			</div>
				<?php echo $this->session->flashdata("msg");?>
		</section>
	</div>	
		<footer class="main-footer">
				<div class="pull-right hidden-xs">
					By Santoso
				</div>
				<strong>Copyright &copy; 2018 - <?php echo date('Y'); ?> <a target='_BLANK' href="#"> Service System</a>.</strong> All rights reserved.
		</footer>				
</div>	

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

<!-- =================================================================================================================== -->			
		
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

