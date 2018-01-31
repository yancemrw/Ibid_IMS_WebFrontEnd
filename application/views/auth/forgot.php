<section class="section section-success">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="box-forgot-pass">
          <form name="formSubmit" id="form-submit" method="POST" data-provide="validation">
            <img src="<?php echo base_url('assetsfront/images/icon/ic-forgot-pass.png') ?>">
            <h2>Forgot Your Password</h2>
            <p>Masukkan email anda</p>
            <div class="form-group floating-label">
              <input type="email" id="email" name="email" class="form-control input-custom" required />
              <label class="label-schedule">Email</label>
            </div>
            <button class="btn btn-green" id="btn-kirim">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $('#btn-kirim').click(function(e) {
    if($('#email').val() !== '') {
      e.preventDefault();
      $('#btn-kirim').attr('disabled', true);
    }
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
</script>