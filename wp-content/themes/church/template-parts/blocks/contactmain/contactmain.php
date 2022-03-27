<?php
/**
 * Block Name: contactmain
 *
 * This is the template that displays the contactmain block.
 */

$prefix = "contactmain";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="contacts_first section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="title_block">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="social_top">
                <? $title = get_field('contactmain_item_title');
		        	if($title): ?>
                <h3><?= $title ?></h3>
                <? endif; ?>
                <? if(have_rows('contactmain_items')): ?>
                <div class="social_block">
                    <? while(have_rows('contactmain_items')): the_row(); ?>
                    <? $header_messengers_items_link = get_sub_field('contactmain_item_link');
						        	if($header_messengers_items_link): ?>
                    <a href="<?= $header_messengers_items_link['url'] ?>"
                        target="<?= $header_messengers_items_link['target'] ? $header_messengers_items_link['target'] : "_self" ?>">
                        <? $header_messengers_items_img = get_sub_field('contactmain_item_imgurl');
								        	if($header_messengers_items_img): ?>
                        <img src="<?= $header_messengers_items_img ?>" alt="">
                        <? endif; ?>
                    </a>
                    <? endif; ?>
                    <? endwhile; ?>
                </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-contactmain', get_template_directory_uri() . '/template-parts/blocks/contactmain/contactmain.css', array(), '1.0' );
	// wp_enqueue_script( 'church-contactmain', get_template_directory_uri() . '/template-parts/blocks/contactmain/contactmain.js', array(), '1.0', true );
?>
<? endif; ?>