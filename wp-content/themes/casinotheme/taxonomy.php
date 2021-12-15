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

	<?php
	$queried_object = get_queried_object();
	$taxonomy       = $queried_object->taxonomy;
	$term_id        = $queried_object->term_id;
	$taxonomy       = $queried_object->taxonomy;
	$description    = $queried_object->description;
	?>

	<?php if ( have_posts() ) : ?>
		<?php
		$titlesk = explode( ':', get_the_archive_title() );
		$titlesk = $queried_object->name;
		?>

		<div class="ftext">
			<h1 class="br4"><?php echo $titlesk; ?></h1>
			<?php if ( $description ) : ?>
			<div class="textwidget"><?php echo $description; ?></div>
			<?php endif; ?>
		</div>

		<div class="content_osnovnoi">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( $taxonomy ) : ?>
					<?php get_template_part( 'content', $taxonomy ); ?>
				<?php else : ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>

		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

		<?php
		$two_desc = get_field( 'text_b', $taxonomy . '_' . $term_id );
		if ( empty( $two_desc ) ) $two_desc = get_field('text_bc', $taxonomy . '_' . $term_id);
		if ( empty( $two_desc ) ) $two_desc = get_field('text_s', $taxonomy . '_' . $term_id);
		?>
		<div class="ftext mat20">
			<div class="textwidget"><?php echo $two_desc; ?></div>
		</div>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>