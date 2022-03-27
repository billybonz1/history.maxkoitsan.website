<?php
/**
 * Block Name: townservicewelcome 
 *
 * This is the template that displays the townservicewelcome  block.
 */

$prefix = "townservicewelcome";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="service_local_first <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townservicewelcome_item_title');
		        	if($title): ?>
            <div class="title_block">
                <h1><?= $title ?></h1>
            </div>
            <? endif; ?>
            <? $editor = get_field('townservicewelcome_item_editor');
		        	if($editor): ?>
            <div class="text_block">
                <img src="<?= get_template_directory_uri() ?>/img/wroclaw/service/church_icon.svg" alt="">
                <?= $editor ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townservicewelcome', get_template_directory_uri() . '/template-parts/blocks/townservicewelcome/townservicewelcome.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townservicewelcome', get_template_directory_uri() . '/template-parts/blocks/townservicewelcome/townservicewelcome.js', array(), '1.0', true );
?>
<? endif; ?>