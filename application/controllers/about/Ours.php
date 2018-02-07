<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ours extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function faq() {
		$data = array(
			'menu_pages'		=> 'faq',
			'menu_title'		=> 'Frequently Asked Question',
			'userdata'			=> $this->userdata,
			'title'				=> 'Frequently Asked Question',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'sidemenu'			=> $this->sidemenu('faq'),
			'content'			=> $this->faq_content(),
			'class'				=> 'no-padding accordion-list-on-panel'
		);
		$this->views($data);
	}

	public function ourloc() {
		$data = array(
			'menu_pages'		=> 'location',
			'menu_title'		=> 'Lokasi',
			'userdata'			=> $this->userdata,
			'title'				=> 'Lokasi',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'sidemenu'			=> $this->sidemenu('location'),
			'content'			=> $this->loc_content(),
			'class'				=> 'no-padding'
		);
		$this->views($data);
	}

	public function contactus() {
		$data = array(
			'menu_pages'		=> 'contact',
			'menu_title'		=> 'Hubungi Kami',
			'userdata'			=> $this->userdata,
			'title'				=> 'Hubungi Kami',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'sidemenu'			=> $this->sidemenu('contact'),
			'content'			=> $this->ctc_content(),
			'class'				=> ''
		);
		$this->views($data);
	}

	private function views($data) {
		template("about/ours", $data);
	}

	private function sidemenu($active) {
		$faq = ''; $loc = ''; $ctc = '';
		switch($active) {
			case 'faq'		: $faq = 'class="active"'; break;
			case 'location'	: $loc = 'class="active"'; break;
			case 'contact'	: $ctc = 'class="active"'; break;
			default 		: $faq = 'class="active"'; break;
		}
		$html = '<ul class="nav nav-pills nav-stacked">
					<li role="presentation" '.$faq.'><a href="'.site_url('faq').'">FAQ</a></li>
					<li role="presentation" '.$loc.'><a href="'.site_url('ourloc').'">Lokasi</a></li>
					<li role="presentation" '.$ctc.'><a href="'.site_url('contactus').'">Hubungi Kami</a></li>
				</ul>';
		return $html;
	}

	private function faq_content() {
		$faq = array();
		$faq[0]['title'] = 'Apa saja unit yang dilelang?';
		$faq[0]['content'] = 'Kami melelang berbagai jenis kendaraan, seperti minibus, sedan, MPV, SUV, double cabin, truk, dan masih banyak lagi. Selain kendaraan, kami juga melelang obyek lain, misalnya alat berat, sepeda motor, dan gadget. Untuk mengetahui objek yang kami lelang, Anda dapat mengakses website resmi IBID atau langsung mengunjungi lokasi.';
		$faq[1]['title'] = 'Bagaimana cara mendapatkan kendaraan yang saya cari?';
		$faq[1]['content'] = 'Pengunjung dapat mencari kendaraan yang diinginkan di website melalui menu "cari kendaraan". Hasil pencarian kendaraan dapat diunduh dengan mengklik "download" yang terdapat di kanan atas halaman "cari kendaraan".';
		$faq[2]['title'] = 'Bagaimana mengetahui jadwal dan lokasi lelang yang akan diselenggarakan dalam waktu dekat?';
		$faq[2]['content'] = 'Pengunjung dapat mengetahui jadwal lelang terdekat di website melalui menu "jadwal lelang". Lokasi lelang juga dapat dilihat di setiap halaman informasi detail kendaraan.';
		$faq[3]['title'] = 'Bagaimana cara mendapatkan informasi terkini mengenai daftar objek lelang secara rutin lewat email?';
		$faq[3]['content'] = 'Untuk mendapatkan email informasi daftar kendaraan yang akan dilelang secara rutin, pengunjung dapat melakukan registrasi di website dengan mencantumkan alamat email pengunjung yang aktif.';
		$faq[4]['title'] = 'Bagaimana jika pada jadwal lelang yang ada di website belum tersedia kendaraan yang pengunjung cari?';
		$faq[4]['content'] = 'Sistem Kami akan melakukan update informasi data lelang secara berkala khususnya untuk jadwal lelang terdekat. Apabila kendaraan yang dicari belum tersedia pada jadwal lelang tertentu, maka pengunjung dimohon untuk memilih jadwal lelang terdekat dan mengunjungi website Kami kembali secara berkala.';
		$faq[5]['title'] = 'Apa yang harus pengunjung lakukan jika sudah mendapatkan kendaraan yang sedang dicari dari website?';
		$faq[5]['content'] = 'Setelah mendapatkan kendaraan yang dicari, pengunjung dipersilakan melakukan registrasi (bagi yang belum registrasi) selanjutnya membeli NPL (Nomor Peserta Lelang) dan mengikuti lelang dengan melakukan bidding atas kendaraan yang dipilih ketika jadwal lelang atas kendaraan tersebut sedang berlangsung.';

		$html = '<div class="panel-group no-margin" id="accordion">';
		foreach($faq as $key => $value) {
			$html .= '<div class="panel panel-default">
						<a href="#collapse-rules'.$key.'" data-toggle="collapse" class="collapsed" data-parent="#accordion">
							<div class="panel-heading">
								<h4 class="panel-title expand">
									<div class="right-arrow pull-right"></div>
									'.($key+1).'. '.$value['title'].'
								</h4>
							</div>
						</a>
					  	<div id="collapse-rules'.$key.'" class="panel-collapse collapse">
					    	<div class="panel-body bg-grey">
					    		<p class="font-14px">'.$value['content'].'</p>
					    	</div>
					  	</div>
					</div>';
		}
		$html .= '</div>';
		return $html;
	}

	private function loc_content() {
		$html = '<div class="location"><ul>';
		for($i = 0; $i < 10; $i++) {
		$html .= '<li class="box-location">
					<h4>IBID - Balai Lelang Serasi</h4>
					<p>Jl. Bintaro Mulia I No.3 Bintaro Pesanggrahan - Jakarta Selatan 12250 <span>(62-21) 7355999</span></p>
				</li>';
		}
		$html .= '</ul></div>';
		return $html;
	}

	private function ctc_content() {
		$html = '<div class="contact-us col-md-8">
					<form>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Nama</label>
						</div>
						<div class="form-group floating-label">
							<input type="email" name="" class="form-control input-custom">
							<label class="label-schedule">Email</label>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Telepon</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom">
								<option>pekerjaan</option>
								<option>Investor</option>
								<option>Wartawan</option>
								<option>Mahasiswa</option>
								<option>Lain-lain</option>
							</select>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Perusahaan</label>
						</div>
						<div class="form-group floating-label">
							<select class="form-control select-custom">
								<option>Kategori</option>
								<option>Investor</option>
								<option>Wartawan</option>
								<option>Mahasiswa</option>
								<option>Lain-lain</option>
							</select>
						</div>
						<div class="form-group floating-label">
							<input type="text" name="" class="form-control input-custom">
							<label class="label-schedule">Subjek</label>
						</div>
							<div class="form-group floating-label">
							<textarea class="form-control" rows="5"></textarea>
							<label class="label-schedule">Perusahaan</label>
						</div>
					</form>
					<div class="text-left">
						<button class="btn btn-green">Submit</button>
					</div>
				</div>
				<div class="info-contact col-md-4">
					<div class="box-info">
						<h2>IBID - Balai Lelang Serasi</h2>
						<p>Jl. Bintaro Mulia I No.3 Bintaro Pesanggrahan - Jakarta Selatan 12250 <span>(62-21) 7355999</span></p>
						<ul>
							<li><a href=""><span class="ic ic-Chat-With"></span> <span>Chat With Us</span></a></li>
							<li><a href="faq.html"><span class="ic ic-Check-FAQ "></span> <span>Chat Out Our FAQ</span></a></li>
						</ul>
					</div>
				</div>';
		return $html;
	}

}

/* End of file Rule.php */
/* Location: ./application/controllers/about/Rule.php */