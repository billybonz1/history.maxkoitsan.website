<?php
/**
 * Block Name: townmainthird 
 *
 * This is the template that displays the townmainthird  block.
 */

$prefix = "townmainthird";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="vision_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="img_bg"></div>
    <div class="container">
        <div class="main_block">
            <div class="text_block">
                <? $townmainthird_item_title = get_field('townmainthird_item_title');
		        	if($townmainthird_item_title): ?>
                <div class="title_block">
                    <h2><?= $townmainthird_item_title ?></h2>
                </div>
                <? endif; ?>
                <? $townmainthird_item_subtitle = get_field('townmainthird_item_subtitle');
		        	if($townmainthird_item_subtitle): ?>
                <p><?= $townmainthird_item_subtitle ?></p>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townmainthird', get_template_directory_uri() . '/template-parts/blocks/townmainthird/townmainthird.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townmainthird', get_template_directory_uri() . '/template-parts/blocks/townmainthird/townmainthird.js', array(), '1.0', true );
?>
<? endif; ?>