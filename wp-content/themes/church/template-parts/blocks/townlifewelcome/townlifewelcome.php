<?php
/**
 * Block Name: townlifewelcome 
 *
 * This is the template that displays the townlifewelcome  block.
 */

$prefix = "townlifewelcome";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="life_local_first <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bglineral.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townlifewelcome_item_title');
               $subtitle = get_field('townlifewelcome_item_subtitle');
		        	if($title): ?>
            <div class="title_block">
                <p class="top_text"><?= $subtitle ?></p>
                <h1><?= $title ?></h1>
            </div>
            <? endif; ?>
        </div>
    </div>
    <? $img = get_field('townlifewelcome_item_imgurl');
        if($img): ?>
    <div class="img_block">
        <img src="<?= $img ?>" alt="">
    </div>
    <? endif; ?>
</section>

<?
	// wp_enqueue_style( 'church-townlifewelcome', get_template_directory_uri() . '/template-parts/blocks/townlifewelcome/townlifewelcome.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townlifewelcome', get_template_directory_uri() . '/template-parts/blocks/townlifewelcome/townlifewelcome.js', array(), '1.0', true );
?>
<? endif; ?>