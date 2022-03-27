<?php
/**
 * Block Name: servicesmainfirst
 *
 * This is the template that displays the servicesmainfirst block.
 */

$prefix = "servicesmainfirst";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="service_first section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="text_block">
                <?php 
                $image = get_field('servicesmainfirst_item_img');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                }
                ?>
                <? $servicesmainfirst_item_title = get_field('servicesmainfirst_item_title');
		        	if($servicesmainfirst_item_title): ?>
                <h1><?= $servicesmainfirst_item_title ?></h1>
                <? endif; ?>
                <? $servicesmainfirst_item_title = get_field('servicesmainfirst_item_subtitle');
		        	if($servicesmainfirst_item_title): ?>
                <p class="subtitle"><?= $servicesmainfirst_item_title ?></p>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-servicesmainfirst', get_template_directory_uri() . '/template-parts/blocks/servicesmainfirst/servicesmainfirst.css', array(), '1.0' );
	// wp_enqueue_script( 'church-servicesmainfirst', get_template_directory_uri() . '/template-parts/blocks/servicesmainfirst/servicesmainfirst.js', array(), '1.0', true );
?>
<? endif; ?>