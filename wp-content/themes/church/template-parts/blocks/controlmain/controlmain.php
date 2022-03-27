<?php
/**
 * Block Name: controlmain
 *
 * This is the template that displays the controlmain block.
 */

$prefix = "controlmain";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="control section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="title_block">
            <h1><?php the_title(); ?></h1>
        </div>
        <? if(have_rows('controlmain_items')): ?>
        <div class="main_block">
            <? while(have_rows('controlmain_items')): the_row(); ?>
            <? $link = get_sub_field('controlmain_item_link');
            $editor = get_sub_field('controlmain_item_editor');
            $icon = get_sub_field('img');
						        	if($link): ?>
            <div class="control_inner">
                <div class="icon_block">
                    <img src="<?= $icon ?>" alt="">
                </div>
                <div class="text_block">
                    <?= $editor ?>
                </div>
                <a href="<?= $link['url'] ?>" target="<?= $link['target'] ? $link['target'] : "_self" ?>"></a>
            </div>
            <? endif; ?>
            <? endwhile; ?>
        </div>
        <? endif; ?>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-controlmain', get_template_directory_uri() . '/template-parts/blocks/controlmain/controlmain.css', array(), '1.0' );
	// wp_enqueue_script( 'church-controlmain', get_template_directory_uri() . '/template-parts/blocks/controlmain/controlmain.js', array(), '1.0', true );
?>
<? endif; ?>