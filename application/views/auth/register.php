<link rel="stylesheet" href="<?php echo base_url('assetsfront/strength/strength.css'); ?>">
<script src="<?php echo base_url('assetsfront/strength/strength.js'); ?>"></script>

<section class="section-register">
    <div class="container">
        <div class="row position-repative">
            <div class="col-md-4 col-sm-6 pull-right">
                <div class="form-register">
                    <h2>Daftar</h2>
                    <form action="<?php echo site_url('register'); ?>" id="form-reg" method="post" data-provide="validation">
                        <h3>Buat Akun</h3>
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
                            <div id="strength-desc" class="alerts-strength"></div>
                            <div id="strength-gauge" class="strength0"></div>
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
                            <input type="text" id="idcard" name="idcard" class="form-control" />
                            <label class="label-schedule">Kartu Anggota</label>
                            <div class="help-info">
                                <i class="fa fa-info"></i> Kartu anggota yang dimiliki oleh pnegguna IBID yang telah terdaftar sebelumnya
                            </div>
                        </div>
                        <div class="g-recaptcha recaptcha" id="idrecaptcha" required></div>
                        <div class="form-group text-right">
                            <button class="btn btn-green" id="btn-daftar">Daftar</button>
                            <a href="">Sudah punya akun?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 text-center pull-left">
                <div class="login-socialmedia register-socialmedia">
                    <p>Atau masuk melalui</p>
                    <a href="<?php echo facebook(); ?>" class="login-facebook"><span class="ic ic-facebook"></span>facebook</a>
                    <a href="<?php echo site_url('omni/twitter/twitter');?>" class="login-twitter"><span class="ic ic-twitter"></span>twitter</a>
                    <a href="<?php echo google(); ?>" class="login-google"><span class="ic ic-Google"></span>google</a>
                    <a href="<?php echo linkedin(); ?>" class="login-linkedin"><span class="ic ic-linkedin"></span>Linkedin</a>
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
                $('#type-pass').html('<i class="fa fa-info"></i> Password kurang dari 8');
                $('#type-pass').show();
                return;
            }
            else {
                $('#type-pass').html('');
                $('#type-pass').hide();
                return;
            }

            if(pass !== repass) {
                $('#type-repass').html('<i class="fa fa-info"></i> Password tidak sama');
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
                $('#type-repass').html('<i class="fa fa-info"></i> Password tidak sama');
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
                recaptcha = $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val();
            if(name !== '' && mail !== '' && pass !== '' && repass !== '') {
                e.preventDefault();
                if(recaptcha !== '') {
                    $('#form-reg').submit();
                }
                else {
                    alert('Captcha harus di isi!');
                }
            }
        });

        $('#pass').keyup(function() {
            var values = $(this).val(), the_return = passwordStrength(values); console.log(the_return);
            document.getElementById("strength-desc").innerHTML = the_return.descstrength;
            document.getElementById("strength-gauge").className = the_return.strength;
        });
    });
</script>