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
                                <form class="form-inline">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control input-custom" placeholder="Search">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    <div class="filter-right">
                                        <div class="form-group">
                                            <select class="form-control select-custom">
                                                <option>Filter by jadwal</option>
                                                <option>jakarta timur</option>
                                                <option>jakarta timur</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select-custom">
                                                <option>Jenis lelang</option>
                                                <option>Hybrid</option>
                                                <option>Hybrid</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Show</label>
                                            <select class="form-control select-custom">
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
                                            <th width="3">No</th>
                                            <th width="10">No Pol/Serial Number</th>
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
                            <div class="table-responsive table-container table-transaction content-empty">
                                <div class="product-empty">
                                    <img src="<?php echo base_url('assetsfront/images/icon/ic-transaction-empty.png'); ?>" alt="" title="">
                                </div>
                                <p>Oops.... <span>Data Belum Tersedia.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $.ajax({
        type: 'POST',
        url: "<?php echo linkservice('account').'notifications/get'; ?>",
        data: "type=2&UserId=<?php echo $userdata['UserId'] ?>",
        beforeSend: function() {
            $('#table-jual tbody').html('<tr><td colspan="7"><b class="text-shadows">Memuat Data...</b></td></tr>');
        },
        success: function(data) {
            var data = data.data, rows;
            for(var i = 0; i < data.length; i++) {
                rows += '<tr>'+
                        '<td></td>'+
                        '<td>'+data[i].NoPolisi+'</td><td>'+data[i].Title+'</td>'+
                        '<td></td>'+
                        '<td>Rp. '+currency_format(data[i].Billing)+'</td>'+
                        '<td>'+data[i].Schedule+'</td>'+
                        '<td>'+
                        '<a href="" class="step-transaction">'+
                        '<ul>'+
                        '<li><img src="<?php echo base_url('assetsfront/images/icon/ic_transaction_step_1.png'); ?>" alt=""></li>'+
                        '<li><img src="<?php echo base_url('assetsfront/images/icon/ic_transaction_step_2.png'); ?>" alt=""></li>'+
                        '<li><img src="<?php echo base_url('assetsfront/images/icon/ic_transaction_step_3_grey.png'); ?>" alt=""></li>'+
                        '<li><img src="<?php echo base_url('assetsfront/images/icon/ic_transaction_step_4_grey.png'); ?>" alt=""></li>'+
                        '<p>Serah Terima Kendaraan Kepada Pemenang</p>'+
                        '</ul>'+
                        '</a></td>'+
                        '</tr>';
            }
            $('#table-jual tbody tr').replaceWith(rows);
        },
        error: function() {
            bootoast.toast({
                message: "Gagal Mengambil Data",
                type: 'warning',
                position: 'top-center',
                timeout: 4
            });
        }
    });
</script>