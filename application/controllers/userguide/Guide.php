<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index($page_name = '') {
		$video_url = '';
		switch($page_name) {
			case 'onsite': 
					$page_site = $this->panduan_lelang_onsite(); 
					$menu_title = 'Tata Cara Lelang Onsite'; 
					$video_url = 'https://www.youtube.com/embed/-diRprzLhQc?rel=0';
					break;
			case 'online': 
					$page_site = $this->panduan_lelang_online(); 
					$menu_title = 'Tata Cara Lelang Online'; 
					$video_url = 'https://www.youtube.com/embed/ThJGKU735eU?rel=0';
					break;
			case 'live': 
					$page_site = $this->panduan_lelang_live(); 
					$menu_title = 'Tata Cara Live Auction'; 
					$video_url = 'https://www.youtube.com/embed/XwIQW7lbtGI?rel=0';
					break;
			case 'entrusted': 
					$page_site = $this->panduan_titip_lelang(); 
					$menu_title = 'Tata Titip Lelang'; 
					$video_url = 'https://www.youtube.com/embed/ZFUVYODTGrU?rel=0';
					break;
			case 'npl': 
					$page_site = $this->beli_npl(); 
					$menu_title = 'Cara Beli NPL'; 
					$video_url = 'https://www.youtube.com/embed/xYR2oGA2tA0?rel=0';
					break;
			case 'paid': 
					$page_site = $this->pelunasan_biaya(); 
					$menu_title = 'Cara Melunasi Pembayaran'; 
					$video_url = 'https://www.youtube.com/embed/S83fKE1MGIs?rel=0';
					break;
			case 'general': 
					$page_site = $this->ketentuan_umum(); 
					$menu_title = 'Ketentuan Umum'; 
					$video_url = '';
					break;
			case '': $page_site = $this->panduan_lelang_onsite(); $menu_title = 'Tata Cara Lelang On Site'; break;
		}

		$userdata = $this->session->userdata('userdata');
		$data = array(
			'menu_pages'		=> 'panduan-lelang',
			'menu_title'		=> $menu_title,
			'userdata'			=> $userdata,
			'title'				=> 'Tata Cara Titip Lelang',
			'form_auth_mobile'	=> login_status_form_mobile($userdata),
			'form_auth'			=> login_Status_form($userdata),
			'side_menu'			=> $this->side_menu($page_name),
			'content_panduan'	=> $page_site,
			'page_name'			=> $page_name,
			'video_url'			=> $video_url
		);
		$view = "userguide/guide";
		template($view, $data);
	}

	private function side_menu($page_name = '') {
		switch($page_name) {
			case 'onsite': $onsite = 'class="active"'; break;
			case 'online': $online = 'class="active"'; break;
			case 'live': $live = 'class="active"'; break;
			case 'entrusted': $entrusted = 'class="active"'; break;
			case 'npl': $npl = 'class="active"'; break;
			case 'paid': $paid = 'class="active"'; break;
			case 'general': $general = 'class="active"'; break;
			case '': $onsite = 'class="active"'; break;
		}

		$html = '<ul class="nav nav-pills nav-stacked">
				<li role="presentation" '.@$onsite.'><a href="'.base_url('index.php/panduan-lelang/onsite').'">Tata Cara Lelang Onsite</a></li>
				<li role="presentation" '.@$online.'><a href="'.base_url('index.php/panduan-lelang/online').'">Tata Cara Lelang Online</a></li>
				<li role="presentation" '.@$live.'><a href="'.base_url('index.php/panduan-lelang/live').'">Tata Cara Live Auction</a></li>
				<li role="presentation" '.@$entrusted.'><a href="'.base_url('index.php/panduan-lelang/entrusted').'">Cara Titip Lelang</a></li>
				<li role="presentation" '.@$npl.'><a href="'.base_url('index.php/panduan-lelang/npl').'">Cara Beli NPL</a></li>
				<li role="presentation" '.@$paid.'><a href="'.base_url('index.php/panduan-lelang/paid').'">Cara Melunasi Pembayaran</a></li>
				<li role="presentation" '.@$general.'><a href="'.base_url('index.php/panduan-lelang/general').'">Ketentuan Umum</a></li>
				</ul>';
		return $html;
	}

	private function panduan_lelang_onsite() {
		$html = '<section class="procedure-rules-panel">
	   				<span class="line"></span>
		            <div id="sidebar">
			            <div id="nav-anchor"></div>
			            <div class="nav-procedure">
			                <ul>
			                    <li><a href="#rules-1" class="scroll-to">1</a></li>
			                    <li><a href="#rules-2" class="scroll-to">2</a></li>
			                    <li><a href="#rules-3" class="scroll-to">3</a></li>
			                    <li><a href="#rules-4" class="scroll-to">4</a></li>
			                    <li><a href="#rules-5" class="scroll-to">5</a></li>
			                    <li><a href="#rules-6" class="scroll-to">6</a></li>
			                    <li><a href="#rules-7" class="scroll-to">7</a></li>
			                </ul>
			            </div>
			        </div>
			        <div id="rules-1" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-1.png').'">
				        	</div>
				        	<h2>Cari kendaraan & cek jadwal lelang via website</h2>
				        	<p>Daftar lot kendaraan lelang bisa dilihat dan diunduh dari website. Jadwal lelang di semua kota pun dapat dicek via website.</p>
				        </div>
			        </div>
			        <div id="rules-2" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-2.png').'">
				        	</div>
				        	<h2>Cek detail kendaraan di lokasi pool</h2>
				        	<p>Lakukan cek fisik kendaraan beserta dokumennya saat open house di pool IBID.</p>
				        </div>
			        </div>
			        <div id="rules-3" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-3.png').'">
				        	</div>
				        	<h2>Registrasi & beli Nomor Peserta Lelang (NPL)</h2>
				        	<p>Isi data diri dan lakukan pembelian NPL secara online di website IBID. Pembayaran NPL bisa melalui Virtual Account, kartu kredit, atau mesin EDC.</p>
				        </div>
			        </div>
			        <div id="rules-4" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-4.png').'">
				        	</div>
				        	<h2>Ikut lelang</h2>
				        	<p>Peserta mengikuti proses lelang langsung di tempat pelelangan. Tawar kendaraan yang diinginkan.</p>
				        </div>
			        </div>
			        <div id="rules-5" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-5.png').'">
				        	</div>
				        	<h2>Pelunasan/Pengembalian Biaya</h2>
				        	<p>Jika peserta memenangkan lelang, pelunasan sisa pembayaran wajib dilakukan selambatnya 5 hari kerja setelah lelang. Namun jika kalah, biaya pembelian NPL akan kembali 100% ke nomor rekening terdaftar, selambatnya 3 hari kerja setelah lelang.</p>
				        </div>
			        </div>
			        <div id="rules-6" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-6.png').'">
				        	</div>
				        	<h2>Ambil kendaraan</h2>
				        	<p>Peserta dapat mengambil kendaraan beserta dokumennya setelah melunasi pembayaran selambatnya 5 hari kerja setelah lelang.</p>
				        </div>
			        </div>
	   			</section>';
		return $html;
	}

	private function panduan_lelang_online() {
		$html = '<section class="procedure-rules-panel">
					<span class="line"></span>
					<div id="sidebar">
						<div id="nav-anchor"></div>
						<div class="nav-procedure">
							<ul>
								<li><a href="#rules-1" class="scroll-to">1</a></li>
								<li><a href="#rules-2" class="scroll-to">2</a></li>
								<li><a href="#rules-3" class="scroll-to">3</a></li>
								<li><a href="#rules-4" class="scroll-to">4</a></li>
								<li><a href="#rules-5" class="scroll-to">5</a></li>
								<li><a href="#rules-6" class="scroll-to">6</a></li>
								<li><a href="#rules-7" class="scroll-to">7</a></li>
							</ul>
						</div>
					</div>
					<div id="rules-1" class="rules-procedure">
						<div class="box-procedure">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-1.png').'">
							</div>
							<h2>Cari kendaraan & cek jadwal lelang via website</h2>
							<p>Daftar lot kendaraan dan jadwal lelang bisa dicek via website.</p>
						</div>
					</div>
					<div id="rules-2" class="rules-procedure">
						<div class="box-procedure pull-right">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-9.png').'">
							</div>
						<h2>Cek detail kendaraan via website</h2>
						<p>Periksa detail kendaraan di website IBID.</p>
						</div>
					</div>
					<div id="rules-3" class="rules-procedure">
						<div class="box-procedure">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-8.png').'">
							</div>
						<h2>Registrasi & beli Nomor Peserta Lelang (NPL)</h2>
						<p>Isi data diri dan lakukan pembelian NPL secara online di website IBID. Pembayaran NPL bisa melalui Virtual Account, kartu kredit, atau mesin EDC.</span></p>
						</div>
					</div>
					<div id="rules-4" class="rules-procedure">
						<div class="box-procedure pull-right">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-7.png').'">
							</div>
							<h2>Pilih jadwal lelang online yang sedang berlangsung</h2>
							<p>Peserta dapat langsung memilih kendaraan yang diinginkan. Tenggat waktu lelang tertera pada bagian informasi kendaraan.</p>
						</div>
					</div>
					<div id="rules-5" class="rules-procedure">
						<div class="box-procedure">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-10.png').'">
							</div>
							<h2>Ikuti proses lelang online</h2>
							<p>Peserta dapat langsung melakukan penawaran atau bidding secara online. Tawar harga kendaraan sesuai keinginan.</p>
						</div>
					</div>
					<div id="rules-6" class="rules-procedure">
						<div class="box-procedure pull-right">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-5.png').'">
							</div>
							<h2>Pelunasan/pengembalian biaya</h2>
							<p>Jika peserta memenangkan lelang, pelunasan sisa pembayaran wajib dilakukan selambatnya 5 hari kerja setelah lelang. Namun jika kalah, biaya pembelian NPL akan kembali 100% ke nomor rekening terdaftar, selambatnya 3 hari kerja setelah lelang.</p>
						</div>
					</div>
					<div id="rules-7" class="rules-procedure">
						<div class="box-procedure">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-6.png').'">
							</div>
							<h2>Ambil kendaraan</h2>
							<p>Peserta dapat mengambil kendaraan beserta dokumennya setelah melunasi pembayaran selambatnya 5 hari kerja setelah lelang.</p>
						</div>
					</div>
				</section>';
		return $html;
	}

	private function panduan_lelang_live() {
		$html = '<section class="procedure-rules-panel">
	   				<span class="line"></span>
	   				<div id="sidebar">
			            <div id="nav-anchor"></div>
			            <div class="nav-procedure">
			                <ul>
			                    <li><a href="#rules-1" class="scroll-to">1</a></li>
			                    <li><a href="#rules-2" class="scroll-to">2</a></li>
			                    <li><a href="#rules-3" class="scroll-to">3</a></li>
			                    <li><a href="#rules-4" class="scroll-to">4</a></li>
			                    <li><a href="#rules-5" class="scroll-to">5</a></li>
			                    <li><a href="#rules-6" class="scroll-to">6</a></li>
			                    <li><a href="#rules-7" class="scroll-to">7</a></li>
			                </ul>
			            </div>
			        </div>
			        <div id="rules-1" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-1.png').'">
				        	</div>
				        	<h2>Cari kendaraan & cek jadwal lelang via website</h2>
				        	<p>Daftar lot kendaraan dan jadwal lelang bisa dicek via website.</p>
				        </div>
			        </div>
			        <div id="rules-2" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-9.png').'">
				        	</div>
				        	<h2>Cek detail kendaraan via website</h2>
				        	<p>Periksa detail kendaraan di website IBID.</p>
				        </div>
			        </div>
			        <div id="rules-3" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-8.png').'">
				        	</div>
				        	<h2>Registrasi & beli Nomor Peserta Lelang (NPL)</h2>
				        	<p>Isi data diri dan lakukan pembelian NPL secara online di website IBID. Pembayaran NPL bisa melalui Virtual Account, kartu kredit, atau mesin EDC.</span></p>
				        </div>
			        </div>
			        <div id="rules-4" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-7.png').'">
				        	</div>
				        	<h2>Pilih lelang yang diinginkan</h2>
				        	<p>Peserta dapat memilih jadwal Live Auction yang akan berlangsung. Peserta dapat mengikuti maksimum 4 jadwal secara bersamaan.</p>
				        </div>
			        </div>
			        <div id="rules-5" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-11.png').'">
				        	</div>
				        	<h2>Ikuti proses Live Auction</h2>
				        	<p>Peserta dapat melakukan bidding secara real time via website bersamaan dengan peserta lelang lain yang mengikuti lelang onsite.</p>
				        </div>
			        </div>
			        <div id="rules-6" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-5.png').'">
				        	</div>
				        	<h2>Pelunasan/pengembalian biaya</h2>
				        	<p>Jika peserta memenangkan lelang, pelunasan sisa pembayaran wajib dilakukan selambatnya 5 hari kerja setelah lelang. Namun jika kalah, biaya pembelian NPL akan kembali 100% ke nomor rekening terdaftar, selambatnya 3 hari kerja setelah lelang.</p>
				        </div>
			        </div>
			        <div id="rules-7" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-6.png').'">
				        	</div>
				        	<h2>Ambil kendaraan</h2>
				        	<p>Peserta dapat mengambil kendaraan beserta dokumennya setelah melunasi pembayaran selambatnya 5 hari kerja setelah lelang.</p>
				        </div>
			        </div>
	   			</section>';
		return $html;
	}

	private function panduan_titip_lelang() {
		$html = '<section class="procedure-rules-panel">
					<span class="line"></span>
					<div id="sidebar">
						<div id="nav-anchor"></div>
						<div class="nav-procedure">
							<ul>
								<li><a href="#rules-1" class="scroll-to">1</a></li>
								<li><a href="#rules-2" class="scroll-to">2</a></li>
								<li><a href="#rules-3" class="scroll-to">3</a></li>
							</ul>
						</div>
					</div>
					<div id="rules-1" class="rules-procedure">
						<div class="box-procedure">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-12.png').'">
							</div>
							<h2>Isi formulir titip lelang di website IBID</h2>
							<p>Lengkapi data diri dan informasi detail kendaraan yang ingin dititipkan di website IBID secara online.</p>
						</div>
					</div>
					<div id="rules-2" class="rules-procedure">
						<div class="box-procedure pull-right">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-13.png').'">
							</div>
							<h2>Pilih jadwal inspeksi kendaraan</h2>
							<p>Tentukan jadwal dan lokasi pool IBID terdekat untuk inspeksi kendaraan yang akan dilelang.</p>
						</div>
					</div>
					<div id="rules-3" class="rules-procedure">
						<div class="box-procedure">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-14.png').'">
							</div>
							<h2>Datang ke pool IBID untuk proses inspeksi</h2>
							<p>Bawa kendaraan sesuai jadwal dan lokasi yang sudah dipilih. Estimasi waktu proses inspeksi kendaraan kurang lebih hanya 45 menit*. Hasil inspeksi beserta rekomendasi harga pun dapat langsung diketahui.</p>
						</div>
					</div>
				</section>';
		return $html;
	}

	private function beli_npl() {
		$html = '<section class="procedure-rules-panel">
	   				<span class="line"></span>
	   				<div id="sidebar">
			            <div id="nav-anchor"></div>
			            <div class="nav-procedure">
			                <ul>
			                    <li><a href="#rules-1" class="scroll-to">1</a></li>
			                    <li><a href="#rules-2" class="scroll-to">2</a></li>
			                    <li><a href="#rules-3" class="scroll-to">3</a></li>
			                    <li><a href="#rules-4" class="scroll-to">4</a></li>
			                </ul>
			            </div>
			        </div>
			        <div id="rules-1" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-7.png').'">
				        	</div>
				        	<h2>Pilih objek dan jadwal lelang</h2>
				        </div>
			        </div>
			        <div id="rules-2" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-15.png').'">
				        	</div>
				        	<h2>Masukkan jumlah NPL yang akan dibeli</h2>
				        </div>
			        </div>
			        <div id="rules-3" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-16.png').'">
				        	</div>
				        	<h2>Cek total tagihan NPL yang harus dibayar</h2>
				        </div>
			        </div>
			        <div id="rules-4" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-17.png').'">
				        	</div>
				        	<h2>Lakukan pembayaran NPL lewat channel yang tersedia</h2>
				        </div>
			        </div>
	   			</section>';
		return $html;
	}

	private function pelunasan_biaya() {
		$html = '<section class="procedure-rules-panel">
	   				<span class="line"></span>
	   				<div id="sidebar">
			            <div id="nav-anchor"></div>
			            <div class="nav-procedure">
			                <ul>
			                    <li><a href="#rules-1" class="scroll-to">1</a></li>
			                    <li><a href="#rules-2" class="scroll-to">2</a></li>
			                    <li><a href="#rules-3" class="scroll-to">3</a></li>
			                </ul>
			            </div>
			        </div>
			        <div id="rules-1" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-18.png').'">
				        	</div>
				        	<h2>Cek sisa tagihan pelunasan</h2>
				        	<p>Detail informasi tagihan dapat dicek di website IBID pada bagian akun Anda. Sistem kami juga secara otomatis akan mengirimkan detail pembayaran ke email Anda, beserta informasi nomor Virtual Account.</p>
				        </div>
			        </div>
			        <div id="rules-2" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-19.png').'">
				        	</div>
				        	<h2>Gunakan nomor Virtual Account sesuai informasi</h2>
				        	<p>Untuk dapat melakukan pelunasan pembayaran Anda harus menggunakan nomor Virtual Account yang dikirimkan via email.</p>
				        </div>
			        </div>
			        <div id="rules-3" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-20.png').'">
				        	</div>
				        	<h2>Lakukan proses pembayaran</h2>
				        	<p>Lunasi sisa tagihan Anda sesuai nominal yang telah dikirimkan.</p>
				        </div>
			        </div>
	   			</section>';
		return $html;
	}

	private function ketentuan_umum() {
		$html = '<section class="procedure-info-panel">
	   				<div class="panel panel-default panel-custom">
	   					<div class="panel-heading">
	   						<h3 class="no-margin">Informasi</h3>
	   					</div>
						<div class="panel-body">
					    	<ul>
					    		<li>
					    			IBID - Balai Lelang Serasi telah mendapat izin dari Kementrian Keuangan Republik Indonesia, Direktorat Jendral Kekayaan Negara dengan Nomor 23/KM.6/Juni 2007.
					    		</li>
					    		<li>
					    			Petunjuk pelaksanaan lelang diatur secara keseluruhan berdasarkan Peraturan Menteri Keuangan Republik Indonesia Nomor 27/PMK.06/2016.
					    		</li>
					    		<li>
					    			Pedoman pelaksanaan lelang tanpa kehadiran peserta dengan melakukan penawaran lelang secara tertulis melalui internet diatur berdasarkan Peraturan Menteri Keuangan Republik Indonesia Nomor 90/PMK.06.2016.
					    		</li>
					    	</ul>
					 	</div>
						<div class="panel-heading">
	   						<h3 class="no-margin">Ketentuan Umum</h3>
	   					</div>
	   					<div class="panel-body">
	   						<ul>
	   							<li>
	   								Peserta lelang wajib memberikan informasi nomor Kartu Tanda Penduduk (KTP) dan Nomor Pokok Wajib Pajak atau NPWP (jika memiliki) untuk mendukung program pemerintah, sesuai dengan ketentuan dari Kementrian Keuangan Republik Indonesia Direktorat Jenderal Pajak, Peraturan Direktorat Jenderal Pajak Nomor 26/PJ/2017.
	   							</li>
	   							<li>
	   								Biaya yang timbul dalam rangka peralihan hak atau pengembalian/pemindahan kendaraan menjadi tanggung jawab pemenang lelang.
	   							</li>
	   							<li>
	   								Obyek lelang tidak dapat ditukar sebagian atau keseluruhan dengan obyek lelang manapun.
	   							</li>
	   							<li>
	   							Jika terjadi force majore seperti bencana alam, kerusuhan massa, atau tindakan pemerintah dalam bidang moneter, segala akibat dan atau kerugian yang timbul menjadi tanggung jawab pemenang.
	   							</li>
	   						</ul>
	   					</div>
					</div>
	   			</section>
	   			<section class="procedure-rules-panel panel-requirement">
	   				<div class="panel panel-default panel-custom">
	   					<div class="panel-heading">
	   						<h3 class="no-margin">
	   							Peraturan
	   						</h3>
	   					</div>
				  		<div class="panel-body no-padding accordion-list-on-panel">
							<div class="panel-group no-margin" id="accordion">
								<div class="panel panel-default">
									<a href="#collapse-rules1" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div> 1. Saat Open House
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules1" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peserta dapat memeriksa kondisi objek lelang yang akan dilelang selama open house berlangsung dengan datang langsung ke lokasi atau secara online melalui website IBID.
								    			</li>
								    			<li>
								    				Peserta hanya diperkenankan melakukan cek fisik dan kelengkapan objek lelang, tapi tidak diperbolehkan melakukan bongkar pasang yang dapat merusak objek lelang.
								    			</li>
								    			<li>
								    				Peserta dilarang mengambil/merusak/memindahkan atribut/nomor/tulisan/tanda-tanda yang menempel pada kendaraan atau objek lelang lain.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules2" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div> 2. Kondisi Objek Lelang
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules2" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peserta memahami dan menyetujui bahwa objek yang dilelang adalah “sebagaimana adanya".
								    			</li>
								    			<li>
								    				Peserta telah memeriksa dan mengetahui kondisi fisik dan kelengkapan dokumen objek lelang. Jika terdapat kekurangan atau cacat, baik yang terlihat maupun tidak terlihat, bukan merupakan tanggung jawab penyelenggara lelang.
								    			</li>
								    			<li>
								    				Untuk kemudahan peserta, penyelenggara lelang telah membuat daftar lot yang berisi data objek lelang.
								    			</li>
								    			<li>
								    				Daftar lot lelang tidak dapat dijadikan dasar keberatan/klaim atas obyek lelang jika ditemukan perbedaan data, kondisi, dan dokumen yang tertera didalamnya.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules3" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div> 3. Sebelum Mengikuti Lelang
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules3" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peserta yang bermaksud mengikuti lelang harus terlebih dulu melakukan transfer uang jaminan untuk mendapatkan NPL (Nomor Peserta Lelang) dengan nominal sebesar:<br />
								    					a. Rp 5.000.000/ NPL objek lelang mobil <br />
								    					b. Rp 1.000.000/ NPL objek lelang motor <br />
								    					c. Rp 25.000.000/ NPL objek lelang alat berat <br />
								    					d. Rp 100.000/ NPL objek lelang gadget
								    			</li>
								    			<li>
								    				Peserta melakukan pembelian NPL di website resmi IBID dengan memilih memilih alternatif metode pembayaran tersedia.
								    			</li>
								    			<li>
								    				Uang jaminan yang ditransfer harus sudah efektif sebelum lelang dimulai.
								    			</li>
								    			<li>
								    				Peserta dapat menggunakan NPL yang telah dibeli untuk melakukan penawaran atau bidding dari website, mobile application, atau langsung datang ke lokasi lelang (peserta Lelang Onsite wajib mencetak NPL).
								    			</li>
								    			<li>
								    				Peserta juga dapat memilih membeli NPL Unlimited agar bisa menawar lebih dari satu kendaraaan di semua opsi dan jadwal lelang yang tersedia tanpa batasan maksimal.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules4" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div> 4. Saat Mengikuti Lelang
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules4" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Hanya peserta yang memiliki NPL dapat melakukan bidding, baik dari website, mobile application, maupun lokasi lelang.
								    			</li>
								    			<li>
								    				Lelang akan dimulai sesuai jadwal dibuka dengan harga dasar. Selanjutnya peserta bisa melakukan bidding dengan kelipatan: <br />
								    					a. Rp 500.000 untuk mobil dan alat berat <br />
								    					b. Rp 100.000 untuk motor <br />
								    					c. Rp 50.000 untuk gadget
								    			</li>
								    			<li>
								    				Pemenang lelang adalah peserta yang melakukan bidding dengan harga tertinggi.
								    			</li>
								    			<li>
								    				Pemenang berhak memenangkan objek lelang sebanyak jumlah NPL yang dimiliki. Jika pemenang membeli NPL Unlimited, dia berhak memenangkan objek lelang tanpa batas maksimal.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules5" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div> 5. Penawaran atau Bidding
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules5" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peserta dapat memilih jadwal lelang dengan mekanisme bidding sesuai opsi lelang yang tersedia, yaitu: <br />
								    					a. Lelang Onsite: mekanisme bidding dilakukan dengan hadir langsung di lokasi lelang dan mengajukan bidding dengan cara mengangkat kartu NPL yang dimiliki. <br />
								    					b. Live Auction: mekanisme bidding dilakukan dengan mengajukan penawaran melalui website atau mobile application pada saat bersamaan dengan jadwal Lelang Onsite yang sedang berlangsung. Peserta dapat menawar dari mana saja secara real time. <br />
								    					c. Lelang Online: mekanisme bidding dilakukan dengan mengajukan penawaran melalui website atau mobile application saat jadwal Lelang Online berlangsung.
								    			</li>
								    			<li>
								    				Peserta yang melakukan bidding melalui website atau mobile application wajib memperhatikan ketersediaan jaringan internet pada gadget yang digunakan untuk mengikuti lelang. Penyelenggara lelang tidak bertanggung jawab atas terjadinya perbedaan update informasi status penawaran yang mungkin terjadi akibat kendala jaringan.
								    			</li>
								    			<li>
								    				Peserta juga dapat memanfaatkan fitur Auto Bid yang hanya tersedia pada mobile application. Peserta diberikan kemudahan untuk menentukan batas maksimal harga penawaran sebelum lelang dimulai sehingga tidak perlu mengikuti seluruh proses lelang untuk melakukan bidding. Sistem kami akan otomatis melakukan penawaran hingga mencapai batas harga yang telah ditentukan sebelumnya oleh peserta.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules6" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div> 6. Pemenang Lelang
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules6" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Pemenang lelang dikenakan biaya administrasi sebesar: <br />
								    					a. Rp 1.750.000/ objek lelang mobil <br />
								    					b. Rp. 250.000/ objek lelang motor <br />
								    					c. Rp. 5.000.000/ objek lelang alat berat <br />
								    					d. Rp. 300.000/ objek lelang laptop atau desktop <br />
								    					e. Rp. 150.000/ objek lelang smartphone <br />
								    					f. Rp. 100.000/ objek lelang monitor komputer
								    			</li>
								    			<li>
								    				Pemenang lelang wajib melunasi total harga objek lelang selambatnya 5 hari kerja setelah tanggal pelaksanaan lelang. Harga akhir dikalkulasikan dari total harga objek lelang dikurangi uang jaminan atau deposit dari pembelian NPL, lalu ditambah biaya administrasi. (detail tagihan akan dikirim lewat email atau dapat dilihat pada akun peserta di website).
								    			</li>
								    			<li>
								    				Pemenang lelang harus melakukan pembayaran atas objek lelang yang dimenangkan menggunakan nomor Virtual Account yang akan diinformasikan bersamaan dengan detail informasi tagihan pelunasan melalui email atau dapat dilihat pada akun peserta di website.
								    			</li>
								    			<li>
								    				Pemenang lelang yang sudah melunasi tagihan dan menerima konfirmasi pembayaran dari IBID dapat melakukan serah terima objek lelang beserta dokumen sesuai jadwal yang disampaikan sebelumnya.
								    			</li>
								    			<li>
								    				Pemenang lelang yang mengundurkan diri dari objek lelang yang dimenangkan atau tidak melunasi pembayaran sesuai tenggat waktu yang telah ditetapkan akan dinyatakan wanprestasi (kemenangannya batal). Uang jaminan pun otomatis hangus.
								    			</li>
								    			<li>
								    				Jika tidak memenangkan lelang, pengembalian uang jaminan dari pembelian NPL akan ditransfer kembali ke nomor rekening terdaftar.
								    			</li>
								    			<li>
								    				Jika sampai batas 2 hari kerja setelah tagihan dinyatakan lunas namun pemenang belum juga mengambil objek lelang yang dimenangkan, pemenang akan dikenakan biaya penitipan sebesar Rp 500.000/ objek lelang per hari keterlambatan. Segala kerusakan dan atau kehilangan sepenuhnya menjadi tanggung jawab pemenang.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
							</div>
						</div>
					</div>
	   			</section>';
		return $html;
	}

}

/* End of file Guide.php */
/* Location: ./application/controllers/userguide/Guide.php */