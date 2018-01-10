<section>
   <div class="container-fluid">
      <div class="row bg-white">
         <div class="col-md-3 col-sm-3 sidemenu-left acc-menu">
            <div class="menu-account">
               <div class="avatar-account">
                  <div class="photo-account">
                     <img src="https://instagram.fjkt1-1.fna.fbcdn.net/t51.2885-15/e35/25023178_125021498293801_6299328116707819520_n.jpg" alt="">
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
                  <h3>Ubah Foto Profil</h3>
                  <div class="change-avatar bg-grey">
                     <div class="avatar-bg">
                        <div class="avatar">
                           <img src="https://instagram.fjkt1-1.fna.fbcdn.net/t51.2885-15/e35/25023178_125021498293801_6299328116707819520_n.jpg" alt="">
                        </div>
                        <a href="" class="icon-camera">
                           <img src="assets/images/icon/ic_camera.png" alt="">
                        </a>
                     </div>
                  </div>
                  <form class="clearfix">

                     <?php /*print_r(@$userdata);*/ ?>

                     <div class="row">
                        <div class="col-md-6">
                           <h4>Akun Pengguna</h4>
                           <div class="form-group floating-label">
                              <input type="name" name="" class="form-control floating-handle">
                              <label class="label-schedule">Nama</label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="email" name="" class="form-control floating-handle" disabled>
                              <label class="label-schedule">Email</label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" id="ktp" name="ktp" class="form-control floating-handle input-custom only-number">
                              <label class="label-schedule">No KTP <span>*</span></label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" name="" class="form-control floating-handle input-custom only-number">
                              <label class="label-schedule">No Telepon *</label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" id="npwp" name="npwp" class="form-control floating-handle input-custom only-number">
                              <label class="label-schedule">NPWP <span>*</span></label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" name="" id="id-card" class="form-control floating-handle">
                              <label class="label-schedule">Nomor Kartu Anggota</label>
                              <div class="help-info">
                                 <i class="fa fa-info"></i> Kartu anggota yang dimiliki oleh pnegguna IBID yang telah terdaftar sebelumnya
                              </div>
                           </div>
                           <div class="form-group floating-label">
                              <select class="form-control font-theme select-custom">
                                 <option>Tipe identitas *</option>
                                 <option>1</option>
                                 <option>2</option>
                                 <option>3</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <h4>Akun Bank</h4>
                           <div class="form-group floating-label">
                              <select class="form-control font-theme select-custom">
                                 <option>Bank</option>
                                 <option>BCA</option>
                                 <option>MANDIRI</option>
                                 <option>BRI</option>
                              </select>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" name="" class="form-control floating-handle input-custom only-number">
                              <label class="label-schedule">Nomor Rekening</label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" name="" class="form-control floating-handle input-custom">
                              <label class="label-schedule">Atas Nama</label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" name="" class="form-control floating-handle">
                              <label class="label-schedule">Kantor Cabang</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <h4>Biodata</h4>
                           <div class="form-group floating-label">
                              <select class="form-control font-theme select-custom">
                                 <option>Jenis Kelamin</option>
                                 <option>Laki-laki</option>
                                 <option>Perempuan</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <div class="input-group date">
                                 <input type="text" class="form-control floating-handle input-custom" placeholder="Tanggal Lahir *">
                                 <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                 </span>
                              </div>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" name="" class="form-control floating-handle">
                              <label class="label-schedule">Kota</label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" name="" class="form-control floating-handle">
                              <label class="label-schedule">Alamat</label>
                           </div>
                           <div class="form-group floating-label">
                              <input type="text" name="" class="form-control floating-handle">
                              <label class="label-schedule">Okupasi</label>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="form-button text-right">
                  <button class="btn btn-grey bg-grey">Reset</button>
                  <button class="btn btn-green">Simpan</button>
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
</script>