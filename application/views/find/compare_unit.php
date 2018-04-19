<section class="section section-auction">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2>Bandingkan</h2>
				<div class="row compare-list" id="loadContent">
					<div></div>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.slick-track {
		display: block !important;
		position: relative !important;
		margin-left: auto !important;
		margin-right: auto !important;
	}
</style>

<script>
$(document).ready(function () {
	//show compare element
	$('#loadContent').html(setComparePage('<?php echo base_url('assetsfront/images/icon/ic-transaction-empty.png') ?>'));

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
});
</script>