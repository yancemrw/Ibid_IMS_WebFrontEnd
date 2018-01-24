<link rel="stylesheet" type="text/css" href="<?=base_url('assetsadmin/vendor/jqueryui/jquery-ui.css')?>">
<script type="text/javascript" src="<?=base_url('assetsadmin/vendor/jqueryui/jquery-ui.js')?>"></script>

<form role="form" id="thisFormAll" action="<?php echo site_url('checkout'); ?>" method="POST" class="form-horizontal" data-provide="validation">
	<div class="box">
		<div class="box-body">
		
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">Item Lelang</label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<select name="itemLelang" class="form-control" id="itemLelang">
					<?php foreach($itemType as $row){ ?>
					<option value="<?php echo $row['ItemId']; ?>"><?php echo $row['ItemName']; ?></option>
					<?php } ?>
				</select>
				<input type="hidden" name="ItemName" class="form-control" id="ItemName">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">Cabang IBID</label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<select class="form-control getIdJadwal" id="CompanyId">
					<option value="">-Pilih-</option>
					<?php foreach($cabang as $row){ ?>
					<option value="<?php echo $row['CompanyId']; ?>"><?php echo $row['CompanyName']; ?></option>
					<?php } ?>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">Tipe Lelang </label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<select class="form-control getIdJadwal" id="tipeLelang">
					<option value="">-Pilih-</option>
					<option value="1">Online</option>
					<option value="0">Live</option>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">Tanggal Lelang </label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<select class="form-control" id="idJadwal">
					<option value="">-Pilih-</option>
				</select>
				</div>
			</div>
			<input type="hidden" name="getScheduleId" class="form-control" id="getScheduleId">
			
			<!-- div class="form-group">
				<label for="" class="col-sm-3 control-label">Jadwal Lelang </label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<input type="text" name="getScheduleId" class="form-control" id="getScheduleId">
				<input type="hidden" name="harga" class="form-control" id="harga">
				<input type="hidden" name="npl[ScheduleId]" class="form-control" id="ScheduleId">
				<input type="hidden" name="CompanyId" class="form-control" id="CompanyId">
				<input type="hidden" name="ObjectId" class="form-control" id="ObjectId">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">Tanggal </label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<input type="text" class="form-control" id="Tanggal" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">Cabang </label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<input type="text" class="form-control" id="Cabang" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">Lokasi </label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<input type="text" class="form-control" id="Lokasi" readonly>
				</div>
			</div -->
			<div class="form-group" id="formGroupQty">
				<label for="" class="col-sm-3 control-label require">Qty</label>
				<div class="col-xs-12 col-sm-12 col-md-9">
				<div class="input-group">
					<input type="text" class="form-control" name="Qty" id="Qty" placeholder="Qty">
					<span class="input-group-btn">
					<button class="btn btn-light" type="button" id="addToCart">Add To Cart</button>
					</span>
				</div>
				</div>
			</div>
			
		</div>
		
	</div>
</form>

<div class="box">
	<div class="box-body">
		<!-- Form item pembelian -->
		<form action="<?php echo site_url('ThisCart/update'); ?>" method="post" class="thisForm">
			
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th width="25px">#</th>
					<th>Jadwal</th>
					<th>Item</th>
					<th>Tipe NPL</th>
					<th>QTY</th>
					<th style="text-align:right">Item Price</th>
					<th style="text-align:right">Sub-Total</th>
				</tr>
				</thead>
				<tbody id="thisTableCartItem">
				<?php foreach ($this->cart->contents() as $items){ ?>
				<tr>
					<td><a href="#" thisrowid="<?php echo $items['rowid']; ?>" class="btn btn-xs btn-danger" onclick="thisremove('<?php echo $items['rowid']; ?>')" ><i class="fa fa-close"></i></a></td>
					<td><?php echo $items['name']; ?></td>
					<td><?php echo $items['options']['Item']; ?></td>
					<td><?php echo $items['options']['Tipe NPL']; ?></td>
					<td>
						<input type="hidden" name="thisId[]" value="<?php echo $items['rowid']; ?>">
						<input type="text" name="thisQty[<?php echo $items['rowid']; ?>]" value="<?php echo $items['qty']; ?>" size="5" maxlength="3">
						<button type="submit" class="btn btn-xs btn-info"><i class="fa fa-refresh"></i></button>
					</td>
					<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
					<td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
				</tr>
				<?php } ?>
				</tbody>
				<tfoot>
				<tr>
					<td colspan="5"></td>
					<td class="text-right"><strong>Total</strong></td>
					<td class="text-right" id="thisTotal"><?php echo $this->cart->format_number($this->cart->total()); ?></td>
				</tr>
				</tfoot>
			</table>
			
		</form>
		
	</div>
	<div class="box-footer text-right">
		<button class="btn btn-secondary">Cancel</button>
		<button class="btn btn-primary" id="thisCheckout">Checkout</button>
	</div>
</div>
<script type="text/javascript">
$(function(){
	
	$('#getNama').autocomplete({
		source: function( request, response ) {
			$('#thisFormAutocomplete').css('display','none');
			$.ajax( {
				url: "<?php echo linkservice('account');?>users/GetCustomerName",
				dataType: "json",
				data: {
					term: request.term
				},
				success: function( data ) {
					response( data );
				},
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			$('#UserId').val(ui.item.allDetail.UserId);
			$('#IdentityNumber').val(ui.item.allDetail.IdentityNumber);
			$('#Email').val(ui.item.allDetail.Email);
			$('#Phone').val(ui.item.allDetail.Phone);
			$('#Address').val(ui.item.allDetail.Address);
			$('#City').val(ui.item.allDetail.City);
			console.log(ui.item);
		},
		change: function( event, ui ) {
			if(ui.item==null){
				this.value='';
				$('#UserId').val('');
				$('#IdentityNumber').val('');
				$('#Email').val('');
				$('#Phone').val('');
				$('#Address').val('');
				$('#City').val('');
				// return false;
			}
		}
	});
	
	/* $('#getScheduleId').autocomplete({
		source: function( request, response ) {
			$('#thisFormAutocomplete').css('display','none');
			$.ajax( {
				url: "<?php echo linkservice('master');?>schedule/getschedule",
				// url : "http://ibid-ams-schedule.stagingapps.net/api/scheduleList",
				dataType: "json",
				data: {
					term: request.term,
					itemLelang: $('#itemLelang').val(),
				},
				success: function( data ) {
					response( data );
				},
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			$('#ScheduleId').val(ui.item.allDetail.ScheduleId);
			$('#harga').val(ui.item.allDetail.NPL);
			$('#Tanggal').val(ui.item.allDetail.Tanggal);
			$('#Cabang').val(ui.item.allDetail.CompanyName);
			$('#Lokasi').val(ui.item.allDetail.Address);
			$('#ItemName').val(ui.item.allDetail.ItemName);
			$('#CompanyId').val(ui.item.allDetail.CompanyId);
			$('#ObjectId').val(ui.item.allDetail.ObjectId);
			console.log(ui.item);
		},
		change: function( event, ui ) {
			if(ui.item==null){
				this.value='';
				$('#getScheduleId').val('');
				$('#ScheduleId').val('');
				$('#harga').val('');
				$('#Tanggal').val('');
				$('#Cabang').val('');
				$('#Lokasi').val('');
			}
		}
<<<<<<< Updated upstream
	}); */
=======
				// return false;
	});
>>>>>>> Stashed changes
	
	$('#addToCart').click(function(){
		itemLelang = $('#itemLelang').val();
		tipeLelang = $("select#tipeLelang option:selected").text();
		tipeLelangId = $('#tipeLelang').val();
		ScheduleId = $('#idJadwal').val();
		Qty = $('#Qty').val();
		harga = $('#harga').val();
		getScheduleId = $('#getScheduleId').val();
		ItemName = $("select#itemLelang option:selected").text();
		CompanyId = $('#CompanyId').val();
		ObjectId = $('#itemLelang').val();
		
		if(Qty == 0){
			$('#formGroupQty').addClass('has-error');
			$('#Qty').focus();
		}
		
		$.ajax( {
			url: "<?php echo site_url('ThisCart/add');?>",
			dataType: "json",
			type: "POST", 
			data: {
				itemLelang: itemLelang,
				tipeLelang: tipeLelang,
				tipeLelangId: tipeLelangId,
				ScheduleId: ScheduleId,
				Qty: Qty,
				
				harga: harga,
				getScheduleId: getScheduleId,
				ItemName: ItemName,
				CompanyId: CompanyId,
				ObjectId: ObjectId,
			},
			success: function( data ) {
				console.log(data);
				$('#thisTableCartItem').html(data.allItem);
				$('#thisTotal').html(data.totalHarga);
				
				$('#Qty').val('');
				
				// $('#getScheduleId').val('');
				// $('#ScheduleId').val('');
				// $('#harga').val('');
				// $('#Tanggal').val('');
				// $('#Cabang').val('');
				// $('#Lokasi').val('');
				// $('#formGroupQty').removeClass('has-error');
			},
		});
	});
	
	$('.btnRemoveItem').click(function(){
		thisRowId = $(this).attr('thisrowid');
		// alert(thisRowId);
		$.ajax( {
			url: "<?php echo site_url('counter/pembelian/ThisCart/remove'); ?>",
			dataType: "json",
			type: "POST", 
			data: {
				thisRowId: thisRowId,
			},
			success: function( data ) {
				$('#thisTableCartItem').html(data.allItem);
				$('#thisTotal').html(data.totalHarga);
			},
		});
		return false;
	});
	
	$('#thisCheckout').click(function(){
		$('#thisFormAll').submit();
	});
	
	$('.getIdJadwal').change(function(){
		itemLelang = $('#itemLelang').val();
		tipeLelang = $('#tipeLelang').val();
		cabangId = $('#CompanyId').val();
		// startdate = '<?php echo date('Y-m-d'); ?>';
		startdate = '2018-01-01';
		if (itemLelang != '' && tipeLelang != '' && cabangId != '')
		$.ajax( {
			url: "http://ibid-ams-schedule.stagingapps.net/api/schedulelist",
			dataType: "json",
			data: {
				type: tipeLelang,
				item: itemLelang,
				company_id: cabangId,
				startdate: startdate,
			},
			beforeSend: function( ) {
				// $('.biodataLoading').css('display','block');
			},
			success: function( data ) {
				$('#idJadwal option').remove();
				$('#idJadwal')
					.append($("<option></option>")
					.attr("value",'')
					.text("-Pilih-"));
				
				thisArr = data.data;
				for(i=0; i<thisArr.length; i++){
					row = thisArr[i];
					$('#idJadwal')
						.append($("<option></option>")
						.attr("value",row.id)
						.text(row.date + ' '+row.waktu.substring(0, 8)));
						
					console.log(thisArr[i]);
					
				}
			},
			complete: function(){
				// $('.biodataLoading').css('display','none');
			}
		});
	});
	
	$('#idJadwal').change(function(){
		jadwal = $("select#idJadwal option:selected").text();
		cabang = $("select#CompanyId option:selected").text();
		$('#getScheduleId').val(cabang + ' ' + jadwal);
	});
});
function thisremove(thisRowId){
	// thisRowId = $(this).attr('thisrowid');
	// alert(thisRowId);
	$.ajax( {
		url: "<?php echo site_url('ThisCart/remove'); ?>",
		dataType: "json",
		type: "POST", 
		data: {
			thisRowId: thisRowId,
		},
		success: function( data ) {
			$('#thisTableCartItem').html(data.allItem);
			$('#thisTotal').html(data.totalHarga);
		},
	});
	return false;
}
</script>


