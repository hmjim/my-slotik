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
			<?php if ( function_exists( 'bcn_display' ) ) bcn_display(); ?>
		</div>
	</div>

	<div class="all_content">

		<?php if ( have_posts() ) : ?>

			<div class="ftext">
				<?php dynamic_sidebar( 'index-widget-stati-top' ); ?>
			</div>

			<div class="osn_content">
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="one_block_cont_stati">
						<div class="one_block_img_stati">
							<a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url( "sk-small-7" ); ?>" alt="<?php the_title(); ?>"/></a>
						</div>
						<div class="one_block_title_stati">
							<a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</div>
						<div class="one_block_text_stati">
							<?php echo trim_content_chars( 350, '...' ); ?>
						</div>
						<div class="one_block_bott_stati">
							<a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>">Подробнее</a>
						</div>
					</div>

				<?php endwhile; ?>
			</div>

			<?php if ( function_exists( 'wp_corenavi' ) ) wp_corenavi(); ?>

			<div class="ftext">
				<?php dynamic_sidebar( 'index-widget-stati-bottom' ); ?>
			</div>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
