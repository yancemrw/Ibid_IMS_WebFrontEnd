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
                        <li class="acc_notif">
                        	<a href="<?php echo site_url('notification'); ?>">
                            <span class="ic_menu"><i ></i></span> Notifikasi <span>10</span></a>
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
                        <li class="acc_favorite active">
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
                <div class="main-management clearfix">
                    <h2>Favorit</h2>
                    <div class="whislist product-mob clearfix">
                        <div class="row">
                        	<?php for ($i=0; $i < 9; $i++) { ?>
                            <div class="col-md-4">
                                <div class="list-product box-recommend list-compare">
                                    <a href="">
                                        <div class="thumbnail">
                                            <img alt="" src="<?php echo base_url('assetsfront/images/background/img-recommend-1.jpg'); ?>">
                                            <div class="overlay-grade">
                                                Grade <span>A</span>
                                            </div>
                                            <p class="overlay-lot">LOT 170</p>
                                        </div>
                                        <div class="boxright-mobile">
                                            <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT </h2>
                                            <span>2014</span> <span class="price">Rp. 72,000,000</span>
                                            <p><span>Jadwal</span> <span class="fa fa-calendar"></span> <span>04 September 2017</span></p>
                                            <p><span>Lokasi</span> <span class="fa fa-map-marker"></span> <span>Jakarta</span></p>
                                        </div>
                                    </a>
                                    <div class="action-wishlist">
                                        <button class="btn btn-green"><i class="fa fa-files-o"></i> Bandingkan</button>
                                        <a href="" class="delete-favorite">Hapus Favorit</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>