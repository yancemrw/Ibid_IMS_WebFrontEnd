<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">OTP</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	
	<form role="form" action="<?php echo site_url('biodata/otpconfirm'); ?>" method="POST">
		<div class="box-body">
			<div class="form-group">
				<div class=" col-sm-1">
					<input type="text" name="otp[]" class="form-control" id="Phone" placeholder="0" value="" required="">
				</div>
				<div class=" col-sm-1">
					<input type="text" name="otp[]" class="form-control" id="Phone" placeholder="0" value="" required="">
				</div>
				<div class=" col-sm-1">
					<input type="text" name="otp[]" class="form-control" id="Phone" placeholder="0" value="" required="">
				</div>
				<div class=" col-sm-1">
					<input type="text" name="otp[]" class="form-control" id="Phone" placeholder="0" value="" required="">
					<input type="hidden" name="Phone" value="<?php echo @$_SESSION['BiodataPembelianNPL']['Phone']; ?>">
				</div>
			</div>

		</div> 

		<div class="box-footer">
			<button type="submit" class="btn btn-primary pull-right">Submit</button>
		</div>
	</form>
</div>
