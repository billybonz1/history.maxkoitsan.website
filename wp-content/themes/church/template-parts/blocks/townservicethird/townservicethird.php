<?php
/**
 * Block Name: townservicethird 
 *
 * This is the template that displays the townservicethird  block.
 */

$prefix = "townservicethird";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="service_local_third <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $editor = get_field('townservicethird_item_editor');
		        	if($editor): ?>
            <div class="text_block">
                <div class="section-bg"></div>
                <?= $editor ?>
            </div>
            <? endif; ?>
            <? $title = get_field('townservicethird_item_title');
		        	if($title): ?>
            <div class="title_block">
                <div class="inner_block">
                    <h2><?= $title ?></h2>
                </div>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townservicethird', get_template_directory_uri() . '/template-parts/blocks/townservicethird/townservicethird.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townservicethird', get_template_directory_uri() . '/template-parts/blocks/townservicethird/townservicethird.js', array(), '1.0', true );
?>
<? endif; ?>