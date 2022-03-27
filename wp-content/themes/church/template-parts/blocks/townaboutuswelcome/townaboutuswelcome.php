<?php
/**
 * Block Name: townaboutuswelcome 
 *
 * This is the template that displays the townaboutuswelcome  block.
 */

$prefix = "townaboutuswelcome";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="about_local_first section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bglineral.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $townaboutuswelcome_item_title = get_field('townaboutuswelcome_item_title');
               $townaboutuswelcome_item_subtitle = get_field('townaboutuswelcome_item_subtitle');
		        	if($townaboutuswelcome_item_title): ?>
            <div class="title_block">
                <p class="top_text"><?= $townaboutuswelcome_item_subtitle ?></p>
                <h1><?= $townaboutuswelcome_item_title ?></h1>
            </div>
            <? endif; ?>
            <? if(have_rows('townaboutuswelcome_items')): ?>
            <div class="inner_block">
                <? while(have_rows('townaboutuswelcome_items')): the_row(); ?>
                <?  $link = get_sub_field('link');
                    $title = get_sub_field('title');
                    if($link): 
                ?>
                <div class="col">
                    <h2><?= $title ?></h2>
                    <a href="<?= $link['url'] ?>" class="btn"
                        target="<?= $link['target'] ? $link['target'] : "_self" ?>"><?= $link['title'] ?></a>
                </div>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townaboutuswelcome', get_template_directory_uri() . '/template-parts/blocks/townaboutuswelcome/townaboutuswelcome.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townaboutuswelcome', get_template_directory_uri() . '/template-parts/blocks/townaboutuswelcome/townaboutuswelcome.js', array(), '1.0', true );
?>
<? endif; ?>