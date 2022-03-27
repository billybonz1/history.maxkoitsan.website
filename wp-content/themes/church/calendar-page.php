<?php
/**
 * The template for displaying all pages
 * Template Name: Шаблон страницы календаря
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
    <section class="cal_first section" style="margin-top: 100px;">
        <div class="container">
            <div id="calendar">
                <div class="calendarTop">
                    <h1><?php the_title(); ?></h1>
                    <ul class="months">
                        <li>январь</li>
                        <li>февраль</li>
                        <li>март</li>
                        <li>апрель</li>
                        <li>май</li>
                        <li>июнь</li>
                        <li>июль</li>
                        <li>август</li>
                        <li>сентябрь</li>
                        <li>октябрь</li>
                        <li>ноябрь</li>
                        <li>декабрь</li>
                    </ul>
                    <ul class="monthOrYear">
                        <li class='active' data-change='month'><span>месяц</span></li>
                        <li data-change='year'><span>год</span></li>
                    </ul>
                </div>

                <div class="month">
                    <div class="monthName">
                    </div>
                    <ul class="weekDays">
                        <li><span>пн</span><span>понедельник</span></li>
                        <li><span>вт</span><span>вторник</span></li>
                        <li><span>ср</span><span>среда</span></li>
                        <li><span>чт</span><span>четверг</span></li>
                        <li><span>пт</span><span>пятница</span></li>
                        <li><span>сб</span><span>суббота</span></li>
                        <li><span>вс</span><span>воскресенье</span></li>
                    </ul>
                    <ul class="days">
                    </ul>
                </div>

                <div id="twelve">
                </div>

                <div class="viewEvent">
                    <span class="close">x</span>
                    <div class="image"></div>
                    <h4></h4>
                    <div class="desc"></div>
                    <div class="date"></div>
                    <div class="time"></div>
                    <div class="street"></div>
                    <div class="contacts"></div>
                    <div class="bottomWhite">
                        <a href="#" class="moreButton">Узнать больше</a>
                        <ul class="sIcons">
                            <? $link = get_field('events_tel');
								if($link): ?>
                            <li>
                                <a href="<?= $link['url'] ?>" class="tg"
                                    target="<?= $link['target'] ? $link['target'] : "_self" ?>"></a>
                            </li>
                            <? endif; ?>
                            <? $link = get_field('events_instagram');
								if($link): ?>
                            <li>
                                <a href="<?= $link['url'] ?>" class="insta"
                                    target="<?= $link['target'] ? $link['target'] : "_self" ?>"></a>
                            </li>
                            <? endif; ?>
                            <? $link = get_field('events_youtube');
								if($link): ?>
                            <li>
                                <a href="<?= $link['url'] ?>" class="yt"
                                    target="<?= $link['target'] ? $link['target'] : "_self" ?>"></a>
                            </li>
                            <? endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="events_local section">
        <div class="section-bg">
        </div>
        <div class="container">
            <div class="main_block">
                <div class="title_block">
                    <h2><span class="longdecor">Ближайшие ивенты</span></h2>
                    <div class="events_btn_block">
                        <button class="active">
                            месяц
                        </button>
                        <button class="">
                            неделя
                        </button>
                    </div>
                </div>
                <div class="events_main">
                    <?php
                        $args = array(
                            'posts_per_page' => 6,
                            'post_type' => 'calendar',
                            'order'   => 'ASC',
                        );

                        $query = new WP_Query($args); 
                        if( $query->have_posts() ){
							?>
                    <div class="events_box">
                        <?php
                            while( $query->have_posts() ){
                                $query->the_post();
                                ?>
                        <?php include(get_template_directory() . '/template-parts/events-template.php'); 

                            }
                            wp_reset_postdata(); // сбрасываем переменную $post
                        } 
                        else
                    ?>
                    </div>
                    <div class="more_block">
                        <a href="#"></a>
                        <p>Смотреть больше</p>
                        <div class="more_bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();