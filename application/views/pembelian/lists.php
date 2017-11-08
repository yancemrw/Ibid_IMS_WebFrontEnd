
<div class="box">
	<div class="box-body">
		<table class="table table-striped table-bordered table-hover dataTable" id="tableadms" style="width: 100%" >
			<thead>
				<tr> 
					<th>Kode Transaksi</th> 
					<th>Tanggal Transaksi</th>
					<th>Transaction by</th>
					<th>Total</th>  
					<th>Status</th>
					<th>Act</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($listTransaksi as $row){ ?>
				<tr>
					<td><?php echo $row['CodeTransactionNPL']; ?></td>
					<td><?php echo $row['DateTransactionNPL']; ?></td>
					<td><?php echo $row['TransactionFrom']; ?></td>
					<td><?php echo $row['Total']; ?></td>
					<td></td>
					<td><a href="<?php echo site_url('pembelianFE/detail/'.$row['TransactionId']); ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<!-- Main container -->

<script type="text/javascript">
$(function () {
});
</script>

