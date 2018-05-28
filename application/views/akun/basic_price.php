<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetsfront/datatables/css/jquery.dataTables.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url('assetsfront/datatables/js/jquery.dataTables.js'); ?>"></script>
<section>
    <div class="container-fluid">
        <div class="row position-repative">
            <div class="col-md-3 col-sm-3 sidemenu-left acc-menu">
                <div class="menu-account">
                    <div class="avatar-account">
                        <div class="photo-account">
                            <img src="<?php echo $img_link; ?>" alt="" title="avatar">
                        </div>
                        <h3><?php echo @$userdata['namefront']; ?></h3>
                    </div>
                    <ul>
                        <li class="acc_notif">
                        	<a href="<?php echo site_url('notification'); ?>" onclick="setActiveMenu('notification')">
                            <span class="ic_menu"><i ></i></span> Notifikasi<!--span>10</span--></a>
                        </li>
                        <li class="acc_transaction">
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
                        <li class="acc_price active">
                        	<a href="<?php echo site_url('basic-price'); ?>" onclick="setActiveMenu('basic-price')">
                        	<span class="ic_menu"><i ></i></span> Harga Dasar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 main-right">
                <div class="main-management">
                    <h2>Harga Dasar</h2>
                    <div class="filter-table">
                        <form class="form-inline">
                            <div class="form-group">
                                <input type="text" name="filterBasicPrice" class="form-control input-custom" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="filter-right">
                                <div class="form-group">
                                    <select class="form-control select-custom">
                                        <option>Filter Cabang</option>
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
                                    <select class="form-control select-custom" id="changeMaxRows">
                                        <option>10</option>
                                        <option>15</option>
                                        <option>20</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive table-container table-transaction">
                        <table id="table-basic-price" class="table table-striped table-custom table-custom-transaction table-responsive-am">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Polisi / No. Seri</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis</th>
                                    <th>Jadwal</th>
                                    <th>Harga Dasar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var hargaDasar = $('#table-basic-price').DataTable({
        "dom": 'rt<"bottom"ip><"clear">',
        "bLengthChange": false,
        "fnServerParams": function ( aoData ) {
            aoData.push( {"name":"changeMaxRows", "value":$('#changeMaxRows').val()} );
        },
        "language": {
            'emptyTable': 'Data Tidak Ada'
        },
        "ajax": "<?php echo linkservice('frontend').'akun/Basic_price/getHargaDasarDatatables'; ?>"
    });
    $('input[name="filterBasicPrice"]').keypress(function(e) {
        if(e.which == 13) {
            e.preventDefault();
            hargaDasar.search(this.value).draw();
        }
    });

    function changed(ele, aucid) {
        var basic_price_element = $(ele).parent().prev();
        $(ele).replaceWith('<a href="javascript:void(0)" onclick="onok(this, '+aucid+')"><i class="fa fa-check"></i></a><a href="javascript:void(0)" onclick="oncanceled(this, '+aucid+')"><i class="fa fa-close"></i></a>');
        basic_price_element.html('<input type="text" value="'+basic_price_element.text()+'" size="11" onfocus="this.value=\'\'" onkeyup="keypress(this, event, '+aucid+')" />');
    }

    function onok(ele, aucid) {
        var val = $(ele).parent().prev().children().val();
        var element = $(ele).parent().children();
        sendData(val, aucid, element);
    }

    function oncanceled(ele, aucid) {
        var basic_price_element = $(ele).parent().prev();
        basic_price_element.html('0');
        $(ele).parent().html('<a href="javascript:void(0)" class="edit-price" onclick="changed(this, \''+aucid+'\')"><i class="fa fa-pencil"></i></a>');
    }

    function keypress(ele, event, aucid) {
        var charCode = (event.which) ? event.which : event.keyCode;
        if(charCode === 13) {
            var val = $(ele).val();
            var element = $(ele).parent().next().children();
            sendData(val, aucid, element);
        }
        else {
            convertToRupiah(ele);
        }
    }

    function sendData(val, aucid, ele) {
        $.ajax({
            url: '<?php echo linkservice('stock'); ?>itemstock/UpdateHargaDasar',
            data: 'harga='+val+'&AuctionItemId='+aucid,
            type: 'GET',
            beforeSend: function() {
                $(ele).parent().prev().children().attr('disabled', true);
            },
            success: function(data) {
                bootoast.toast({
                    message: data.message,
                    type: 'success',
                    position: 'top-center'
                });
                $(ele).parent().html('<a><i class="fa fa-check"></i></a>');
            },
            error: function() {
                bootoast.toast({
                    message: 'Gagal Tambah Harga Dasar',
                    type: 'warning',
                    position: 'top-center'
                });
                $(ele).parent().prev().children().attr('disabled', false);
            }
        });
    }

    function convertToRupiah(objek) {
        separator = ".";
        a = objek.value;
        b = a.replace(/[^\d]/g,"");
        c = "";
        panjang = b.length;
        j = 0;
        for(i = panjang; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                c = b.substr(i-1,1) + separator + c;
            } else {
                c = b.substr(i-1,1) + c;
            }
        }
        objek.value = c;
    }

    $('#table-basic-price > thead > tr > th').removeClass('sorting').removeClass('sorting_asc');
</script>