<script type="text/javascript" src="<?php echo base_url('assetsfront/js/countdown.js'); ?>"></script>
<section class="section section-auction">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Keuntungan Beli NPL di IBID?</h2>
                <ul class="auction-info clearfix">
                    <?php foreach($cms->titip as $keyCms => $valueCms) { ?>
                    <li class="item">
                        <div class="form-info display-block ic <?php echo $valueCms->ClassName; ?>"></div>
                        <div class="content-media">
                            <h2><?php echo $valueCms->Title; ?></h2>
                            <p><?php echo $valueCms->Content; ?></p>
                        </div>
                    </li>
                    <?php } ?>
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
var count_slide = '<?php echo count($cms->titip); ?>';
$('.auction-info').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: count_slide,
    slidesToScroll: count_slide,
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
    var arrOTP = new Array(), checkField = false, checknumber = false;
    $('input[name^="otp"]').each(function() {
        arrOTP.push($(this).val());

        if($(this).val() === '') {
            checkField = true;
            return false;
        }

        if(numberOnly($(this).val()) === false) {
            checknumber = true;
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
    else if(checknumber === true) {
        bootoast.toast({
            message: 'Format pengisian harus angka',
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
                    location.href = '<?php echo site_url('biodata/updateForNPL'); ?>';
                }
                else {
                    bootoast.toast({
                        message: data,
                        type: 'warning',
                        position: 'top-center',
                        timeout: 3
                    });
                    $('button[type=submit]').attr('disabled', false).html('Kirim');
                }
            },
            error: function() {
                bootoast.toast({
                    message: 'Koneksi ke Server Terganggu',
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
                $('button[type=submit]').attr('disabled', false).html('Kirim');
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