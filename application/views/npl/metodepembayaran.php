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
                            <div id="methode1" class="desc-methode padding-30px-15px-30px-30px">
                                <ul class="list-style margin-bottom-10px">
                                    <li class="margin-bottom-10px">Kode pembayaran Virtual Account merupakan kombinasi 5 nomor unik dan nomor handphone yang terdaftar di akun IBID.</li>
                                    <li class="margin-bottom-10px">Satu nomor Virtual Account BCA berlaku untuk satu akun saja.</li>
                                    <li class="margin-bottom-10px">Pembayaran hanya berlaku untuk satu tagihan terbaru. Jika Anda masih memiliki tagihan yang belum dibayarkan, transaksi sebelumnya akan otomatis dibatalkan.</li>
                                    <li class="margin-bottom-10px">Batas waktu pembayaran adalah 2 hari.</li>
                                    <li class="margin-bottom-10px">Pembayaran Virtual Account BCA dapat dilakukan lewat ATM, m-BCA, KlikBCA Individual, atau langsung melalui teller.</li>
                                    <li class="margin-bottom-10px">Verifikasi pembayaran secara otomatis.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="va-mandiri" class="input-hidden" value="2" />
                            <label for="va-mandiri">
                                <p>Transfer Virtual Account</p>
                                <ul>
                                    <li><img src="<?php echo base_url('assetsfront/images/icon/ic-mandiri.png'); ?>" alt=""></li>
                                </ul>
                            </label>
                            <div id="methode2" class="desc-methode padding-30px-15px-30px-30px">
                                <ul class="list-style margin-bottom-10px">
                                    <li class="margin-bottom-10px">Kode pembayaran Virtual Account merupakan kombinasi 5 nomor unik dan nomor handphone yang terdaftar di akun IBID.</li>
                                    <li class="margin-bottom-10px">Satu nomor Virtual Account berlaku untuk satu akun saja.</li>
                                    <li class="margin-bottom-10px">Pembayaran hanya berlaku untuk satu tagihan terbaru.</li>
                                    <li class="margin-bottom-10px">Tagihan terbayar bila Anda melakukan pembayaran dengan nominal tepat.</li>
                                    <li class="margin-bottom-10px">Pembayaran Virtual Account Mandiri dapat dilakukan lewat ATM, Mandiri Online, atau langsung melalui teller.</li>
                                    <li class="margin-bottom-10px">Verifikasi pembayaran secara otomatis.</li>
                                </ul>
                            </div>
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
                            <div id="methode3" class="desc-methode padding-30px-15px-30px-30px">
                                <ul class="list-style margin-bottom-10px">
                                    <li class="margin-bottom-10px">Pembayaran hanya dapat dilakukan menggunakan kartu kredit berlogo Visa/Master Card.</li>
                                    <li class="margin-bottom-10px">Pembayaran dilakukan secara online melalui situs IBID yang nantinya akan terhubung dengan sistem Visa/Master Card.</li>
                                    <li class="margin-bottom-10px">Verifikasi pembayaran secara otomatis.</li>
                                    <li class="margin-bottom-10px">Pastikan limit kartu kredit Anda mencukupi.</li>
                                    <li class="margin-bottom-10px">Refund atau pengembalian dana akan dikembalikan ke rekening kartu kredit Anda.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="tipe-methode" id="loket" class="input-hidden" value="4" />
                            <label for="loket">
                                <p>Loket</p>
                            </label>
                            <div id="methode4" class="desc-methode padding-30px-15px-30px-30px">
                                <ul class="list-style">
                                    <li class="margin-bottom-10px">Pembayaran hanya dapat dilakukan di loket IBID menggunakan kartu debet.</li>
                                    <li class="margin-bottom-10px">Anda akan menerima struk berisi barcode yang harus dibawa ketika datang ke loket.</li>
                                    <li class="margin-bottom-10px">Verifikasi pembayaran dilakukan oleh petugas loket.</li>
                                </ul>
                            </div>
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
            <div class="col-md-12 col-sm-12"><a href="<?php site_url('beli-npl'); ?>" class="back-to"><i class="fa fa-angle-left"></i> Kembali ke Beli NPL</a></div>
        </div>
    </div>
</section>
<script>
$(function() {
	$('#btnBayar').click(function() {
		$('#thisForm').submit();
	});

    $("input[name$='tipe-methode']").click(function() {
        var test = $(this).val();
        $(".desc-methode").hide();
        $("#methode" + test).css('display', 'inline-block');
    });
})
</script>