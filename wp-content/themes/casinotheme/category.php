<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Casino_Theme
 * @since Casino Theme 1.0
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
				<h1 class="br4"><?php printf( __( 'Category Archives: %s', 'casinotheme' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
				<?php if ( category_description() ) : ?>
				<div class="cat_desc"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</div>

			<div class="osn_content">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'contentarch', get_post_format() ); ?>
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