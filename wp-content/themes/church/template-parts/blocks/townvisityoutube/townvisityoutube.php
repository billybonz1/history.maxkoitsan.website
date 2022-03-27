<?php
/**
 * Block Name: townvisityoutube 
 *
 * This is the template that displays the townvisityoutube  block.
 */

$prefix = "townvisityoutube";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="visit_local_offline <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="offline_block">
                <? $title = get_field('townvisityoutube_item_title');
                $subtitle = get_field('townvisityoutube_item_subtitle');
                $link = get_field('townvisityoutube_item_link');
		        	if($title): ?>
                <div class="text_block">
                    <h2><?= $title ?></h2>
                    <p><?= $subtitle ?></p>
                </div>
                <div class="btn_block">
                    <a href="<?= $link['url'] ?>" target="<?= $link['target'] ? $link['target'] : "_self" ?>"></a>
                    <i></i>
                    <p><?= $link['title'] ?></p>
                </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townvisityoutube', get_template_directory_uri() . '/template-parts/blocks/townvisityoutube/townvisityoutube.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townvisityoutube', get_template_directory_uri() . '/template-parts/blocks/townvisityoutube/townvisityoutube.js', array(), '1.0', true );
?>
<? endif; ?>