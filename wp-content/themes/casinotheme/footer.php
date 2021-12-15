<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Casino_Theme
 * @since Casino Theme 1.0
 */
?>
		</div>
	</div>

	<div class="all_footer">
		<div class="footer_m">
			<div class="footer_onem">
				<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'nav-menu' ) ); ?>
			</div>
		</div>
	</div>

	<div class="all_footertwo">
		<div class="footer_one">
			<?php wp_nav_menu( array( 'theme_location' => 'bottom', 'menu_class' => 'nav-menu' ) ); ?>
		</div>
	</div>

	<div class="all_footertwo">
		<div class="footer_one">
			<div class="f2text">
				<?php dynamic_sidebar( 'index-widget-butt' ); ?>
			</div>
		</div>
	</div>
<script>
		$('.sub-menu').hover(function(){
			par = $(this).parents();
			out = par['0']['className'].split(' ');
		$('li#' + out[out.length - 1] + ' a').attr('class', 'liho');
		$('.sub-menu li a').attr('class', '');
		},function(){
		$('li#' + out[out.length - 1] + ' a').attr('class', '');
		});
	</script>

	<script>
		function windowSize(){
			if(window.innerWidth < 940){
				$(".vertical .carousel").jCarouselLite({
					visible: 3,
					btnNext: ".vertical .next",
					btnPrev: ".vertical .prev",
					vertical: true,
					auto: 3500,
					speed: 700,
					mouseWheel: true
				});

				$(".slower .carousel").jCarouselLite({
					visible: 1,
					btnNext: ".slower .next",
					btnPrev: ".slower .prev",
					vertical: false,
					auto: 3500,
					speed: 700,
					mouseWheel: true
				});

				$(".content_flash iframe").attr('height', 'auto');

			} else {
				$(".vertical .carousel").jCarouselLite({
					visible: 8,
					btnNext: ".vertical .next",
					btnPrev: ".vertical .prev",
					vertical: true,
					auto: 3500,
					speed: 700,
					mouseWheel: true
				});

				$(".slower .carousel").jCarouselLite({
					visible: 3,
					btnNext: ".slower .next",
					btnPrev: ".slower .prev",
					vertical: false,
					auto: 3500,
					speed: 700,
					mouseWheel: true
				});
			}
		}

		jQuery(window).load(windowSize); // ÔË Á‡„ÛÁÍÂ
		jQuery(window).resize(windowSize); // ÔË ËÁÏÂÌÂÌËË ‡ÁÏÂÓ‚
	</script>
	

<?php wp_footer(); ?>
</body>
</html>