<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package church
 */
if(!isset($_REQUEST['ajax'])){
get_header();
?>

<main id="primary" class="inner-page blog-page">
    <div class="breadcrumbs_block">
        <div class="container">
            <?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?>
        </div>
    </div>
    <section class="blog_title section">
        <div class="container">
            <div class="main_block">
                <div class="title_block">
                    <h1>
                        <?php single_post_title(); ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="filter section">
        <div class="container">
            <div class="main_block">
                <form class="filter_form" action="?">
                    <div class="col">
                        <h2>Направления</h2>
                        <?php
                            $terms = [];
                            if(!empty($_GET['terms'])){
                                $termsArr = explode(";",$_GET['terms']);
                                foreach($termsArr as $term){
                                    $termObj = explode(":",$term);
                                    $terms[$termObj[0]] = explode("|", $termObj[1]);
                                }
                            }

                            $customFields = [];
                            if(!empty($_GET['custom_fields'])){
                                $customFieldsArr = explode(";",$_GET['custom_fields']);
                                foreach($customFieldsArr as $customField){
                                    $customFieldObj = explode(":",$customField);
                                    $customFields[$customFieldObj[0]] = $customFieldObj[1];
                                }
                            }

                            function check_filter_active($slug,$taxonomy,$terms){
                                if(isset($terms[$taxonomy]) && in_array($slug, $terms[$taxonomy])) return true;
                                return false;
                            }
                        ?>
                        <div class="categories">
                            <div class="category">
                                <a class="btn_filter <?php if(check_filter_active("all","post_format", $terms)) echo "active";?>"
                                    data-filter="post_format|all" href="#">
                                    <span>Все направления</span>
                                </a>
                            </div>
                            <div class="category">
                                <a class="btn_filter <?php if(check_filter_active("post-format-audio","post_format", $terms)) echo "active";?>"
                                    data-filter="post_format|post-format-audio" href="#">
                                    <i class="microphone"></i>
                                    Подкасты
                                </a>
                            </div>
                            <div class="category">
                                <a class="btn_filter <?php if(check_filter_active("post-format-standard","post_format", $terms)) echo "active";?>"
                                    data-filter="post_format|post-format-standard" href="#">
                                    <i class="article"></i>
                                    Статьи
                                </a>
                            </div>
                            <div class="category">
                                <a class="btn_filter <?php if(check_filter_active("post-format-aside","post_format", $terms)) echo "active";?>"
                                    data-filter="post_format|post-format-aside" href="#">
                                    <i class="books"></i>
                                    Книги
                                </a>
                            </div>
                            <div class="category">
                                <a class="btn_filter <?php if(check_filter_active("post-format-video","post_format", $terms)) echo "active";?>"
                                    data-filter="post_format|post-format-video" href="#">
                                    <i class="video"></i>
                                    Видео
                                </a>
                            </div>
                            <div class="category">
                                <a class="btn_filter <?php if(check_filter_active("post-format-quote","post_format", $terms)) echo "active";?>"
                                    data-filter="post_format|post-format-quote" href="#">
                                    <i class="file"></i>
                                    Материалы
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2>Темы</h2>
                        <div class="themes">
                            <div class="theme">
                                <a class="btn_filter <?php if(check_filter_active("all","category", $terms)) echo "active";?>"
                                    data-filter="category|all" href="#">
                                    <span>Все темы</span>
                                </a>
                            </div>

                            <?php 
                                $cats = get_categories(array(
                                    'hide_empty' => false
                                ));
                            ?>

                            <?php foreach($cats as $cat){ ?>
                            <?php if($cat->term_id !== 1){?>
                            <div class="theme">
                                <a class="btn_filter <?php if(check_filter_active($cat->slug,$cat->taxonomy, $terms)) echo "active";?>"
                                    data-filter="<?php echo $cat->taxonomy; ?>|<?php echo $cat->slug; ?>" href="#">
                                    <span><?php echo $cat->name; ?></span>
                                </a>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            <!--                            <div class="theme">-->
                            <!--                                <a class="btn_filter" href="#">-->
                            <!--                                    <span>Семья</span>-->
                            <!--                                </a>-->
                            <!--                            </div>-->
                            <!--                            <div class="theme">-->
                            <!--                                <a class="btn_filter" href="#">-->
                            <!--                                    <span>Иисус</span>-->
                            <!--                                </a>-->
                            <!--                            </div>-->
                            <!--                            <div class="theme">-->
                            <!--                                <a class="btn_filter" href="#">-->
                            <!--                                    <span>Отношения</span>-->
                            <!--                                </a>-->
                            <!--                            </div>-->
                            <!--                            <div class="theme">-->
                            <!--                                <a class="btn_filter" href="#">-->
                            <!--                                    <span>Церковь</span>-->
                            <!--                                </a>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                    <div class="col">
                        <h2>Время изучения</h2>
                        <div class="time_block">
                            <label class="heat-slider heat-slider--v">
                                <!-- <span class="heat-slider--label">How Spicy?</span> -->
                                <?php
                                $value = isset($customFields['reading_time']) ? $customFields['reading_time'] : 15;
                                $min = 0;
                                $max = 105;
                                $percent = (($value - $min) / ($max - $min) * 100);
                                ?>

                                <span class="heat-slider--input" style="--p:<?php echo $percent; ?>%;">
                                    <input name="reading_time" type="range" value="<?php echo $value;?>"
                                        min="<?php echo $min; ?>" max="<?php echo $max; ?>" oninput="doThings(event)" />
                                    <output><?php echo $value;?> мин</output>
                                </span>
                            </label>
                        </div>
                        <input class="reset_btn" type="reset" value="Сбросить фильтры">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php } ?>
    <section class="blog_main section">
        <div class="section-bg"></div>
        <div class="container">
            <div class="main_block">
                <div class="articles_main">
                    <?php
                        global $wp_query;
						$args = array(
							'posts_per_page' => 9,
							'post_type' => 'post',
							'order'   => 'ASC',
							'paged' => get_query_var('paged', 1),
							'meta_query' => array(
                                'relation'		=> 'AND'
                            )
							// 's' => $_GET['s']
						);

						if(!empty($_GET['terms'])){
						    $termsArr = explode(";",$_GET['terms']);
						    foreach($termsArr as $term){
						        $termObj = explode(":",$term);
						        if(strpos($termObj[1], "all") === FALSE){
                                    $args['tax_query'][] = array(
                                        'taxonomy' => $termObj[0],
                                        'field'    => 'slug',
                                        'terms'    => explode("|", $termObj[1])
                                    );
                                }
                            }
                        }

						if(!empty($_GET['custom_fields'])){
                            $customFieldsArr = explode(";",$_GET['custom_fields']);
                            foreach($customFieldsArr as $customField){
                                $customFieldObj = explode(":",$customField);

                                $args['meta_query'][] = array(
                                    'key'	  	=> $customFieldObj[0],
                                    'value'	  	=> array(0, (int)$customFieldObj[1]),
                                    'type'    => 'numeric',
                                    'compare' => 'BETWEEN'
                                );
                            }
                        }

                        $wp_query = new WP_Query($args);
						if ($wp_query->have_posts()) {
							while ($wp_query->have_posts()) {
                                $wp_query->the_post();

								get_template_part( 'template-parts/blogtype/content', get_post_type() );
							}
						} else {?>
                    <div class="nothing_found">Ничего не найдено</div>
                    <?php }

					?>
                </div>
                <div class="pagination_block">
                    <?php
					the_posts_pagination( array(
                        'prev_text' => __( '<img src="/wp-content/themes/church/img/blog/Arrow_Right.svg" alt="">', 'textdomain' ),
                        'next_text' => __( '<img src="/wp-content/themes/church/img/blog/Arrow_Right.svg" alt="">', 'textdomain' ),
                    ) );

                    wp_reset_query();
					?>
                </div>
            </div>
        </div>
    </section>

    <?php if(!isset($_REQUEST['ajax'])){ ?>
</main><!-- #main -->

<?php
wp_enqueue_script( 'rainge', get_template_directory_uri() . '/js/rainge.js', array(), '1.1', true );

get_footer();

}