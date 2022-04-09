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

if(!isset($_GET['ajax'])){
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


            <?php


                function filter_li($index){
                    $acf_fields = acf_get_fields_by_id( 1127 );
                    foreach($acf_fields[$index]['choices'] as $value){?>
                        <li><a href="#" data-filter-type="custom_fields" data-filter="<?php echo $acf_fields[$index]['name']; ?>|<?php echo $value; ?>"><?php echo $value; ?></a></li>
                    <?php }
                }

            ?>

            <div class="filter_block">
                <form action="#">
                    <div class="wrap">
                        <div class="col">
                            <span>возраст<i></i></span>
                            <ul>
                                <?php filter_li(1); ?>
                            </ul>
                        </div>
                        <div class="col">
                            <span>гендер<i></i></span>
                            <ul>
                                <?php filter_li(2); ?>
                            </ul>
                        </div>
                        <div class="col">
                            <span>район<i></i></span>
                            <ul>
                                <?php filter_li(3); ?>
                            </ul>
                        </div>
                        <div class="col">
                            <span>день<i></i></span>
                            <ul>
                                <?php filter_li(4); ?>
                            </ul>
                        </div>
                        <div class="col">
                            <span>язык<i></i></span>
                            <ul>
                                <?php filter_li(5); ?>
                            </ul>
                        </div>
                        <div class="col">
                            <span>тема<i></i></span>
                            <?php 
                                $themes = get_terms([
                                    'taxonomy' => 'homegroups_themes',
                                    'hide_empty' => false,
                                ]);
                            ?>
                            <ul>
                                <?php foreach($themes as $theme){?>
                                    <li><a href="#" data-filter-type="terms" data-filter="<?php echo $theme->taxonomy; ?>|<?php echo $theme->slug; ?>"><?php echo $theme->name; ?></a></li>
                                <?php } ?>
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
                            $customFields[$customFieldObj[0]] = explode("|", $customFieldObj[1]);
                        }
                    }
                ?>

                <div class="filter_selected">
                    <ul>
                        <?php foreach($customFields as $key=>$fieldArr){?>
                            <?php foreach($fieldArr as $field){?>
                                <li class="select" data-filter-type="custom_fields" data-filter="<?php echo $key; ?>|<?php echo $field; ?>"><?php echo $field; ?><div class="close"><span></span><span></span></div></li>
                            <?php } ?>
                        <?php } ?>
                        <?php foreach($terms as $key=>$termArr){?>
                            <?php foreach($termArr as $slug){?>
                                <?php
                                    $term = get_term_by("slug", $slug, $key);
                                ?>
                                <li class="select" data-filter-type="terms" data-filter="<?php echo $key; ?>|<?php echo $slug; ?>"><?php echo $term->name; ?><div class="close"><span></span><span></span></div></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <section class="group_block">
        <div class="container">
<?php } ?>
            <div class="main_block home_groups">
                <?php
                    $city_category = get_field("city_category");
                    $args = array(
                        'posts_per_page' => 12,
                        'post_type' => 'homegroup',
                        'order'   => 'ASC',
                        'paged' => get_query_var('paged', 1),
                        'meta_query' => array(
                            'relation'		=> 'AND'
                        ),
                        'tax_query' => array(
                            'relation'		=> 'AND'
                        )
                    );
                    if(is_object($city_category)){
                        $args['tax_query'][] = array(
                            "taxonomy" => $city_category->taxonomy,
                            'field'    => 'slug',
                            'terms'    => array($city_category->slug),
                            'operator' => "IN"
                        );
                    }
                        if(!empty($_GET['terms'])){
						    $termsArr = explode(";",$_GET['terms']);
						    foreach($termsArr as $term){
						        $termObj = explode(":",$term);
						        if(strpos($termObj[1], "all") === FALSE){
                                    $args['tax_query'][] = array(
                                        'taxonomy' => $termObj[0],
                                        'field'    => 'slug',
                                        'terms'    => explode("|", $termObj[1]),
                                        'operator' => "IN"
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
                                    'value'	  	=> explode("|", $customFieldObj[1]),
                                    'compare' 	=> 'IN',
                                );
                            }
                        }

                    global $wp_query;
                    $query = new WP_Query($args);
                    $wp_query = $query;
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

<?php if(!isset($_GET['ajax'])){?>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();
}
