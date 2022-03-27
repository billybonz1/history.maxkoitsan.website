<?php
/**
 * Block Name: townaboutusthird 
 *
 * This is the template that displays the townaboutusthird  block.
 */

$prefix = "townaboutusthird";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="about_local_pastors section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $townaboutusthird_item_urlimg = get_field('townaboutusthird_item_imgurl');
		        	if($townaboutusthird_item_urlimg): ?>
            <div class="img_block">
                <img src="<?= $townaboutusthird_item_urlimg ?>" alt="">
            </div>
            <? endif; ?>
            <? $pastors = get_field('townaboutusthird_item_pastors');
               $name = get_field('townaboutusthird_item_name');
               $fio = get_field('townaboutusthird_item_fio');
		        	if($pastors): ?>
            <div class="title_block">
                <p><?= $pastors ?></p>
                <h2><?= $name ?><br>
                    <span class="decor"><?= $fio ?></span>
                </h2>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townaboutusthird', get_template_directory_uri() . '/template-parts/blocks/townaboutusthird/townaboutusthird.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townaboutusthird', get_template_directory_uri() . '/template-parts/blocks/townaboutusthird/townaboutusthird.js', array(), '1.0', true );
?>
<? endif; ?>