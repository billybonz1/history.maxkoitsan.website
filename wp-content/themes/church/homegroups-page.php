<?php
/**
 * The template for displaying all pages
 * Template Name: Шаблон страницы домашних групп
 * Template Post Type: page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package church
 */

get_header('town');
?>

<main id="primary" class="main-page local">
    <div class="breadcrumbs_block">
        <div class="container">
            <?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?>
        </div>
    </div>
    <div class="homegroups">
        <div class="container">
            <div class="title_block">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="mob_text">
                <p>Подбери идеальную домашнюю группу для тебя. Возраст, пол, время и адрес.</p>
                <button class="filter_btn">
                    <i></i>
                    Фильтр
                </button>
            </div>

            <div class="filter_block">
                <form action="#">
                    <div class="wrap">
                        <div class="col">
                            <span>возраст<i></i></span>
                            <ul>
                                <li><a href="#">возраст inner</a></li>
                                <li><a href="#">возраст inner</a></li>
                                <li><a href="#">возраст inner</a></li>
                                <li><a href="#">возраст inner</a></li>
                                <li><a href="#">возраст inner</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <span>гендер<i></i></span>
                            <ul>
                                <li><a href="#">мужской</a></li>
                                <li><a href="#">женский</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <span>район<i></i></span>
                            <ul>
                                <li><a href="#">район inner</a></li>
                                <li><a href="#">район inner</a></li>
                                <li><a href="#">район inner</a></li>
                                <li><a href="#">район inner</a></li>
                                <li><a href="#">район inner</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <span>день<i></i></span>
                            <ul>
                                <li><a href="#">понедельник</a></li>
                                <li><a href="#">вторник</a></li>
                                <li><a href="#">среда</a></li>
                                <li><a href="#">четверг</a></li>
                                <li><a href="#">пятница</a></li>
                                <li><a href="#">суббота</a></li>
                                <li><a href="#">воскресенье</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <span>язык<i></i></span>
                            <ul>
                                <li><a href="#">RU</a></li>
                                <li><a href="#">PL</a></li>
                                <li><a href="#">EN</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <span>тема<i></i></span>
                            <ul>
                                <li><a href="#">тема inner</a></li>
                                <li><a href="#">тема inner</a></li>
                                <li><a href="#">тема inner</a></li>
                                <li><a href="#">тема inner</a></li>
                                <li><a href="#">тема inner</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="reset_btn">
                        <input type="reset" value="очистить фильтр">
                        <div id="filter-close-btn" class="filter-close-btn">
                            <button>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="filter_selected">
                    <ul></ul>
                </div>
            </div>

        </div>
    </div>

    <section class="group_block">
        <div class="container">
            <div class="main_block">
                <?php
                    $args = array(
                        'posts_per_page' => 12,
                        'post_type' => 'homegroup',
                        'order'   => 'ASC',
                        'paged' => get_query_var('paged', 1),
                    );

                    $query = new WP_Query($args); 
                    if( $query->have_posts() ){
                        ?>
                <div class="group_main">
                    <?php
                        while( $query->have_posts() ){
                            $query->the_post();
                            ?>
                    <?php include(get_template_directory() . '/template-parts/homegroups-template.php'); 

                            }
                            wp_reset_postdata(); // сбрасываем переменную $post
                        } 
                        else
                    ?>
                </div>
                <!-- <div class="pagination_block">
                    <?php
					the_posts_pagination( array(
                        'prev_text' => __( '<img src="/wp-content/themes/church/img/blog/Arrow_Right.svg" alt="">', 'textdomain' ),
                        'next_text' => __( '<img src="/wp-content/themes/church/img/blog/Arrow_Right.svg" alt="">', 'textdomain' ),
                    ) );

                    wp_reset_query();
					?>
                </div> -->
            </div>
    </section>
</main><!-- #main -->

<?php
get_footer();