<section class="section-blog">
	<div class="container">
		<div class="row">
			<div class="blog-lst">
				<h2 class="title-blog"><?php echo $title_content; ?></h2>
				<ul id="list-content"></ul>
				<!--div class="col-md-12 col-sm-12 col-xs-12 text-center button-blog-section mb40">
					<button class="btn btn-green">Selanjutnya</button>
				</div-->   
			</div>
		</div>
	</div>
</section>

<script>
var type = '<?php echo $num_type; ?>';
onLoadPage(type);

function onLoadPage(type = '1') {
	var urls = '';
	var details = '<?php echo site_url('blog_details'); ?>';
	var cms = '<?php echo linkservice('cms'); ?>';
	if(type === '1') {
		urls = '<?php echo site_url('blog_lists_news'); ?>';
	}
	else if(type === '2') {
		urls = '<?php echo site_url('blog_lists_info'); ?>';
	}

	$.ajax({
		url: urls,
		type: 'POST',
		beforeSend: function() {},
		success: function(data) {
			var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
			var data = JSON.parse(data);
			for(var i = 0; i < data.length; i++) {
				var title_len = (data[i].title).length < 80 ? data[i].title : (data[i].title).substr(0, 80)+'...';
				var subtitle_len = (data[i].subtitle) === null ? '' : (data[i].subtitle).length < 25 ? data[i].subtitle : (data[i].subtitle).substr(0, 25)+'...';
				var content_len = (data[i].content).length < 180 ? data[i].content : (data[i].content).substr(0, 180)+'...';
				var dt = new Date(data[i].datepost);
				var dateformat = dt.getDate()+' '+month[dt.getMonth()]+' '+dt.getFullYear();
				var contents = '<li class="col-md-4 col-sm-6 col-custom">'+
									'<div class="box-new">'+
										'<a href="'+details+'?id='+data[i].id+'&slug='+data[i].slugkategori+'">'+
											'<div class="image-new">'+
												'<img src="'+cms+'uploads/news/'+data[i].gambar+'" class="img-responsive" />'+
											'</div>'+
											'<h2>'+
												title_len+
												'<span>'+subtitle_len+'</span>'+
											'</h2>'+
											'<div class="content">'+content_len+'</div>'+
											'<div class="date">'+dateformat+'</div>'+
										'</a>'+
									'</div>'+
								'</li>';
				$('#list-content').append(contents);
			}
		}
	});
}
</script>