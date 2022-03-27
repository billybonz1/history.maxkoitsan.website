<?php
/**
 * Block Name: jesusthird
 *
 * This is the template that displays the jesusthird block.
 */

$prefix = "jesusthird";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="jesus_third section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $jesusthird_item_title = get_field('jesusthird_item_title');
		        	if($jesusthird_item_title): ?>
            <div class="title_block">
                <h2><?= $jesusthird_item_title ?></h2>
            </div>
            <? endif; ?>
            <? $jesusthird_item_editor = get_field('jesusthird_item_editor');
		        	if($jesusthird_item_editor): ?>
            <div class="content_block">
                <div class="yellow_block">
                    <?= $jesusthird_item_editor ?>
                </div>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-jesusthird', get_template_directory_uri() . '/template-parts/blocks/jesusthird/jesusthird.css', array(), '1.0' );
	// wp_enqueue_script( 'church-jesusthird', get_template_directory_uri() . '/template-parts/blocks/jesusthird/jesusthird.js', array(), '1.0', true );
?>
<? endif; ?>