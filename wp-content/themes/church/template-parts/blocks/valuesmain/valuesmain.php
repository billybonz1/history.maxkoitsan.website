<?php
/**
 * Block Name: valuesmain 
 *
 * This is the template that displays the valuesmain  block.
 */

$prefix = "valuesmain";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="ourvalues section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $valuesmain_item_title = get_field('valuesmain_col_title');
		        	if($valuesmain_item_title): ?>
            <div class="title_block">
                <h1><?= $valuesmain_item_title ?></h1>
            </div>
            <? endif; ?>
            <div class="content_block">
                <div class="col">
                    <? $valuesmaincol = get_field('valuesmain_col_editor');
		        	if($valuesmaincol): ?>
                    <?= $valuesmaincol ?>
                    <? endif; ?>
                </div>
                <div class="col">
                    <? $valuesmaincol2 = get_field('valuesmain2_col_editor');
		        	if($valuesmaincol2): ?>
                    <?= $valuesmaincol2 ?>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-valuesmain', get_template_directory_uri() . '/template-parts/blocks/valuesmain/valuesmain.css', array(), '1.0' );
	// wp_enqueue_script( 'church-valuesmain', get_template_directory_uri() . '/template-parts/blocks/valuesmain/valuesmain.js', array(), '1.0', true );
?>
<? endif; ?>