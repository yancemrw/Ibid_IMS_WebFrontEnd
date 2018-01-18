<?php  

function template($view = '' , $data = '') {
	$ci =& get_instance();
	$ci->load->view('template/header', $data);
	$ci->load->view($view , $data); // content
	$ci->load->view('template/footer', $data);
	// $ci->load->view('template/menubar' , $data);
	// $ci->load->view('template/footer' , $data); // content
}

function login_Status_form($userdata) {
	$pp = 'https://instagram.fjkt1-1.fna.fbcdn.net/t51.2885-15/e35/25023178_125021498293801_6299328116707819520_n.jpg';
	if(count($userdata['UserId']) > 0) {

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
             '.@$userdata['namefront'].'
             <span class="fa fa-angle-down"></span>
          </div>
       </a>
       <ul class="dropdown-menu dropdown-profile">
          <li class="clearfix">
             <a href="'.site_url('akun/dasbor').'" class="clearfix">
                <!-- <div class="content-profile col-md-6">
                   <img src="'.base_url('assetsfront/images/background/slide-1.jpg').'" alt="" title="profile">
                </div> -->
                <p class="col-md-12">'.$userdata['namefront'].'<span>'.$userdata['emailfront'].'</span></p>
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
