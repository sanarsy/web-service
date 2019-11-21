<div class="wrapper">	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			Dashboard
<!--			<small>Version 2.0</small>
-->		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i> Dashboard </a></li>
			<li class="active"> Service Info </li>
		</ol>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
			<div >	
				<h5>
					<i class="fa fa-globe"></i><strong> PT XYZ </strong>
				</h5>
			</div>	
        </div>
        <!-- /.col -->
      </div>
		<div class="col-xs-12">
			<h4 style=height:30px><p align="center"><strong>Service Info</strong></p></h4>
			<div class="table-responsive">		
				<table class="table table-bordered" >
					<thead>
						<tr>
							<th style="width:10px">No.</th>
							<th>No. Service</th>
							<th align="center">Nama</th>
							<th>Divisi</th>
							<th>Status</th>
							<th>Tanggal</th>
							<th>Jenis Service</th>			
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($datalist_service as $row) : $no++;?>
							<tr style="font-size: 12px" >
								<td data-field="no" width="10px"><?php echo $no;?></td>
								<td data-field="id">
									<?php if($row->status==2)
									{?>
									<?php echo $row->id_service;?>
									<?php } else {?>
									<?php echo $row->id_service;?>
									<?php }?>
													
								</td>		
								<td data-field="iddsd" ><?php echo $row->nama;?></td>
								<td data-field="iddsd"><?php echo $row->nama_divisi;?></td>								
								<td data-field="id">
										<?php 
											if($row->status==2) { echo "APPROVAL INTERNAL";}
											else if($row->status==3) { echo "MENUNGGU APPROVAL TEKNISI";}
											else if($row->status==4) { echo "Dalam Proses Service";}
											else if($row->status==5) { echo "PENDING TEKNISI";}
											else if($row->status==6) { echo "Service Bisa Diambil";}
											else if($row->status==7) { echo "Barang Sudah Diambil";}
										?>
								</td>
								<td data-field="id"><?php echo $row->tgl_service;?></td>
								<td data-field="id"><?php echo $row->category;?></td>
							</tr>
								<?php endforeach;?>
					</tbody>
				</table>
			</div>
        </div>
      <div class="row no-print">
        <div class="col-xs-12">
         <!-- <a <?php //echo base_url();?>href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  </div>