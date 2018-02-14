<div class="row row-ours">
	<aside class="col-xs-3 side-menu-procedure">
		<a href="javascript:void(0)" class="toggle-aside">MENU FAQ</a>
		<?php echo $sidemenu ?>
	</aside>
	<div class="col-xs-9 bg-grey content-menu-procedure content-help">
		<section class="procedure-rules-panel panel-requirement">
			<?php for($i = 0; $i < count($content_title); $i++) { ?>
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">
					<h3 class="no-margin">
						<?php echo $content_title[$i]; ?>
					</h3>
				</div>
				<div class="panel-body <?php echo $class ?>">
					<?php echo ${"content_".($i+1)}; ?>
				</div>
			</div>
			<?php } ?>
		</section>
	</div>
</div>

<style>
	.row-ours {
		background-color: #fff;
		margin-left: unset !important;
		margin-right: unset !important;
	}
	.nav>li {
		height: unset;
	}
</style>

<script>
	$(document).ready(function() {
		$(".select-custom").select2({
			minimumResultsForSearch: -1
		});

		//$(".side-menu-procedure").stick_in_parent({offset_top: 80});

		$('textarea').blur(function() {
            tmpval = $(this).val();
            if(tmpval == '') {
                $(this).addClass('empty');
                $(this).removeClass('not-empty');
            } else {
                $(this).addClass('not-empty');
                $(this).removeClass('empty');
            }
        });
	});
</script>