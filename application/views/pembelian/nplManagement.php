
<div class="box">
	<div class="box-body">
		<?php echo @$message; ?>
		<table class="table table-striped table-bordered table-hover dataTable" id="tableadms" style="width: 100%" >
			<thead>
				<tr> 
					<th>No NPL</th>
					<th>Item</th>
					<th>Cabang Lelang</th>
					<th>Tanggal Lelang</th>
					<th>Lokasi Lelang</th>
					<th>NPLType</th>
					<th>Status</th>
					<th>StartDateNPL</th>
					<th>EndDateNPL</th>
					<th>Tanggal Pembelian</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($AllNPL as $row){ ?>
				<tr>
					<td><?php echo $row['NPLNumber']; ?></td>
					<td><?php echo $row['Item']; ?></td>
					<td><?php echo $row['Cabang']; ?></td>
					<td><?php echo $row['AuctionStartDate']; ?></td>
					<td><?php echo $row['ScheduleCity']; ?></td>
					<td><?php echo $row['NPLType']; ?></td>
					<td><?php echo $row['Active']; ?></td>
					<td><?php echo $row['StartDateNPL']; ?></td>
					<td><?php echo $row['EndDateNPL']; ?></td>
					<td><?php echo $row['CreateDate']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
$(function () {
	// nTable = $('#tableadms').DataTable({
		// "bLengthChange": false,
		// "bInfo": false,
		// "sDom": 'T<"clear">lfrtip'
	// });
});
</script>

