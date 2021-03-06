<section class="section section-auction">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
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
            <div class="col-md-5">
                <div class="booking-schedule">
                    <h2>Perbaharui Data Anda <span>Hanya di Isi Untuk User Baru</span></h2>
                    <form class="form-filter" id="beli-npl" action="<?php echo site_url('biodata/otp'); ?>" method="POST" data-provide="validation">
                        <input type="hidden" name="otpkirim" value="true">
                        <div class="form-group floating-label">
                            <input type="number" name="Phone" id="notif-telepon" class="form-control input-custom" value="<?php echo @$detailBiodata['Name']; ?>"
                                    oninvalid="this.setCustomValidity('No telepon tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" maxlength="13" required />
                            <label class="label-schedule">No Telepon <span class="font-red">*</span></label>
                            <div class="help-info help-info-1">
                                <i class="fa fa-info"></i> Pastikan nomor handphone yang Anda masukan aktif
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control select-custom" name="BankId" 
                                    oninvalid="this.setCustomValidity('Tipe bank tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required>
                                <option value="">Bank <span class="font-red">*</span></option>
                                <?php foreach($listBank as $row){ ?>
                                <option value="<?php echo $row->BankId; ?>" <?php echo (@$detailBiodata['BankId'] == $row->BankId) ? 'selected' : ''; ?>><?php echo $row->BankName; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group floating-label">
                            <input type="text" name="BankAccountNumber" id="notif-rekening" class="form-control input-custom" 
                                    value="<?php echo @$detailBiodata['BankAccountNumber']; ?>" 
                                    oninvalid="this.setCustomValidity('Nomor rekening tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" maxlength="13" required />
                            <label class="label-schedule">Nomor Rekening <span class="font-red">*</span></label>
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
                            <label class="label-schedule">Atas Nama <span class="font-red">*</span></label>
                        </div>
                        <div class="form-group">
                            <select class="form-control select-custom" id="biodata" name="Identitas" 
                                    oninvalid="this.setCustomValidity('Tipe identitas tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required>
                                <option value="0">Tipe Identitas Diri</option>
                                <option value="k">Pilih Ktp</option>
                                <option value="n">Pilih Npwp</option>
                            </select>
                        </div>
                        <div class="form-group floating-label" id="ktp" style="display: none;">
                            <input type="text" name="IdentityNumber" class="form-control input-custom" value="<?php echo @$detailBiodata['IdentityNumber']; ?>">
                            <label class="label-schedule">Nomor KTP <span class="font-red">*</span></label>
                        </div>
                        <div class="form-group floating-label" id="npwp" style="display: none;">
                            <input type="text" name="NpwpNumber" class="form-control input-custom" value="<?php echo @$detailBiodata['NpwpNumber']; ?>">
                            <label class="label-schedule">NPWP <span class="font-red">*</span></label>
                        </div>
                        <div class="g-recaptcha recaptcha" id="idrecaptcha" required></div>
                        <div class="input-group agree-required">
                            <input type="checkbox" name="checkbox" id="agree-required">
                            <label for="agree-required">Dengan melakukan pendaftaran, saya setuju dengan <a href="">Kebijakan Privasi</a> dan <a href="">Syarat & Ketentuan</a> IBID.</label>
                        </div>
                        <button class="btn btn-green" id="btn-kirim">KIRIM</button>
                    </form>
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

    $(".select-custom").select2({
       minimumResultsForSearch: -1
    });

    $('.input-group.date').datepicker({
       format: "dd//mm/yyyy"
    });

    $("input[name$='tipe-object']").click(function() {
       var test = $(this).val();

       $(".desc-object").hide();
       $("#object" + test).show();
    });

    $('.auction-info').slick({
       dots: false,
       infinite: false,
       speed: 300,
       prevArrow: false,
       nextArrow: false,
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
          identity  = $('select[name="Identitas"]').val(),
          ktp       = $('input[name="IdentityNumber"]'),
          recaptcha = $('#e8df0fade2ce52c6a8cf8c8d2309d08a').val();
        if(phone !== '' && bankid !== '' && bankacc !== '' && bankname !== '' && identity !== '' && ktp !== '') {
          e.preventDefault();
          if($('#agree-required').is(":checked") === false) {
              alert('Anda harus setuju dengan syarat dan ketentuan dari kami!');
          }
          else if(recaptcha !== '') {
              $('#beli-npl').submit();
          }
          else {
              alert('Captcha harus di isi!');
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

    $('input[name="NpwpNumber"]').keypress(function(event) {
      var charCode = (event.which) ? event.which : event.keyCode;
      return ((charCode >= 48 && charCode <= 57) || charCode === 46);
    });

    // handle input if exists data
    $('input').each(function() {
      if($(this).val() !== '') {
        $(this).addClass('not-empty');
      }
    });
  });
</script>
