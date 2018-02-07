<link rel="stylesheet" href="<?php echo base_url('assetsfront/air-datepicker/dist/css/datepicker.min.css'); ?>">
<script src="<?php echo base_url('assetsfront/air-datepicker/dist/js/datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assetsfront/air-datepicker/dist/js/i18n/datepicker.en.js'); ?>"></script>

<section>
   <div class="container-fluid">
      <div class="row bg-white">
         <div class="col-md-3 col-sm-3 sidemenu-left acc-menu">
            <div class="menu-account">
               <div class="avatar-account">
                  <div class="photo-account">
                     <img src="<?php echo $img_link; ?>">
                  </div>
                  <h3><?php echo @$userdata['namefront']; ?></h3>
               </div>
               <ul>
                  <li class="acc_notif">
                     <a href="<?php echo site_url('notification'); ?>">
                     <span class="ic_menu"><i ></i></span> Notifikasi <!--span>10</span--></a>
                  </li>
                  <li class="acc_transaction">
                     <a href="<?php echo site_url('transaction'); ?>">
                     <span class="ic_menu"><i ></i></span> Transaksi</a>
                  </li>
                  <li class="acc_npl">
                     <a href="<?php echo site_url('npl_dashboard'); ?>">
                     <span class="ic_menu"><i ></i></span> NPL Management</a>
                  </li>
                  <li class="acc_setting active">
                     <a href="<?php echo site_url('dashboard'); ?>">
                     <span class="ic_menu"><i ></i></span> Pengaturan</a>
                  </li>
                  <li class="acc_favorite">
                     <a href="<?php echo site_url('favorite'); ?>">
                     <span class="ic_menu"><i ></i></span> Favorit</a>
                  </li>
                  <li class="acc_price">
                     <a href="<?php echo site_url('basic-price'); ?>">
                     <span class="ic_menu"><i ></i></span> Harga Dasar</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-9 col-sm-9 am-right">
            <div class="main-management">
               <h2>Pengaturan Akun</h2>
               <div class="setting-profile">
               <form class="clearfix" action="<?php echo site_url('akun/dasbor'); ?>" id="form-dashboard" method="post" data-provide="validation">
                  <input type="hidden" name="UserId" value="<?php echo $content->users->UserId; ?>" />
                  <h3>Ubah Foto Profil</h3>
                  <div class="change-avatar bg-grey">
                     <div class="avatar-bg">
                        <div class="avatar">
                           <img src="<?php echo $img_link; ?>">
                        </div>
                        <a href="" class="icon-camera">
                           <img src="<?php echo base_url('assetsfront/images/icon/ic_camera.png'); ?>" alt="">
                        </a>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <h4>Biodata Diri</h4>
                        <div class="form-group floating-label">
                           <input type="text" name="first_name" id="first_name" class="form-control floating-handle border-radius-none" 
                                    value="<?php echo @$content->users->first_name; ?>">
                           <label class="label-schedule">Nama Depan *</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="last_name" id="last_name" class="form-control floating-handle border-radius-none" 
                                    value="<?php echo @$content->users->last_name; ?>">
                           <label class="label-schedule">Nama Belakang</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="upd_email" id="upd_email" class="border-radius-none disabled form-control floating-handle" 
                                    value="<?php echo @$content->users->Email; ?>" 
                                    oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" readonly />
                           <label class="label-schedule">Email *</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="upd_phone" id="upd_phone" class="form-control floating-handle input-custom only-number" 
                                    value="<?php echo @$content->users->Phone; ?>" title="Pastikan nomor dapat menerima SMS" maxlength="13"
                                    oninvalid="this.setCustomValidity('No Telepon tidak boleh kosong')" oninput="setCustomValidity('')" required />
                           <label class="label-schedule">No Telepon *</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="ktp" id="ktp" class="form-control floating-handle input-custom only-number" 
                                    value="<?php echo @$content->users->IdentityNumber; ?>" maxlength="16"
                                    oninvalid="this.setCustomValidity('KTP tidak boleh kosong')" oninput="setCustomValidity('')" required />
                           <label class="label-schedule">No KTP *</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" id="npwp" name="npwp" class="border-radius-none form-control floating-handle only-number" 
                                    value="<?php echo @$content->users->NpwpNumber; ?>" />
                           <label class="label-schedule">NPWP</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="idcard" id="idcard" class="border-radius-none form-control floating-handle" 
                                    value="<?php echo @$content->users->MemberCardTMP; ?>" title="Hanya diisi bila memiliki kartu anggota IBID" />
                           <label class="label-schedule">Nomor Kartu Anggota</label>
                           <div class="help-info">
                              <i class="fa fa-info"></i> Kartu anggota yang dimiliki oleh pnegguna IBID yang telah terdaftar sebelumnya
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <h4>Akun Bank</h4>
                        <div class="form-group floating-label">
                           <select class="form-control font-theme select-custom" name="bankid" id="bankid"
                                    oninvalid="this.setCustomValidity('Nama bank tidak boleh kosong')" 
                                    onchange="setCustomValidity('')" required>
                              <option value="">Pilih *</option>
                              <?php foreach($listBank as $row) { ?>
                              <option value="<?php echo $row->BankId; ?>" <?php echo (@$content->users->BankId == $row->BankId) ? 'selected' : ''; ?>><?php echo $row->BankName; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="norek" class="form-control floating-handle input-custom only-number" 
                                    value="<?php echo @$content->users->BankAccountNumber; ?>" id="norek" maxlength="16"
                                    oninvalid="this.setCustomValidity('Nomor rekening tidak boleh kosong')" oninput="setCustomValidity('')"
                                    title="IBID membutuhkan nomor rekening anda untuk pengembalian deposit atau transfer dana hasil lelang. Pastikan nomor rekening sudah benar" required />
                           <label class="label-schedule">Nomor Rekening *</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="rekname" class="form-control floating-handle input-custom" 
                                    value="<?php echo @$content->users->BankAccountName; ?>" id="atna"
                                    oninvalid="this.setCustomValidity('Atas nama tidak boleh kosong')" oninput="setCustomValidity('')" required />
                           <label class="label-schedule">Atas Nama *</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="branchbank" class="border-radius-none form-control floating-handle"
                                    value="<?php echo @$content->users->BankBranch; ?>" />
                           <label class="label-schedule">Kantor Cabang</label>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <h4>Biodata</h4>
                        <div class="form-group floating-label">
                           <select class="form-control font-theme select-custom" name="gender">
                              <option value="">Jenis Kelamin</option>
                              <option value="1" <?php echo (@$content->users->Gender === 1) ? 'selected' : ''; ?>>Laki-laki</option>
                              <option value="2" <?php echo (@$content->users->Gender === 2) ? 'selected' : ''; ?>>Perempuan</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <div class="input-group date">
                              <input type="text" class="border-radius-none disabled-white form-control floating-handle height-50px" id="tgl-lahir" name="dob" 
                                       placeholder="Tanggal Lahir" value="<?php echo @$content->users->Birthdate; ?>" readonly>
                              <span class="input-group-addon cursor-pointer" id="tgl-lahir-span">
                                 <i class="fa fa-calendar"></i>
                              </span>
                           </div>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="address" class="border-radius-none form-control floating-handle" value="<?php echo @$content->users->Address; ?>">
                           <label class="label-schedule">Alamat</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="city" class="border-radius-none form-control floating-handle" value="<?php echo @$content->users->City; ?>">
                           <label class="label-schedule">Kota</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="okup" class="border-radius-none form-control floating-handle" value="<?php echo @$content->users->Occupation; ?>">
                           <label class="label-schedule">Pekerjaan</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-button text-right">
                     <button class="btn btn-grey bg-grey" id="btn-reset">Reset</button>
                     <button class="btn btn-green" id="btn-update">Simpan</button>
                  </div>
               </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<style>
   .datepicker--cell.-current- {
      color: #8BC34A !important;
   }
   .datepicker--cell.-selected- {
      background: #8BC34A !important;
   }
</style>

<script>
   // handle field
   $('input').each(function() {
      if($(this).val() !== '') {
         $(this).addClass('not-empty');
      }
   });

   $('#btn-update').click(function(e) {
      var firstName  = $('#first_name').val(),
            notlp    = $('#upd_phone').val(),
            ktp      = $('#ktp').val(),
            bankid   = $('#bankid').val(),
            norek    = $('#norek').val(),
            atasnama = $('#atna').val();
      if(firstName !== '' && notlp !== '' && ktp !== '' && norek !== '' && atasnama !== '') {
         e.preventDefault();
         if(bankid == '') {
            bootoast.toast({
               message: 'Nama BANK harus diisi',
               type: 'warning',
               position: 'top-center',
               timeout: 3
            });
            return;
         }
         else if(ktp.length < 16) {
            bootoast.toast({
               message: 'No KTP harus diisi 16 angka',
               type: 'warning',
               position: 'top-center',
               timeout: 3
            });
            return;
         }
         else {
            $('#btn-update').attr('disabled', true);
            $('#form-dashboard').submit();
            return;
         }
      }
   });

   $('#btn-reset').click(function() {
      $('input').each(function() {
         if(!$(this).is('[readonly]')) {
            $(this).val('');

            if($(this).hasClass('not-empty') === true) {
               $(this).removeClass('not-empty');
            }
         }
      });

      $('input').each(function() {
         if($(this).val() === '') {
            $(this).addClass('empty');
         }
      });
   });

   // datepicker
   $('#tgl-lahir').datepicker({
      language: 'en',
      maxDate: new Date(),
      dateFormat: 'dd/mm/yyyy',
      autoClose: true
   });
   $('#tgl-lahir-span').click(function() {
      $('#tgl-lahir').focus();
   });
</script>