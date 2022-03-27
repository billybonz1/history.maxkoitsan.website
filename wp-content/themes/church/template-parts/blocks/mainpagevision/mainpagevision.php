<?php
/**
 * Block Name: mainpagevision
 *
 * This is the template that displays the mainpagevision block.
 */

$prefix = "mainpagevision";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="vision section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <? if(have_rows('mainpagevision_items')): ?>
        <div class="main_block">
            <? while(have_rows('mainpagevision_items')): the_row(); ?>
            <div class="col">
                <? $mainpagevision_item_editor = get_sub_field('mainpagevision_item_editor');
		        	if($mainpagevision_item_editor): ?>
                <?= $mainpagevision_item_editor ?>
                <? endif; ?>
            </div>
            <? endwhile; ?>
        </div>
        <? endif; ?>
    </div>

</section>
<?
	// wp_enqueue_style( 'church-mainpagevision', get_template_directory_uri() . '/template-parts/blocks/mainpagevision/mainpagevision.css', array(), '1.0' );
	// wp_enqueue_script( 'church-mainpagevision', get_template_directory_uri() . '/template-parts/blocks/mainpagevision/mainpagevision.js', array(), '1.0', true );
?>
<? endif; ?>