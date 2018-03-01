<section class="section section-auction">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2>Bandingkan</h2>
				<div class="row compare-list">
					<?php for ($i = 0; $i < 4; $i++) { ?>
					<div class="col-md-3 item">
						<div class="list-product box-recommend list-compare">
							<a href="javascript:;">
								<div class="thumbnail">
									<div class="height-300px thumnail-custom" style="background: url('<?php echo base_url('assetsfront/images/background/1.jpg'); ?>')"></div>
									<div class="overlay-grade">Grade <span>A</span></div>
									<p class="overlay-lot">LOT ???</p>
									<a href="" class="delete-compare field-link" data-tooltip="Hapus Item Bandingkan"><i class="fa fa-times"></i></a>
								</div>
								<h2>DAIHATSU LUXIO 1.5 X MINIBUS AT </h2>
								<span>2014</span> <span class="price">Rp. 72,000,000</span>
							</a>
							<h3 class="header-compare">Nomor Polisi <span>B2003THN</span></h3>
							<table class="table table-list-compare">
								<tr>
									<td>Model Kendaraan</td>
									<td>Minibus</td>
								</tr>
								<tr>
									<td>KEUR</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Kilometer</td>
									<td>3456</td>
								</tr>
							</table>
							<table class="table table-list-compare">
								<tr>
									<td>Nomor Rangka</td>
									<td>MHKM1BA3JDJ011634</td>
								</tr>
								<tr>
									<td>Nomor Mesin</td>
									<td>32423423</td>
								</tr>
								<tr>
									<td>Tipe</td>
									<td>Splash</td>
								</tr>
								<tr>
									<td>Transmisi</td>
									<td>MT</td>
								</tr>
								<tr>
									<td>Warna Fisik</td>
									<td>Hitam</td>
								</tr>
								<tr>
									<td>STNK</td>
									<td>-</td>
								</tr>
							</table>
							<div class="button-compare">
								<button class="btn btn-violet">Tawar</button>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
$(document).ready(function () {
	$('.scroll-dropdown').slimscroll({
		allowPageScroll: true
	});

	$(".select-custom").select2({
		minimumResultsForSearch: -1
	});

	$('.compare-list').slick({
		dots: false,
		infinite: false,
		speed: 300,

		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: 
		[
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: false,
					dots: true,

					prevArrow: false,
					nextArrow: false
				}
			},
			{
				breakpoint: 801,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: true,

					prevArrow: false,
					nextArrow: false
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,

					prevArrow: false,
					nextArrow: false
				}
			}
		]
	});

	$('#toggle-nav').click(function () {
		$('.navbar-collapse.collapse').toggleClass('open')
	});
	$('.nav-close').click(function () {
		$('.navbar-collapse.collapse').toggleClass('open')
	});

	$('.lang-mob a').click(function () {
		$('.help-mob ul').removeClass('open')
		$(this).toggleClass('opened')
		$(this).siblings('ul').toggleClass('open')
	});
	$('.help-mob a').click(function () {
		$('.lang-mob ul').removeClass('open')
		$(this).toggleClass('opened')
		$(this).siblings('ul').toggleClass('open')
	});
});
</script>