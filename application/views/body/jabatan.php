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
				<li class="active"> Data Jabatan </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- ======================================================================================================= -->
<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<a href="<?=base_url('')?>jabatan/add" style="margin-bottom:10px;" type="button" class="btn btn-sm btn-primary" name="tambah_data"><i class="fa fa-plus-circle" aria-hidden="true">
							</i> Tambah Data Jabatan</a>
						</div>
<!-- Box body -->						
						<div class="box-body">
							<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th data-field="no" data-sortable="true" width="10px"> No</th>
										<th data-field="id" data-sortable="true">Jabatan</th>
										<th>Aksi</th>
									</tr>
								</thead>
									<tbody>
										<?php $no = 0; foreach($datajabatan as $row) : $no++;?>
										<tr>
											<td data-field="no" width="10px"><?php echo $no;?></td>
											<td data-field="id"><?php echo $row->nama_jabatan;?></td>											 												
											<td >
													<a href="<?php echo base_url('jabatan/edit/');?><?php echo $row->id_jabatan; ?>" class="btn  btn-success btn-xs fa fa-edit"> edit</a>
													<a href="<?php echo base_url('jabatan/deljabatan/');?>/<?php echo $row->id_jabatan;?>
														"class="btn  btn-warning btn-xs fa fa-trash-o"
														onClick="return confirm('Yakin Ingin Menghapus ID (<?php echo $row->id_jabatan; ?>) ? ... ')"> Hapus
													</a>
											</td>
										</tr>
										<?php endforeach;?>
									</tbody>									
							</table>
							</div>
						</div>
            <!-- /.box-body -->
					</div>
          <!-- /.box -->
				</div>
        <!-- /.col -->
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
