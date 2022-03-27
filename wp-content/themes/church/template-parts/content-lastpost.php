<?php
/**
 * Template part for displaying last posts on blog page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package church
 */

?>

<div class="swiper-slide">
    <div id="post-<?php the_ID(); ?>" class="article <?php post_class(); ?>">
        <div class="img_block">
            <a href="<?php get_permalink() ?>">
                <?php the_post_thumbnail( 'post_img' ); ?>
            </a>
        </div>
        <div class="text_block">
            <div class="title_block">
                <div class="title">
                    <a href="<?php the_permalink() ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
                <div class="right_block">
                    <div class="category">
                        <?php
                    // template for post with video format
                    if ( has_post_format( 'video' )) {
                    ?>
                        <img src="/wp-content/themes/church/img/blog/video_icon_yellow.svg" alt="" />
                        <?php
                    }
                    else if ( has_post_format( 'audio' )) {
                        ?>
                        <img src="/wp-content/themes/church/img/blog/podcast_icon_yellow.svg" alt="" />
                        <?php
                        }
                    else if ( has_post_format( 'aside' )) {
                        ?>
                        <img src="/wp-content/themes/church/img/blog/book_icon_yellow.svg" alt="" />
                        <?php
                        }
                    else if ( has_post_format( 'quote' )) {
                        ?>
                        <img src="/wp-content/themes/church/img/blog/file_icon_yellow.svg" alt="" />
                        <?php
                        }
                    else {
                        ?>
                        <img src="/wp-content/themes/church/img/blog/article_icon_yellow.svg" alt="" />
                        <?php
                    }
                    ?>
                    </div>
                    <div class="theme">
                        <?php the_category(', '); ?>
                    </div>

                </div>
            </div>
            <div class="short_content">
                <?php echo kama_excerpt( [ 'maxchar'=>250, 'text'=>'' ] ); ?>
            </div>
            <div class="line">
            </div>
            <div class="about">
                <div class="author">
                    <?php church_posted_by(); ?>
                </div>
                <div class="time">
                    <span><?php the_field('reading_time', get_the_ID()); ?></span>
                </div>
                <div class="date">
                    <?php the_time('j/m/y') ?>
                </div>
            </div>
        </div>
    </div><!-- #post-<?php the_ID(); ?> -->
</div>