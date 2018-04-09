<script type="text/javascript" src="<?php echo base_url('assetsfront/js/countdown.js'); ?>"></script>
<section class="section section-auction">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Keuntungan Beli NPL di IBID?</h2>
                <ul class="auction-info clearfix">
                    <li class="item">
                        <div class="form-info ic ic-Mudah display-block"></div>
                        <div class="content-media">
                            <h2>Proses Mudah dan Aman</h2>
                            <p>Proses pembelian nomor peserta lelang (NPL) dan pembayaran dilakukan secara online di Website IBID dengan berbagai pilihan metode pembayaran yang yang terotentikasi menjamin privasi dan keamanan transaksi online Anda</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="form-info ic ic-Deposit-100_ display-block"></div>
                        <div class="content-media">
                            <h2>Deposit 100% Aman & Terjamin</h2>
                            <p>Jika Anda tidak menang lelang Uang deposit dari pembelian NPL akan dikembalikan 100% tanpa potongan apapun.</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="form-info ic ic-No-NPL display-block"></div>
                        <div class="content-media">
                            <h2>Nomor Peserta Lelang (NPL) Unlimited</h2>
                            <p>Nikmati kemudahan lebih dengan menggunakan NPL Unlimited. Cukup membeli satu NPL yang dapat digunakan untuk mengikuti berbagai jadwal lelang bahkan secara bersamaan dan menawar kendaraan tanpa batasan maksimal.</p>
                        </div>
                    </li>
                </ul>
            </div> 
            <div class="col-md-5 col-sm-6">      
                <div class="verification-otp">
                    <div class="input-code">
                        <h2>Verifikasi No. HP (OTP)</h2>
                        <h3>Masukkan kode yang kami kirim lewat SMS</h3>
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
                        <button type="submit" class="btn btn-green">Kirim</button>
                    </div>
                    <div id="divreotp">
                        <a id="reotp" href="javascript:void(0)" onclick="reload()">Kirim ulang kode verifikasi</a>
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

$('button[type=submit]').click(function(e) {
    e.preventDefault();
    refresh_button(); 
});

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

function reload() {
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('biodata/otp?otpkirim=yes')?>',
        beforeSend: function() {
            $('#reotp').replaceWith('<img id="reotp" src="<?php echo base_url('assetsfront/images/icon/refresh_spin.gif'); ?>" width="20px" style="margin-bottom:40px;" />');
        },
        success: function(data) {                    
            var data = JSON.parse(data);
            if(data.status === 1) {
                bootoast.toast({
                    message: data.messages,
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
            }
            else {
                bootoast.toast({
                    message: data.messages,
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
            }
            location.reload();
        },
        error: function() {
            bootoast.toast({
                message: 'Koneksi ke Server Terganggu',
                type: 'warning',
                position: 'top-center',
                timeout: 3
            });
            $('#reotp').replaceWith('<a id="reotp" href="javascript:void(0)" onclick="reload()">Kirim ulang kode verifikasi</a>');
        }
    });
}

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
            beforeSend: function() {
                $('button[type=submit]').attr('disabled', true).html('Kirim <i class="fa fa-spin fa-refresh" style="position:absolute; margin-top:3px; right:150px; z-index:1;"></i>');
            },
            success: function(data) {                    
                if(data === 'cocok') {
                    deleteCookieCountdown('CHKPT');
                    deleteCookieCountdown('CODOCK');
                    $('button[type=submit]').html('Kirim');
                    location.href = '<?php echo site_url('biodata/updateForNPL'); ?>';
                }
                else {
                    bootoast.toast({
                        message: data,
                        type: 'warning',
                        position: 'top-center',
                        timeout: 3
                    });
                    $('button[type=submit]').attr('disabled', false);
                }
            },
            error: function() {
                $('button[type=submit]').html('Kirim');
                bootoast.toast({
                    message: 'Koneksi ke Server Terganggu',
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
                $('button[type=submit]').attr('disabled', false);
            }
        });
    }
}

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