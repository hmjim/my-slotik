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

	<div class="slk_rate"><span>Рейтинг: </span><?php if ( function_exists( 'the_ratings' ) ) the_ratings(); ?></div>

	<div class="all_content">

		<?php while ( have_posts() ) : the_post(); ?>

		<h1 class="br4">Игровой автомат <?php the_title(); ?> онлайн</h1>
<?php $str=do_shortcode('[device]'); ?>


			<?php if ( get_field( 'link_game_pay' ) ) : ?>
				<a href="<?php the_field( 'link_game_pay' ); ?>" class="go_p" target="_blank" title="Играть в автомат <?php the_title(); ?> на деньги"></a>
			<?php endif; ?>
<?php $str=do_shortcode('[/device]'); ?>



		<div class="osn_content">

			<div class="lsingl">
				<div class="content_flash">
					<iframe src="<?php the_field('flash-game'); ?>" width="100%" height="477px"></iframe>
				</div>
			</div>

			<div class="rsingl">
				<?php
				$args = array (
					'post_type'      => array( 'igrovue-avtomatu' ),
					'post_status'    => array( 'publish' ),
					'posts_per_page' => '10',
				);
				$query = new WP_Query( $args );
				?>

				<?php if ( $query->have_posts() ) : ?>

					<div class="r_game">
						<div class="custom-container vertical">
							<a href="#" class="prev"> </a>
							<div class="carousel">
								<ul>

								<?php while ( $query->have_posts() ) : $query->the_post(); ?>
									<li>
										<div>
											<a href="<?php echo get_post_permalink(); ?>" class="sl_one" title="<?php the_title(); ?>">
												<div class="im">
													<img src="<?php the_post_thumbnail_url( 'sk-small-5' ); ?>" alt="<?php the_title(); ?>">
												</div>
											</a>
										</div>
									</li>
								<?php endwhile; ?>

								</ul>
							</div>
							<a href="#" class="next"> </a>
							<div class="clear"></div>
						</div>
					</div>

				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

			</div>

			<div style="clear: both;"></div>

			<?php if ( get_field( 'link_game_pay' ) ) : ?>
				<a href="<?php the_field( 'link_game_pay' ); ?>" class="go_p" target="_blank" title="Играть в автомат <?php the_title(); ?> на деньги"></a>
			<?php endif; ?>

			<div style="clear: both;"></div>

			<div class="ftext">
				<?php if ( get_the_content() ) : ?>
				<div class="br3">Описание игры</div>
				<?php endif; ?>
				<div class="textwidget">
					<?php the_content(); ?>
				</div>

				<div class="rsinglc">
					<?php
					$args2 = array(
						'taxonomy'   => 'proizvoditeli',
						'hide_empty' => false,
					);
					?>

					<div class="r_game">
						<div class="custom-containerh slower">
							<a href="#" class="prev"> </a>
							<div class="carousel">
								<ul>

									<?php $terms = get_terms( $args2 ); ?>
									<?php foreach ($terms as $term) : ?>
									<li>
										<div>
											<a href="/proizvoditeli/<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>" class="sitebar_bl_one_content_f">
												<?php $image = get_field( 'imgd', 'proizvoditeli_'.$term->term_id ); ?>
												<img src="<?php echo $image['sizes']['sk-small-6']; ?>" alt="<?php echo $term->name; ?>"/>
											</a>
										</div>
									</li>
									<?php endforeach; ?>

								</ul>
							</div>
							<a href="#" class="next"> </a>
							<div class="clear"></div>
						</div>
					</div>

				</div>

				<div class="textwidget"><?php the_field( 'text_ee' ); ?></div>
			</div>

		</div>

		<?php endwhile; ?>

	</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>