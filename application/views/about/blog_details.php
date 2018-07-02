<section class="section-blog-detail">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb">
				<li><a href="blog.html">Home</a></li>
				<li class="active"><?php echo $data[0]->title; ?></li>
			</ul>
			<div class="col-md-12">
				<div class="detail-blog">
					<div class="header-blog">
						<img src="<?php echo linkservice('cms').'uploads/news/'.$data[0]->gambar; ?>" alt="">
					</div>
					<div class="content-detail-blog">
						<h2><?php echo $data[0]->title; ?></h2>
						<p class="subtitle"><span><?php echo $data[0]->tagberita; ?></span> / <?php echo $data[0]->datepost; ?> / <i class="fa fa-view"></i> 50 / <i class="fa fa-globe"></i> Seputar iBID</p>
						<?php echo $data[0]->content; ?>
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
									<?php  
									foreach($dataBanner as $key => $value) { 
										if($key < 3) { 
									?> 
									<div class="padding-5px">
										<div class="box-new">
											<a href="#">
												<div class="image-new">
													<img src="<?php echo linkservice('cms').'uploads/news/'.$value->gambar; ?>" alt="" class="img-responsive width-100">
												</div>
												<h2><?php echo $value->title; ?><span><?php echo $value->subtitle; ?></span></h2> 
												<?php echo (strlen($value->content) < 180) ? $value->content : substr($value->content, 0, 180).'...'; ?> 
												<p><span><?php echo date_format(date_create($valueInfo->datepost), "d F Y"); ?></span></p>
											</a>
										</div>
									</div>
									<?php  
										} 
									}
									?>
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
