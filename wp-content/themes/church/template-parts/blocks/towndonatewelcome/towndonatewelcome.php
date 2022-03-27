<?php
/**
 * Block Name: towndonatewelcome 
 *
 * This is the template that displays the towndonatewelcome  block.
 */

$prefix = "towndonatewelcome";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="giving_local_first <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <? $towndonatewelcome_item_title = get_field('towndonatewelcome_item_title');
           $link = get_field('towndonatewelcome_item_link');
		        	if($towndonatewelcome_item_title): ?>
        <div class="main_block">
            <img src="<?= get_template_directory_uri() ?>/img/wroclaw/giving/man_icon.svg" alt="">
            <h1><?= $towndonatewelcome_item_title ?></h1>
            <a href="<?= $link['url'] ?>" class="btn"
                target="<?= $link['target'] ? $link['target'] : "_self" ?>"><?= $link['title'] ?></a>
        </div>
        <? endif; ?>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-towndonatewelcome', get_template_directory_uri() . '/template-parts/blocks/towndonatewelcome/towndonatewelcome.css', array(), '1.0' );
	// wp_enqueue_script( 'church-towndonatewelcome', get_template_directory_uri() . '/template-parts/blocks/towndonatewelcome/towndonatewelcome.js', array(), '1.0', true );
?>
<? endif; ?>