<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>
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

<section class="section section-auction">
    <input type="hidden" id="e8df0fade2ce52c6a8cf8c8d2309d08a" />
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6">
                <h2>Keuntungan Beli NPL di IBID?</h2>
                <ul class="auction-info clearfix">
                    <li class="item">
                        <div class="form-info ic ic-Mudah"></div>
                        <div class="content-media">
                            <h2>Proses Mudah dan Aman</h2>
                            <p>Proses pembelian nomor peserta lelang (NPL) dan pembayaran dilakukan secara online di Website IBID dengan berbagai pilihan metode pembayaran yang yang terotentikasi menjamin privasi dan keamanan transaksi online Anda</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="form-info ic ic-Deposit-100_"></div>
                        <div class="content-media">
                            <h2>Deposit 100% Aman & Terjamin</h2>
                            <p>Jika Anda tidak menang lelang Uang deposit dari pembelian NPL akan dikembalikan 100% tanpa potongan apapun.</p>
                        </div>
                    </li>
                    <li class="item">
                        <div class="form-info ic ic-No-NPL"></div>
                        <div class="content-media">
                            <h2>Nomor Peserta Lelang (NPL) Unlimited</h2>
                            <p>Nikmati kemudahan lebih dengan menggunakan NPL Unlimited. Cukup membeli satu NPL yang dapat digunakan untuk mengikuti berbagai jadwal lelang bahkan secara bersamaan dan menawar kendaraan tanpa batasan maksimal.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 col-sm-6">
                <div class="booking-schedule">
                    <h2>Perbaharui Data Anda <span>Hanya di Isi Untuk User Baru</span></h2>
                    <form class="form-filter" id="beli-npl" data-provide="validation">
                        <input type="hidden" name="otpkirim" value="true">
                        <div class="form-group floating-label">
                            <input type="text" name="Phone" id="notif-telepon" class="form-control input-custom" value="<?php echo @$detailBiodata['Phone']; ?>"
                                    oninvalid="this.setCustomValidity('No telepon tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" maxlength="13" required />
                            <label class="label-schedule">No Telepon *</label>
                            <div class="help-info help-info-1">
                                <i class="fa fa-info"></i> Pastikan nomor handphone yang Anda masukan aktif
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
                                    oninput="setCustomValidity('')" maxlength="16" required />
                            <label class="label-schedule">Nomor Rekening *</label>
                            <div class="help-info help-info-2">
                                <i class="fa fa-info"></i> Nomor rekening merupakan nomor rekening yang di gunakan 
                                ibid untuk pengembalian deposit. mohon periksa nomor 
                                rekening tersebut dengan benar
                            </div>
                        </div>
                        <div class="form-group floating-label">
                            <input type="text" name="BankAccountName" class="form-control input-custom" 
                                    value="<?php echo @$detailBiodata['BankAccountName']; ?>" oninvalid="this.setCustomValidity('Atas nama tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Atas Nama *</label>
                        </div>
                        <div class="form-group floating-label" id="ktp">
                            <input type="text" name="IdentityNumber" class="form-control input-custom" maxlength="16" 
                                    value="<?php echo @$detailBiodata['IdentityNumber']; ?>"
                                    oninvalid="this.setCustomValidity('Nomor KTP tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                            <label class="label-schedule">Nomor KTP *</label>
                        </div>
                        <div class="g-recaptcha recaptcha" id="idrecaptcha" required></div>
                        <div class="input-group agree-required">
                            <input type="checkbox" name="checkbox" id="agree-required" class="cursor-pointer">
                            <label for="agree-required">Dengan melakukan pendaftaran, saya setuju dengan <a href="javascript:void(0)">Kebijakan Privasi</a> dan <a href="javascript:void(0)">Syarat & Ketentuan</a> IBID.</label>
                        </div>
                        <button class="btn btn-green" id="btn-kirim">KIRIM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
  $('.auction-info').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
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
          recaptcha = $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val();
      if(phone !== '' && bankid !== '' && bankacc !== '' && bankname !== '' && ktp !== '') {
          if(ktp.length < 16) {
              bootoast.toast({
                  message: 'Nomor KTP harus 16 angka!',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else if(recaptcha === '') {
              bootoast.toast({
                  message: 'Captcha harus di isi!',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else if($('#agree-required').is(":checked") === false) {
              bootoast.toast({
                  message: 'Anda harus setuju dengan syarat dan ketentuan dari kami!',
                  type: 'warning',
                  position: 'top-center'
              });
              return false;
          }
          else {
              $('#btn-kirim').attr('disabled', true);
              $.ajax({
                type: 'POST',
                url: '<?php echo site_url("biodata/otp"); ?>',
                data: 'Phone='+phone+'&BankId='+bankid+'&BankAccountNumber='+bankacc+'&BankAccountName='+bankname+'&IdentityNumber='+ktp+'&otpkirim='+otpkirim,
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
                    $('#btn-kirim').attr('disabled', false);
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
                },
                error: function() {
                  $('#btn-kirim').attr('disabled', false);
                  bootoast.toast({
                    message: 'Terjadi Error Pada Server',
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
  });

  // handle only number
  $('input[name="Phone"]').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    return ((charCode >= 48 && charCode <= 57) || charCode === 46);
  });

  $('input[name="BankAccountNumber"]').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    return ((charCode >= 48 && charCode <= 57) || charCode === 46);
  });

  $('input[name="IdentityNumber"]').keypress(function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    return ((charCode >= 48 && charCode <= 57) || charCode === 46);
  });
</script>
