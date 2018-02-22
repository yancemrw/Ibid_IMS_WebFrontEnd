<section class="section section-auction">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <h2>Pilih Metode Pembayaran</h2>
                <form class="form-methode form-filter">
                    <div class="object-type pay-methode clearfix">
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="type_1" class="input-hidden" value="1" />
                            <label for="type_1">
                                <p>Transfer Virtual Account</p>
                                <ul>
                                    <li><img src="<?php echo site_url('assetsfront/images/icon/ic-bca.png'); ?>" alt=""></li>
                                </ul>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="type_1" class="input-hidden" value="1" />
                            <label for="type_1">
                                <p>Transfer Virtual Account</p>
                                <ul>
                                    <li><img src="<?php echo site_url('assetsfront/images/icon/ic-mandiri.png'); ?>" alt=""></li>
                                </ul>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="type_3" class="input-hidden" value="3" />
                            <label for="type_3">
                                <p>Kartu Visa / Master Card</p>
                                <ul>
                                    <li><img src="<?php echo site_url('assetsfront/images/icon/ic-visa.png'); ?>" alt="" title=""></li>
                                    <li><img src="<?php echo site_url('assetsfront/images/icon/ic-master-card.png'); ?>" alt="" title=""></li>
                                </ul>
                            </label>
                            <div id="methode3" class="desc-methode">
                                3
                            </div>
                        </div>
                    </div>
                </form>
               
            </div>
            <div class="col-md-5  col-sm-5">      
                <h2>Ringkasan Belanja</h2>
                <div class="shopping-history">
                    <p>Total Harga Barang <span>Rp. 15.000.000</span></p>
                    <p>Biaya Layanan <span>Rp. 100.000</span></p>
                    <p class="total-shopping">Total Belanja <span>Rp. 15.100.000</span></p>
                    <button class="btn btn-green" onclick="location.href='verifikasi-npl.html'" type="button">Bayar</button>
                </div>
            </div>
            <div class="col-md-12 col-sm-12"> <a href="" class="back-to"><i class="fa fa-angle-left"></i> Kembali ke Beli NPL</a></div>
        </div>
    </div>
</section>