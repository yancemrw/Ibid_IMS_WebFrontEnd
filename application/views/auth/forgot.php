<section class="section section-success">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="box-forgot-pass">
          <form name="formSubmit" id="form-submit" method="POST" action="<?php echo site_url('forgot'); ?>" data-provide="validation">
            <img src="<?php echo base_url('assetsfront/images/icon/ic-forgot-pass.png') ?>">
            <h2>Atur ulang kata sandi</h2>
            <p>Masukkan email Anda</p>
            <div class="form-group floating-label">
              <input type="email" id="email" name="email" class="form-control input-custom"
                      pattern="[^@]*@[^@]" oninput="setCustomValidity('')"
                      oninvalid="this.setCustomValidity('Email tidak boleh kosong')" required />
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
    var email = $('#email').val();
    if(email !== '') {
      e.preventDefault();
      if(validateEmail(email)) {
        $('#form-submit').submit();
        $('#btn-kirim').attr('disabled', true);
      }
      else {
        bootoast.toast({
          message: 'Format email tidak valid',
          type: 'warning',
          position: 'top-right'
        });
        $('#btn-kirim').attr('disabled', false);
      }
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

  function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
</script>