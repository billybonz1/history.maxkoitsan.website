<?php
/**
 * Block Name: townmainfour 
 *
 * This is the template that displays the townmainfour block.
 */

$prefix = "townmainfour";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="action_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $townmainfour_item_title = get_field('townmainfour_item_title');
		        	if($townmainfour_item_title): ?>
            <div class="title_block">
                <h2><?= $townmainfour_item_title ?></h2>
            </div>
            <? endif; ?>
            <? if(have_rows('townmainfour_items')): ?>
            <div class="inner_block">
                <? while(have_rows('townmainfour_items')): the_row(); ?>
                <? $link = get_sub_field('link');
                    $image = get_sub_field('img');
                    $text = get_sub_field('text');
                    if($link): 
                ?>
                <div class="col">
                    <div class="icon">
                        <img src="<?= $image ?>" alt="">
                    </div>
                    <div class="text">
                        <p><?= $text ?></p>
                    </div>
                    <a href="<?= $link['url'] ?>" target="<?= $link['target'] ? $link['target'] : "_self" ?>"
                        class="link"><?= $link['title'] ?></a>
                </div>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townmainfour', get_template_directory_uri() . '/template-parts/blocks/townmainfour/townmainfour.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townmainfour', get_template_directory_uri() . '/template-parts/blocks/townmainfour/townmainfour.js', array(), '1.0', true );
?>
<? endif; ?>