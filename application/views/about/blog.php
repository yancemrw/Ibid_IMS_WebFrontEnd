<section class="slide-section theblog">
	<div class="blog-slide">
		<?php foreach($banner->banner as $keyBanner => $valueBanner) { ?>
		<div class="item">
			<div class="slide-image">
				<img src="<?php echo linkservice('cms').'uploads/contents/'.$valueBanner->Photo; ?>" />
			</div>
		</div>
		<?php } ?>
	</div>
</section>
<section class="section-blog">
	<div class="container-fluid-blog">
		<div class="row">
			<h2 class="title-blog">News</h2>
			<?php
			foreach($news->news as $keyNews => $valueNews) {
				if($keyNews < 3) {
			?>
			<div class="col-md-4 col-sm-6 col-custom">
				<div class="box-new">
					<a href="<?php echo site_url('blog_details'); ?>">
						<div class="image-new">
							<img src="<?php echo linkservice('cms').'uploads/news/'.$valueNews->gambar; ?>" class="img-responsive width-100" />
						</div>
						<h2>
							<?php echo (strlen($valueNews->title) < 80) ? $valueNews->title : substr($valueNews->title, 0, 80).'...'; ?>
							<span><?php echo (strlen($valueNews->subtitle) < 25) ? $valueNews->subtitle : substr($valueNews->subtitle, 0, 25).'...'; ?></span>
						</h2>
						<div class="content"><?php echo (strlen($valueNews->content) < 180) ? $valueNews->content : substr($valueNews->content, 0, 180).'...'; ?></div>
						<div class="date"><?php echo date_format(date_create($valueNews->datepost), "d F Y"); ?></div>
					</a>
				</div>
			</div>
			<?php
				}
			}
			?>
			<div class="col-md-12 col-sm-12 col-xs-12 text-center button-blog-section">
				<button class="btn btn-green" disabled>Lihat Selengkapnya</button>
			</div>
		</div>
		<div class="row">
			<h2 class="title-blog">Info & Tips</h2>
			<?php
			foreach($info->news as $keyInfo => $valueInfo) {
				if($keyInfo < 3) {
			?>
			<div class="col-md-4 col-sm-6 col-custom">
				<div class="box-new">
					<a href="<?php echo site_url('blog_details'); ?>">
						<div class="image-new">
							<img src="<?php echo linkservice('cms').'uploads/news/'.$valueInfo->gambar; ?>" class="img-responsive width-100" />
						</div>
						<h2>
							<?php echo (strlen($valueInfo->title) < 80) ? $valueInfo->title : substr($valueInfo->title, 0, 80).'...'; ?>
							<span><?php echo (strlen($valueInfo->subtitle) < 25) ? $valueInfo->subtitle : substr($valueInfo->subtitle, 0, 25).'...'; ?></span>
						</h2>
						<div class="content"><?php echo (strlen($valueInfo->content) < 180) ? $valueInfo->content : substr($valueInfo->content, 0, 180).'...'; ?></div>
						<div class="date"><?php echo date_format(date_create($valueInfo->datepost), "d F Y"); ?></div>
					</a>
				</div>
			</div>
			<?php
				}
			}
			?>
			<div class="col-md-12 col-sm-12 col-xs-12 text-center button-blog-section">
				<button class="btn btn-green" disabled>Lihat Selengkapnya</button>
			</div>
		</div>
	</div>
</section>
<section class="testimoni section-blog">
	<div class="container-fluid-blog">
		<div class="row">
			<h2 class="title-blog">Testimoni</h2>
			<div class="col-md-12">
				<div class="testimoni-slide">
					<?php foreach($content->testimoni as $keyTesti => $valTesti) { ?>
					<div class="item clearfix active">
						<div class="content-testimoni background-white">
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
			arrows: true,
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