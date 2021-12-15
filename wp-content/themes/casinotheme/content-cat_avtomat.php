<?php 




/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package casino
 */

?>




        <div class="one_block_cont bra3">
            <div class="block_lefton">
                <div class="blt">
                    <img src="<?php the_post_thumbnail_url( "sk-small-4" ); ?>" alt="Игровой автомат <?php the_title(); ?>"/>
                    <div class="bltb">
                        <a href="<?php echo get_post_permalink(); ?>" class="but_d" title="Демо-игра <?php the_title(); ?>">Демо-игра</a>
                        <a href="<?php the_field('link_game_pay'); ?>" title="Играть на реальные деньги" class="but_c">На деньги</a>
                    </div>
                </div>
                <div class="blb">
                    <div class="blt_title">
                        <?php trim_title_chars(18, '...', get_the_title()); ?>
                    </div>
                    <div class="blt_rate">
                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                    </div>
                </div>
            </div>
        </div>
        
        


