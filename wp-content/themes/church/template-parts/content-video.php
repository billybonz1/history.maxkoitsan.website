<?php
/**
 * Template part for displaying posts video format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package church
 */

?>

<div class="breadcrumbs_block">
    <div class="container">
        <?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?>
    </div>
</div>
<section class="post_main section">
    <div class="container">
        <div class="main_block">
            <div class="top_block">
                <div class="img_block">
                    <div class="img">
                        <?php 
                        $image = get_field('blog_item_img');
                        $size = 'post_top_img'; // (thumbnail, medium, large, full or custom size)
                        if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        }
                        ?>
                    </div>
                    <div class="yellow_block">
                        <p><?php the_title(); ?></p>
                    </div>
                    <div class="category_block">
                        <div class="right_block">
                            <div class="category">
                                <img src="/wp-content/themes/church/img/blog/video_icon_yellow.svg" alt="" />
                            </div>
                            <div class="theme">
                                <?php the_category(', '); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about_block">
                    <div class="author">
                        <?php echo get_avatar( get_the_author_meta('') , 40 ); ?>
                        <div class="author_inner">
                            <p>Автор:</p>
                            <?php church_posted_by(); ?>
                        </div>
                    </div>
                    <div class="time">
                        <img src="<?= get_template_directory_uri() ?>/img/post/time_icon.svg" alt="" class="icon_time">
                        <div class="time_inner">
                            <p>Время изучения</p>
                            <span><?php the_field('reading_time', get_the_ID()); ?></span>
                        </div>
                    </div>
                    <div class="date">
                        <img src="<?= get_template_directory_uri() ?>/img/post/date_icon.svg" alt="" class="icon_date">
                        <div class="date_inner">
                            <p>Дата создания</p>
                            <span><?php the_time('j/m/y') ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="center_block">
                <div class="content">
                    <div class="video_inner">
                        <div class="video">
                            <div class="btn" data-fancybox href="<?php the_field('video_field', get_the_ID()); ?>">
                                <svg width="127" height="127" viewBox="0 0 237 237" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="118.5" cy="118.5" r="116" stroke="white" stroke-width="5" />
                                    <path d="M96.25 80.9619L163 119.5L96.25 158.038L96.25 80.9619Z" stroke="white"
                                        stroke-width="5" />
                                </svg>
                            </div>
                        </div>
                        <div class="short_text">
                            <?php echo kama_excerpt( [ 'maxchar'=>250, 'text'=>'' ] ); ?>
                        </div>
                    </div>

                    <? if(have_rows('podcast_list')): ?>
                    <? while(have_rows('podcast_list')): the_row(); ?>
                    <div class="audio_inner">
                        <? $time = get_sub_field('time');
                                    if($time): ?>
                        <div class="time_codes">
                            <p><?= $time ?></p>
                        </div>
                        <? endif; ?>
                        <? $text = get_sub_field('text');
                                    if($text): ?>
                        <div class="time_descr">
                            <p><?= $text ?></p>
                        </div>
                        <? endif; ?>
                    </div>
                    <? endwhile; ?>
                    <? endif; ?>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="sidebar">
                    <p class="sidebar_title">Другие публикации автора</p>
                    <?php 
                     $author = get_the_author(); // defines your author ID if it is on the post in question

                     $args = array(
                                     'post_type' => 'post',
                                     'post_status' => 'publish',
                                     'author'=>$author,
                                     'posts_per_page' => 2, // the number of posts (books) you'd like to show
                                     'orderby' => 'date',
                                     'order' => 'DESC'
                                     );
                     $results = new WP_Query($args);
                     ?>
                    <ul class="another_posts">
                        <?
                        while ($results->have_posts()) {
                        $results->the_post();
                        ?>
                        <li>
                            <a href="<?php get_permalink() ?>">
                                <div class="another_posts_inner">
                                    <?php the_post_thumbnail( 'post_small_img' ); ?>
                                    <p><?php the_title(); ?></p>
                                </div>
                            </a>
                        </li>
                        <?
                        }
                        wp_reset_postdata(); //re-sets everything back to normal
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="last_post section">
    <div class="section-bg"></div>
    <div class="container">
        <div class="main_block">
            <div class="swiper-container">
                <?php 
					// Define our WP Query Parameters
					$the_query = new WP_Query( 'posts_per_page=3' ); ?>
                <div class="articles_main swiper-wrapper">
                    <?php 
                    // Start our WP Query
                    while ($the_query -> have_posts()) : $the_query -> the_post(); 
                    get_template_part( 'template-parts/content', 'lastpost' );

                    // Repeat the process and reset once it hits the limit
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="all_articles">
    <div class="section-bg"></div>
    <div class="btn">
        <a href="<?php echo get_home_url( null, 'blog/', 'https' ); ?>">
            Все статьи
        </a>
    </div>
</div>