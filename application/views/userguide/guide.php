<div class="container-fluid">
	<div class="row">
		<aside class="col-xs-3 side-menu-procedure">
			<?php echo $side_menu; ?>
		</aside>
		<div class="col-xs-9 bg-grey content-menu-procedure">
			<?php if($page_name !== 'general') { ?>
			<section class="procedure-info-panel">
				<div class="video-info text-center">
					<iframe width="640" height="390" src="https://www.youtube.com/embed/IXdtkVt7Iwk?rel=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				</div>
			</section>
			<?php } ?>
			<?php echo $content_panduan; ?>
		</div>
	</div>
</div>

<style>
.nav>li {
    height: unset;
}
</style>

<script>
	$(document).ready(function() {
	    $("nav").sticky({
	    	topSpacing:0
	    });

	    $(".select-custom").select2({
	    	minimumResultsForSearch: -1
	    });
	    
		//$(".side-menu-procedure").stick_in_parent({offset_top: 80});

        $(window).scroll(function() {
            var window_top = $(window).scrollTop() + 300;
            var div_top = $('#nav-anchor').offset().top;
                if (window_top > div_top) {
                    $('.nav-procedure').addClass('stick');
                } else {
                    $('.nav-procedure').removeClass('stick');
                }
        });

        $(".nav-procedure a").click(function(evn) {
            evn.preventDefault();
            $('html,body').scrollTo(this.hash, this.hash); 
        });

        var aChildren = $(".nav-procedure li").children();
        var aArray = [];
        for (var i=0; i < aChildren.length; i++) {    
            var aChild = aChildren[i];
            var ahref = $(aChild).attr('href');
            aArray.push(ahref);
        }
        $(window).scroll(function(){
            var windowPos = $(window).scrollTop();
            var windowHeight = $(window).height();
            var docHeight = $(document).height();
            
            for (var i=0; i < aArray.length; i++) {
                var theID = aArray[i];
                var divPos = $(theID).offset().top - 250;
                var divHeight = $(theID).height();
                if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                    $("a[href='" + theID + "']").addClass("nav-active");
                } else {
                    $("a[href='" + theID + "']").removeClass("nav-active");
                }
            }
            if(windowPos + windowHeight == docHeight) {
                if (!$(".nav-procedure li:last-child a").hasClass("nav-active")) {
                    var navActiveCurrent = $(".nav-active").attr("href");
                    $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
                    $(".nav-procedure li:last-child a").addClass("nav-active");
                }
            }
        });
	});
</script>