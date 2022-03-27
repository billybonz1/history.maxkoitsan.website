<?php
/**
 * Block Name: townvisitsecond 
 *
 * This is the template that displays the townvisitsecond  block.
 */

$prefix = "townvisitsecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="visit_map <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div id="googlemaps" class="map_block"></div>
    <div class="container">
        <? if(have_rows('townvisitsecond_items')): ?>
        <div class="text_block">
            <? while(have_rows('townvisitsecond_items')): the_row(); ?>
            <? $title = get_sub_field('townvisitsecond_item_title');
               $img = get_sub_field('townvisitsecond_item_imgurl');
                $editor = get_sub_field('townvisitsecond_item_editor');
                if($title): 
                ?>
            <div class="wrap">
                <h3><?= $title ?></h3>
                <div class="inner_block">
                    <img src="<?= $img ?>" alt="">
                    <?= $editor ?>
                </div>
            </div>
            <? endif; ?>
            <? endwhile; ?>
        </div>
        <? endif; ?>
    </div>
</section>
<script>
// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = {
        lat: <?php echo get_field('townvisitsecond_map_lat'); ?>,
        lng: <?php echo get_field('townvisitsecond_map_lng'); ?>
    };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("googlemaps"), {
        zoom: 17,
        center: uluru,
        // draggable: false,
        mapTypeControl: false
    });

    // const directionsRenderer = new google.maps.DirectionsRenderer({
    //     draggable: false,
    // });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
        icon: '<?= get_template_directory_uri() ?>/img/map_logo.svg'
    });
}
</script>

<?
	// wp_enqueue_style( 'church-townvisitsecond', get_template_directory_uri() . '/template-parts/blocks/townvisitsecond/townvisitsecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townvisitsecond', get_template_directory_uri() . '/template-parts/blocks/townvisitsecond/townvisitsecond.js', array(), '1.0', true );
    wp_enqueue_script( 'church-map-api',  'https://maps.googleapis.com/maps/api/js?key=AIzaSyBAN2kN-_CpyZmYtoCXt8qUafL46o2pNtE&callback=initMap&libraries=&v=weekly&channel=2', array(), '1.0', true );
?>
<? endif; ?>