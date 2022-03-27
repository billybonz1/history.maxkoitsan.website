<?php
/**
 * Block Name: townaboutusfive 
 *
 * This is the template that displays the townaboutusfive  block.
 */

$prefix = "townaboutusfive";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="about_documents_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="text_block">
                <? $title = get_field('townaboutusfive_item_title');
                   $decor = get_field('townaboutusfive_item_decor');
		        	if($title): ?>
                <div class="title_block">
                    <h2><span class="decor"><?= $decor ?></span> <?= $title ?></h2>
                </div>
                <? endif; ?>
                <? $editor = get_field('townaboutusfive_item_editor');
                   $link = get_field('townaboutusfive_item_link');
		        	if($editor): ?>
                <?= $editor ?>
                <a href="<?= $link['url'] ?>" class="btn"
                    target="<?= $link['target'] ? $link['target'] : "_self" ?>"><?= $link['title'] ?></a>
                <? endif; ?>
            </div>
            <div class="img_block">
                <img src="<?= get_template_directory_uri() ?>/img/wroclaw/about/doc_icon.svg" alt="" class="desctop">
                <img src="<?= get_template_directory_uri() ?>/img/wroclaw/about/doc_icon_mob.svg" alt="" class="mob">
            </div>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townaboutusfive', get_template_directory_uri() . '/template-parts/blocks/townaboutusfive/townaboutusfive.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townaboutusfive', get_template_directory_uri() . '/template-parts/blocks/townaboutusfive/townaboutusfive.js', array(), '1.0', true );
?>
<? endif; ?>