<style>
.card-group .card{
	padding-bottom: 0;
	margin-bottom: 0;
}
.card-group .card-body{
	padding-bottom: 0;
}
</style>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Transaksi</h3>
	</div>
	<div class="box-body">
		<table class="table table-border table-striped">
			<tr>
				<th>CodeTransactionNPL</th>
				<td><?php echo $detailTransaksi['CodeTransactionNPL']; ?></td>
			</tr>
			<tr>
				<th>DateTransactionNPL</th>
				<td><?php echo $detailTransaksi['DateTransactionNPL']; ?></td>
			</tr>
			<tr>
				<th>TransactionFrom</th>
				<td><?php echo $detailTransaksi['TransactionFrom']; ?></td>
			</tr>
			<tr>
				<th>Total</th>
				<td><?php echo $detailTransaksi['Total']; ?></td>
			</tr>
			<tr>
				<th>StsPaid</th>
				<td><?php echo $detailTransaksi['StsPaid']; ?></td>
			</tr>
			<tr>
				<th>StsCanceled</th>
				<td><?php echo $detailTransaksi['StsCanceled']; ?></td>
			</tr>
			<tr>
				<th>CreateDate</th>
				<td><?php echo $detailTransaksi['CreateDate']; ?></td>
			</tr>
			<tr>
				<th>ModifyDate</th>
				<td><?php echo $detailTransaksi['ModifyDate']; ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Item Pembelian</h3>
	</div>
	<div class="box-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Jadwal</th>
					<th>Item</th>
					<th>Tipe NPL</th>
					<th>QTY</th>
					<th style="text-align:right">Item Price</th>
					<th style="text-align:right">Sub-Total</th>
				</tr>
			</thead>
			<tbody id="thisTableCartItem">
				<?php foreach ($transaksiDetail as $row){ ?>
				<tr>
					<td><?php 
						echo $schedule[$row['ScheduleId']]['CompanyName'];
						echo '<br>';
						echo substr($schedule[$row['ScheduleId']]['date'],0,10).' '.$schedule[$row['ScheduleId']]['waktu'];
					?></td>
					<td><?php echo $schedule[$row['ScheduleId']]['ItemName']; ?></td>
					<td><?php echo $row['NPLType']; ?></td>
					<td><?php echo $row['QtyNPL']; ?></td>
					<td style="text-align:right"><?php echo number_format($row['AmountNPL'],2); ?></td>
					<td style="text-align:right"><?php echo number_format($row['AmountNPL'],2); ?></td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4"></td>
					<td class="text-right"><strong>Total</strong></td>
					<td class="text-right" id="thisTotal"><?php echo number_format($detailTransaksi['Total'],2);  ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">NPL Terbentuk</h3>
	</div>
	<div class="box-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>NPL Number</th>
					<th>Cabang</th>
					<th>Jadwal</th>
					<th>Item</th>
					<th>Tipe NPL</th>
					<th>Active</th>
					<th>IsUsed</th>
					<th>StartDateNPL</th>
					<th>EndDateNPL</th>
				</tr>
			</thead>
			<tbody id="thisTableCartItem">
				<?php foreach ($npl as $row){ ?>
				<tr>
					<td><?php echo $row['NPLNumber']; ?></td>
					<td><?php echo $schedule[$row['ScheduleId']]['CompanyName']; ?></td>
					<td><?php echo substr($schedule[$row['ScheduleId']]['date'],0,10).' '.$schedule[$row['ScheduleId']]['waktu']; ?></td>
					<td><?php echo $schedule[$row['ScheduleId']]['ItemName']; ?></td>
					<td><?php echo $row['NPLType']; ?></td>
					<td><?php echo $row['Active']; ?></td>
					<td><?php echo $row['IsUsed']; ?></td>
					<td><?php echo $row['StartDateNPL']; ?></td>
					<td><?php echo $row['EndDateNPL']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>


