<section class="slide-section blog">
	<div class="blog-slide">
		<div class="item active">
			<div class="slide-image">
				<img src="<?php echo base_url('assetsfront/images/background/bg-blog.png'); ?>" alt="">
			</div>
		</div>
		<div class="item">
			<div class="slide-image">
				<img src="<?php echo base_url('assetsfront/images/background/bg-blog.png'); ?>" alt="">
			</div>
		</div>
		<div class="item">
			<div class="slide-image">
				<img src="<?php echo base_url('assetsfront/images/background/bg-blog.png'); ?>" alt="">
			</div>
		</div>
	</div>
</section>
<section class="section-blog">
	<div class="container-fluid-blog">
		<div class="row">
			<h2 class="title-blog">News</h2>
			<div class="col-md-4 col-sm-6 pl-0">
				<div class="box-new">
					<a href="blog-detail.html">
						<div class="image-new">
							<img src="<?php echo base_url('assetsfront/images/background/image-news.png'); ?>" alt="" class="img-responsive">
						</div>
						<h2>Pesta Lelang Ibid 2016 <span>Jakarta</span></h2>
						<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="box-new">
					<a href="blog-detail.html">
						<div class="image-new">
							<img src="<?php echo base_url('assetsfront/images/background/image-news-2.png'); ?>" alt="" class="img-responsive">
						</div>
						<h2>Promo Mobil 4x4 <span>Jakarta</span></h2>
						<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 pr-0">
				<div class="box-new">
					<a href="blog-detail.html">
						<div class="image-new">
							<img src="<?php echo base_url('assetsfront/images/background/image-news-3.png'); ?>" alt="" class="img-responsive">
						</div>
						<h2>Ayo Segera Ikuti Lelangnya <span>Jakarta</span></h2>
						<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
					</a>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 text-center button-blog-section">
				<button class="btn btn-green">Lihat Selengkapnya</button>
			</div>
		</div>
		<div class="row">
			<h2 class="title-blog">Info & Tips</h2>
			<div class="col-md-4 pl-0">
				<div class="box-new">
					<a href="blog-detail.html">
						<div class="image-new">
							<img src="<?php echo base_url('assetsfront/images/background/image-news-4.png'); ?>" alt="" class="img-responsive">
						</div>
						<h2>Cara Menang dalam Lelang <span>Jakarta</span></h2>
						<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box-new">
					<a href="blog-detail.html">
						<div class="image-new">
							<img src="<?php echo base_url('assetsfront/images/background/image-news-5.png'); ?>" alt="" class="img-responsive">
						</div>
						<h2>Mobil Tetap Kering Saat Hujan <span>Jakarta</span></h2>
						<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
					</a>
				</div>
			</div>
			<div class="col-md-4 pr-0">
				<div class="box-new">
					<a href="blog-detail.html">
						<div class="image-new">
							<img src="<?php echo base_url('assetsfront/images/background/image-news-6.png'); ?>" alt="" class="img-responsive">
						</div>
						<h2>Cara Cepat Ngangkat Motor <span>Jakarta</span></h2>
						<p>Cari mobil bekas yang nggak bikin kantong jebol? Bisa beli lewat lelang loh, yuk dateng ke #PestaLelangIbid. <span>9 Oktober 2016</span></p>
					</a>
				</div>
			</div>
			<div class="col-md-12 text-center button-blog-section">
				<button class="btn btn-green">Lihat Selengkapnya</button>
			</div>
		</div>
	</div>
</section>
<section class="testimoni section-blog">
	<div class="container-fluid">
		<div class="row">
			<h2 class="title-blog">Testimoni</h2>
			<div class="col-md-12">
				<div class="testimoni-slide">
					<?php foreach($content->testimoni as $keyTesti => $valTesti) { ?>
					<div class="item clearfix active">
						<div class="content-testimoni">
						<a href="#">
							<div class="box-img-slide">
								<img src="<?php echo linkservice('cms').'uploads/contents/'.$valTesti->Photo; ?>" class="img-responsive">
							</div>
							<h2><?php echo $valTesti->Title; ?></h2>
							<p class="text-align-left">
								<span><?php echo $valTesti->Subtitle; ?></span>
								<?php echo $valTesti->Content; ?>
							</p>
						</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$("nav").sticky({
			topSpacing:0
		});
     
		$('.blog-slide').slick({
			dots: false,
			infinite: false,
			speed: 300,
			autoplay: true,
			autoplaySpeed: 2000,
			slidesToShow: 1,
			slidesToScroll: 1,
			responsive: true,
		});
     
		$('.testimoni-slide').slick({
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
          
		$('#toggle-nav').click(function() {
			$('.navbar-collapse.collapse').toggleClass('open');
		});

		$('.nav-close').click(function() {
			$('.navbar-collapse.collapse').toggleClass('open');
		});
	          
		$('.lang-mob a').click(function() {
			$('.help-mob ul').removeClass('open');
			$(this).toggleClass('opened');
			$(this).siblings('ul').toggleClass('open');
		});

		$('.help-mob a').click(function() {
			$('.lang-mob ul').removeClass('open');
			$(this).toggleClass('opened');
			$(this).siblings('ul').toggleClass('open');
		});
	});
</script>