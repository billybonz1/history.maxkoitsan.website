<?php
/**
 * Block Name: townvisitthird 
 *
 * This is the template that displays the townvisitthird  block.
 */

$prefix = "townvisitthird";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="visit_map_second <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <? if(have_rows('townvisitthird_items')): ?>
        <div class="main_block">
            <? while(have_rows('townvisitthird_items')): the_row(); ?>
            <? $title = get_sub_field('townvisitthird_item_title');
                $editor = get_sub_field('townvisitthird_item_editor');
                if($title): 
                ?>
            <div class="col">
                <h3><?= $title ?></h3>
                <p><?= $editor ?></p>
            </div>
            <? endif; ?>
            <? endwhile; ?>
        </div>
        <? endif; ?>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townvisitthird', get_template_directory_uri() . '/template-parts/blocks/townvisitthird/townvisitthird.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townvisitthird', get_template_directory_uri() . '/template-parts/blocks/townvisitthird/townvisitthird.js', array(), '1.0', true );
?>
<? endif; ?>