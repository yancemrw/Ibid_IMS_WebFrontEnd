<section class="choose-schedule-auction">
	<div class="container">
		<div class="row header-live-auction">
			<div class="col-md-6 col-sm-6">
				<h2>Live Auction</h2>
				<p>Pilih Jadwal Lelang Yang Ingin Anda Ikuti Maksimal 4</p>
			</div>
			<div class="col-md-6 col-sm-6">
				<select id="thisSelectItem" class="form-control select-custom">
					<?php foreach($data_unit as $ukey => $uvalue) {
						echo '<option value="'.$uvalue->ItemId.'">'.$uvalue->ItemName.'</option>';
					} ?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 clearfix">
				<form class="form-inline form-auction" method="POST" action="<?php echo site_url('detail-auction') ?>" id="auction-form">
					<?php foreach($data as $key => $value) { ?>
					<div class="form-group thisAllItem thisItemId<?php echo $value->item_id; ?>">
						<input type="checkbox" name="schedules[]" id="obj-<?php echo $key; ?>" class="input-hidden" value="<?php echo $value->id ?>" />
						<label for="obj-<?php echo $key; ?>" class="pull-left">
							<span class="kota"><?php echo $value->CompanyName; ?><span><?php echo $value->ItemName; ?></span></span>
							<p><?php echo $value->Address; ?>
								<span><?php echo date('d F Y H:i:s', strtotime($value->date.$value->waktu)); ?></span>
							</p>
						</label>
					</div>
					<?php } ?>
				</form>
			</div>
			<div class="col-md-12 text-center more-button">
				<button type="button" id="btn-next" class="btn btn-s btn-green" disabled>Selanjutnya</button>
			</div>
		</div>
	</div>
</section>

<script>
function preloadAuction(opacity) {
	if(opacity <= 0) {
		showContentAuction();
	}
	else {
		document.getElementById('preloaderAuction').style.opacity = opacity;
		window.setTimeout(function() { preloadAuction(opacity - 10) }, 6500);
	}
}

function showContentAuction() {
	document.getElementById('preloaderAuction').style.display = 'none';
	document.getElementById('content').style.visibility = 'visible';
}

document.addEventListener("DOMContentLoaded", function() {
	document.getElementById('preloaderAuction').style.display = 'block';
	preloadAuction(1);
});

$(document).ready(function() {
	$("nav").sticky({
		topSpacing: 0
	});

	$(".select-custom").select2({
		minimumResultsForSearch: -1
	});

	// handle button if auction not select
	$("input[type='checkbox']").click(function() {
		if($('input[name="schedules[]"]:checked').length > 0) {
			$('#btn-next').prop('disabled', false);
		}
		else {
			$('#btn-next').prop('disabled', true);
		}
	});

	$('#btn-next').click(function() {
		if($('input[name="schedules[]"]:checked').length < 5) {
			$('input[name="schedules[]"]:checked').each(function() {
				//location.href = '<?php echo site_url("detail-auction") ?>';
			});
			$("#auction-form").submit();
		}
		else {
			bootoast.toast({
				message: 'Diperbolehkan Memilih 5 Jadwal Lelang',
				type: 'warning',
				position: 'top-center',
				timeout: 4
			});
		}
	});
	
	$('#thisSelectItem').change(function(){
		$('.thisAllItem').css('display','none');
		thisVal = $(this).val();
		thisText = $(this).find('option:selected').text();
		$('.thisItemId'+thisVal).css('display','block');

		emptyAlert = '<div class="alert alert-info" role="alert" id="emptyAlert"><strong>Info! </strong>Jadwal '+thisText+' tidak tersedia.</div>';
		if ($('.thisItemId'+thisVal).length > 0) {
			$('#emptyAlert').remove();
		}else{
			$('#emptyAlert').remove();
			$('#auction-form').append(emptyAlert);
		}
	});
	$('#thisSelectItem').change();
});
</script>
