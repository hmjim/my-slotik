<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package casino
 */

?>

    <div class="one_block_cont_stati">
            
            
            <div class="one_block_img_stati">
                <a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url( "sk-small-7" ); ?>" alt="<?php the_title(); ?>"/></a>
            </div>
            <div class="one_block_title_stati">
                <a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </div>
            <div class="one_block_text_stati">
<?php            
            echo trim_content_chars(350, '...');
?>
            </div>
            <div class="one_block_bott_stati">
                <a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>">Подробнее</a>
            </div>
        </div>