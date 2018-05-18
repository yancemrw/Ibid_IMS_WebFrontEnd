<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/datatables/datatables.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assetsfront/datatables/datatables.js'); ?>"></script>
<section>
    <div class="container-fluid">
        <div class="row position-repative">
            <div class="col-md-3 col-sm-3 sidemenu-left acc-menu">
                <div class="menu-account">
                    <div class="avatar-account">
                        <div class="photo-account">
                            <img src="<?php echo $img_link; ?>" alt="">
                        </div>
                        <h3><?php echo @$userdata['namefront']; ?></h3>
                    </div>
                    <ul>
                        <li class="acc_notif">
                        	<a href="<?php echo site_url('notification'); ?>" onclick="setActiveMenu('notification')">
                            <span class="ic_menu"><i ></i></span> Notifikasi<!--span>10</span--></a>
                        </li>
                        <li class="acc_transaction active">
                        	<a href="<?php echo site_url('transaction'); ?>" onclick="setActiveMenu('transaction')">
                        	<span class="ic_menu"><i ></i></span> Transaksi</a>
                        </li>
                        <li class="acc_npl">
                        	<a href="<?php echo site_url('npl_dashboard'); ?>" onclick="setActiveMenu('npl_dashboard')">
                        	<span class="ic_menu"><i ></i></span> Manajemen NPL</a>
                        </li>
                        <li class="acc_setting">
                        	<a href="<?php echo site_url('dashboard'); ?>" onclick="setActiveMenu('dashboard')">
                        	<span class="ic_menu"><i ></i></span> Pengaturan</a>
                        </li>
                        <li class="acc_favorite">
                        	<a href="<?php echo site_url('favorite'); ?>" onclick="setActiveMenu('favorite')">
                        	<span class="ic_menu"><i ></i></span> Favorit</a>
                        </li>
                        <li class="acc_price">
                        	<a href="<?php echo site_url('basic-price'); ?>" onclick="setActiveMenu('basic-price')">
                        	<span class="ic_menu"><i ></i></span> Harga Dasar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 am-right">
                <div class="main-management">
                    <h2>Transaksi</h2>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">Transaksi Penjualan</a></li>
                        <li role="presentation"><a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Transaksi Pembelian</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab-1">
                            <div class="filter-table">
                                <form class="form-inline" id="transaksiPenjualan">
                                    <div class="form-group">
                                        <input type="text" name="filterJual" class="form-control input-custom" placeholder="Search"><i class="fa fa-search"></i>
                                    </div>
                                    <div class="filter-right">
                                        <div class="form-group">
                                            <select class="form-control select-custom">
                                                <option value="">Filter Cabang</option>
                                                <?php
                                                    foreach ($cabang as $keyCabang => $valueCabang) {
                                                        echo '<option value="'.$valueCabang->CompanyId.'">'.$valueCabang->CompanyName.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select-custom">
                                                <option>Jenis lelang</option>
                                                <option>Live</option>
                                                <option>Online</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Show</label>
                                            <select class="form-control select-custom" name="changeJual" id="changeJual">
                                                <option>10</option>
                                                <option>15</option>
                                                <option>20</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive table-container table-transaction">
                                <table id="table-jual" class="table table-striped table-custom table-custom-transaction table-responsive-am">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pol/Serial Number</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis</th>
                                            <th>Harga</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-2">
							<div class="filter-table">
                                <form class="form-inline" id="transaksiPembelian">
                                    <div class="form-group">
                                        <input type="text" name="filterBeli" class="form-control input-custom" placeholder="Search"><i class="fa fa-search"></i>
                                    </div>
                                    <div class="filter-right">
                                        <div class="form-group">
                                            <select class="form-control select-custom">
                                                <option value="">Filter Cabang</option>
                                                <?php
                                                    foreach ($cabang as $keyCabang => $valueCabang) {
                                                        echo '<option value="'.$$valueCabang->CompanyId.'">'.$valueCabang->CompanyName.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select-custom">
                                                <option>Jenis lelang</option>
                                                <option>Live</option>
                                                <option>Online</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Show</label>
                                            <select class="form-control select-custom" name="changeBeli" id="changeBeli">
                                                <option>10</option>
                                                <option>15</option>
                                                <option>20</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive table-container table-transaction">
                                <table id="table-beli" class="table table-striped table-custom table-custom-transaction table-responsive-am">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NPL</th>
                                            <th>No Pol/Serial Number</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis</th>
                                            <th>Harga</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // source https://stackoverflow.com/a/23645737
    var tableJual = $('#table-jual').DataTable({
        "dom": 'rt<"bottom"ip><"clear">',
        "bLengthChange": false,
        "bFilter": true,
        "fnServerParams": function ( aoData ) {
            aoData.push( {"name":"changeJual", "value":$('#changeJual').val()} );
        },
        "language": {
            'emptyTable': '<b class="text-shadows">Tidak Ada Penjualan / Titip Lelang</b>'
        }
    });
    var tableBeli = $('#table-beli').DataTable({
        "dom": 'rt<"bottom"ip><"clear">',
        "bLengthChange": false,
        "bFilter": true,
        "fnServerParams": function ( aoData ) {
            aoData.push( {"name":"changeBeli", "value":$('#changeBeli').val()} );
        },
        "language": {
            'emptyTable': '<b class="text-shadows">Tidak Ada Pembelian</b>'
        }
    });
    $('input[name="filterJual"]').keypress(function(e) {
        if(e.which == 13) {
            e.preventDefault();
            tableJual.search(this.value).draw();
        }
    });
    $('input[name="filterBeli"]').keypress(function(e) {
        if(e.which == 13) {
            e.preventDefault();
            tableBeli.search(this.value).draw();
        }
    });
    $.ajax({
        type: 'GET',
        url: "<?php echo linkservice('stock').'winner/get'; ?>",
        data: {
			pemilik: '<?php echo $userdata['UserId'] ?>'
		},
        beforeSend: function() {
            $('#table-jual tbody').html('<tr><td colspan="7"><b class="text-shadows">Memuat Data...</b></td></tr>');
        },
        success: function(data) {
			var data = data.data, rows;
            for(var i = 0; i < data.length; i++) {
				
				keteranganStatus = 'Belum Dilunasi';
				imgStep_1 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_1_grey.png'); ?>';
				imgStep_2 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_2_grey.png'); ?>';
				imgStep_3 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_3_grey.png'); ?>';
				imgStep_4 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_4_grey.png'); ?>';
				if (data[i].IsPaid == 1){
					imgStep_1 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_1.png'); ?>';
					keteranganStatus = '';
					if (data[i].IsPaid == 1){
						
					}
				}
				
                rows += '<tr>'+
                        '<td></td>'+
                        '<td>'+data[i].nopolisi+'</td>'+
						'<td>'+data[i].merk+' '+data[i].seri+' '+data[i].silinder+' '+data[i].model+' '+data[i].transmisi+'<br>'+data[i].tahun+'</td>'+
                        '<td>Jenis</td>'+
                        '<td>Rp. '+currency_format(data[i].Billing)+'</td>'+
                        '<td>'+data[i].ScheduleAuctionWinnerCompany+'<br>'+data[i].ScheduleAuctionWinnerDate+'</td>'+
                        '<td>'+
						'<a href="" class="step-transaction">'+
						'<ul>'+
						'<li><img class="imgSrcStep-1-'+data[i].AuctionItemId+'" src="'+imgStep_1+'" alt=""></li>'+
						'<li><img class="imgSrcStep-2-'+data[i].AuctionItemId+'" src="<?php echo base_url('assetsfront/images/icon/ic_transaction_step_2_grey.png'); ?>" alt=""></li>'+
						'<li><img class="imgSrcStep-3-'+data[i].AuctionItemId+'" src="<?php echo base_url('assetsfront/images/icon/ic_transaction_step_3_grey.png'); ?>" alt=""></li>'+
						'<li><img class="imgSrcStep-4-'+data[i].AuctionItemId+'" src="<?php echo base_url('assetsfront/images/icon/ic_transaction_step_4_grey.png'); ?>" alt=""></li>'+
						'<p>Serah Terima Kendaraan Kepada Pemenang</p>'+
						'</ul>'+
						'</a>'+
						'</td>'+
                        '</tr>';
            }
            $('#table-jual tbody tr').replaceWith(rows);
		},
		complete: function(data){
			// data = data.responseJSON.data;
			// setTimeout(function(){ 
				// alert("Hello"); 
				// console.log(data); 
			// }, 1000);
			
		},
        error: function(e) {
            $('#table-jual tbody tr').replaceWith('<tr><td colspan="7"><b class="text-shadows">Tidak Ada Penjualan / Titip Lelang</b></td></tr>');
            /*bootoast.toast({
                message: "Gagal Mengambil Data",
                type: 'warning',
                position: 'top-center',
                timeout: 4
            });*/
        }
    });
	
	$.ajax({
        type: 'GET',
        url: "<?php echo linkservice('stock').'winner/get'; ?>",
        data: {
			userid: '<?php echo $userdata['UserId'] ?>'
		},
        beforeSend: function() {
            $('#table-beli tbody').html('<tr><td colspan="7"><b class="text-shadows">Memuat Data...</b></td></tr>');
        },
        success: function(data) {
			var data = data.data, rows;
            for(var i = 0; i < data.length; i++) {
				
				keteranganStatus = 'Belum Dilunasi';
				imgStep_1 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_1_grey.png'); ?>';
				imgStep_2 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_2_grey.png'); ?>';
				imgStep_3 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_3_grey.png'); ?>';
				imgStep_4 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_4_grey.png'); ?>';
				
				
				if (data[i].IsPaid == 1){
					imgStep_1 = '<?php echo base_url('assetsfront/images/icon/ic_transaction_step_1.png'); ?>';
					keteranganStatus = '';
					if (data[i].IsPaid == 1){
						
					}
				}
				
				if (data[i].IsTakeOutSPPU == 1){
					keteranganStatus = keteranganStatus + '<br>Unit Sudah diambil';
				} else {
					keteranganStatus = keteranganStatus + '<br>Unit Belum diambil';
				}
				
				keteranganStatus = keteranganStatus + '<br>Dokumen Belum diambil';
				
                rows += '<tr>'+
                        '<td></td>'+
                        '<td>'+data[i].NPLNumber+'</td>'+
                        '<td>'+data[i].nopolisi+'</td>'+
						'<td>'+data[i].merk+' '+data[i].seri+' '+data[i].silinder+' '+data[i].model+' '+data[i].transmisi+'<br>'+data[i].tahun+'</td>'+
                        '<td>Jenis</td>'+
                        '<td>Rp. '+currency_format(data[i].Billing)+'</td>'+
                        '<td>'+data[i].ScheduleAuctionWinnerCompany+'<br>'+data[i].ScheduleAuctionWinnerDate+'</td>'+
                        '<td>'+
						'<a href="" class="step-transaction">'+
						'<p>'+keteranganStatus+'</p>'+
						// '<ul>'+
						// '<li><img class="imgSrcStep-1-'+data[i].AuctionItemId+'" src="'+imgStep_1+'" alt=""></li>'+
						// '<li><img class="imgSrcStep-2-'+data[i].AuctionItemId+'" src="'+imgStep_2+'" alt=""></li>'+
						// '<li><img class="imgSrcStep-3-'+data[i].AuctionItemId+'" src="'+imgStep_3+'" alt=""></li>'+
						// '<li><img class="imgSrcStep-4-'+data[i].AuctionItemId+'" src="'+imgStep_4+'" alt=""></li>'+
						// '</ul>'+
						// '<p>Serah Terima Kendaraan Kepada Pemenang</p>'+
						'</a>'+
						'</td>'+
                        '</tr>';
            }
            $('#table-beli tbody tr').replaceWith(rows);
		},
		complete: function(data){
			// data = data.responseJSON.data;
			// setTimeout(function(){ 
				// alert("Hello"); 
				// console.log(data); 
			// }, 1000);
			
		},
        error: function() {
            $('#table-beli tbody tr').replaceWith('<tr><td colspan="8"><b class="text-shadows">Tidak Ada Pembelian</b></td></tr>');
            /*bootoast.toast({
                message: "Gagal Mengambil Data",
                type: 'warning',
                position: 'top-center',
                timeout: 4
            });*/
        }
    });

    $('#table-jual > thead > tr > th').removeClass('sorting').removeClass('sorting_asc');
    $('#table-beli > thead > tr > th').removeClass('sorting').removeClass('sorting_asc');
</script>