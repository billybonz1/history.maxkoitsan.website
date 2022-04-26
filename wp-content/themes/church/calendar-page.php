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
                            <li>
                                <a href="#" class="tg"
                                    target="_blank"></a>
                            </li>
                            <li>
                                <a href="#" class="insta"
                                    target="_blank"></a>
                            </li>
                            <li>
                                <a href="#" class="yt"
                                    target="_blank"></a>
                            </li>
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
                        <button class="active" data-type="month">
                            месяц
                        </button>
                        <button class="" data-type="week">
                            неделя
                        </button>
                    </div>
                </div>

                <div class="events_main">
                    <div class="events_container">
                        <?php
                        $city_cat = get_field("city_category");
                        $args = array(
                            'posts_per_page' => 6,
                            'post_type' => 'calendar',
                            'order'   => 'ASC',
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'date_event_end',
                            'paged' => isset($_GET['pagen']) ? $_GET['pagen'] : 1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $city_cat->taxonomy,
                                    'field'    => 'slug',
                                    'terms'    => array( $city_cat->slug )
                                )
                            ),
                            'meta_query' => array(
                                array(
                                    'key' => 'date_event_end',
                                    'value' => date('Ymd'),
                                    'type' => 'DATE',
                                    'compare' => '>='
                                )
                            )
                        );

                        $query = new WP_Query($args);
                        $args['posts_per_page'] = -1;
                        $query2 = new WP_Query($args);
                        if( $query->have_posts() ){
                            ?>
                            <div class="events_box" data-events-count="<?php echo $query2->post_count;?>">
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
                    </div>
                    <div class="lds-dual-ring" style="height: 100px;background: none;display: none;"></div>
                        <?php if($query2->post_count > 6){?>
                            <div class="more_block">
                                <p>Смотреть больше</p>
                                <div class="more_bottom"></div>
                            </div>
                        <?php } ?>

                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
    <?php
        $events = get_posts(array(
            "numberposts" => -1,
            "post_type" => "calendar" ,
            'tax_query' => array(
                array(
                    'taxonomy' => $city_cat->taxonomy,
                    'field'    => 'slug',
                    'terms'    => array( $city_cat->slug )
                )
            )
        ));
        $eventsJson = [
             "events" => array()
        ];
        foreach($events as $event){
            $date_event = get_field("date_event", $event->ID);
            $date_event_end = get_field("date_event_end", $event->ID);
//            $date_event = date_parse_from_format("d/m/Y", $date_event);
            $timestamp_start = strtotime($date_event);
            $timestamp_end = strtotime($date_event_end);
            $F = date("F", $timestamp_start);
            $Y = date("Y", $timestamp_start);
            $j = date("j", $timestamp_start);
            $eventObj = [];
            $eventObj['name'] = $event->post_title;
            if(!empty($event->post_content)) $eventObj['description'] = htmlspecialchars(str_replace(array("\r\n", "\r", "\n"), '<br>', "<div>".$event->post_content."</div>"));
            $image = get_the_post_thumbnail_url( $event, "full" );
            if(!empty($image)){
                $eventObj['image'] = $image;
            }
            $eventObj['date'] = date("d/m/Y", $timestamp_start);
            $time = get_field("time_text_event", $event->ID);
            if(!empty($time)){
                $eventObj['time'] = $time;
            }
            $street = get_field("adres_event", $event->ID);
            if(!empty($street)){
                $eventObj['street'] = $street;
            }
            $phone = get_field("phone_event", $event->ID);
            if(!empty($phone)){
                $eventObj['phone'] = $phone;
            }

            $social = get_field("events", $event->ID);
            if(!empty($social)){
                $eventObj['social'] = $social;
            }

            $url = get_field("url", $event->ID);
            if(!empty($url)){
                $eventObj['url'] = $url;
            }

            $span = [];
            if($timestamp_end > $timestamp_start){
                $eventObj['date'] .= " - ". date("d/m/Y", $timestamp_end);
                $timestamp_end =  strtotime($date_event_end . ' +1 day');
                $begin = new DateTime(date("Y-m-d", $timestamp_start));
                $end = new DateTime(date("Y-m-d", $timestamp_end));

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);

                foreach ($period as $dt) {
                    $span[] = (int)$dt->format("j");
                }
            }

            if(count($span) > 0){
                $eventObj['span'] = $span;
            }
            $eventsJson['events'][$Y][$F][$j][] = $eventObj;
        }
    ?>
    <script>
        var eventsJson = JSON.parse('<?php echo json_encode($eventsJson); ?>');
        console.log(eventsJson);

        (function($){
            function get_events(pagen){
                $(".more_block").hide();
                $(".lds-dual-ring").show();
                var data = {
                    pagen: pagen,
                    action: "get_events",
                    taxonomy: "<?php echo $city_cat->taxonomy;?>",
                    slug: "<?php echo $city_cat->slug;?>"
                }
                if($('[data-type="week"]').hasClass("active")){
                    data.week = 1;
                }
                $.ajax({
                    url: "<?php echo admin_url( 'admin-ajax.php'); ?>",
                    data: data,
                    success: function(data){
                        $(".events_container").append(data);
                        $(".lds-dual-ring").hide();
                        if($(".events_box .event").length != $(".events_box:last").attr("data-events-count")){
                            $(".more_block").show();
                        }
                    }
                })
            }

            $(document).ready(function(){
                var pagen = 1;
                $(".more_block").on("click", function (e) {
                    e.preventDefault();
                    pagen++;
                    get_events(pagen);
                });

                $(".events_btn_block button").on("click", function (e) {
                    e.preventDefault();
                    pagen = 1
                    $(this).addClass("active").siblings().removeClass("active");
                    $(".events_container").html("");
                    get_events(pagen);
                });
            });
        })(jQuery);
    </script>
<?php
get_footer();