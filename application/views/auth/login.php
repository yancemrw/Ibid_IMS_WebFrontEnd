<section class="section-register">
    <div class="container">
        <div class="row position-repative">
            <div class="col-md-4 col-sm-6 pull-right">
                <div class="form-register">
                    <form>
                        <h3>Masuk Akun</h3>
                         <div class="form-group floating-label">
                            <input type="text" name="" class="form-control input-custom is-invalid" required>
                            <label class="label-schedule">Nama</label>
                          </div>
                        <div class="form-group floating-label">
                            <input type="email" name="" class="form-control input-custom is-invalid" required>
                             <label class="label-schedule">Email</label>
                        </div>
                        <div class="g-recaptcha" data-theme="light" data-sitekey="XXXXXXXXXXXXX" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">
                            </div>
                        <div class="form-group text-right">
                            <button class="btn btn-green">Masuk</button>
                            <a href="">Sudah punya akun?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 text-center pull-left">
                <div class="login-socialmedia logins-socialmedia">
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
            topSpacing:0
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