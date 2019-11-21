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
				<li class="active"> Add Barang </li>
			</ol>
		
		</section>
	<!-- try ------------------------------------------------------------------------------------------------------------------------>
<!-- Body -->
		<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-info">							
						<!-- try 2222 ======================================================================================================================= >
						<!-- Main content -->
							<section class="content">
								<div class="row">									
									<!-- /.box-body -->
										<form  id="myform" onSubmit="return validasi" method="post" action="<?php echo base_url();?><?php echo $url;?>">
											<input type="hidden" class="form-control" name="id_barang" value="<?php echo $id_barang;?>">
											<input type="hidden" class="form-control" name="status" value="<?php echo $status;?>">
											<input type="hidden" class="form-control" name="stok_in" value="<?php echo $stok_in;?>">
											<input type="hidden" class="form-control" name="waktu_input" value="<?php echo $waktu_input;?>">
												<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user;?>">	
												<div class="col-md-12">
													<div class="box box-warning">
														<div class="box-header with-border">
															<h3 class="box-title">Dibuat Oleh</h3>
														</div>
														<!-- /.box-header -->
														<div class="box-body">
																<!-- text input -->
																<div class="form-group col-md-3">
																	<label>Nik :</label>
																	<input class="form-control" name="nama" placeholder="Nama" value="<?php echo $id_user;?>" disabled="disabled" />
																</div>
																<div class="form-group col-md-3">
																	<label> Divisi :</label>
																	<td width="180"><input class="form-control" name="divisi" placeholder="Cabang" value="<?php echo $divisi;?>" disabled="disabled" /></td>
																</div>

																<!-- textarea -->
																<div class="form-group col-md-3">
																	<label>Nama :</label>
																	<input class="form-control" name="nama" placeholder="Nama" value="<?php echo $nama;?>" disabled="disabled" />
																</div>
														</div>	
													</div>
												</div>
												<!-- ===================================== Test ========================================== -->
												<div class="col-md-12">
												<!-- /.box-body -->																																				
													<div class="box box-warning">
														<div class="box-header with-border">
															<h3 class="box-title">Add Barang</h3>
														</div>
														<!--<input type="hidden" class="form-control" name="no_penjualan" value="<//?php echo $no_penjualan;?>"> -->
														<div class="box-body">
															<div class="form-group col-md-6">
																<label> Dari Tanggal :</label>
																		<div class="input-group date">
																		<div class="input-group-addon">
																			<i class="fa fa-calendar"></i>
																		</div> 
																		<input type="text" name="tgl_po" class="form-control tanggal" required="" placeholder="Date " value="<?php echo $tgl_po;?>" autocomplete="off"/>
																	</div> 
																<!-- /.input group -->
															</div>
															<div class="form-group col-md-6">															
																<label>Nama Barang :</label>																	
																<td width="180"><input class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $nama_barang;?>" autocomplete="off" required="required"></td>
															</div>
															<div class="form-group col-md-6">															
																<label>Merk :</label>																	
																<td width="180"><input class="form-control" name="merk" value="<?php echo $merk;?>" autocomplete="off" required="required"></td>
															</div>
															<div class="form-group col-md-6">															
																<label>Harga :</label>																	
																<td width="180"><input class="form-control" name="harga" value="<?php echo $harga;?>" autocomplete="off" required="required"></td>
															</div>
															<div class="form-group col-md-6">															
																<label>No PO :</label>																	
																<td width="180"><input class="form-control" name="no_po" value="<?php echo $no_po;?>" autocomplete="off" required="required"></td>
															</div>
															<div class="form-group col-sm-6">															
																<label>Jenis :</label>																	
																<select class="combobox form-control" name="jenis[]" placeholder="<?php echo $jenis;?>"
																	style="width: 100%;" required="required">
																	<option><?php echo $jenis;?></option>		
																	<option>Laptop</option><option>Komputer</option><option>Smartphone</option>
																	<option>Printer</option><option>Hardisk</option><option>SSD</option>
																	<option>Monitor</option><option>Scanner</option>	
																</select>
															</div>
															<div class="form-group col-md-12">
																<label> Keterangan :</label>
																<textarea class="form-control" name="keterangan" rows="2" placeholder="keterangan" required="required"><?php echo $keterangan;?> </textarea>
															</div>
															
															
														</div>	
													</div>								
												</div>
												<div class="box-body">
													&nbsp <button type="submit" class="btn bg-orange btn-flat margin">Simpan</button>
													<a href="<?php echo base_url();?>barang/barang_list"  class="btn btn-default btn-flat">Batal</a>		
												</div>
										</form>	
								</div>							 
							</section>
						</div>
					</div>	
				</div>		
			<!-- /.content -->				
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
function validateForm() {
    var x = document.forms["myForm"]["no_hp"].value;
    if (x == null || x == "") {
        alert("Nama Wajib Diisi !");
        return false;
    }
}
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
      		orientation: "left auto",
      		todayBtn: true,
     		todayHighlight: true,

		});
	}
});
</script>
