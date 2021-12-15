<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package casino
 */
?>
<?php get_header(); ?>
<div class="center_content_right">

	<div class="breadcrumbs">
		<div typeof="BreadcrumbList" class="sk_j" vocab="http://schema.org/">
			<?php if ( function_exists('bcn_display')) bcn_display(); ?>
		</div>
	</div>

	<div class="all_content">

		<?php if ( have_posts() ) : ?>

			<div class="ftext">
				<?php dynamic_sidebar( 'index-widget-avtomat-top' ); ?>
			</div>

			<div class="osn_content">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'igrovue-avtomatu' ); ?>
				<?php endwhile; ?>

				<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

				<div class="ftext">
					<?php dynamic_sidebar( 'index-widget-avtomat-bottom' ); ?>
				</div>
			</div>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>