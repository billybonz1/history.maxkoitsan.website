<?php
/**
 * Block Name: townmainfirst 
 *
 * This is the template that displays the townmainfirst  block.
 */

$prefix = "townmainfirst";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="first_section_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bglineral.php")); ?>
    <div class="container">
        <div class="container">
            <div class="main_block">
                <div class="title_block">
                    <? $townmainfirst_item_title = get_field('townmainfirst_item_title');
		        	if($townmainfirst_item_title): ?>
                    <h1><?= $townmainfirst_item_title ?></h1>
                    <? endif; ?>
                    <? $townmainfirst_item_subtitle = get_field('townmainfirst_item_subtitle');
		        	if($townmainfirst_item_subtitle): ?>
                    <span class="title_right"><?= $townmainfirst_item_subtitle ?></span>
                    <? endif; ?>
                </div>
                <? if (!empty($block_btn)):
                    if($block_btn): ?>
                <div class="youtube_block">
                    <a href="<?= $block_btn['url'] ?>"
                        target="<?= $block_btn['target'] ? $block_btn['target'] : "_self" ?>"></a>
                    <i></i>
                    <p><?= $block_btn['title'] ?></p>
                </div>
                <? endif;
                endif; ?>
            </div>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townmainfirst', get_template_directory_uri() . '/template-parts/blocks/townmainfirst/townmainfirst.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townmainfirst', get_template_directory_uri() . '/template-parts/blocks/townmainfirst/townmainfirst.js', array(), '1.0', true );
?>
<? endif; ?>