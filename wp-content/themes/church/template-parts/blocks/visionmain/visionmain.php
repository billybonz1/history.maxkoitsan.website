<?php
/**
 * Block Name: visionmain 
 *
 * This is the template that displays the visionmain  block.
 */

$prefix = "visionmain";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="visionpage section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $visionmain_item_title = get_field('visionmain_item_title');
		        	if($visionmain_item_title): ?>
            <div class="title_block">
                <h1><?= $visionmain_item_title ?></h1>
            </div>
            <? endif; ?>
            <div class="content_block">
                <? $visionmaincol = get_field('visionmain_item_editor');
		        	if($visionmaincol): ?>
                <?= $visionmaincol ?>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-visionmain', get_template_directory_uri() . '/template-parts/blocks/visionmain/visionmain.css', array(), '1.0' );
	// wp_enqueue_script( 'church-visionmain', get_template_directory_uri() . '/template-parts/blocks/visionmain/visionmain.js', array(), '1.0', true );
?>
<? endif; ?>