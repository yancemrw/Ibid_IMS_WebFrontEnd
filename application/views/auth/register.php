<link rel="stylesheet" href="<?php echo base_url('assetsfront/strength/strength.css'); ?>">
<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>
<script src="<?php echo base_url('assetsfront/strength/strength.js'); ?>"></script>
<script>
    var verifyCallback = function(response) {
        $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val(response);
    };
    var onloadCallback = function() {
        grecaptcha.render('idrecaptcha', {
            'sitekey'   : '6Lee4z8UAAAAAG8bdnCYM-ZKfsRa6fniZlq5HTRn',
            'callback'  : verifyCallback,
            'theme'     : 'light'
        });
    };
</script>

<section class="section-register">
    <input type="hidden" id="e8df0fade2ce52c6a8cf8c8d2309d08a" />
    <div class="container">
        <div class="row position-repative">
            <div class="col-md-4 col-sm-6 pull-right">
                <div class="form-register">
                    <h2>Daftar</h2>
                    <form id="form-reg" data-provide="validation">
                        <h3>Buat Akun Baru</h3>
                        <div class="form-group floating-label">
                            <input type="text" id="name" name="name" class="form-control input-custom" 
                                    oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Nama *</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="email" id="email" name="email" class="form-control input-custom" 
                                    oninvalid="this.setCustomValidity('Email tidak boleh kosong')"
                                    oninput="setCustomValidity('')" pattern="[^@]*@[^@]" required />
                            <label class="label-schedule">Email *</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="password" id="pass" name="pass" class="form-control input-custom" 
                                    oninvalid="this.setCustomValidity('Kata sandi tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Kata Sandi *</label>
                            <!--div id="strength-desc" class="alerts-strength"></div>
                            <div id="strength-gauge" class="strength0"></div-->
                            <div class="help-info" id="type-pass"></div>
                        </div>
                        <div class="form-group floating-label">
                            <input type="password" id="repass" name="repass" class="form-control input-custom" 
                                    oninvalid="this.setCustomValidity('Ulangi sandi tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Ulangi Sandi *</label>
                            <div class="help-info" id="type-repass"></div>
                        </div>
                        <div class="form-group floating-label">
                            <input type="text" id="idcard" name="idcard" class="form-control border-radius-none" />
                            <label class="label-schedule">Kartu Anggota</label>
                            <div class="help-info" id="idcard-info">
                                <i class="fa fa-info"></i> Hanya diisi bila memiliki kartu anggota IBID
                            </div>
                        </div>
                        <!-- <div class="g-recaptcha recaptcha" id="idrecaptcha" required></div> -->
                        <div class="form-group text-right">
                            <button class="btn btn-green btn-register" id="btn-daftar" disabled>Daftar</button>
                            <a href="<?php echo site_url('login'); ?>">Sudah punya akun?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 text-center pull-left">
                <div class="login-socialmedia register-socialmedia">
                    <p>Atau registrasi melalui</p>
                    <a href="javascript:void(0);" class="login-facebook"><span class="ic ic-facebook"></span>Facebook</a>
                    <a href="<?php echo site_url('omni/twitter/twitter');?>" class="login-twitter"><span class="ic ic-twitter"></span>Twitter</a>
                    <a href="<?php echo google(); ?>" class="login-google"><span class="ic ic-Google"></span>Google</a>
                    <a href="<?php echo linkedin(); ?>" class="login-linkedin"><span class="ic ic-linkedin"></span>Linkedin</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        $("nav").sticky({
            topSpacing: 0
        });

        $("#idcard").on("focus", function(e) {
          $('#idcard-info').show();
        });

        $(".select-custom").select2({
            minimumResultsForSearch: -1
        });
         
		$('.lang-mob a').click(function() {
			$('.help-mob ul').removeClass('open');
			$(this).toggleClass('opened');
			$(this).siblings('ul').toggleClass('open');
		});

		$('.help-mob a').click(function() {
			$('.lang-mob ul').removeClass('open');
			$(this).toggleClass('opened');
			$(this).siblings('ul').toggleClass('open');
		});

		$('input').blur(function() {
            tmpval = $(this).val();
            if(tmpval == '') {
                $(this).addClass('empty');
                $(this).removeClass('not-empty');
            }
            else {
                $(this).addClass('not-empty');
                $(this).removeClass('empty');
            }

            var name = $('#name').val(), 
                mail = $('#email').val(), 
                pass = $('#pass').val(), 
                repass = $('#repass').val();

            if(name !== '' && mail !== '' && pass !== '' && repass !== '') {
                $('#btn-daftar').prop('disabled', false);
            }
		});

        // check password length and match password
        $('#pass').blur(function() {
            var pass = $(this).val(), repass = $('#repass').val();
            if($(this).val().length < 8) {
                $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi minimal 8 karakter');
                $('#type-pass').show();
                return;
            }
            else if(pass !== repass) {
                $('#type-repass').html('<i class="fa fa-info"></i> Kata sandi tidak sama');
                $('#type-repass').show();
                return;
            }
            else if(format.test($(this).val())) {
                $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi terdapat simbol');
                $('#type-pass').show();
            }
            else if($(this).val().length >= 8) {
                $('#type-pass').html('');
                $('#type-pass').hide();
            }
            else {
                $('#type-pass').html('');
                $('#type-pass').show();
                return;
            }
        });
        $('#repass').blur(function() {
            var pass = $('#pass').val(), repass = $(this).val();
            if($(this).val().length >= 8) {
                $('#type-pass').html('');
                $('#type-pass').hide();
            }
            if(format.test($(this).val())) {
                $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi terdapat simbol');
                $('#type-pass').show();
            }
            if(pass !== repass) {
                $('#type-repass').html('<i class="fa fa-info"></i> Kata sandi tidak sama');
                $('#type-repass').show();
                return;
            }
            else {
                $('#type-repass').html('');
                $('#type-repass').hide();
                return;
            }
        });

        // button submit
        $('#btn-daftar').click(function(e) {
            var name = $('#name').val(), 
                mail = $('#email').val(), 
                pass = $('#pass').val(), 
                repass = $('#repass').val(),
                recaptcha = $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val(),
                letters = /^[0-9a-zA-Z]+$/;
            if(name !== '' && mail !== '' && pass !== '' && repass !== '') {
                e.preventDefault();
                if(!pass.match(letters)) {
                    bootoast.toast({
                        message: 'Kata sandi harus kombinasi huruf dan angka',
                        type: 'warning',
                        position: 'top-center',
                        timeout: 4
                    });
                    return false;
                }
                // else if(recaptcha === '') {
                //     bootoast.toast({
                //         message: 'Mohon klik CAPTCHA untuk melanjutkan',
                //         type: 'warning',
                //         position: 'top-center',
                //         timeout: 4
                //     });
                //     return false;
                // }
                else if(pass !== repass) {
                    bootoast.toast({
                        message: 'Kata sandi dan ulangi kata sandi tidak sama',
                        type: 'warning',
                        position: 'top-center',
                        timeout: 4
                    });
                    return false;
                }
                else {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('auth/register/create_user'); ?>',
                        data: $("#form-reg").serializeArray(),
                        beforeSend: function() {
                            $('#btn-daftar').html('Daftar <i class="fa fa-spin fa-refresh" style="position:absolute; margin-top:3px; right:87px; z-index:1;"></i>').attr('disabled', true);
                        },
                        success: function(data) {
                            var data = JSON.parse(data);
                            if(data.status === 1) {
                                bootoast.toast({
                                    message: data.messages,
                                    type: 'warning',
                                    position: 'top-center',
                                    timeout: 0
                                });
                                setTimeout(function() {
                                    location.href = data.redirect;
                                }, 1500);
                            }
                            else {
                                $('#btn-daftar').html('Daftar').attr('disabled', false);
                                bootoast.toast({
                                    message: data.messages,
                                    type: 'warning',
                                    position: 'top-center',
                                    timeout: 4
                                });
                                //if(data.redirect !== '') location.href = data.redirect;
                            }
                        },
                        error: function() {
                            $('#btn-daftar').html('Daftar').attr('disabled', false);
                            bootoast.toast({
                                message: 'Terjadi Kendala Saat Koneksi ke Server',
                                type: 'warning',
                                position: 'top-center',
                                timeout: 4
                            });
                        }
                    });
                    return false;
                }
            }
        });

        $('#pass').focus(function() {
            $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi harus kombinasi huruf dan angka');
            $('#type-pass').show();
        });

        $('#pass').keypress(function(event) {
            var charCode = (event.which) ? event.which : event.keyCode;
            if(charCode === 8) {
                $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi harus kombinasi huruf dan angka');
            }
        }).keyup(function() {
            if(format.test($(this).val())) {
                $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi terdapat simbol');
                $('#type-pass').show();
            }
            else {
                var values = $(this).val(), the_return = passwordStrength(values);
                //document.getElementById("strength-desc").innerHTML = the_return.descstrength;
                //document.getElementById("strength-gauge").className = the_return.strength;
            }
        });
    });
</script>
