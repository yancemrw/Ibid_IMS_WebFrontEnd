<!--script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script-->
<script>
  /*var verifyCallback = function(response) {
    $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val(response);
  };
  var onloadCallback = function() {
    grecaptcha.render('idrecaptcha', {
      'sitekey'   : '6Lee4z8UAAAAAG8bdnCYM-ZKfsRa6fniZlq5HTRn',
      'callback'  : verifyCallback,
      'theme'     : 'light'
    });
  };*/

  // load mobil nabrak plang iBid
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('preloader').style.display = 'block';
    preload(1);
  });
</script>

<section class="section section-auction">
    <input type="hidden" id="e8df0fade2ce52c6a8cf8c8d2309d08a" />
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6">
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
                <div class="booking-schedule">
                    <h2>Lengkapi data Anda <span>* Khusus pengguna baru</span></h2>
                    <form class="form-filter" id="beli-npl" data-provide="validation">
                        <input type="hidden" name="otpkirim" value="true">
                        <div class="form-group floating-label">
                            <input type="text" name="Phone" id="notif-telepon" class="form-control input-custom" 
                                    value="<?php echo @$detailBiodata['Phone']; ?>"
                                    oninvalid="this.setCustomValidity('No telepon tidak boleh kosong')" 
                                    onkeypress="setCustomValidity('')" maxlength="13" required />
                            <label class="label-schedule">No Telepon *</label>
                            <div class="help-info help-info-1">
                                <i class="fa fa-info"></i> Pastikan nomor telepon aktif
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control select-custom" name="BankId" 
                                    oninvalid="this.setCustomValidity('Tipe bank tidak boleh kosong')" 
                                    onchange="setCustomValidity('')" required>
                                <option value="">Bank *</option>
                                <?php foreach($listBank as $row){ ?>
                                <option value="<?php echo $row->BankId; ?>" <?php echo (@$detailBiodata['BankId'] == $row->BankId) ? 'selected' : ''; ?>><?php echo $row->BankName; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group floating-label">
                            <input type="text" name="BankAccountNumber" id="notif-rekening" class="form-control input-custom" 
                                    value="<?php echo @$detailBiodata['BankAccountNumber']; ?>" 
                                    oninvalid="this.setCustomValidity('Nomor rekening tidak boleh kosong')" 
                                    onkeypress="setCustomValidity('')" maxlength="16" required />
                            <label class="label-schedule">Nomor Rekening *</label>
                            <div class="help-info help-info-2">
                                <i class="fa fa-info"></i> IBID membutuhkan nomor rekening Anda untuk pengembalian deposit. Pastikan nomor rekening sudah benar.
                            </div>
                        </div>
                        <div class="form-group floating-label">
                            <input type="text" name="BankAccountName" class="form-control input-custom" 
                                    value="<?php echo @$detailBiodata['BankAccountName']; ?>" 
                                    oninvalid="this.setCustomValidity('Atas nama tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" maxlength="250" required />
                            <label class="label-schedule">Atas Nama *</label>
                        </div>
                        <div class="form-group floating-label" id="ktp">
                            <input type="text" name="IdentityNumber" class="form-control input-custom" 
                                    value="<?php echo @$detailBiodata['IdentityNumber']; ?>"
                                    oninvalid="this.setCustomValidity('Nomor KTP tidak boleh kosong')" 
                                    onkeypress="setCustomValidity('')" maxlength="16" required />
                            <label class="label-schedule">Nomor KTP *</label>
                        </div>
                        <div>
                          <input type="text" name="captchaText" class="captchaClass" size="10" maxlength="5" />
                          <img id="idrecaptcha" src="" />
                          <img src="<?php echo base_url('assetsfront/images/icon/refresh_captcha.jpg'); ?>" class="cursor-pointer" width="25" onclick="getCaptcha()" />
                        </div>
                        <div class="input-group agree-required">
                            <input type="checkbox" name="checkbox" id="agree-required" class="cursor-pointer">
                            <label for="agree-required">Dengan melakukan pendaftaran, saya setuju dengan <a href="javascript:void(0)" data-toggle="modal" data-target="#privacy-modal">Kebijakan Privasi</a> dan <a href="javascript:void(0)" data-toggle="modal" data-target="#bijak-modal">Syarat & Ketentuan</a> IBID.</label>
                        </div>
                        <button class="btn btn-green" id="btn-kirim">KIRIM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODAL PRIVASI -->
<div class="modal fade" id="privacy-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog width-80">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="ic ic-Close"></i><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">Kebijakan Privasi</h3>
      </div>
      <div class="modal-body clearfix">
        <div class="col-md-12 col-sm-12">
          <?php $this->load->view('userguide/privacy_policy.html'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL Syarat & Ketentuan -->
<div class="modal fade" id="bijak-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog width-60">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="ic ic-Close"></i><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">Syarat & Ketentuan IBID</h3>
      </div>
      <div class="modal-body clearfix">
        <div class="col-md-12 col-sm-12">
          <?php $this->load->view('userguide/syarat_ketentuan.html'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var return_captcha = '';
  getCaptcha();
  var count_slide = '<?php echo count($cms->titip); ?>';
  $('.auction-info').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: count_slide,
    slidesToScroll: count_slide,
    prevArrow: false,
    nextArrow: false,
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
  
  $('.input-group.date').datepicker({
     format: "dd/mm/yyyy"
  });

  $("input[name$='tipe-object']").click(function() {
     var test = $(this).val();

     $(".desc-object").hide();
     $("#object" + test).show();
  });

  $('input').blur(function(){
     tmpval = $(this).val();
     if(tmpval == '') {
         $(this).addClass('empty');
         $(this).removeClass('not-empty');
     } else {
         $(this).addClass('not-empty');
         $(this).removeClass('empty');
     }
  });

  // handle input if exists data
  $('input').each(function() {
    if($(this).val() !== '') {
      $(this).addClass('not-empty');
    }
  });

  $('.lang-mob a').click(function(){
    $('.help-mob ul').removeClass('open')
    $(this).toggleClass('opened')
    $(this).siblings('ul').toggleClass('open')
  })
  $('.help-mob a').click(function(){
    $('.lang-mob ul').removeClass('open')
    $(this).toggleClass('opened')
    $(this).siblings('ul').toggleClass('open')
  })


  $("#notif-rekening").on("focus", function( e ) {
    $('.help-info-2').show();
  });
  $("#notif-telepon").on("focus", function( e ) {
    $('.help-info-1').show();
  });

  // input identity
  $(function() {
    $("#biodata").change(function() {
      if ($(this).val() == "k") {
        $("#ktp").show() && $("#npwp").hide();
      } else if ($(this).val() == "n") {
        $("#npwp").show() && $("#ktp").hide();
      } else {
        $("#npwp").hide() && $("#ktp").hide();
      }
    });
  });

  // handle button kirim
  $('#btn-kirim').click(function(e) {
      var phone     = $('input[name="Phone"]').val(), 
          bankid    = $('select[name="BankId"]').val(), 
          bankacc   = $('input[name="BankAccountNumber"]').val(), 
          bankname  = $('input[name="BankAccountName"]').val(),
          ktp       = $('input[name="IdentityNumber"]').val(),
          otpkirim  = $('input[name="otpkirim"]').val(),
          recaptcha = $('input[name="captchaText"]').val();
      if(phone !== '' && bankid !== '' && bankacc !== '' && bankname !== '' && ktp !== '') {
          if(numberOnly(phone) === false) {
              bootoast.toast({
                  message: 'Nomor Telepon harus angka',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else if(numberOnly(bankacc) === false) {
              bootoast.toast({
                  message: 'Nomor Rekening harus angka',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else if(numberOnly(ktp) === false) {
              bootoast.toast({
                  message: 'Nomor KTP harus angka',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else if(ktp.length < 16) {
              bootoast.toast({
                  message: 'Nomor KTP harus 16 angka!',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else if(recaptcha === '') {
              bootoast.toast({
                  message: 'Mohon ketik CAPTCHA untuk melanjutkan',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else if($('#agree-required').is(":checked") === false) {
              bootoast.toast({
                  message: 'Silahkan centang untuk menyetujui Syarat & Ketentuan juga Kebijakan Privasi IBID',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else {
              var checking = checkCaptcha(recaptcha); console.log(checking);
              if(checking === 'false') {
                  bootoast.toast({
                      message: 'Captcha yang anda ketik salah, silahkan coba kembali',
                      type: 'warning',
                      position: 'top-center'
                  });
                  return false;
              }
              else {
                  $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url("biodata/otp"); ?>',
                    data: 'Phone='+phone+'&BankId='+bankid+'&BankAccountNumber='+bankacc+'&BankAccountName='+bankname+'&IdentityNumber='+ktp+'&otpkirim='+otpkirim+'&otpsource=npl',
                    beforeSend: function() {
                      $('#btn-kirim').attr('disabled', true).html('Kirim <i class="fa fa-spin fa-refresh" style="position:absolute; margin-top:3px; right:87px; z-index:1;"></i>');
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
                        setTimeout(function() {
                          location.href = data.redirect;
                        }, 1500);
                      }
                      else {
                        $('#btn-kirim').attr('disabled', false).html('Kirim');
                        bootoast.toast({
                          message: data.messages,
                          type: 'warning',
                          position: 'top-center',
                          timeout: 4
                        });
                        if(data.redirect !== 'ktp') location.href = data.redirect;
                      }
                    },
                    error: function() {
                      $('#btn-kirim').attr('disabled', false).html('Kirim');
                      bootoast.toast({
                        message: 'Terjadi kesalahan saat koneksi ke server',
                        type: 'warning',
                        position: 'top-center',
                        timeout: 3
                      });
                    }
                  });
                  //$('#beli-npl').submit();
                  return false;
              }
          }
      }
  });

  // handle input number for mobile and website
  function checkey(ele, event, max) {
    if($(ele).val().length >= max) {
      $(ele).val($(ele).val().substr(0, max));
    }
  }

  function getCaptcha() {
    $('#idrecaptcha').attr({
      src:'<?php echo base_url('captcha/newCaptcha'); ?>?rnd='+Math.random(),
    });
  }

  function checkCaptcha(value) {
    $.ajax({
      url: '<?php echo base_url('captcha/checkCaptcha'); ?>',
      type: 'GET',
      data: 'code='+value,
      async: false,
      beforeSend: function() {
        console.log('Checking Captcha...');
      },
      success: function(data) {
        return_captcha = data;
      }
    });
    return return_captcha;
  }
</script>
