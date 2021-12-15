<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Casino_Theme
 * @since Casino Theme 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
		<?php the_post_thumbnail(); ?>
	<?php endif; ?>

	<h1 class="br4"><?php the_title(); ?></h1>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'casinotheme' ), 'after' => '</div>' ) ); ?>
	</div>

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'casinotheme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>

</article>