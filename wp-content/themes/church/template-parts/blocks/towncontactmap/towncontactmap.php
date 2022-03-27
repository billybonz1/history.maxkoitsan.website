<?php
/**
 * Block Name: towncontactmap
 *
 * This is the template that displays the towncontactmap block.
 */

$prefix = "towncontactmap";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="contact_local_map <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="map" id="googlemaps"></div>
    <div class="container">
        <div class="main_block">
            <div class="form_block">
                <?php echo do_shortcode( '[contact-form-7 id="1271" title="Contact form"]' ); ?>
            </div>
            <div class="message_block">
                <? $editor_col = get_field('towncontactmap_item_col');
		        	if($editor_col): ?>
                <?= $editor_col ?>
                <? endif; ?>
                <? if(have_rows('towncontactmap_items')): ?>
                <div class="social_block">
                    <? while(have_rows('towncontactmap_items')): the_row(); ?>
                    <? $towncontactmap_items_link = get_sub_field('link');
                        $i++;
                        $image = get_sub_field('img');
                        $hover = get_sub_field('hover');
                            if($towncontactmap_items_link): 
                    ?>
                    <a href="<?= $towncontactmap_items_link['url'] ?>"
                        target="<?= $towncontactmap_items_link['target'] ? $towncontactmap_items_link['target'] : "_self" ?>">
                        <style type="text/css">
                        .preview-img<?php echo $i;

                        ?> {
                            background-image: url('<?= $image ?>');
                        }

                        .preview-img<?php echo $i;

                        ?>:hover {
                            background-image: url('<?= $hover ?>');
                        }
                        </style>
                        <div class="preview-img preview-img<?php echo $i; ?>">

                        </div>
                    </a>
                    <? endif; ?>
                    <? endwhile; ?>
                </div>
                <? endif; ?>
            </div>
        </div>
</section>
<script>
// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = {
        lat: <?php echo get_field('towncontactmap_map_lat'); ?>,
        lng: <?php echo get_field('towncontactmap_map_lng'); ?>
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
	// wp_enqueue_style( 'church-towncontactmap', get_template_directory_uri() . '/template-parts/blocks/towncontactmap/towncontactmap.css', array(), '1.0' );
	// wp_enqueue_script( 'church-towncontactmap', get_template_directory_uri() . '/template-parts/blocks/towncontactmap/towncontactmap.js', array(), '1.0', true );
    wp_enqueue_script( 'church-map-api',  'https://maps.googleapis.com/maps/api/js?key=AIzaSyBAN2kN-_CpyZmYtoCXt8qUafL46o2pNtE&callback=initMap&libraries=&v=weekly&channel=2', array(), '1.0', true );
?>
<? endif; ?>