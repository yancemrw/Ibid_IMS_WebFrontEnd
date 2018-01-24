<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index($page_name = '') {
		switch($page_name) {
			case 'onsite': $page_site = $this->panduan_lelang_onsite(); $menu_title = 'Tata Cara Lelang Onsite'; break;
			case 'online': $page_site = $this->panduan_lelang_online(); $menu_title = 'Tata Cara Lelang Online'; break;
			case 'live': $page_site = $this->panduan_lelang_live(); $menu_title = 'Tata Cara Live Auction'; break;
			case 'entrusted': $page_site = $this->panduan_titip_lelang(); $menu_title = 'Tata Titip Lelang'; break;
			case 'npl': $page_site = $this->beli_npl(); $menu_title = 'Cara Beli NPL'; break;
			case 'paid': $page_site = $this->pelunasan_biaya(); $menu_title = 'Cara Melunasi Pembayaran'; break;
			case 'general': $page_site = $this->ketentuan_umum(); $menu_title = 'Ketentuan Umum'; break;
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
			'page_name'			=> $page_name
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
				        	<p>Isi data diri dan lakukan pembelian NPL secara online di website IBID. Pembayaran NPL bisa melalui transfer bank, Virtual Account, atau payment gateway.</p>
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
				        	<p>Jika peserta memenangkan lelang, pelunasan sisa pembayaran wajib dilakukan maksimum 5 hari kerja setelah lelang. Namun jika kalah, biaya pembelian NPL akan kembali 100% ke nomor rekening terdaftar, maksimum 1 hari setelah lelang.</p>
				        </div>
			        </div>
			        <div id="rules-6" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-6.png').'">
				        	</div>
				        	<h2>Ambil kendaraan</h2>
				        	<p>Peserta dapat mengambil kendaraan beserta dokumennya maksimum 1 hari setelah melunasi pembayaran.</p>
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
						<p>Isi data diri dan lakukan pembelian NPL secara online di website IBID. Pembayaran NPL bisa melalui transfer bank, Virtual Account, atau payment gateway.</span></p>
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
							<p>Jika peserta memenangkan lelang, pelunasan sisa pembayaran wajib dilakukan maksimum 5 hari kerja setelah lelang. Namun jika kalah, biaya pembelian NPL akan kembali 100% ke nomor rekening terdaftar, maksimum 1 hari setelah lelang.</p>
						</div>
					</div>
					<div id="rules-7" class="rules-procedure">
						<div class="box-procedure">
							<div class="images-prosedure">
								<img src="'.base_url('assetsfront/images/background/img-prosedure-6.png').'">
							</div>
							<h2>Ambil kendaraan</h2>
							<p>Peserta dapat mengambil kendaraan beserta dokumennya maksimum 1 hari setelah melunasi pembayaran di lokasi pool tempat kendaraan tersebut berada.</p>
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
				        	<p>Isi data diri dan lakukan pembelian NPL secara online di website IBID. Pembayaran NPL bisa melalui transfer bank, Virtual Account, atau payment gateway.</span></p>
				        </div>
			        </div>
			        <div id="rules-4" class="rules-procedure">
			        	<div class="box-procedure pull-right">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-7.png').'">
				        	</div>
				        	<h2>Pilih jadwal lelang yang diinginkan</h2>
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
				        	<p>Jika peserta memenangkan lelang, pelunasan sisa pembayaran wajib dilakukan maksimum 5 hari kerja setelah lelang. Namun jika kalah, biaya pembelian NPL akan kembali 100% ke nomor rekening terdaftar, maksimum 1 hari setelah lelang.</p>
				        </div>
			        </div>
			        <div id="rules-7" class="rules-procedure">
			        	<div class="box-procedure">
				        	<div class="images-prosedure">
				        		<img src="'.base_url('assetsfront/images/background/img-prosedure-6.png').'">
				        	</div>
				        	<h2>Ambil kendaraan</h2>
				        	<p>Peserta dapat mengambil kendaraan beserta dokumennya maksimum 1 hari setelah melunasi pembayaran di lokasi pool tempat kendaraan tersebut berada.</p>
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
							<p>Lengkapi data diri dan informasi detail kendaraan yang ingin dititipkan pada secara online di website IBID.</p>
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
				        	<p>Detail informasi tagihan dapat dicek di website IBID pada bagian akun Anda. Sistem kami juga secara otomatis akan mengirimkan detail pembayaran ke email Anda, beserta informasi nomor atau Virtual Account.</p>
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
	   						<h3 class="no-margin">
	   							Informasi
	   						</h3>
	   					</div>
						<div class="panel-body">
					    	<ul>
					    		<li>
					    			<div class="row">
					    				<div class="col-sm-3">
						    				Proses penawaran <span class="pull-right text-right">:</span>
						    			</div>
						    			<div class="col-sm-9">
						    				Tertutup via web
						    			</div>
					    			</div>
					    			<div class="clearfix"></div>
					    		</li>
					    		<li>
					    			<div class="row">
					    				<div class="col-sm-3">
					    				Alamat web <span class="pull-right text-right">:</span>
						    			</div>
						    			<div class="col-sm-9">
						    				<a href="http://www.ibid.astra.co.id">www.ibid.astra.co.id</a>
						    			</div>
					    			</div>
					    			<div class="clearfix"></div>
					    		</li>
					    		<li>
					    			<div class="row">
					    				<div class="col-sm-3">
					    				Pembayaran <span class="pull-right text-right">:</span>
						    			</div>
						    			<div class="col-sm-9">
						    				Seluruh pembayaran (Deposit/Pelunasan) ditujukan kepada Rekening PT Balai Lelang Serasi di BCA Cab Sunter Mall Jakarta No. Rekening : 4281.51.52.62
						    			</div>
					    			</div>
					    			<div class="clearfix"></div>
					    		</li>
								<li>
					    			<div class="row">
					    				<div class="col-sm-3">
					    				Info <span class="pull-right text-right">:</span>
						    			</div>
						    			<div class="col-sm-9">
						    				Tlp (021) 735.5999, Fax. (021) 7289 5566, SMS 0857 1863 5544 dan Pin BBM 7CEAF292.<br>
						    				Email: <a href="mailto:info.ibid@ibid.astra.co.id" class="inline-block">info.ibid@ibid.astra.co.id</a>
						    			</div>
					    			</div>
					    			<div class="clearfix"></div>
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
								       			<div class="right-arrow pull-right"></div>
								      			1. Pada saat open house
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules1" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peminat dapat melihat objek lelang yang akan dijual selama acara open house.
								    			</li>
								    			<li>
								    				Peminat hanya diperkenankan memeriksa kondisi fisik dan kelengkapan kendaraan / motor / gadget, tidak diperkenankan untuk melakukan bongkar pasang atau sejenisnya yang dapat merusak objek lelang.
								    			</li>
								    			<li>
								    				Peminat dilarang mengambil atau merusak atribut, nomor, tulisan atau tanda-tanda yang menempel pada objek lelang.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules2" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div>
								      			2. Kondisi objek yang dijual
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules2" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Kondisi objek lelang yang dijual adalah "sebagaimana adanya".
								    			</li>
								    			<li>
								    				Peserta wajib meneliti unit yang akan ditawar serta mengetahui kondisinya. Jika terdapat kekurangan atau cacat baik yang terlihat maupun tak terlihat bukan menjadi tanggung jawab penjual.
								    			</li>
								    			<li>
								    				Untuk memudahkan para peminat, panitia menyediakan daftar lot yang berisi data unit yang dapat dijadikan panduan dalam memilih objek lelang.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules3" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div>
								      			3. Sebelum mengikuti lelang
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules3" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peminat dapat melihat objek lelang yang akan dijual selama acara open house.
								    			</li>
								    			<li>
								    				Peminat hanya diperkenankan memeriksa kondisi fisik dan kelengkapan kendaraan / motor / gadget, tidak diperkenankan untuk melakukan bongkar pasang atau sejenisnya yang dapat merusak objek lelang.
								    			</li>
								    			<li>
								    				Peminat dilarang mengambil atau merusak atribut, nomor, tulisan atau tanda-tanda yang menempel pada objek lelang.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules4" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div>
								      			4. Pada saat mengikuti lelang
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules4" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peminat dapat melihat objek lelang yang akan dijual selama acara open house.
								    			</li>
								    			<li>
								    				Peminat hanya diperkenankan memeriksa kondisi fisik dan kelengkapan kendaraan / motor / gadget, tidak diperkenankan untuk melakukan bongkar pasang atau sejenisnya yang dapat merusak objek lelang.
								    			</li>
								    			<li>
								    				Peminat dilarang mengambil atau merusak atribut, nomor, tulisan atau tanda-tanda yang menempel pada objek lelang.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules5" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div>
								      			5. Penawaran
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules5" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peminat dapat melihat objek lelang yang akan dijual selama acara open house.
								    			</li>
								    			<li>
								    				Peminat hanya diperkenankan memeriksa kondisi fisik dan kelengkapan kendaraan / motor / gadget, tidak diperkenankan untuk melakukan bongkar pasang atau sejenisnya yang dapat merusak objek lelang.
								    			</li>
								    			<li>
								    				Peminat dilarang mengambil atau merusak atribut, nomor, tulisan atau tanda-tanda yang menempel pada objek lelang.
								    			</li>
								    		</ul>
								    	</div>
								  	</div>
								</div>
								<div class="panel panel-default">
									<a href="#collapse-rules6" data-toggle="collapse" class="collapsed" data-parent="#accordion">
										<div class="panel-heading">
								    		<h4 class="panel-title expand">
								       			<div class="right-arrow pull-right"></div>
								      			6. Pemenang
								      		</h4>
								    	</div>
									</a>
								  	<div id="collapse-rules6" class="panel-collapse collapse">
								    	<div class="panel-body bg-grey">
								    		<ul>
								    			<li>
								    				Peminat dapat melihat objek lelang yang akan dijual selama acara open house.
								    			</li>
								    			<li>
								    				Peminat hanya diperkenankan memeriksa kondisi fisik dan kelengkapan kendaraan / motor / gadget, tidak diperkenankan untuk melakukan bongkar pasang atau sejenisnya yang dapat merusak objek lelang.
								    			</li>
								    			<li>
								    				Peminat dilarang mengambil atau merusak atribut, nomor, tulisan atau tanda-tanda yang menempel pada objek lelang.
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