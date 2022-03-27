<?php
// Set the Current Author Variable $curauth
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$user_id = get_the_author_meta('ID');
get_header();
?>

<main class="inner-page blog-page">
    <div class="breadcrumbs_block">
        <div class="container">
            <?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?>
        </div>
    </div>

    <section class="author_first section">
        <div class="section-bg"></div>
        <div class="container">
            <div class="main_block">
                <div class="img_block">
                    <?php 
                    $image = get_field('author_photo','user_'.$user_id);
                    if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="text_block">
                    <p class="first_text">Лидер домашей группы</p>
                    <? $author_name = get_field('author_name','user_'.$user_id);
					                        if($author_name): ?>
                    <h1 class="title_page"><?= $author_name ?></h1>
                    <? endif; ?>
                    <? if(have_rows('author_socials','user_'.$user_id)): ?>
                    <div class="social_block">
                        <ul>
                            <? while(have_rows('author_socials','user_'.$user_id)): the_row(); ?>
                            <? $link = get_sub_field('link');
						        	if($link): ?>
                            <li>
                                <a href="<?= $link['url'] ?>"
                                    target="<?= $link['target'] ? $link['target'] : "_self" ?>">
                                    <? $img = get_sub_field('icon');
                                                if($img): ?>
                                    <img src="<?= $img ?>" alt="">
                                    <? endif; ?>
                                </a>
                            </li>
                            <? endif; ?>
                            <? endwhile; ?>
                        </ul>
                    </div>
                    <? endif; ?>
                    <? $author_text = get_field('author_text','user_'.$user_id);
                        if($author_text): ?>
                    <div class="description_block">
                        <?= $author_text ?>
                    </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="blog_main author_main section">
        <div class="section-bg"></div>
        <div class="container">
            <div class="main_block">
                <div class="articles_main">
                    <?php
						$args = array(
							'posts_per_page' => 9,
							'post_type' => 'post',
							'order'   => 'ASC',
							'paged' => get_query_var('paged', 1),
							// 's' => $_GET['s']
						);

						$query = new WP_Query($args);
						if ($query->have_posts()) {
							while ($query->have_posts()) {
								$query->the_post();

								get_template_part( 'template-parts/blogtype/content', get_post_type() );
							}
							wp_reset_query();
						} else {
						}

					?>
                </div>
                <div class="pagination_block">
                    <?php
                        the_posts_pagination( array(
                            'prev_text' => __( '<img src="/wp-content/themes/church/img/blog/Arrow_Right.svg" alt="">', 'textdomain' ),
                            'next_text' => __( '<img src="/wp-content/themes/church/img/blog/Arrow_Right.svg" alt="">', 'textdomain' ),
                        ) );
					?>
                </div>
            </div>
        </div>
    </section>
    <div class="all_articles">
        <div class="section-bg"></div>
        <div class="btn">
            <a href="<?php echo get_home_url( null, 'blog/'); ?>">
                Все статьи
            </a>
        </div>
    </div>
</main><!-- #main -->
<?php
get_footer();