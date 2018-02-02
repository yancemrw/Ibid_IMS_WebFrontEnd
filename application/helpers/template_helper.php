<?php  

function template($view = '', $data = '') {
  // get logo site
  $url = linkservice('cms')."api/logo";
  $method = 'GET';
  $res = admsCurl($url, array(), $method);
  $logo = curlGenerate($res);
  $data['logo'] = @$logo->Photo;

  // get header image
  if(@$data['menu_pages'] === 'panduan-lelang') {
    $data['bgheader'] = 'https://sera.astra.co.id/uploads/contents/1487930089_9j8r7v6bXZ.png';
    $data['class_header'] = '';
  }
  else if(@$data['menu_pages'] === 'about') {
    $data['bgheader'] = base_url('assetsfront/images/background/bg-about-us.jpg');
    $data['class_header'] = 'header-aboutus';
  }
  else if(@$data['menu_pages'] === 'faq' || @$data['menu_pages'] === 'location' || @$data['menu_pages'] === 'contact') {
    $data['bgheader'] = base_url('assetsfront/images/background/bg-homepage.jpg');
    $data['class_header'] = '';
  }
  else {
    $data['bgheader'] = '';
    $data['class_header'] = '';
  }
  
	$ci =& get_instance();
	$ci->load->view('template/header', $data);
	$ci->load->view($view, $data);
	$ci->load->view('template/footer', $data);
}

function login_status_form_mobile($userdata) {
  $pp = base_url('assetsfront/images/icon/ic_avatar.png');
  if(count(@$userdata['UserId']) > 0) {
    $html = '<ul class="user-nav clearfix">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p><img src="'.base_url('assetsfront/images/icon/Transaksi.png').'" alt="" title="" width="" height=""></p>
                    </a>
                    <ul class="dropdown-menu dropdown-custom">
                        <li>
                            <p class="title-dropdown">Transaksi</p>
                        </li>
                        <li class="input-dropdown">
                            <h2>Butuh Tindakan</h2>
                            <form>
                                <div class="form-group floating-label">
                                    <input type="name" name="" class="form-control" placeholder="">
                                    <label class="label-schedule">Harga Dasar</label>
                                </div>
                                <div class="form-group floating-label">
                                    <input type="name" name="" class="form-control" placeholder="">
                                    <label class="label-schedule">Harga Dasar</label>
                                </div>
                                <div class="form-group floating-label">
                                    <input type="name" name="" class="form-control" placeholder="">
                                    <label class="label-schedule">Harga Dasar</label>
                                </div>
                            </form>
                            <h2>Transaksi Terakhir</h2>
                            <a href="">
                                <div class="transaction-image">
                                    <img src="'.base_url('assetsfront/images/background/3.jpg').'" alt="" title="">
                                </div>
                                <div class="transaction-content">
                                    <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT 2014</h2>
                                    <p>No. NPL #002 <span>Rp. 418,000,000</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="text-center">
                            <a href="" class="viewall-dropdown">Lihat Semua Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p><img src="'.base_url('assetsfront/images/icon/Notifikasi.png').'" alt="" title="" width="" height=""> <span class="notification">10</span></p>
                    </a>
                    <ul class="dropdown-menu dropdown-custom">
                        <li>
                            <p class="title-dropdown">Notifikasi</p>
                        </li>
                        <li class="clearfix">
                            <a href="#">
                                <div class="media-image">
                                    <img src="'.base_url('assetsfront/images/icon/ic_notif_1.png').'" alt="" title="">
                                </div>
                                <div class="media-content">
                                    <h2>1 Pesan Email</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="clearfix">
                            <a href="#">
                                <div class="media-image">
                                    <img src="'.base_url('assetsfront/images/icon/ic_notif_2.png').'" alt="" title="">
                                </div>
                                <div class="media-content">
                                    <h2>1 Pesan Email</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="clearfix">
                            <a href="#">
                                <div class="media-image">
                                    <img src="'.base_url('assetsfront/images/icon/ic_notif_3.png').'" alt="" title="">
                                </div>
                                <div class="media-content">
                                    <h2>1 Pesan Email</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="text-center">
                            <a href="" class="viewall-dropdown">Lihat Semua Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle box-profile" data-toggle="dropdown">
                    <span class="photo-profile">
                    <img src="'.$pp.'" alt="" title="profile">
                    </span>
                    </a>
                    <ul class="dropdown-menu dropdown-profile">
                        <li class="clearfix">
                            <div class="menu-account">
                                <div class="avatar-account">
                                    <h3>Tangkas</h3>
                                </div>
                                <ul>
                                    <li class="acc_notif"><a href="am-notifikasi.html">
                                        <span class="ic_menu"><i ></i></span> Notifikasi <span>10</span></a>
                                    </li>
                                    <li class="acc_transaction"><a href="am-transaksi.html"> <span class="ic_menu"><i ></i></span> Transaksi</a></li>
                                    <li class="acc_npl"><a href="am-management.html"> <span class="ic_menu"><i ></i></span>  NPL Management</a></li>
                                    <li class="acc_setting"><a href="am-ubah-profil.html"> <span class="ic_menu"><i ></i></span>  Pengaturan</a></li>
                                    <li class="acc_favorite "><a href="am-whislist.html">  <span class="ic_menu"><i ></i></span> Favorit</a></li>
                                    <li class="acc_price"><a href="am-harga-dasar.html">  <span class="ic_menu"><i ></i></span>  Harga Dasar</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <hr />
                        </li>
                        <li class="text-center">
                            <button class="btn btn-logout" onclick="location.href=\''.base_url().'\'" type="button">Keluar</button>
                        </li>
                    </ul>
                </li>
            </ul>';
  }
  else {
    $html = '<a href="" class="login" data-toggle="modal" data-target="#login">Masuk</a><a href="'.base_url().'register" class="regis">Daftar</a>';
  }
  return $html;
}

function login_Status_form($userdata) {
	$pp = base_url('assetsfront/images/icon/ic_avatar.png');
  $profile_name = @(strlen($userdata['namefront']) > 10) ? substr($userdata['namefront'], 0, 20) : '';
	if(count(@$userdata['UserId']) > 0) {

    $html = '<li class="dropdown hidden-mob">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <p><img src="'.base_url('assetsfront/images/icon/ic_transaction.png').'" alt="" title="" width="16px" height="22px"> <img src="'.base_url('assetsfront/images/icon/Transaksi.png').'" alt="" title="" width="" height="" class="ic_fixed"></p>
       </a>
       <ul class="dropdown-menu dropdown-custom">
          <li>
             <p class="title-dropdown">Transaksi</p>
          </li>
          <li class="input-dropdown">
             <h2>Butuh Tindakan</h2>
             <form>
                <div class="form-group floating-label">
                   <input type="name" name="" class="form-control" placeholder="">
                   <label class="label-schedule">Harga Dasar</label>
                </div>
                <div class="form-group floating-label">
                   <input type="name" name="" class="form-control" placeholder="">
                   <label class="label-schedule">Harga Dasar</label>
                </div>
                <div class="form-group floating-label">
                   <input type="name" name="" class="form-control" placeholder="">
                   <label class="label-schedule">Harga Dasar</label>
                </div>
             </form>
             <h2>Transaksi Terakhir</h2>
             <a href="">
                <div class="transaction-image">
                   <img src="'.base_url('assetsfront/images/background/3.jpg').'" alt="" title="">
                </div>
                <div class="transaction-content">
                   <h2>DAIHATSU LUXIO 1.5 X MINIBUS AT 2014</h2>
                   <p>No. NPL #002 <span>Rp. 418,000,000</span></p>
                </div>
             </a>
          </li>
          <li class="text-center">
             <a href="" class="viewall-dropdown">Lihat Semua Transaksi</a>
          </li>
       </ul>
    </li>
    <li class="dropdown hidden-mob">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <p><img src="'.base_url('assetsfront/images/icon/bell.png').'" alt="" title="" width="16px" height="22px"><img src="'.base_url('assetsfront/images/icon/Notifikasi.png').'" alt="" title="" width="" height="" class="ic_fixed"> <span class="notification">10</span></p>
       </a>
       <ul class="dropdown-menu dropdown-custom">
          <li>
             <p class="title-dropdown">Notifikasi</p>
          </li>
          <li class="clearfix">
             <a href="#">
                <div class="media-image">
                   <img src="'.base_url('assetsfront/images/icon/ic_notif_1.png').'" alt="" title="">
                </div>
                <div class="media-content">
                   <h2>1 Pesan Email</h2>
                   <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                </div>
             </a>
          </li>
          <li class="clearfix">
             <a href="#">
                <div class="media-image">
                   <img src="'.base_url('assetsfront/images/icon/ic_notif_2.png').'" alt="" title="">
                </div>
                <div class="media-content">
                   <h2>1 Pesan Email</h2>
                   <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                </div>
             </a>
          </li>
          <li class="clearfix">
             <a href="#">
                <div class="media-image">
                   <img src="'.base_url('assetsfront/images/icon/ic_notif_3.png').'" alt="" title="">
                </div>
                <div class="media-content">
                   <h2>1 Pesan Email</h2>
                   <p>Lorem Ipsum is simply dummy text of the printing <span>09/26/2017</span></p>
                </div>
             </a>
          </li>
          <li class="text-center">
             <a href="" class="viewall-dropdown">Lihat Semua Transaksi</a>
          </li>
       </ul>
    </li>
    <li class="dropdown">
       <a href="#" class="dropdown-toggle box-profile" data-toggle="dropdown">
          <span class="photo-profile">
             <img src="'.@$pp.'" alt="" title="profile">
          </span>
          <div class="profile-name">
             '.$profile_name.'
             <span class="fa fa-angle-down"></span>
          </div>
       </a>
       <ul class="dropdown-menu dropdown-profile">
          <li class="clearfix">
             <a href="'.site_url('akun/dasbor').'" class="clearfix">
                <div class="content-profile col-md-6">
                   <img src="'.$pp.'" alt="" title="profile">
                </div>
                <p class="col-md-6">'.$profile_name.'<span>'.$userdata['emailfront'].'</span></p>
             </a>
          </li>
          <li>
             <hr />
          </li>
          <li class="text-center">
             <button  class="btn btn-logout" onclick="location.href=\''.site_url('logout').'\'">Keluar</button>
          </li>
       </ul>
    </li>';

    } else {
    $html = '
      <li class="hidden-mob"><a href="#" class="login" data-toggle="modal" data-target="#login">Masuk</a></li>
      <li class="hidden-mob"><a href="'.site_url('register').'" class="regis">Daftar</a></li>';
    }
    return $html;
}

?>
