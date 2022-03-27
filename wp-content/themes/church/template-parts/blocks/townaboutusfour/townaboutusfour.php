<?php
/**
 * Block Name: townaboutusfour 
 *
 * This is the template that displays the townaboutusfour  block.
 */

$prefix = "townaboutusfour";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="about_contact_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townaboutusfour_item_title');
               $decor = get_field('townaboutusfour_item_decor');
               $img = get_field('townaboutusfour_item_img');
		        	if($title): ?>
            <div class="img_block">
                <div class="title_block">
                    <h2><?= $title ?> <span class="decor"><?= $decor ?></span></h2>
                </div>
                <img src="<?= $img ?>" alt="">
            </div>
            <? endif; ?>
            <div class="contact_main">
                <? $title = get_field('townaboutusfour_contect_title');
                   $decor = get_field('townaboutusfour_contect_decor');
		        	if($title): ?>
                <div class="title_block">
                    <h2><?= $title ?> <span class="decor"><?= $decor ?></span></h2>
                </div>
                <? endif; ?>
                <? if(have_rows('townaboutusfour_items')): ?>
                <div class="inner_block">
                    <? while(have_rows('townaboutusfour_items')): the_row(); ?>
                    <div class="col adres">
                        <div class="img">
                            <img src="<?= get_template_directory_uri() ?>/img/contact/map_icon.svg" alt="">
                        </div>
                        <div class="content">
                            <? $contact_item_link = get_sub_field('link');
                               $contact_item_title = get_sub_field('title');
						        	if($contact_item_link): ?>
                            <p class="subtitle"><?= $contact_item_title ?></p>
                            <a href="<?= $contact_item_link['url'] ?>"
                                target="<?= $contact_item_link['target'] ? $contact_item_link['target'] : "_self" ?>"><?= $contact_item_link['title'] ?></a>
                            <? endif; ?>
                        </div>
                    </div>
                    <? endwhile; ?>
                </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townaboutusfour', get_template_directory_uri() . '/template-parts/blocks/townaboutusfour/townaboutusfour.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townaboutusfour', get_template_directory_uri() . '/template-parts/blocks/townaboutusfour/townaboutusfour.js', array(), '1.0', true );
?>
<? endif; ?>