<section class="section section-auction">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <h2>Pilih Metode Pembayaran</h2>
                <form class="form-methode form-filter" id="thisForm" action="<?php echo site_url('npl/checkout'); ?>" method="POST" target="_blank">
                    <div class="object-type pay-methode clearfix">
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="va-bca" class="input-hidden" value="1" />
                            <label for="va-bca">
                                <p>Transfer Virtual Account</p>
                                <ul>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-bca.png'); ?>" alt=""></li>
                                </ul>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="va-mandiri" class="input-hidden" value="2" />
                            <label for="va-mandiri">
                                <p>Transfer Virtual Account</p>
                                <ul>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-mandiri.png'); ?>" alt=""></li>
                                </ul>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="cc" class="input-hidden" value="3" />
                            <label for="cc">
                                <p>Kartu Visa / Master Card</p>
                                <ul>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-visa.png'); ?>" alt="" title=""></li>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-master-card.png'); ?>" alt="" title=""></li>
                                </ul>
                            </label>
                            <div id="methode3" class="desc-methode">
                                3
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="loket" class="input-hidden" value="4" />
                            <label for="loket">
                                <p>Loket</p>
                            </label>
                        </div>
                    </div>
                </form>
               
            </div>
            <div class="col-md-5  col-sm-5">      
                <h2>Ringkasan Belanja</h2>
                <div class="shopping-history">
                    <p>Total Harga Barang <span>Rp. <?php echo number_format($this->cart->total()); ?></span></p>
                    <p>Biaya Layanan <span>Rp. 100.000</span></p>
                    <p class="total-shopping">Total Belanja <span>Rp. <?php echo number_format($this->cart->total() + 100000); ?></span></p>
                    <button class="btn btn-green" type="button" id="btnBayar">Bayar</button>
                </div>
            </div>
            <div class="col-md-12 col-sm-12"> <a href="" class="back-to"><i class="fa fa-angle-left"></i> Kembali ke Beli NPL</a></div>
        </div>
    </div>
</section>
<script>
$(function(){
	$('#btnBayar').click(function(){
		$('#thisForm').submit();
	});
})
</script>