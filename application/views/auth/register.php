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
                    <form action="<?php echo site_url('register'); ?>" id="form-reg" method="post" data-provide="validation">
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
                        <div class="g-recaptcha recaptcha" id="idrecaptcha" required></div>
                        <div class="form-group text-right">
                            <button class="btn btn-green btn-register" id="btn-daftar" disabled>Daftar</button>
                            <a href="<?php echo site_url('register'); ?>">Sudah punya akun?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 text-center pull-left">
                <div class="login-socialmedia register-socialmedia">
                    <p>Atau registrasi melalui</p>
                    <a href="<?php echo facebook(); ?>" class="login-facebook"><span class="ic ic-facebook"></span>Facebook</a>
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
                $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi kurang dari 8');
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
                        message: 'Kata sandi hanya boleh menggunakan karakter dan angka',
                        type: 'warning',
                        position: 'top-center',
                        timeout: 3
                    });
                }
                else if(recaptcha !== '') {
                    $('#btn-daftar').attr('disabled', true);
                    $('#form-reg').submit();
                }
                else {
                    bootoast.toast({
                        message: 'Captcha harus di isi!',
                        type: 'warning',
                        position: 'top-center',
                        timeout: 3
                    });
                }
            }
        });

        $('#pass').focus(function() {
            $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi harus karakter dan angka');
            $('#type-pass').show();
        });

        $('#pass').keypress(function(event) {
            var charCode = (event.which) ? event.which : event.keyCode;
            if(charCode === 8) {
                $('#type-pass').html('<i class="fa fa-info"></i> Kata sandi harus karakter dan angka');
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