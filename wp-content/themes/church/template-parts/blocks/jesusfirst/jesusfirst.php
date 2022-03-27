<?php
/**
 * Block Name: jesusfirst
 *
 * This is the template that displays the jesusfirst block.
 */

$prefix = "jesusfirst";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="jesus_first section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $jesusfirst_item_title = get_field('jesusfirst_item_title');
		        	if($jesusfirst_item_title): ?>
            <div class="title_block">
                <h1><?= $jesusfirst_item_title ?></h1>
            </div>
            <? endif; ?>
            <? $jesusfirst_item_editor = get_field('jesusfirst_item_editor');
		        	if($jesusfirst_item_editor): ?>
            <div class="content_block">
                <?= $jesusfirst_item_editor ?>
            </div>
            <? endif; ?>
            <? $jesusfirst_item_img = get_field('jesusfirst_item_img');
		        	if($jesusfirst_item_img): ?>
            <div class="img_block">
                <?= wgai($jesusfirst_item_img, 'full'); ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-jesusfirst', get_template_directory_uri() . '/template-parts/blocks/jesusfirst/jesusfirst.css', array(), '1.0' );
	// wp_enqueue_script( 'church-jesusfirst', get_template_directory_uri() . '/template-parts/blocks/jesusfirst/jesusfirst.js', array(), '1.0', true );
?>
<? endif; ?>