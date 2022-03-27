<?php
/**
 * Block Name: aboutusfirst
 *
 * This is the template that displays the aboutusfirst block.
 */

$prefix = "aboutusfirst";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="about_us_first section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="content_block">
                <div class="text_block">
                    <? $aboutusfirst_item_title = get_field('aboutusfirst_item_title');
		        	if($aboutusfirst_item_title): ?>
                    <h1><?= $aboutusfirst_item_title ?></h1>
                    <? endif; ?>
                    <? $aboutusfirst_item_editor = get_field('aboutusfirst_item_editor');
		        	if($aboutusfirst_item_editor): ?>
                    <?= $aboutusfirst_item_editor ?>
                    <? endif; ?>
                </div>
                <div class="img_block">
                    <? $aboutusfirst_img = get_field('aboutusfirst_img_item_imgurl');
		        	if($aboutusfirst_img): ?>
                    <img src="<?= $aboutusfirst_img ?>" alt="" class="first_img">
                    <? endif; ?>
                    <? $aboutusfirst_img = get_field('aboutusfirst_img1_item_imgurl');
		        	if($aboutusfirst_img): ?>
                    <img src="<?= $aboutusfirst_img ?>" alt="" class="second_img">
                    <? endif; ?>
                    <? $aboutusfirst_img = get_field('aboutusfirst_img2_item_imgurl');
		        	if($aboutusfirst_img): ?>
                    <img src="<?= $aboutusfirst_img ?>" alt="" class="third_img">
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-aboutusfirst', get_template_directory_uri() . '/template-parts/blocks/aboutusfirst/aboutusfirst.css', array(), '1.0' );
	// wp_enqueue_script( 'church-aboutusfirst', get_template_directory_uri() . '/template-parts/blocks/aboutusfirst/aboutusfirst.js', array(), '1.0', true );
?>
<? endif; ?>