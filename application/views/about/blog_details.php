<section class="section-blog-detail">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb">
				<li><a href="blog.html">Home</a></li>
				<li class="active">Pesta Lelang iBID 2016</li>
			</ul>
			<div class="col-md-12">
				<div class="detail-blog">
					<div class="header-blog">
						<img src="<?php echo base_url('assetsfront/images/background/bg-blog-detail.png'); ?>" alt="">
					</div>
					<div class="content-detail-blog">
						<h2>Pesta Lelang Ibid 2016</h2>
						<p class="subtitle"><span>iBID</span> / 9 Oktober 2016 / <i class="fa fa-view"></i> 50 / <i class="fa fa-globe"></i> Seputar iBID</p>
						<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid tanggal 8 & 9 Oktober 2016 di Parkir Timur Senayan. </p>
						<p>Akan ada 250 unit mobil dengan berbagai varian merek dan tipe, ratusan motor dan gadget, hingga alat berat. Temukan mobil idaman yang ngga nguras kantong kamu!</p>
						<p>Ngga hanya itu, saksikan juga hiburan kece dari Project Pop, @Thekangkung & Stand up Comedy. Masih banyak keseruan lain yang bisa dijumpai di acara seperti food truck, free eco car wash, kids corner dan lainnya.</p>
						<p>Free tiket masuk!</p>
						<p>Sponsored by Toyota, Astra Finance, Bank Mandiri, Garda Oto, BCA, Astra Life ID, Daihatsu Indonesia, Uber, Pertamina </p>
						<p>Supported by <span>DetikOto.com Liputan6.com Kompas.com 101 Jakfm</span></p>
						<p>More Info CLICK here: <a href="<?php echo site_url(); ?>">http://ibid.astra.co.id</a></p>
						<h2>Kirim Artikelnya</h2>
						<ul>
							<li><a href=""><img src="<?php echo base_url('assetsfront/images/icon/ic-instagram.png'); ?>" alt=""></a></li>
							<li><a href=""><img src="<?php echo base_url('assetsfront/images/icon/ic-twitter.png'); ?>" alt=""></a></li>
							<li><a href=""><img src="<?php echo base_url('assetsfront/images/icon/ic-facebook.png'); ?>" alt=""></a></li>
							<li><a href=""><img src="<?php echo base_url('assetsfront/images/icon/ic-youtube.png'); ?>" alt=""></a></li>
						</ul>
						<div class="display-block related-article">
							<h3>Artikel Terkait</h3>
							<div>
								<div class="testimonis-slide">
									<div class="padding-5px">
										<div class="box-new">
											<a href="#">
												<div class="image-new">
													<img src="<?php echo base_url('assetsfront/images/background/image-news.png'); ?>" alt="" class="img-responsive width-100">
												</div>
												<h2>Pesta Lelang Ibid 2016 <span>Jakarta</span></h2>
												<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
											</a>
										</div>
									</div>
									<div class="padding-5px">
										<div class="box-new">
											<a href="">
												<div class="image-new">
													<img src="<?php echo base_url('assetsfront/images/background/image-news-2.png'); ?>" alt="" class="img-responsive width-100">
												</div>
												<h2>Promo Mobil 4x4 <span>Jakarta</span></h2>
												<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
											</a>
										</div>
									</div>
									<div class="padding-5px">
										<div class="box-new">
											<a href="">
												<div class="image-new">
													<img src="<?php echo base_url('assetsfront/images/background/image-news-3.png'); ?>" alt="" class="img-responsive width-100">
												</div>
												<h2>Ayo Segera Ikuti Lelangnya <span>Jakarta</span></h2>
												<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center button-blog-section">
								<button class="btn btn-green" disabled>Lihat Selengkapnya</button>
							</div>
						</div>
					</div>
				</div>
			</div>
    	</div>
    </div>
</section>

<script>
$(document).ready(function() {
	$('.testimonis-slide').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: false,
					dots: true
				}
			},
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: false,
					dots: true
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					infinite: false,
					dots: true
				}
			}
		]
	});
});
</script>