<?php
/**
 * Block Name: jesussecond
 *
 * This is the template that displays the jesussecond block.
 */

$prefix = "jesussecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="jesus_second section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $jesussecond_item_title = get_field('jesussecond_item_title');
		        	if($jesussecond_item_title): ?>
            <div class="title_block">
                <h2><?= $jesussecond_item_title ?></h2>
            </div>
            <? endif; ?>
            <? $jesussecond_item_editor = get_field('jesussecond_item_editor');
		        	if($jesussecond_item_editor): ?>
            <div class="content_block">
                <?= $jesussecond_item_editor ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-jesussecond', get_template_directory_uri() . '/template-parts/blocks/jesussecond/jesussecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-jesussecond', get_template_directory_uri() . '/template-parts/blocks/jesussecond/jesussecond.js', array(), '1.0', true );
?>
<? endif; ?>