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
				<li class="active"> Report History </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-4">
					<form method="get" target="_blank" action="<?php echo base_url();?>mjs/wd_history_view/view_history/<?php echo $id_history;?>" enctype="multipart/form-data">
						<div class="box box-widget widget-user">
							<div class="widget-user-header bg-aqua-active">
								<h3 class="widget-user-username">PT. XYZ</h3>
								<h5 class="widget-user-desc">Batang</h5>
							</div>
							<div class="widget-user-image">
								<img class="img-circle" src="<?php echo base_url();?>uploads/a.jpg" alt="User Avatar">
							</div>
							<div class="box-footer">
								<div class="row">
									<center>							
										<div class="description-block">
											<h5 class="description-header">Report History Transaksi</h5>
										</div>							
									</center>
									<br>
									<div class="box-body col-sm-6">
										<label> Dari Tanggal :</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div> 
											<input type="text" name="tanggal_awal" class="form-control tanggal" required="required" autocomplete="off" placeholder="Date " value="<?=set_value('tanggal');?>"/>
										</div>
									</div>
									<div class="box-body col-sm-6">
									<label> Sampai Tanggal :</label>
										<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" name="tanggal_akhir" class="form-control tanggal" required="required" autocomplete="off" placeholder="Date " value="<?=set_value('tanggal');?>"/>
										</div> 
									<!-- /.input group -->
									</div>
									<div class="box-body col-sm-12">															
										<label>No Transaksi :</label>																	
										<td><input class="form-control" autocomplete="off" name="id_pj" value="<?=set_value('id_pj');?>"></td>
									</div>
								</div>
								<div class="box-body" >
									<button type="submit" class="btn bg-orange btn-flat margin pull-right">Simpan</button>
								</div>								
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php echo $this->session->flashdata("msg");?>
		</section>
	</div>
		<footer class="main-footer">
				<div class="pull-right hidden-xs">
					by Santoso
				</div>
				<strong>Copyright &copy; 2018 - <?php echo date('Y'); ?> <a target='_BLANK' href="#"> PT XYZ</a>.</strong> All rights reserved.
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