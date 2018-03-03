<section class="section section-auction">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2>Bandingkan</h2>
				<div class="row compare-list">
					<div id="loadContent"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
$(document).ready(function () {
	//show compare element
	$('#loadContent').replaceWith(setComparePage());

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

function currency_format(n) {
   return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
}
</script>