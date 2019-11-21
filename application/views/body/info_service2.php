
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
				<li class="active"> Service Info </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
<!-- ============================================================================================================================================ -->			
			<div class="col-md-6">
				<form method="get" target="_blank" action="<?php echo base_url();?>info_service_view2/view_service2/<?php echo $id_service;?>" enctype="multipart/form-data">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Service Informasi</h3>
					</div>
					<div class="box-body table-responsive">
					<!--	<div class="fc-scroller fc-time-grid-container" style="overflow-x: scroll">-->
					  <!-- Date -->
						<div class="box-body">														
							<label> Nama Barang :</label>
							<input class="form-control" name="id_service" value="<?php echo $id_service;?>" placeholder="Silahkan Masukan No Nota Service Anda ....." required>
						</div>		
						
					<!--<a href="<//?php echo base_url();?>lap_request_view/view_laporan/<//?php // echo $id_service;?>" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Cetak</a> -->
					<div class="box-body">
						<input type="submit" name="" class="btn bg-primary btn-flat pull-left" value="Cek Status Service">
					</div>
					</div>
            <!-- /.box-body -->
					</div>
				</div>
				</form>   
			</div>			
			
			
<!-- ============================================================================================================================================ -->			
	
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


<!-- ============================================ js script ==========================================================================  -->
		
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

<script type="text/javascript">
$(document).ready(function () {
	if($(".tanggal").length)
	{
		$(".tanggal").datepicker({
			format: "dd-mm-yyyy",
			showAnim:"slide",
			autoclose: true,
            todayHighlight: true,
      		orientation: "bottom auto",
      		todayBtn: true,
     		todayHighlight: true,

		});
	}
});
</script>