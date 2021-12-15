<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Casino_Theme
 * @since Casino Theme 1.0
 */
?>
<?php get_header(); ?>
<div class="center_content_right">

	<div class="breadcrumbs">
		<?php if ( !is_home() ) : ?>
		<div typeof="BreadcrumbList" class="sk_j" vocab="http://schema.org/">
			<?php if ( function_exists('bcn_display')) bcn_display(); ?>
		</div>
		<?php endif; ?>
	</div>

	<div id="primary" class="site-content mt-0">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>

		</div>
	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>