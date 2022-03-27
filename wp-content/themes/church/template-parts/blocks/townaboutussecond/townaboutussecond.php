<?php
/**
 * Block Name: townaboutussecond 
 *
 * This is the template that displays the townaboutussecond  block.
 */

$prefix = "townaboutussecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="about_local_second section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $townaboutussecond_item_urlimg = get_field('townaboutussecond_item_imgurl');
		        	if($townaboutussecond_item_urlimg): ?>
            <div class="img_block" style="background-image: url('<?= $townaboutussecond_item_urlimg ?>');"></div>
            <? endif; ?>
            <? $townaboutussecond_item_editor = get_field('townaboutussecond_item_editor');
		        	if($townaboutussecond_item_editor): ?>
            <div class="text_block">
                <?= $townaboutussecond_item_editor ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townaboutussecond', get_template_directory_uri() . '/template-parts/blocks/townaboutussecond/townaboutussecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townaboutussecond', get_template_directory_uri() . '/template-parts/blocks/townaboutussecond/townaboutussecond.js', array(), '1.0', true );
?>
<? endif; ?>