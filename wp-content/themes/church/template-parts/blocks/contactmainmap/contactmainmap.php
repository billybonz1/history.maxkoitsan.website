<?php
/**
 * Block Name: contactmainmap
 *
 * This is the template that displays the contactmainmap block.
 */

$prefix = "contactmainmap";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="map section <?= esc_attr($class) ?>">
    <div class="section-bg">
        <div class="blur_left"></div>
    </div>
    <div class="container">
        <?php
            $countries = get_field('countries');
            $countriesArr = array();
            foreach($countries as $country){
                $countriesArr[] = $country['country']['value'];
            }
        ?>

        <div id="map" data-countries="<?php echo implode(", ", $countriesArr); ?>" class="main_block">
            <div class="location_block">
                <div id="mapHeader" onclick="back()">
                    <h3 class="mapH3"></h3>
                </div>
                <? $welcome_item_title = get_field('mainpagemap_item_title');
		        	if($welcome_item_title): ?>
                <h2><?= $welcome_item_title ?></h2>
                <? endif; ?>

                <div class="country_list" id="mapListDiv">
                    <ul id="mapList" class='mapItemUl'></ul>
                </div>
            </div>
            <div id="europe-map"></div>
        </div>
    </div>
</section>

<?
    wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '1.0' );
    wp_enqueue_style( 'leaflet-style', 'https://unpkg.com/leaflet/dist/leaflet.css', array(), '1.0' );
	wp_enqueue_style( 'church-mainpagemap', get_template_directory_uri() . '/template-parts/blocks/mainpagemap/mainpagemap.css', array(), '1.0' );

    wp_enqueue_script( 'leaflet', 'https://unpkg.com/leaflet/dist/leaflet.js', array(), '1.0', true );
    wp_enqueue_script( 'leaflet-ajax', get_template_directory_uri() . '/js/leaflet.ajax.js', array(), '1.0', true );
	wp_enqueue_script( 'church-contactmainmap', get_template_directory_uri() . '/template-parts/blocks/contactmainmap/contactmainmap.js', array('jquery'), '1.12', true );
?>
<? endif; ?>