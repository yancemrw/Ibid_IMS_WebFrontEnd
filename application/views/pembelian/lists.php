<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('assets_homer'); ?>/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" />  
<script type="text/javascript" src="<?php echo base_url('assets_homer/datatables/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_homer/datatables/dataTables.bootstrap.js');?>"></script>

<link rel="stylesheet" type="text/css" href="<?=base_url('assetsadmin/vendor/jqueryui/jquery-ui.css')?>">
<script type="text/javascript" src="<?=base_url('assetsadmin/vendor/jqueryui/jquery-ui.js')?>"></script>
   
<!-- Main container -->
<main class="main-container">   
	<div class="main-content">   
		<div class="card">
			<h4 class="card-title"><strong><?php echo @$title; ?></strong></h4>

			<div class="card-body">

				<?php echo @$message; ?>
				<div class="col-md-8">
					<form role="form" id="thisFormSearch" action="#" method="POST" class="form-horizontal" data-provide="validation">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Nama Peserta</label>
							<div class="col-xs-12 col-sm-12 col-md-9">
							<input type="text" name="Name" class="form-control" id="getNamaCustomer" value="tfi">
							<input type="hidden" name="UserId" class="form-control" id="UserId">
							</div>
						</div>
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
							<label for="" class="col-sm-3 control-label">Jadwal Lelang </label>
							<div class="col-xs-12 col-sm-12 col-md-9">
							<input type="text" name="getScheduleId" class="form-control" id="getScheduleId">
							<input type="hidden" name="ScheduleId" class="form-control" id="ScheduleId">
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
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-xs-12 col-sm-12 col-md-9">
							<button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
							</div>
						</div>
					</form>
				</div>
				
				<?php echo @$add; ?>
				<table class="table table-striped table-bordered table-hover dataTable" id="tableadms" style="width: 100%" >
					<thead>
						<tr> 
							<th>No Transaksi</th> 
							<th>Nama Pembeli</th>
							<th>Jadwal Lelang</th> 
							<th>Tgl Beli</th>  
							<th>Tgl Bayar</th>
							<th>Status</th>
							<th>Act</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>

			</div>
			

		</div>
	</div>
</main>

<script type="text/javascript">
$(function () {
	nTable = $('#tableadms').dataTable({
		"bLengthChange": false,
		"bInfo": false,
		"sDom": 'T<"clear">lfrtip'
	/*
		order: [
		[0, "DESC"]
		],
		"processing": true,
		"serverSide": true,
		"ajax": {
			"data" : {
				'detail' : '<?php echo @urlencode($detail);?>',
				'update' : '<?php echo @urlencode($update);?>',
				'delete' : '<?php echo @urlencode($delete);?>', 
			},
			"url": "<?php echo linkservice('master') ?>item/lists",
			"type": "POST", 

			complete: function () {
				$('.ttipDatatables').tooltip();
			},

			dataFilter: function(data){
				var json = jQuery.parseJSON( data );
				json.recordsTotal = json.data.recordsTotal;
				json.recordsFiltered = json.data.recordsFiltered;
				json.data = json.data.data;
				return JSON.stringify( json ); // return JSON string
			}
		}, 

	*/
	});
	
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
		},
		change: function( event, ui ) {
			if(ui.item==null){
				this.value='';
				$('#UserId').val('');
			}
		}
	});
	
	$('#getScheduleId').autocomplete({
		source: function( request, response ) {
			$('#thisFormAutocomplete').css('display','none');
			$.ajax( {
				url: "<?php echo linkservice('master');?>schedule/getschedule",
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
				// return false;
			}
		}
	});
	
	$('#thisFormSearch').submit(function(){
		getNamaCustomer = $('#getNamaCustomer').val();
		ScheduleId = $('#ScheduleId').val();
		itemLelang = $('#itemLelang').val();
		$.ajax({
			method: 'POST',
			type: 'json',
			url: '<?php echo site_url('counter/pembelian/search'); ?>',
			data: {
				Name : getNamaCustomer,
				ScheduleId : ScheduleId,
				itemLelang: itemLelang,
			},
			beforeSend: function( ) {
			},
			success: function(data) {
				nTable.fnClearTable();
				console.log(data.length);
				console.log(data);
				for(i = 0; i < data.length; i++){
					nTable.fnAddData([
						data[i].CodeTransactionNPL,
						data[i].Name,
						data[i].ScheduleCity + '<br>' + data[i].ScheduleStartDate,
						data[i].DateTransactionNPL,
						'',
						data[i].status,
						data[i].btn
					]);
					
				}
			},
			error: function() {
				alert('Some Error. Please Try Again');
			},
			complete: function(){
			}
		});
		return false;
	});
});
</script>

