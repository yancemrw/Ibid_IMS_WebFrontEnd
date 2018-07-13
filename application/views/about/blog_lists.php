<section class="section-blog">
	<div class="container">
		<div class="row">
			<div class="blog-lst">
				<h2 class="title-blog"><?php echo $title_content; ?></h2>
				<ul>
					<?php foreach($content->news as $key => $value) { ?>
					<li class="col-md-4 col-sm-6 col-custom">
		                <div class="box-new">
							<a href="<?php echo site_url('blog_details').'?id='.$value->id.'&slug='.$value->slugkategori; ?>">
								<div class="image-new">
									<img src="<?php echo linkservice('cms').'uploads/news/'.$value->gambar; ?>" class="img-responsive" />
								</div>
								<h2>
									<?php echo (strlen($value->title) < 80) ? $value->title : substr($value->title, 0, 80).'...'; ?>
									<span><?php echo (strlen($value->subtitle) < 25) ? $value->subtitle : substr($value->subtitle, 0, 25).'...'; ?></span>
								</h2>
								<div class="content"><?php echo (strlen($value->content) < 180) ? $value->content : substr($value->content, 0, 180).'...'; ?></div>
								<div class="date"><?php echo date_format(date_create($value->datepost), "d F Y"); ?></div>
							</a>
		                </div>
					</li>
					<?php } ?>
				</ul>
				<div class="col-md-12 col-sm-12 col-xs-12 text-center button-blog-section mb40">
					<button class="btn btn-green">Selanjutnya</button>
				</div>   
			</div>
		</div>
	</div>
</section>
