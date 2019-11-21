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
			<li class="active"> Form Request </li>
		</ol>
    </section>
	<div class="fc-scroller fc-time-grid-container">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
	  
      <div class="row">
        <div class="col-xs-12">
				<h5>
					<p align="left"><strong> &nbsp &nbsp LAMBANG JAYA KOMPUTER </strong><p>
				</h5>
			</div>	
        </div>
        <!-- /.col -->
      </div>
		<div class="col-xs-12">
			<h4 style=height:30px><p align="center"><strong>Nota Service Anda</strong></p></h4>
			<div class="table-responsive">		
				<table class="table table-bordered">
					<tr>
					
						<th style="width:20%">No.Nota Service</th>
						<td> <?php echo $id_service;?> </td>
					</tr>
					<tr>
						<th>Nama </th>
						<td> <?php echo $nama;?> </td>
					</tr>
					<tr>
						<th>Divisi</th>
						<td> <?php echo $nama_divisi;?> </td>
					</tr>
					<tr>
						<th>Jabatan</th>
						<td> <?php echo $nama_jabatan;?> </td>
					</tr>
				</table>
          </div>
        </div>
		<div class="col-xs-12">	
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th colspan="2"> Info Service </th>
					</tr>
					<tr>
						<th style="width:20%">Tanggal Service</th>
						<td> <?php echo date('d-m-Y H:i:s', strtotime($tanggal));?> </td>
					</tr>
					<tr>
						<th>Tanggal Solved</th>
						<td> <?php if($tanggal_solved == "0000-00-00 00:00:00") {  } else {?>
										<?php echo date('d-m-Y H:i:s', strtotime($tanggal_solved));?>
										<?php }?> </td>
					</tr>
				  
				</table>
          </div>		  
        </div>
		<div class="col-xs-12">	
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th style="width:20%">Jenis Service</th>
						<td> <?php echo $category;?> </td>
					</tr>
		<!--		<tr>
						<th>Request Summary</th>
						<td> <?php //echo $summary;?> </td>
					</tr> -->
					<tr >
						<th height=150px>Detail Problem</th>
						<td><?php echo $problem_detail;?></td>	
					</tr>
				</table>
			</div>
		</div>	
      <!-- info row -->
        <div class="col-xs-3">	
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th> Service By :</th>
					</tr>
					<tr>
						<td height=100px><?php echo $reported;?></td>
					</tr>
					<tr>
						<td>Date : <?php echo date('d-m-Y', strtotime($tanggal));?> </td>
					</tr>
				  
				</table>
			</div>
		</div>
		<div class="col-xs-3 pull-right">	
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th> Executed By :</th>
					</tr>
					<tr>
						<td height=100px><?php echo $nama_teknisi;?></td>
					</tr>
					<tr>
						<td>Date : <?php if($tanggal_solved == "0000-00-00 00:00:00") {  } else {?>
										<?php echo date('d-m-Y', strtotime($tanggal_solved));?>
										<?php }?></td>
					</tr>
				  
				</table>
			</div>
		</div>	
        
        <!-- /.col -->
      
      <!-- /.row -->

      <!-- this row will not appear when printing -->
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
  </div>
  
  