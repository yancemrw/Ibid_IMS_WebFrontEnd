<section class="section-register">
    <div class="container">
        <div class="row position-repative">
            <div class="col-md-4 col-sm-6 pull-right">
                <div class="form-register">
                    <h2>Registrasi</h2>
                    <form action="<?php echo site_url('register'); ?>" method="post" data-provide="validation">
                        <h3>Create Account</h3>
                        <div class="form-group floating-label">
                            <input type="text" id="name" name="name" class="form-control input-custom" 
                                    oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Nama *</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="email" id="email" name="email" class="form-control input-custom" 
                                    oninvalid="this.setCustomValidity('Email tidak boleh kosong')"
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Email *</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="password" id="pass" name="pass" class="form-control input-custom" 
                                    oninvalid="this.setCustomValidity('Kata sandi tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Kata Sandi *</label>
                            <div class="alerts-info" id="type-pass"></div>
                        </div>
                        <div class="form-group floating-label">
                            <input type="password" id="repass" name="repass" class="form-control input-custom" 
                                    oninvalid="this.setCustomValidity('Ulangi sandi tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Ulangi Sandi *</label>
                            <div class="alerts-info" id="type-repass"></div>
                        </div>
                        <div class="form-group floating-label">
                            <input type="text" id="idcard" name="idcard" class="form-control input-custom" />
                            <label class="label-schedule">Kartu Anggota</label>
                            <div class="help-info">
                                <i class="fa fa-info"></i> Kartu anggota yang dimiliki oleh pnegguna IBID yang telah terdaftar sebelumnya
                            </div>
                        </div>
                        <!--div class="g-recaptcha" data-sitekey="6LeAE0EUAAAAAPlf9nE8fDAHuER0fldmmoD0-LGF" data-theme="light" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">
                            </div-->
                        <div class="form-group text-right">
                            <button class="btn btn-green">Daftar</button>
                            <a href="">Sudah punya akun?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 text-center pull-left">
                <div class="login-socialmedia register-socialmedia">
                    <p>Atau masuk melalui</p>
                    <a href="" class="login-facebook"><span class="ic ic-facebook"></span>facebook</a>
                    <a href="" class="login-twitter"><span class="ic ic-twitter"></span>twitter</a>
                    <a href="" class="login-google"><span class="ic ic-Google"></span>google</a>
                    <a href="" class="login-linkedin"><span class="ic ic-linkedin"></span>Linkedin</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("nav").sticky({
            topSpacing: 0
        });

        $("#idcard").on("focus", function(e) {
          $('.help-info').show();
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
		});

        // check password length and match password
        $('#pass').blur(function() {
            var pass = $(this).val(), repass = $('#repass').val();
            if($(this).val().length < 8) {
                $('#type-pass').html('Password kurang dari 8');
                $('#type-pass').show();
                return;
            }
            else {
                $('#type-pass').html('');
                $('#type-pass').hide();
                return;
            }

            if(pass !== repass) {
                $('#type-repass').html('Password tidak sama');
                $('#type-repass').show();
                return;
            }
            else {
                $('#type-repass').html('');
                $('#type-repass').hide();
                return;
            }
        });
        $('#repass').blur(function() {
            var pass = $('#pass').val(), repass = $(this).val();
            if(pass !== repass) {
                $('#type-repass').html('Password tidak sama');
                $('#type-repass').show();
                return;
            }
            else {
                $('#type-repass').html('');
                $('#type-repass').hide();
                return;
            }
        });
    });
</script>