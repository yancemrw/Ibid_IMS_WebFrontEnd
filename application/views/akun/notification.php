<section>
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-3 col-sm-3 sidemenu-left acc-menu">
                <div class="menu-account">
                    <div class="avatar-account">
                        <div class="photo-account">
                            <img src="<?php echo $img_link; ?>" alt="">
                        </div>
                        <h3><?php echo @$userdata['namefront']; ?></h3>
                    </div>
                    <ul>
                        <li class="acc_notif active">
                            <a href="<?php echo site_url('notification'); ?>">
                            <span class="ic_menu"><i ></i></span> Notifikasi<!--span>10</span--></a>
                        </li>
                        <li class="acc_transaction">
                            <a href="<?php echo site_url('transaction'); ?>">
                            <span class="ic_menu"><i ></i></span> Transaksi</a>
                        </li>
                        <li class="acc_npl">
                            <a href="<?php echo site_url('npl_dashboard'); ?>">
                            <span class="ic_menu"><i ></i></span> NPL Management</a>
                        </li>
                        <li class="acc_setting">
                            <a href="<?php echo site_url('dashboard'); ?>">
                            <span class="ic_menu"><i ></i></span> Pengaturan</a>
                        </li>
                        <li class="acc_favorite">
                            <a href="<?php echo site_url('favorite'); ?>">
                            <span class="ic_menu"><i ></i></span> Favorit</a>
                        </li>
                        <li class="acc_price">
                            <a href="<?php echo site_url('basic-price'); ?>">
                            <span class="ic_menu"><i ></i></span> Harga Dasar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 am-right">
                <div class="main-management">
                    <h2>Notifikasi</h2>
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
</section>