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
			'content_title'		=> array('Cari Objek Lelang', 'Unit dan dokumen lelang', 'Registrasi', 'NPL', 'Ikut lelang', 'Setelah lelang', 'MAP', 'Titip Lelang'),
			'content_1'			=> $this->faq_content(1),
			'content_2'			=> $this->faq_content(2),
			'content_3'			=> $this->faq_content(3),
			'content_4'			=> $this->faq_content(4),
			'content_5'			=> $this->faq_content(5),
			'content_6'			=> $this->faq_content(6),
			'content_7'			=> $this->faq_content(7),
			'content_8'			=> $this->faq_content(8),
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
			'content_title'		=> array('Lokasi'),
			'content_1'			=> $this->loc_content(),
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
			'content_title'		=> array('Hubungi Kami'),
			'content_1'			=> $this->ctc_content(),
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

	private function faq_content($value) {
		$faq = array();
		if($value === 1) {
			$keys = 'objek';
			$faq[0]['title'] = 'Bagaimana cara mendapat informasi daftar objek lelang terkini yang dikirim secara rutin lewat email?';
			$faq[0]['content'] = 'Untuk mendapatkan email informasi daftar objek lelang yang akan dilelang secara rutin, Anda bisa melakukan registrasi di website IBID dan mencantumkan alamat email yang aktif digunakan.';
			$faq[1]['title'] = 'Bagaimana jika objek lelang yang Anda cari belum tersedia pada jadwal lelang yang tercantum di website?';
			$faq[1]['content'] = 'Sistem kami akan melakukan update informasi data lelang secara berkala, khususnya untuk jadwal lelang terdekat. Apabila kendaraan yang dicari belum tersedia, Anda dapat mengakses jadwal lelang paling dekat secara berkala untuk melihat penambahan atau perubahan data daftar objek lelang.';
			$faq[2]['title'] = 'Apa langkah selanjutnya setelah Anda menemukan objek lelang yang sedang dicari di website?';
			$faq[2]['content'] = 'Setelah menemukan objek lelang yang dicari, Anda dipersilahkan melakukan registrasi di website (jika belum memiliki akun), selanjutnya masuk ke halaman "beli NPL" (Nomor Peserta Lelang), lalu mengikuti lelang pada jadwal lelang yang tertera di detail informasi objek lelang  dengan melakukan bidding atau penawaran. ';
		}
		if($value === 2) {
			$keys = 'document';
			$faq[0]['title'] = 'Bagaimana dengan kondisi objek lelang?';
			$faq[0]['content'] = 'Anda dapat datang ke lokasi untuk melakukan pengecekan fisik kendaraan atau objek lelang lain secara langsung di lokasi lelang 3 hari sebelum lelang dimulai atau biasa disebut open house. Jika tidak sempat hadir ke lokasi, Anda dapat menghubungi nomor telepon yang tercantum di halaman website pada bagian detail informasi objek lelang.';
			$faq[1]['title'] = 'Bagaimana dengan kelengkapan dokumen objek lelang?';
			$faq[1]['content'] = 'Untuk mengetahui kelengkapan dokumen kendaraan atau objek lelang lain, kami menyediakan keterangan pada detail informasi objek lelang di website dan pada daftar objek lelang yang akan dilelang disebut dengan daftar lot yang kami bagikan di lokasi. Anda juga dapat datang langsung lokasi kami untuk melihat salinan data yang kami sediakan di bagian informasi.';
		}
		if($value === 3) {
			$keys = 'registrasi';
			$faq[0]['title'] = 'Bagaimana cara melakukan registrasi?';
			$faq[0]['content'] = 'Pertama, Anda harus memiliki alamat email untuk membuat akun yang akan digunakan untuk mengikuti lelang di IBID. Atau, Anda bisa melakukan registrasi menggunakan akun sosial media. Selanjutnya,  Anda wajib melengkapi beberapa data di halaman akun Anda untuk kelengkapan administrasi. Setelah itu, Anda baru dapat melakukan pembelian NPL untuk mengikuti lelang. ';
		}
		if($value === 4) {
			$keys = 'npl';
			$faq[0]['title'] = 'Apa itu NPL?';
			$faq[0]['content'] = 'NPL adalah Nomor Peserta Lelang yang akan Anda gunakan untuk melakukan bidding atas kendaraan atau objek lelang lain yang dipilih. Bentuk NPL adalah beberapa digit angka yang dapat digunakan dari website atau mobile application dan juga dapat dicetak untuk digunakan saat melakukan bidding di lokasi (Onsite).';
			$faq[1]['title'] = 'Berapa harga NPL dan bagaimana cara membeli NPL?';
			$faq[1]['content'] = 'Harga NPL berdasarkan obyek lelang adalah sebagai berikut: <br />
									a. Rp 5.000.000 (lima juta rupiah)/NPL mobil <br />
									b. Rp 1.000.000 (satu juta rupiah)/NPL motor <br />
									c. Rp 25.000.000 (dua puluh lima juta rupiah)/NPL alat berat <br />
									d. Rp 100.000 (seratus ribu rupiah)/NPL gadget <br /><br />

									Adapun cara melakukan pembelian NPL adalah: <br />
									a. Menentukan obyek lelang dan jumlah NPL yang akan dibeli sesuai jadwal lelang kendaraan yang dipilih dari website <br />
									b. Melakukan pembayaran atas NPL yang telah dibeli dengan menggunakan salah satu dari beberapa metode pembayaran yang tersedia. <br />
									c. Lakukan pembayaran sesuai metode yang telah Anda pilih sebelumnya. <br />
									d. Anda akan menerima email notifikasi bahwa pembayaran sudah berhasil dilakukan. Atau, Anda dapat mengecek akun IBID di website atau mobile application. NPL pun sudah bisa digunakan.';
			$faq[2]['title'] = 'Bagaimana cara pembayaran pembelian NPL?';
			$faq[2]['content'] = 'Peserta dapat melakukan pembayaran pembelian NPL menggunakan nomor Virtual Account (VA) yang akan muncul setelah Anda membeli NPL dengan mekanisme 1 peserta mendapat 1 nomor VA. Anda dapat memilih nomor VA Bank Mandiri yang dapat digunakan di semua bank atau nomor VA BCA yang digunakan untuk pengguna BCA.';
			$faq[3]['title'] = 'Apa itu NPL Unlimited? Apakah perbedaan NPL Unlimited dengan NPL Reguler?';
			$faq[3]['content'] = 'NPL Unlimited adalah solusi jika Anda ingin mengikuti beberapa jadwal lelang dan menawar lebih dari satu objek lelang. Dengan membeli satu NPL, peserta dapat mengikuti semua jadwal lelang yang diselenggarakan dan dapat memenangkan lebih dari satu objek lelang. Hal ini berbeda dengan NPL Reguler di mana peserta hanya bisa menawar satu objek lelang di satu jadwal lelang tersebut. ';
			$faq[4]['title'] = 'Bagaimana mekanisme pembelian dan penggunaan NPL Unlimited?';
			$faq[4]['content'] = '- NPL Unlimited dapat dibeli jika Anda pernah memenangkan setidaknya satu kendaraan dari jadwal lelang sebelumnya. <br />
									- NPL Unlimited untuk mobil senilai Rp 15.000.000/NPL, sedangkan untuk motor senilai Rp 5.000.000/NPL. <br />
									- Uang pembelian NPL Unlimited akan menjadi jaminan yang menetap selama 3 bulan dan dapat diperpanjang dengan konfirmasi. <br />
									- Uang pembelian NPL Unlimited tidak menjadi akumulasi total tagihan kendaraan yang dimenangkan oleh pemenang lelang. <br />
									- Apabila terjadi wanprestasi setelah 5 hari kerja dari tanggal pelaksanaan lelang, maka NPL Unlimited ter-blokir secara otomatis dan tidak dapat digunakan lagi kecuali peserta kembali melakuan pembelian NPL Unlimited';
			$faq[5]['title'] = 'Bagaimana mekanisme uang pembelian NPL jika Anda menang atau kalah dilelang?';
			$faq[5]['content'] = 'Jika Anda memenangkan kendaraan atau objek lelang lain yang dipilih, uang pembelian NPL akan terakumulasi dalam pelunasan atas total tagihan pemenang, sedangkan jika Anda belum berhasil memenangkan objek lelang yang dipilih, uang pembelian NPL akan dikembalikan 100% tanpa potongan apapun.';
		}
		if($value === 5) {
			$keys = 'lelang';
			$faq[0]['title'] = 'Bagaimana cara memenangkan objek lelang yang diinginkan?';
			$faq[0]['content'] = 'Untuk mendapat objek lelang yang diinginkan, Anda wajib mengikuti lelang dengan melakukan bidding atas objek yang diinginkan. Mekanisme pelelangan adalah tiap peserta bersaing untuk melakukan penawaran harga. Peserta yang menawar harga tertinggi akan dinyatakan sebagai pemenang. IBID memberikan opsi Live Auction menggunakan gadget, di mana Anda dapat melakukan bidding bersamaan dengan peserta lelang Onsite. Atau, Anda bisa memilih opsi Lelang Online sesuai jadwal dari gadget Anda.';
			$faq[1]['title'] = 'Apakah Anda harus hadir saat lelang berlangsung?';
			$faq[1]['content'] = 'Anda tidak harus datang ke lokasi saat lelang. Anda bisa memanfaatkan opsi lelang Live Auction untuk melakukan bidding melalui akun IBID Anda secara real time melalui gadget.';
			$faq[2]['title'] = 'Apa perbedaan Live Auction dengan Lelang Online?';
			$faq[2]['content'] = 'Live Auction adalah lelang yang diselenggarakan di lokasi pada jadwal tertentu dan bisa diikuti dengan datang langsung ke lokasi atau melalui gadget dari manapun Anda berada secara real time. Sementara itu, Lelang Online diselenggarkan dalam rentang waktu tertentu (biasanya selama 3-5 hari) dan hanya bisa diikuti melalui gadget tanpa kehadiran fisik peserta di lokasi lelang.';
			$faq[3]['title'] = 'Apakah akun untuk mengukuti Live Auction berbeda dengan Lelang Online?';
			$faq[3]['content'] = 'Dengan melakukan registrasi di website, Anda mempunyai satu akun yang dapat digunakan untuk semua opsi lelang Onsite, Online, maupun Live Auction. Anda juga dapat menggunakan akun sama untuk menitipkan kendaraan atau objek lain yang ingin dilelang.';
			$faq[4]['title'] = 'Apa itu fitur Auto Bid?';
			$faq[4]['content'] = 'Auto Bid adalah fitur yang dapat Anda manfaatkan jika ingin melakukan bidding namun berhalangan mengikuti lelang secara langsung (real time) saat jadwal Live Auction ataupun Lelang Online. Dengan Auto Bid, Anda dapat menentukan harga bidding tertentu sebelum lelang berlangsung. Lalu, sistem kami secara otomatis akan melakukan bidding setinggi-tingginya sesuai harga yang telah Anda tentukan untuk memenangkan objek lelang yang diinginkan sesuai jadwalnya.';
			$faq[5]['title'] = 'Bagaimana cara menggunakan fitur Auto Bid?';
			$faq[5]['content'] = 'Fitur Auto Bid hanya tersedia pada mobile application IBID.';
		}
		if($value === 6) {
			$keys = 'after-lelang';
			$faq[0]['title'] = 'Bagaimana cara melunasi objek lelang yang dimenangkan?';
			$faq[0]['content'] = 'Pemenang lelang akan diberikan informasi jumlah nominal rupiah yang harus dibayar pada formulir Konfirmasi Pemenang Lelang (KPL), disertai dengan nomor Virtual Account (VA) atas objek lelang yang dimenangkan dengan mekanisme satu objek mendapat satu nomor VA. Formulir KPL diberikan di lokasi lelang atau dapat dikirimkan via email. Pemenang dapat melakukan pembayaran menggunakan nomor VA tersebut di seluruh bank baik dengan metode setor tunai atau sistem online bank terkait.';
			$faq[1]['title'] = 'Berapa lama masa pelunasan objek yang dimenangkan?';
			$faq[1]['content'] = 'Peserta diberikan waktu selama 5 hari kerja setelah hari lelang untuk melunasi kendaraan atau objek lain yang dimenangkan. Jika melebihi waktu ini, pemenang dinyatakan wanprestasi (gugur) dan uang pembelian NPL hangus.';
			$faq[2]['title'] = 'Kapan dokumen dari objek lelang yang dimenangkan bisa diambil?';
			$faq[2]['content'] = 'Informasi kapan tersedianya dokumen kendaraan atau objek lelang lain sudah tertulis dalam keterangan daftar lot di lokasi lelang dan di halaman detail objek lelang di website. Perhitungan hari ketersediaan dokumen kendaraan dimulai setelah hari lelang. Untuk memudahkan pemenang, kami juga menyediakan layanan pengiriman notifikasi saat dokumen sudah tersedia. Notifikasi dapat dilihat di menu transaksi pada akun peserta di website.';
			$faq[3]['title'] = 'Kapan pemenang dapat mengambil objek lelang yang dimenangkan?';
			$faq[3]['content'] = 'Kendaraan atau objel lelang lain yang dimenangkan dapat diambil setelah pemenang melakukan pelunasan. Setelah dana pelunasan aktif di rekening IBID, pemenang akan mendapat notifikasi via email dan update status transaksi pada halaman akun peserta di website bahwa pembayaran sudah diterima dan kendaraan bisa diambil.';
			$faq[4]['title'] = 'Bagaimana jika pemenang tidak mengambil kendaraan yang dimenangkan setelah lunas?';
			$faq[4]['content'] = 'Jika pemenang tidak melakukan pengambilan kendaraan setelah batas hari pelunasan, pemenang akan dikenakan biaya parkir sebesar Rp 100.000/kendaraan/hari keterlambatan, serta segala kerusakan dan kehilangan sepenuhnya menjadi tanggung jawab pemenang.';
			$faq[5]['title'] = 'Bagaimana jika pengambilan kendaraan atau dokumennya dilakukan bukan oleh pemenang?';
			$faq[5]['content'] = 'Jika berhalangan mengambil kendaraan atau dokumennya, pemenang dapat mengirim perwakilan dengan menyiapkan surat kuasa yang telah ditandatangani di atas materai, KTP asli pemenang, dan fotokopi KTP penerima kuasa.';
			$faq[6]['title'] = 'Apakah ada biaya tambahan saat pelunasan?';
			$faq[6]['content'] = 'Pada saat pelunasan, pemenang dikenakan biaya administrasi sebesar: <br />
									a. Rp 1.750.000/mobil <br />
									b. Rp 250.000/motor <br />
									c. Rp 2.500.000/alat berat <br />
									d. Rp 50.000/kamera <br />
									e. Rp 100.000/gadget <br />                                                                                    
									f. Rp 150.000/ipad atau iphone <br />
									g. Rp 300.000/desktop atau laptop';
			$faq[6]['title'] = 'Apa itu fitur Market Auction Price (MAP)?';
			$faq[6]['content'] = 'Market Auction Price (MAP) adalah fitur untuk mengetahui harga pasaran terkini kendaraan yang bersumber dari harga seluruh kendaraan yang lelang oleh IBID di seluruh kota lelang untuk beragam merek dan tipe mobil, disertai hasil penilaian atas setiap mobilnya.';
			$faq[7]['title'] = 'Bagaimana cara menggunakan fitur MAP?';
			$faq[7]['content'] = 'Fitur MAP secara ekslusif akan diberikan kepada peserta lelang yang membeli NPL unlimited mobil dan penitip mobil lelang tertentu.';
		}
		if($value === 7) {
			$keys = 'map';
			$faq[0]['title'] = 'Apa itu fitur Market Auction Price (MAP)?';
			$faq[0]['content'] = 'Market Auction Price (MAP) adalah fitur untuk mengetahui harga pasaran terkini kendaraan yang bersumber dari harga seluruh kendaraan yang lelang oleh IBID di seluruh kota lelang untuk beragam merek dan tipe mobil, disertai hasil penilaian atas setiap mobilnya.';
			$faq[1]['title'] = 'Bagaimana cara menggunakan fitur MAP?';
			$faq[1]['content'] = 'Fitur MAP secara ekslusif akan diberikan kepada peserta lelang yang membeli NPL Unlimited mobil dan penitip mobil lelang tertentu.';
		}
		if($value === 8) {
			$keys = 'titip';
			$faq[0]['title'] = 'Apa itu titip lelang?';
			$faq[0]['content'] = 'Titip lelang adalah layanan penitipan objek (kendaraan dan gadget) yang ingin dilelang oleh IBID. Layanan ini dapat dimanfaatkan oleh perseorangan ataupun perusahaan, dalam jumlah besar maupun satuan.';
			$faq[1]['title'] = 'Bagaimana cara menitipkan objek untuk dilelang oleh IBID?';
			$faq[1]['content'] = 'Sebelumnya, Anda harus memiliki akun IBID dengan mendaftar via website terlebih dahulu dengan mengisi data  seperti nama, email, kata sandi, dan lainnya. Setelah itu Anda dapat memilih menu "titip lelang" dan melengkapi data diri (nomor rekening bank untuk transfer dana jika objek telah terjual). Penitip dapat memilih jenis objek lelang yang akan dititipkan dan tanggal untuk inspeksi atas kendaraan yang akan dilelang.';
			$faq[2]['title'] = 'Apa saja syarat menitipkan objek untuk dilelang?';
			$faq[2]['content'] = 'Untuk perseorangan, syaratnya adalah membawa kendaraan yang akan dititipkan beserta dokumennya ke lokasi. Selanjutnya Anda harus menandatangani surat perjanjian penitipan kendaraan bermotor untuk dilelang, surat kuasa, dan surat pernyataan.';
			$faq[3]['title'] = 'Apa tujuan dilakukan inspeksi?';
			$faq[3]['content'] = 'Inspeksi dilakukan untuk mengetahui kondisi objek yang akan dilelang, mulai dari interior, eksterior, mesin, sampai rangka. IBID akan memberikan hasil inspeksi serta harga rekomendasi untuk membantu Anda memutuskan harga dasar objek yang akan dilelang secara real time.';
			$faq[4]['title'] = 'Bagaimana cara menentukan harga dasar kendaraan Anda?';
			$faq[4]['content'] = 'Setelah mendapatkan notifikasi bahwa inspeksi sudah selesai dilakukan, Anda akan menerima laporan hasil inspeksi beserta harga rekomendasi yang dikirim melalui email. Selanjutnya, Anda dapat memasukkan harga dasar pada akun Anda di website IBID dengan memilih menu "harga dasar" di halaman manajemen akun.';
			$faq[5]['title'] = 'Bagaimana cara mengetahui tahapan proses penitipan kendaraan dari awal hingga selesai dan berapa lama waktunya?';
			$faq[5]['content'] = 'Seluruh tahapan transaksi penitipan lelang di IBID dapat Anda pantau melalui akun Anda di menu "transaksi". Waktu proses penitipan lelang hingga objek terjual dan uang penjualan diterima penitip di lelang pertama di IBID adalah 7 hari kerja setelah hari lelang.';
			$faq[6]['title'] = 'Bagaimana jika kendaraan saya tidak terjual?';
			$faq[6]['content'] = 'Jika kendaraan tidak terjual, Anda dapat mengambil kembali kendaraan selambatnya satu hari setelah hari lelang. Anda akan dikenakan biaya pengelolaan selama kendaraan berada di lokasi sebesar Rp 250.000/kendaraan. Jika kendaraan belum diambil setelah satu hari pasca lelang, Anda akan dikenakan biaya parkir sebesar Rp 100.000/kendaraan/hari, serta segala kerusakan dan kehilangan sepenuhnya menjadi tanggung jawab Anda.';
			$faq[7]['title'] = 'Bagaimana jika kendaraan saya batal terjual karena pemenang tidak melunasi kendaraan sesuai durasi waktu yang telah ditentukan?';
			$faq[7]['content'] = 'Jika kendaraan yang seharusnya terjual ternyata tidak dilunasi oleh pemenang lelang sesuai waktu yang ditentukan, sesuai peraturan pemerintah, Anda akan mendapat biaya penggantian sebesar 50% dari biaya pembelian NPL oleh pemenang lelang.';
			$faq[8]['title'] = 'Bagaimana jika saya batal menitipkan kendaraan dilelang IBID?';
			$faq[8]['content'] = 'Jika Anda telah menandatangani beberapa dokumen persyaratan penitipan lelang dan kendaraan sudah melalui tahapan inspeksi serta persiapan lelang, Anda akan dikenakan biaya pengelolaan kendaraan selama kendaraan berada di lokasi sebesar Rp 250.000/kendaraan.';
		}
		$html = '<div class="panel-group no-margin" id="accordion">';
		foreach($faq as $key => $value) {
			$html .= '<div class="panel panel-default">
						<a href="#collapse-rules'.$keys.'-'.$key.'" data-toggle="collapse" class="collapsed" data-parent="#accordion">
							<div class="panel-heading">
								<h4 class="panel-title expand">
									<div class="right-arrow pull-right"></div>
									'.($key+1).'. '.$value['title'].'
								</h4>
							</div>
						</a>
					  	<div id="collapse-rules'.$keys.'-'.$key.'" class="panel-collapse collapse">
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
		$html .= '<li class="box-location">
					<h4>'.strtoupper('balikpapan').'</h4>
					<p>Jl. MT. Haryono No. 140 RT 84, Kel. Gn. Bahagia  (Sebelah kanan pintu masuk Perum BDI) <span>0542-8861663 / 08125378210</span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('bandung').'</h4>
					<p>Jl. Karapitan 109 Buah Batu Kel.Burangrang Bandung <span>085721718391 / 0817386349 </span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('banjarmasin').'</h4>
					<p>Jl. A. Yani KM.17,9 Rt.11 Rw.03, Kel. Landasan Ulin Barat Kec. Liang Anggang, Banjarbaru banjarmasin <span>082255292557 / 085245155783</span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('jakarta').'</h4>
					<p>Pool IBID Jl.Ciputat Raya No.100 Kebayoran Lama, Jakarta Selatan <span>021-7355999 / 081287735544</span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('makassar').'</h4>
					<p>Gudang SELOG Kawasan Industri Parangloe Indah Makasar <span>081348483555 / 081342300969</span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('medan').'</h4>
					<p> Jl.Asrama No.19 Samping Kantor Pajak, Pondok Kelapa Medan <span>061-8444588 / 085371747774</span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('palembang').'</h4>
					<p>Jl. Soekarno Hatta No. 414 Kel. Karya Baru, Kec. Alang-alang Lebar ( samping PT Waskita ) Kota Palembang <span>081532003443 / 081368959318</span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('pekanbaru').'</h4>
					<p>Jl. Soekarno Hatta KM 9 No. 46A, Sidomulyo Barat - Pekanbaru <span>0761-588599 / 081310943839</span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('semarang').'</h4>
					<p>Jl. Wolter Mongonsidi No.115A Semarang - Jawa Tengah <span>08119639383 / 085727799993</span></p>
				</li>';
		$html .= '<li class="box-location">
					<h4>'.strtoupper('surabaya').'</h4>
					<p>Jl. Raya Gilang 113 Kletek Sepanjang Sidoarjo <span>081554003518 / 08119421086</span></p>
				</li>';
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
                        		<option>Kategori</option>
                        		<option>Titip Lelang</option>
                        		<option>Masukan</option>
                        		<option>Pertanyaan</option>
                        		<option>Komplain</option>
                        		<option>Lain-lain</option>
                        	</select>
                        </div>
                        <div class="form-group floating-label">
                           <input type="text" name="" class="form-control input-custom">
                           <label class="label-schedule">Judul</label>
                        </div>
                        <div class="form-group floating-label">
                           <textarea class="form-control border-radius-none" rows="5"></textarea>
                           <label class="label-schedule">Deskripsi</label>
                        </div>
					</form>
					<div class="text-left">
						<button class="btn btn-green" disabled>Submit</button>
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