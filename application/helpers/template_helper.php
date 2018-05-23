<?php  

function template($view = '', $data = '') {
  // get logo site
  $url_bg = linkservice('cms')."api/home";
  $method_bg = 'GET';
  $res_bg = admsCurl($url_bg, array(), $method_bg);
  $home_bg = curlGenerate($res_bg);

  $url = linkservice('cms')."api/logo";
  $method = 'GET';
  $res = admsCurl($url, array(), $method);
  $logo = curlGenerate($res);
  $data['logo'] = @$logo->Photo;

  // get header image
  if(@$data['menu_pages'] === 'panduan-lelang') {
    $data['bgheader'] = base_url('assetsfront/images/background/bg-about-us.jpg');
    $data['class_header'] = 'header-aboutus';
  }
  else if(@$data['menu_pages'] === 'about') {
    $data['bgheader'] = base_url('assetsfront/images/background/bg-about-us.jpg');
    $data['class_header'] = 'header-aboutus';
  }
  else if(@$data['menu_pages'] === 'faq' || @$data['menu_pages'] === 'location' || @$data['menu_pages'] === 'contact') {
    $data['bgheader'] = base_url('assetsfront/images/background/bg-about-us.jpg');
    $data['class_header'] = 'header-aboutus';
  }
  else {
    $data['bgheader'] = linkservice('cms').'uploads/contents/'.$home_bg->tagline->Photo;
    $data['class_header'] = '';
  }
  
	$ci =& get_instance();
	$ci->load->view('template/header', $data);
	$ci->load->view($view, $data);
	$ci->load->view('template/footer', $data);
}

function login_status_form_mobile($userdata) {
  $pp = base_url('assetsfront/images/icon/ic_avatar.png');
  $profile_name = @(strlen($userdata['namefront']) > 10) ? substr($userdata['namefront'], 0, 10).'...' : $userdata['namefront'];
  $email_name = @(strlen($userdata['emailfront']) > 10) ? substr($userdata['emailfront'], 0, 30).'...' : $userdata['emailfront'];

  if(count(@$userdata['UserId']) > 0) {
    $html = '<ul class="user-nav clearfix">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p><img src="'.base_url('assetsfront/images/icon/Transaksi.png').'" alt="" title="" width="" height=""></p>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-transaksi">
                        <li><p class="title-dropdown">Transaksi</p></li>
                        <li><p id="top-transaction-mobile" class="notif">Tidak Ada Transaksi</p></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p><img src="'.base_url('assetsfront/images/icon/Notifikasi.png').'" alt="" title="" width="" height=""><span class="notif-count"></span></p>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-bell notif-content-mobile">
                      <div class="scroll-dropdown-mobile">
                        <li id="header-notif-mobile"><p class="title-dropdown">Notifikasi</p></li>
                        <li><p class="notif">Tidak Ada Notifikasi</p></li>
                      </div>
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
                                    <h3>'.$profile_name.'</h3>
                                </div>
                                <ul>
                                    <li class="acc_notif"><a href="'.site_url('notification').'"><span class="ic_menu"><i></i></span>Notifikasi<!--span>10</span--></a></li>
                                    <li class="acc_transaction"><a href="'.site_url('transaction').'"><span class="ic_menu"><i></i></span>Transaksi</a></li>
                                    <li class="acc_npl"><a href="'.site_url('npl_dashboard').'"><span class="ic_menu"><i></i></span>NPL Management</a></li>
                                    <li class="acc_setting"><a href="'.site_url('dashboard').'"><span class="ic_menu"><i></i></span>Pengaturan</a></li>
                                    <li class="acc_favorite "><a href="'.site_url('favorite').'"><span class="ic_menu"><i></i></span>Favorit</a></li>
                                    <li class="acc_price"><a href="'.site_url('basic-price').'"><span class="ic_menu"><i></i></span>Harga Dasar</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <hr />
                        </li>
                        <li class="text-center">
                            <button class="btn btn-logout" onclick="location.href=\''.site_url('logout').'\'" type="button">Keluar</button>
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
  $profile_name = @(strlen($userdata['namefront']) > 8) ? substr($userdata['namefront'], 0, 10).'...' : $userdata['namefront']; 
  $email_name = @(strlen($userdata['emailfront']) > 10) ? substr($userdata['emailfront'], 0, 30).'...' : $userdata['emailfront'];
  if(count(@$userdata['UserId']) > 0) {

    $html = '<li class="dropdown hidden-mob">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <p><img src="'.base_url('assetsfront/images/icon/ic_transaction.png').'" alt="" title="" width="16px" height="22px"> <img src="'.base_url('assetsfront/images/icon/Transaksi.png').'" alt="" title="" width="" height="" class="ic_fixed"></p>
       </a>
       <ul class="dropdown-menu dropdown-custom">
        <div class="scroll-dropdown">
          <li><p class="title-dropdown">Transaksi</p></li>
          <li class="input-dropdown"><p id="top-transaction" class="notif">Tidak Ada Transaksi</p></li>
        </div>
       </ul>
    </li>
    <li class="dropdown hidden-mob">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <p><img src="'.base_url('assetsfront/images/icon/bell.png').'" alt="" title="" width="16px" height="22px"><img src="'.base_url('assetsfront/images/icon/Notifikasi.png').'" alt="" title="" width="" height="" class="ic_fixed"><span class="notif-count"></span></p>
       </a>
       <ul class="dropdown-menu dropdown-custom notif-content">
        <div class="scroll-dropdown">
          <li id="header-notif"><p class="title-dropdown">Notifikasi</p></li>
          <li><p class="notif">Tidak Ada Notifikasi</p></li>
        </div>
       </ul>
    </li>
    <li class="dropdown hidden-mob">
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
             <a href="'.site_url('dashboard').'" class="clearfix">
                <div class="content-profile col-md-6">
                   <img src="'.$pp.'" alt="" title="profile">
                </div>
                <p class="col-md-6">'.$profile_name.'<span>'.$email_name.'</span></p>
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
