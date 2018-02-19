<section class="section section-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="box-forgot-pass">
                    <form method="POST" id="new-forgot" action="<?php echo site_url('newpassword'); ?>" data-provide="validation">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="changepassword" value="<?php echo $changepassword; ?>">
                        <img src="<?php echo base_url('assetsfront/images/icon/ic-reset-pass.png'); ?>">
                        <h2>Ubah kata sandi anda</h2>
                        <p>Masukkan kata sandi baru</p>
                        <div class="form-group floating-label">
                            <input type="password" name="password" id="password" class="form-control input-custom"
                                    oninvalid="this.setCustomValidity('Sandi baru tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Sandi Baru</label>
                        </div>
                        <div class="form-group floating-label">
                            <input type="password" name="repassword" id="repassword" class="form-control input-custom"
                                    oninvalid="this.setCustomValidity('Sandi baru tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Ulangi Sandi Baru</label>
                        </div>
                        <button class="btn btn-green" id="kirim-ulangsandi">Kirim</button>
                    </form>
                </div>         
            </div>
        </div>
    </div>
</section>

<script>
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
    $('#kirim-ulangsandi').click(function(e) {
        var pass = $('#password').val(), repass = $('#repassword').val();
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        if(pass !== '' && repass !== '') {
            e.preventDefault();
            if(pass.length < 8) {
                bootoast.toast({
                    message: 'Kata sandi kurang dari 8',
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
                return;
            }
            else if(pass !== repass) {
                bootoast.toast({
                    message: 'Kata sandi tidak sama',
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
                return;
            }
            else if(format.test(pass)) {
                bootoast.toast({
                    message: 'Kata sandi terdapat simbol',
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
                return;
            }
            else {
                $('#kirim-ulangsandi').attr('disabled', true);
                $('#new-forgot').submit();
            }
        }
    });
</script>