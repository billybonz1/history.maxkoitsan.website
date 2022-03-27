<?php
/**
 * Block Name: townmaincalendar 
 *
 * This is the template that displays the townmaincalendar block.
 */

$prefix = "townmaincalendar";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="calendar_local section <?= esc_attr($class) ?>">
    <div class="container">
        <div class="main_block">
            <div class="text_block">
                <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
                <? $townmaincalendar_item_title = get_field('townmaincalendar_item_title');
		        	if($townmaincalendar_item_title): ?>
                <h2><?= $townmaincalendar_item_title ?></h2>
                <? endif; ?>
                <? $townmaincalendar_item_subtitle = get_field('townmaincalendar_item_subtitle');
		        	if($townmaincalendar_item_subtitle): ?>
                <p><?= $townmaincalendar_item_subtitle ?></p>
                <? endif; ?>
                <? if (!empty($block_btn)):
                    if($block_btn): ?>
                <a href="<?= $block_btn['url'] ?>" class="btn"
                    target="<?= $block_btn['target'] ? $block_btn['target'] : "_self" ?>"><?= $block_btn['title'] ?></a>
                <? endif; ?>
                <? endif; ?>
            </div>
            <? $img_1 = get_field('townmaincalendar_item_img');
			   $img_2 = get_field('townmaincalendar_item_mob');
		        if($img_1): ?>
            <div class="img_block">
                <img src="<?= $img_1 ?>" alt="" class="desctop">
                <img src="<?= $img_2 ?>" alt="" class="mob">
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townmaincalendar', get_template_directory_uri() . '/template-parts/blocks/townmaincalendar/townmaincalendar.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townmaincalendar', get_template_directory_uri() . '/template-parts/blocks/townmaincalendar/townmaincalendar.js', array(), '1.0', true );
?>
<? endif; ?>