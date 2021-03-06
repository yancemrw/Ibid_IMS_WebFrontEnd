<section class="section-register">
    <div class="container">
        <div class="row position-repative">
            <div class="col-md-4 col-sm-6 pull-right">
                <div class="form-register">
                    <form id="form-login" action="<?php echo site_url('login'); ?>" method="POST" data-provide="validation">
                        <h3>Masuk Akun</h3>
                        <div class="form-group floating-label">
                            <input type="email" id="username" name="username" class="form-control input-custom is-invalid" 
                                    oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Email</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="password" id="password" name="password" class="form-control input-custom is-invalid" 
                                    oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Password</label>
                        </div>
                        <!--div class="g-recaptcha" data-theme="light" data-sitekey="XXXXXXXXXXXXX" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div-->
                        <div class="form-group text-right">
                            <button class="btn btn-green" id="btn-login">Masuk</button>
                            <a href="">Sudah punya akun?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 text-center pull-left">
                <div class="login-socialmedia register-socialmedia margin-top-80px">
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

        $("#id-card").on("focus", function(e) {
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

    });
</script>