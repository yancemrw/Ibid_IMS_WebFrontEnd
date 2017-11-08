<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Perbaharui Data Anda</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<!-- updateForNPL -->
	<form role="form" action="<?php echo site_url('biodata/otp'); ?>" method="POST">
		<input type="hidden" name="otpkirim" value="true">

		<div class="box-body">
			<div class="form-group">
				<input type="text" name="Phone" class="form-control" id="Phone" placeholder="Phone" value="<?php echo $detailBiodata['Name']; ?>">
			</div>
			<div class="form-group">
				<select class="form-control" name="BankId" id="BankId" placeholder="Bank">
					<option value="">Bank</option>
					<?php foreach($listBank  as $row){ ?>
					<option value="<?php echo $row['BankId']; ?>" <?php echo $detailBiodata['BankId'] == $row['BankId'] ? 'selected' : ''; ?>><?php echo $row['BankName']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="BankAccountNumber" id="BankAccountNumber" placeholder="Nomor Rekening" value="<?php echo $detailBiodata['BankAccountNumber']; ?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="BankAccountName" id="BankAccountName" placeholder="Atas Nama" value="<?php echo $detailBiodata['BankAccountName']; ?>">
			</div>
		</div>
		<div class="box-body no-margin" style="background: #eee; color: #009900;">
			<div class="box-comment">
				<div class="comment-text">
					<span class="username">
						Maria Gonzales
						<span class="text-muted pull-right">8:03 PM Today</span>
					</span><!-- /.username -->
					It is a long established fact that a reader will be distracted
					by the readable content of a page when looking at its layout.
				</div><!-- /.comment-text -->
			</div>
		</div>
		<div class="box-body">
			<div class="form-group">
				<input type="text" class="form-control" name="Name" id="Name" placeholder="Nama Lengkap" value="<?php echo $detailBiodata['Name']; ?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="IdentityNumber" id="IdentityNumber" placeholder="No KTP/SIM" value="<?php echo $detailBiodata['IdentityNumber']; ?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="NpwpNumber" id="NpwpNumber" placeholder="No NPWP" value="<?php echo $detailBiodata['NpwpNumber']; ?>">
			</div>
		</div><!-- /.box-body -->

		<div class="box-footer">
			<button type="submit" class="btn btn-primary pull-right">Submit</button>
		</div>
	</form>
</div>
