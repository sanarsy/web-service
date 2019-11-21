<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Penanganan Request</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive ">
			<table class="table table-hover">
				<tr>
					<th>No </th>
					<th>Category</th>
					<th>Sub Category</th>
					<th>Direquest Oleh</th>
					<th>Progress %</th>
				</tr>
					<?php $no = 0; foreach($dataassigment->result() as $row) { $no++;?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $row->category;?></td>
					<td><?php echo $row->nama;?></td>
					<td><?php echo $row->progress;?></td>
				</tr>
					<?php }?>
			</table>
		</div>
	</div>
</div>


