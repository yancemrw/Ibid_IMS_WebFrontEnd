<script type="text/javascript" src="<?php echo base_url('assetsfront/js/countdown.js'); ?>"></script>
<script>
    var linked = '<?php echo site_url("biodata/otp?otpkirim=yes")?>';
</script>
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
                    <!--form role="form" action="<?php echo site_url('biodata/otpconfirm'); ?>" method="POST" data-provide="validation"-->
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
                            <p>Mohon tunggu 2 menit sebelum mencoba kirim ulang kode verifikasi</p>
                        </div>
                        <div id="countdown-id">
                            <button class="btn btn-green" id="btn-submit">Submit</button>
                        </div>
                    <!--/form-->
                    <div id="divreotp">
                        <a id="reotp" href="<?php echo site_url('biodata/otp?otpkirim=yes')?>">Kirim ulang kode verifikasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$('.auction-info').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
        {
                breakpoint: 768,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                prevArrow: false,
                nextArrow: false
            }
        }
    ]
});

function refresh_button() {
    var arrOTP = new Array(), checkField = false;
    $('input[name^="otp"]').each(function() {
        arrOTP.push($(this).val());

        if($(this).val() === '') {
            checkField = true;
            return false;
        }
    });

    if(checkField === true) {
        bootoast.toast({
            message: 'Lengkapi Kode Verifikasi',
            type: 'warning',
            position: 'top-center',
            timeout: 3
        });
        return false;
    }
    else {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('biodata/otpconfirm'); ?>',
            data: 'otp='+JSON.stringify(arrOTP),
            async: false,
            beforeSend: function() {
                $('#btn-submit').attr('disabled', true);
            },
            success: function(data) {                    
                if(data === 'cocok') {
                    deleteCookieCountdown('CHKPT');
                    location.href = '<?php echo site_url('biodata/updateForNPL'); ?>';
                }
                else {
                    bootoast.toast({
                        message: data,
                        type: 'warning',
                        position: 'top-center',
                        timeout: 3
                    });
                    $('#btn-submit').attr('disabled', false);
                }
            }
        });
    }
    
}

$("input").keyup(function(e) {
    if(this.value.length == this.maxLength) {
        $(this).next('input').focus();
    }

    if(e.which === 13) {
        refresh_button();
    }
});

$('input').keydown(function(e) {
    if((e.which == 8 || e.which == 46) && $(this).val() == '') {
        $(this).prev('input').focus();
    }
});

function getCookieFalse(name) {
    var pattern = RegExp(name + "=.[^;]*")
    matched = document.cookie.match(pattern)
    if(matched) {
        var cookie = matched[0].split('=')
        return cookie[1]
    }
    return false
}

function deleteCookieFalse(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
</script>