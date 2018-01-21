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
                  <li class="acc_notif"><a href="am-notifikasi.html">
                     <span class="ic_menu"><i ></i></span> Notifikasi <span>10</span></a>
                  </li>
                  <li class="acc_transaction"><a href="am-transaksi.html"> <span class="ic_menu"><i ></i></span> Transaksi</a></li>
                  <li class="acc_npl"><a href="am-management.html"> <span class="ic_menu"><i ></i></span>  NPL Management</a></li>
                  <li class="acc_setting active"><a href="am-ubah-profil.html"> <span class="ic_menu"><i ></i></span>  Pengaturan</a></li>
                  <li class="acc_favorite"><a href="am-whislist.html">  <span class="ic_menu"><i ></i></span> Favorit</a></li>
                  <li class="acc_price"><a href="am-harga-dasar.html">  <span class="ic_menu"><i ></i></span>  Harga Dasar</a></li>
               </ul>
            </div>
         </div>
         <div class="col-md-9 col-sm-9 am-right">
            <div class="main-management">
               <h2>Pengaturan</h2>
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
                           <img src="assets/images/icon/ic_camera.png" alt="">
                        </a>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <h4>Akun Pengguna</h4>
                        <div class="form-group floating-label">
                           <input type="text" name="upd_name" id="upd_name" class="form-control floating-handle" 
                                    value="<?php echo @$content->users->first_name.' '.$content->users->last_name; ?>">
                           <label class="label-schedule">Nama <span class="font-red">*</span></label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" id="upd_email" class="form-control floating-handle" 
                                    value="<?php echo @$content->users->Email; ?>" disabled />
                           <input type="hidden" name="upd_email" value="<?php echo @$content->users->Email; ?>">
                           <label class="label-schedule">Email <span class="font-red">*</span></label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="ktp" id="ktp" class="form-control floating-handle input-custom only-number" 
                                    value="<?php echo @$content->users->IdentityNumber; ?>" 
                                    oninvalid="this.setCustomValidity('KTP tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                           <label class="label-schedule">No KTP <span class="font-red">*</span></label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="upd_phone" id="upd_phone" class="form-control floating-handle input-custom only-number" 
                                    value="<?php echo @$content->users->Phone; ?>" 
                                    oninvalid="this.setCustomValidity('No Telepon tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                           <label class="label-schedule">No Telepon <span class="font-red">*</span></label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" id="npwp" name="npwp" class="form-control floating-handle input-custom only-number" 
                                    value="<?php echo @$content->users->NpwpNumber; ?>" 
                                    oninvalid="this.setCustomValidity('NPWP tidak boleh kosong')" 
                                    oninput="setCustomValidity('')" required />
                           <label class="label-schedule">NPWP <span class="font-red">*</span></label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="idcard" id="idcard" class="form-control floating-handle" 
                                    value="<?php echo @$content->users->MemberCardTMP; ?>" />
                           <label class="label-schedule">Nomor Kartu Anggota</label>
                           <div class="help-info">
                              <i class="fa fa-info"></i> Kartu anggota yang dimiliki oleh pnegguna IBID yang telah terdaftar sebelumnya
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <h4>Akun Bank</h4>
                        <div class="form-group floating-label">
                           <select class="form-control font-theme select-custom" name="bankid">
                           <?php foreach($listBank as $row) { ?>
                             <option value="<?php echo $row->BankId; ?>" <?php echo (@$content->users->BankId == $row->BankId) ? 'selected' : ''; ?>><?php echo $row->BankName; ?></option>
                           <?php } ?>
                           </select>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="norek" class="form-control floating-handle input-custom only-number" 
                                    value="<?php echo $content->users->BankAccountNumber; ?>" />
                           <label class="label-schedule">Nomor Rekening</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="rekname" class="form-control floating-handle input-custom" value="<?php echo $content->users->BankAccountName; ?>" />
                           <label class="label-schedule">Atas Nama</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="" class="form-control floating-handle" />
                           <label class="label-schedule">Kantor Cabang</label>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <h4>Biodata</h4>
                        <div class="form-group floating-label">
                           <select class="form-control font-theme select-custom" name="gender">
                              <option>Jenis Kelamin</option>
                              <option <?php echo ($content->users->Gender === '1') ? 'selected' : ''; ?>>Laki-laki</option>
                              <option <?php echo ($content->users->Gender === '2') ? 'selected' : ''; ?>>Perempuan</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <div class="input-group date">
                              <input type="text" class="form-control floating-handle input-custom" id="tgl-lahir" name="dob" 
                                       placeholder="Tanggal Lahir *" data-provide="datepicker" data-date-format="yyyy-mm-dd" 
                                       value="<?php echo $content->users->Birthdate; ?>" 
                                       oninvalid="this.setCustomValidity('Tanggal lahir tidak boleh kosong')" 
                                       oninput="setCustomValidity('')" required />
                              <span class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                              </span>
                           </div>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="city" class="form-control floating-handle" value="<?php echo $content->users->City; ?>">
                           <label class="label-schedule">Kota</label>
                        </div>
                        <div class="form-group floating-label">
                           <textarea type="text" name="address" class="form-control floating-handle" rows="5"><?php echo $content->users->Address; ?></textarea>
                           <label class="label-schedule">Alamat</label>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="okup" class="form-control floating-handle">
                           <label class="label-schedule">Okupasi</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-button text-right">
                     <button class="btn btn-grey bg-grey">Reset</button>
                     <button class="btn btn-green" id="btn-update">Simpan</button>
                  </div>
               </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> 

<script>
   // ***** handle ktp and npwp *****
   if($('#ktp').val() !== '') {
      $('#npwp').prop('disabled', true).css({'background':'#E0E0E0', 'z-index':'1'});
   }
   else if($('#npwp').val() !== '') {
      $('#ktp').prop('disabled', true).css({'background':'#E0E0E0', 'z-index':'1'});
   }

   $('#ktp').blur(function() {
      if($(this).val() !== '') {
         $('#npwp').prop('disabled', true).css({'background':'#E0E0E0', 'z-index':'1'});
      }
      else {
         $('#npwp').prop('disabled', false).css({'background':'none', 'z-index':'8'});
      }
   });

   $('#npwp').blur(function() {
      if($(this).val() !== '') {
         $('#ktp').prop('disabled', true).css({'background':'#E0E0E0', 'z-index':'1'});
      }
      else {
         $('#ktp').prop('disabled', false).css({'background':'none', 'z-index':'8'});
      }
   });
   // *******************************

   // handle field
   $('input').each(function() {
      if($(this).val() !== '') {
         $(this).addClass('not-empty');
      }
   });
</script>