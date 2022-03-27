<?php
/**
 * Block Name: towndonatesecond 
 *
 * This is the template that displays the towndonatesecond  block.
 */

$prefix = "towndonatesecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="giving_local_online <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $towndonatesecond_item_title = get_field('towndonatesecond_item_title');
		        	if($towndonatesecond_item_title): ?>
            <div class="title_block">
                <h2><?= $towndonatesecond_item_title ?></h2>
            </div>
            <? endif; ?>
            <? if(have_rows('towndonatesecond_items')): ?>
            <div class="inner_block">
                <? while(have_rows('towndonatesecond_items')): the_row(); ?>
                <?  $text = get_sub_field('text');
                    $title = get_sub_field('title');
                    $icon = get_sub_field('icon');
                    $yellow = get_sub_field('yellow');
                    if($title): 
                ?>
                <div class="col">
                    <div class="title_inner">
                        <img src="<?= $icon ?>" alt="">
                        <h3><?= $title ?></h3>
                    </div>
                    <div class="text_inner">
                        <?= $text ?>
                    </div>
                    <?php if($yellow): ?>
                    <p class="yellow"><?= $yellow ?></p>
                    <? endif; ?>
                </div>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-towndonatesecond', get_template_directory_uri() . '/template-parts/blocks/towndonatesecond/towndonatesecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-towndonatesecond', get_template_directory_uri() . '/template-parts/blocks/towndonatesecond/towndonatesecond.js', array(), '1.0', true );
?>
<? endif; ?>