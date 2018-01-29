<script type="text/javascript" src="<?php echo base_url('assetsfront/js/countdown.js'); ?>"></script>
<section class="section section-auction">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Keuntungan Beli NPL di IBID?</h2>
                <ul class="auction-info clearfix">
                    <li class="item">
                        <div class="form-info ic ic-Mudah"></div>
                        <div class="content-media">
                            <h2>Proses Mudah dan Aman</h2>
                            <p>Proses pembelian nomor peserta lelang (NPL) dan pembayaran dilakukan secara online di Website IBID dengan berbagai pilihan metode pembayaran yang yang terotentikasi menjamin privasi dan keamanan transaksi online Anda</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="form-info ic ic-Deposit-100_"></div>
                        <div class="content-media">
                            <h2>Deposit 100% Aman & Terjamin</h2>
                            <p>Jika Anda tidak menang lelang Uang deposit dari pembelian NPL akan dikembalikan 100% tanpa potongan apapun.</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="form-info ic ic-No-NPL"></div>
                        <div class="content-media">
                            <h2>Nomor Peserta Lelang (NPL) Unlimited</h2>
                            <p>Nikmati kemudahan lebih dengan menggunakan NPL Unlimited. Cukup membeli satu NPL yang dapat digunakan untuk mengikuti berbagai jadwal lelang bahkan secara bersamaan dan menawar kendaraan tanpa batasan maksimal.</p>
                        </div>
                    </li>
                </ul>
            </div> 
            <div class="col-md-5 col-sm-6">      
                <div class="verification-otp">
                    <form role="form" action="<?php echo site_url('biodata/otpconfirm'); ?>" method="POST" data-provide="validation">
                        <div class="input-code">
                            <h2>Verifikasi No. HP (OTP)</h2>
                            <h3>Masukan Kode Verifikasi  di Sini</h3>
                            <div class="vcode" id="vcode">
                                <input type="phone" class="vcode-input" maxlength="1" 
                                        oninvalid="this.setCustomValidity('Harus diisi')"
                                        oninput="setCustomValidity('')" id="vcode1" name="otp[]" required />
                                <input type="phone" class="vcode-input" maxlength="1" 
                                        oninvalid="this.setCustomValidity('Harus diisi')" 
                                        oninput="setCustomValidity('')" name="otp[]" required />
                                <input type="phone" class="vcode-input" maxlength="1" 
                                        oninvalid="this.setCustomValidity('Harus diisi')" 
                                        oninput="setCustomValidity('')" name="otp[]" required />
                                <input type="phone" class="vcode-input" maxlength="1" 
                                        oninvalid="this.setCustomValidity('Harus diisi')" 
                                        oninput="setCustomValidity('')" name="otp[]" required />
                                <input type="phone" class="vcode-input" maxlength="1" 
                                        oninvalid="this.setCustomValidity('Harus diisi')" 
                                        oninput="setCustomValidity('')" name="otp[]" required />
                            </div>
                            <p>Mohon tunggu 1 menit sebelum mencoba kirim ulang kode verifikasi</p>
                        </div>
                        <div id="countdown-id">
                            <button class="btn btn-green">Submit</button>
                        </div>
                    </form>
                    <a id="reotp" href="<?php echo site_url('biodata/otp?otpkirim=yes')?>">Kirim ulang kode verifikasi</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    countdown(); // call countdown

    $("input").keyup(function () {
        if(this.value.length == this.maxLength) {
          $(this).next('input').focus();
        }
    });

    $('input').keydown(function(e) {
        if ((e.which == 8 || e.which == 46) && $(this).val() == '') {
            $(this).prev('input').focus();
        }
    });
</script>