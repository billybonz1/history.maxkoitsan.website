<?php
/**
 * Block Name: townvisitwelcome 
 *
 * This is the template that displays the townvisitwelcome  block.
 */

$prefix = "townvisitwelcome";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="visit_first_section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townvisitwelcome_item_title');
                $subtitle = get_field('townvisitwelcome_item_subtitle');
                $link = get_field('townvisitwelcome_item_link');
                $link2 = get_field('townvisitwelcome_item_link2');
		        	if($title): ?>
            <div class="title_block">
                <h1><?= $title ?></h1>
                <?php if($subtitle): ?>
                <p class="subtitle"><?= $subtitle ?></p>
                <? endif; ?>
                <?php if($link): ?>
                <div class="btn_block">
                    <a href="<?= $link['url'] ?>" class="btn"
                        target="<?= $link['target'] ? $link['target'] : "_self" ?>"><?= $link['title'] ?></a>
                    <a href="<?= $link2['url'] ?>" class="btn"
                        target="<?= $link2['target'] ? $link2['target'] : "_self" ?>"><?= $link2['title'] ?></a>
                </div>
                <? endif; ?>
            </div>
            <? endif; ?>
            <? $editor = get_field('townvisitwelcome_item_editor');
		        	if($editor): ?>
            <div class="text_block">
                <?= $editor ?>
            </div>
            <? endif; ?>
        </div>
    </div>
    <? $img1= get_field('townvisitwelcome_item_img1');
        $img2 = get_field('townvisitwelcome_item_img2');
        if($img1): ?>
    <div class="img_block">
        <img src="<?= $img1 ?>" alt="" class="first_img">
        <img src="<?= $img2 ?>" alt="" class="second_img">
        <div class="decor_right">
            <img src="<?= get_template_directory_uri() ?>/img/wroclaw/visit/decor_right_top.svg" alt="" class="top">
            <img src="<?= get_template_directory_uri() ?>/img/wroclaw/visit/decor_right_bottom.svg" alt=""
                class="bottom">
        </div>
    </div>
    <? endif; ?>
</section>

<?
	// wp_enqueue_style( 'church-townvisitwelcome', get_template_directory_uri() . '/template-parts/blocks/townvisitwelcome/townvisitwelcome.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townvisitwelcome', get_template_directory_uri() . '/template-parts/blocks/townvisitwelcome/townvisitwelcome.js', array(), '1.0', true );
?>
<? endif; ?>