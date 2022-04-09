<?php
/**
 * church functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package church
 */

if ( ! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.1');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function church_setup() {
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on church, use a find and replace
		* to change 'church' to the name of your theme in all the template files.
		*/
    load_theme_textdomain('church', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array('menu-1'=> esc_html__('Top', 'church'),
            'menu-2'=> esc_html__('Main', 'church'),
            'menu-3'=> esc_html__('Main mobile', 'church'),
            'footer-1'=> esc_html__('Main footer', 'church'),
            'footer-2'=> esc_html__('Church footer', 'church'),
            'footer-3'=> esc_html__('Act footer', 'church'),
            'footer-4'=> esc_html__('Service footer', 'church'),
            'location'=> esc_html__('Location menu', 'church'),
            'footet-bottom'=> esc_html__('Bottom footer menu', 'church'),
        ));

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support('html5',
        array('search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background',
        apply_filters('church_custom_background_args',
            array('default-color'=> 'ffffff',
                'default-image'=> '',
            )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
    add_theme_support('custom-logo',
        array('height'=> 250,
            'width'=> 250,
            'flex-width'=> true,
            'flex-height'=> true,
        ));

        if (function_exists('add_image_size')) {
			add_image_size( 'post_img', 9999, 281,);
            add_image_size( 'post_top_img', 1052, 588, true );
            add_image_size( 'post_small_img', 90, 61, true );
            add_image_size( 'event_img', 448, 315, true );
		}

    add_theme_support( 'post-formats', array( 'aside', 'quote', 'video', 'audio' ) );
}

add_action('after_setup_theme', 'church_setup');

add_filter(
    'load_script_translations',
    function( $translations, $file, $handle, $domain ) {
        /**
         * The post format labels used for the dropdown are defined in the
         * "wp-editor" script.
         */
        if ( 'wp-editor' === $handle ) {
            /**
             * The translations are formatted as JSON. Decode the JSON to modify
             * them.
             */
            $translations = json_decode( $translations, true );

            /**
             * The strings are inside locale_data > messages, where the original
             * string is the key. The value is an array of translations.
             *
             * Singular strings only have one value in the array, while strings
             * with singular and plural forms have a string for each in the array.
             */
            $translations['locale_data']['messages']['Aside']  = [ 'Books' ];
            $translations['locale_data']['messages']['Quote'] = [ 'Materials' ];
            $translations['locale_data']['messages']['Audio'] = [ 'Podcasts' ];
            /**
             * Re-encode the modified translations as JSON.
             */
            $translations = wp_json_encode( $translations );
        }

        return $translations;
    },
    10,
    4
);
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function church_content_width() {
    $GLOBALS['content_width']=apply_filters('church_content_width', 640);
}

add_action('after_setup_theme', 'church_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function church_widgets_init() {
    register_sidebar(array('name'=> esc_html__('Sidebar', 'church'),
            'id'=> 'sidebar-1',
            'description'=> esc_html__('Add widgets here.', 'church'),
            'before_widget'=> '<section id="%1$s" class="widget %2$s">',
            'after_widget'=> '</section>',
            'before_title'=> '<h2 class="widget-title">',
            'after_title'=> '</h2>',
        ));
}

add_action('widgets_init', 'church_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function church_scripts() {
    if ( has_post_format( 'audio' )) {
        wp_enqueue_style( 'audio-mediaelement', 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelementplayer.css', array(), _S_VERSION);
        wp_enqueue_style( 'audio-speed', 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement-plugins/2.5.0/speed/speed.min.css', array(), _S_VERSION);
        wp_enqueue_style( 'audio-skip-back', 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement-plugins/2.5.0/skip-back/skip-back.min.css', array(), _S_VERSION);
        wp_enqueue_style( 'audio-jump-forward', 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement-plugins/2.5.0/jump-forward/jump-forward.min.css', array(), _S_VERSION);

        wp_enqueue_script( 'audio-mediaelement', 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelement-and-player.min.js', array('jquery'), '1.0', true );
        wp_enqueue_script( 'audio-skip-back', 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement-plugins/2.5.0/skip-back/skip-back.min.js', array('jquery'), '1.0', true );
        wp_enqueue_script( 'audio-jump-forward', 'https://cdnjs.cloudflare.com/ajax/libs/mediaelement-plugins/2.5.0/jump-forward/jump-forward.min.js', array('jquery'), '1.0', true );
        wp_enqueue_script( 'audio-changespeed', 'https://cdn.jsdelivr.net/gh/ivorpad/mediaelement-changespeed/changespeed.js', array('jquery'), '1.0', true );
        wp_enqueue_script( 'audio-podcast', get_template_directory_uri() . '/js/podcast.js', array('jquery'), _S_VERSION, true);
    }
    if ( has_post_format( 'video' )) {
        wp_enqueue_style('church-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), _S_VERSION);
        
        wp_enqueue_script('church-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), _S_VERSION, true);
    }

    if ( is_page_template('calendar-page.php')) {
        wp_enqueue_script('church-calendar', get_template_directory_uri() . '/js/calendar.js', array('jquery'), _S_VERSION, true);
    }

    if ( is_page_template('homegroups-page.php')) {
        // wp_enqueue_script('church-homegroup', get_template_directory_uri() . '/js/calendar.js', array('jquery'), _S_VERSION, true);
    }
    
    wp_enqueue_style('church-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('church-normalize',  get_template_directory_uri() . '/css/normalize.css', array(), _S_VERSION);
	wp_enqueue_style('church-mainstyle', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);
    wp_enqueue_style('church-swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), _S_VERSION);
    // wp_style_add_data('church-style', 'rtl', 'replace');

	wp_enqueue_script('church-mainscript', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('church-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('church-swiper-bundle', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), _S_VERSION);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'church_scripts');

add_filter( 'navigation_markup_template',  'my_posts_pagination', 10, 2 );
function my_posts_pagination($template, $class){
    global $wp_query;
    
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;
    $first = $last = '';
    
    if($current == 1)
        $first = '<span class="prev inactive"><img src="/wp-content/themes/church/img/blog/Arrow_Right.svg" alt=""></span>';
    
    if($current == $total)
        $last = '<span class="next inactive"><img src="/wp-content/themes/church/img/blog/Arrow_Right.svg" alt=""></span>';
    
    $template = '
    <nav class="navigation %1$s" role="navigation" aria-label="%4$s">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">
        '.$first.'
        %3$s
        '.$last.'
        </div>
    </nav>';
    return $template;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Shorthands for standart wp functions
 */
function wgai($attachment_id=0, $size="thumbnail", $icon=false, $attr=array()) {
    return wp_get_attachment_image($attachment_id, $size, $icon, $attr);
}

/**
 * Remove Contact Form 7 auto added p tags
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Clear phone for href
 */
function get_href_phone($phone) {
    return "tel:". preg_replace('/\D+/', '', $phone);
}

/**
 * Clear email for href
 */
function get_href_email($email) {
    return "mailto:". $email;
}

/**
 * Register ACF blocks
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Add acf options pages
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array('page_title'=> 'Основные настройки',
            'menu_title'=> 'Настройки темы',
            'menu_slug'=> 'theme-general-settings',
            'capability'=> 'edit_posts',
            'redirect'=> false));
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';

    // return
    return $path; 
}

/**
 * Load Custom except.
 */
require get_template_directory() . '/inc/except.php';

/**
 * Helper polylang functions
 */
require get_template_directory() . '/inc/polylang-functions.php';

/**
 * Add json to main map.
 */
require get_template_directory() . '/inc/json-settings.php';

add_filter( 'paginate_links', 'filter_function_name_8134' );
function filter_function_name_8134( $link ){
    return str_replace(array("&ajax=1","?ajax=1"), "", $link);
}

/**
 * Add custom posts (Events).
 */
require get_template_directory() . '/inc/calendar-post.php';

/**
 * Add custom posts (Homegroups).
 */
require get_template_directory() . '/inc/homegroups-post.php';

function get_events(){
    $args = array(
        'posts_per_page' => 6,
        'post_type' => 'calendar',
        'order'   => 'ASC',
        'orderby' => 'meta_value_num',
        'meta_key' => 'date_event_end',
        'paged' => isset($_GET['pagen']) ? $_GET['pagen'] : 1,
        'tax_query' => array(
            array(
                'taxonomy' => $_GET['taxonomy'],
                'field'    => 'slug',
                'terms'    => $_GET['slug']
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

    if(isset($_GET['week'])){
        $day = date('w');
        $week_start = date('Ymd', strtotime('-'.$day.' days'));
        $week_end = date('Ymd', strtotime('+'.(6-$day).' days'));
        $args['meta_query']['relation'] = "AND";
        $args['meta_query'][] = array(
            'key' => 'date_event_end',
            'value' => $week_start,
            'type' => 'DATE',
            'compare' => '>='
        );
        $args['meta_query'][] = array(
            'key' => 'date_event_end',
            'value' => $week_end,
            'type' => 'DATE',
            'compare' => '<='
        );
    }

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
    </div><?php
    exit();
}
add_action( 'wp_ajax_get_events', 'get_events' );
add_action( 'wp_ajax_nopriv_get_events', 'get_events' );