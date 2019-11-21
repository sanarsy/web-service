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
			<li class="active"> Laporan History </li>
		</ol>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
			<div class="pull-right" style=height:50px>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr><td style="width:110%"><small>No. Dokumen : F.PS.6.3.1.5.0.4</small></td></tr>
					</table>
				</div>
			</div>
			<div >	
				<h5>
					<i class="fa fa-globe"></i><strong> PT. XYZ </strong>
				</h5>
			</div>	
        </div>
        <!-- /.col -->
      </div>
		<div class="col-xs-12">
			<h4 style=height:30px><p align="center"><strong>LAPORAN HISTORY INPUT</strong></p></h4>
			<div class="table-responsive">		
				<table class="table table-bordered" >
					<thead>
						<tr>
							<th style="width:10px">No.</th>
							<th>Tanggal Modifikasi</th>
							<th align="center">No Transaksi</th>
							<th align="center">Deskripsi</th>
							<th>User</th>
							<th>Status</th>									
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($datalist_history as $row) : $no++;?>
							<tr style="font-size: 12px" >
								<td data-field="no" width="10px"><?php echo $no;?></td>
								<td data-field="id"><?php echo $row->tanggal;?></td>
								<td data-field="id"><?php echo $row->id_history;?></td>
								<td data-field="id"><?php echo $row->deskripsi;?></td>
								<td data-field="id"><?php echo $row->nama;?></td>
								<td data-field="id"><?php echo $row->status;?></td>
							</tr>
								<?php endforeach;?>
					</tbody>
				</table>
			</div>
        </div>
      <div class="row no-print">
        <div class="col-xs-12">
         <!-- <a </?php //echo base_url();?>href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  </div>