<?php
/**
 * Block Name: towndonatethird 
 *
 * This is the template that displays the towndonatethird  block.
 */

$prefix = "towndonatethird";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="giving_local_church <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $towndonatethird_item_title = get_field('towndonatethird_item_title');
		        	if($towndonatethird_item_title): ?>
            <div class="title_block">
                <h2><?= $towndonatethird_item_title ?></h2>
            </div>
            <? endif; ?>
            <? if(have_rows('towndonatethird_items')): ?>
            <div class="inner_block">
                <? while(have_rows('towndonatethird_items')): the_row(); ?>
                <?  $text = get_sub_field('text');
                    $title = get_sub_field('title');
                    $icon = get_sub_field('icon');
                    $btn = get_sub_field('btn');
                    if($title): 
                ?>
                <div class="col">
                    <div class="title_inner">
                        <img src="<?= $icon ?>" alt="">
                        <h3><?= $title ?></h3>
                    </div>
                    <div class="inner_info">
                        <?= $text ?>
                        <?php if($btn): ?>
                        <a href="<?= $btn['url'] ?>" class="btn"
                            target="<?= $btn['target'] ? $btn['target'] : "_self" ?>"><?= $btn['title'] ?></a>
                        <? endif; ?>
                    </div>
                </div>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-towndonatethird', get_template_directory_uri() . '/template-parts/blocks/towndonatethird/towndonatethird.css', array(), '1.0' );
	// wp_enqueue_script( 'church-towndonatethird', get_template_directory_uri() . '/template-parts/blocks/towndonatethird/towndonatethird.js', array(), '1.0', true );
?>
<? endif; ?>