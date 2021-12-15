 <?php
/**
 * The Template for displaying all single posts
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

		<?php while ( have_posts() ) : the_post(); ?>

			<h1 class="br4 fz6"><?php the_title(); ?></h1>

			<div class="osn_content">
					<?php the_content(); ?>
			</div>

		<?php endwhile; ?>

	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>