
<form role="form" id="thisFormAll" action="<?php echo site_url('checkout'); ?>" class="row" method="POST">
	<input type="hidden" name="toDone" value="1">
	<div class="col-md-7">
		<h2 class="page-header">Cara Pembayaran</h2>
		<div class="box">
			<div class="box-body">
				<div class="form-group">
				<?php foreach($carabayar as $row){ ?>
					<div class="radio">
					<label>
						<input type="radio" name="PaymentTypeId" value="<?php echo $row['PaymentTypeId']; ?>">
						<?php echo $row['Name']; ?>
					</label>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<h2 class="page-header">Ringkasan Belanja</h2>
		<div class="box">
			<div class="box-body">
				<table class="table">
					<tbody>
					<tr>
						<th>Total Harga Barang</th>
						<td class="text-right"><?php echo number_format($this->cart->total() ,2); ?></td>
					</tr>
					<tr>
						<th>Biaya Layanan</th>
						<td class="text-right"><?php echo number_format(100000 ,2); ?></td>
					</tr>
					</tbody>
					<tfoot style="border-top: 1px solid #eee;">
					<tr>
						<th>Total Balanja</th>
						<th class="text-right"><?php echo number_format($this->cart->total() + 100000 ,2); ?></th>
					</tr>
					</tfoot>
				</table>
			</div>
			<div class="box-footer text-right">
				<a href="<?php echo site_url('pembelian'); ?>" class="btn btn-default">Back</a>
				<button class="btn btn-primary" type="submit">Finish</button>
			</div>
		</div>
		
	</div>
</form>
