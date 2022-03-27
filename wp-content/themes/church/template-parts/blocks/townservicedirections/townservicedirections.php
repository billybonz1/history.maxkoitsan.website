<?php
/**
 * Block Name: townservicedirections 
 *
 * This is the template that displays the townservicedirections  block.
 */

$prefix = "townservicedirections";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="service_local_second <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townservicewelcome_item_title');
		        	if($title): ?>
            <div class="title_block">
                <h2><?= $title ?></h2>
            </div>
            <? endif; ?>
            <? if(have_rows('townmainsocials_items')): ?>
            <div class="directions_main">
                <div class="section-bg"></div>
                <? while(have_rows('townmainsocials_items')): the_row(); ?>
                <? $title = get_sub_field('title');
                    $editor = get_sub_field('editor');
                    if($title): 
                ?>
                <div class="direction">
                    <div class="title_block_inner">
                        <h3><?= $title ?></h3>
                    </div>
                    <div class="inner_block">
                        <?= $editor ?>
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
	// wp_enqueue_style( 'church-townservicedirections', get_template_directory_uri() . '/template-parts/blocks/townservicedirections/townservicedirections.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townservicedirections', get_template_directory_uri() . '/template-parts/blocks/townservicedirections/townservicedirections.js', array(), '1.0', true );
?>
<? endif; ?>