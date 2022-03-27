<?php
/**
 * Block Name: mainpagewelcome
 *
 * This is the template that displays the mainpagewelcome block.
 */

$prefix = "mainpagewelcome";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="firstmain section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="church_block">
        <img src="<?= get_template_directory_uri() ?>/img/mainpage/church_img.png" alt="">
    </div>
    <div class="container">
        <div class="main_block">
            <div class="text_block">
                <? $welcome_item_subtitle = get_field('mainpagewelcome_item_subtitle');
		        	if($welcome_item_subtitle): ?>
                <p class="top_text"><?= $welcome_item_subtitle ?></p>
                <? endif; ?>
                <? $welcome_item_title = get_field('mainpagewelcome_item_title');
		        	if($welcome_item_title): ?>
                <div class="welcome-item-title">
                    <h1><?= $welcome_item_title ?></h1>
                </div>
                <? endif; ?>
            </div>
        </div>
    </div>

</section>
<?
	// wp_enqueue_style( 'church-welcome', get_template_directory_uri() . '/template-parts/blocks/mainpagewelcome/mainpagewelcome.css', array(), '1.0' );
	// wp_enqueue_script( 'church-welcome', get_template_directory_uri() . '/template-parts/blocks/mainpagewelcome/mainpagewelcome.js', array(), '1.0', true );
?>
<? endif; ?>