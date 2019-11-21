<!-- ======================================================== -->			
<script language="javascript" type="text/javascript">
    
	$(document).ready(function() {

		$("#id_teknisi").change(function(){
	 		// Put an animated GIF image insight of content	 		
		
			var data = {id_teknisi:$("#id_teknisi").val()};
			$.ajax({
					type: "POST",
					url : "<?php echo base_url().'select/select_view_job'?>",				
					data: data,
					success: function(msg){
						$('#div-order').html(msg);
					}
			});
		});   

	});

</script>


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
				<li class="active"> Detail Progress Request </li>
			</ol>		
		</section>
<!-- tampilan tabel data list my tiket -- =======================================================================================================>
<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-6">
					<div class="box">
						<div class="box-header with-border">
							<span class="box-title"></span>Request No : <?php echo $id_service;?>
						</div>
									<!-- /.box-header -->
						<div class="box-body">
							<table class="table table-bordered">
								<tr>
									<td> Tanggal </td>
									<td><?php echo $tanggal;?></td>	
								</tr>							
								<tr>
									<td> Category </td>
									<td><?php echo $category;?></td>	
								</tr>
								
								<tr>
									<td> Direquest oleh </td>
									<td><?php echo $reported;?></td>									
								</tr>	
							</table>
						</div>	
					</div>
				</div>
				<div class="col-md-6">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"></h3> Pilih Teknisi
						</div>
									<!-- /.box-header -->
						<div class="box-body">
							<form method="post" action="<?php echo base_url();?><?php echo $url;?>">
								<input type="hidden" class="form-control" name="id_service" value="<?php echo $id_service;?>">						
										<!-- /.form group -->
										<div class="box-body">														
											<label> Nama Teknisi :</label>
											<?php echo form_dropdown('id_teknisi',$dd_teknisi, $id_teknisi, 'id="id_teknisi" class="form-control"');?>
										</div>
										<div class="box-body">	
											<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="Simpan"><i class="fa fa-save" ></i> Simpan</button>
											<a href="<?php echo base_url();?>list_service/service_list" class="btn btn-flat btn-default btn_action" id="btn_cancel" title="Batal"><i class="fa fa-undo" ></i> Batal </a>
										</div>										
							</form>	
						</div>	
					</div>
				</div>
				<div id="div-order">
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


