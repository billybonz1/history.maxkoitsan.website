<?php
/**
 * Block Name: townmainsix 
 *
 * This is the template that displays the townmainsix block.
 */

$prefix = "townmainsix";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="at_first_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="col">
                <? $townmainsix_item_title = get_field('townmainsix_item_title');
		        	if($townmainsix_item_title): ?>
                <div class="title_block">
                    <h2><?= $townmainsix_item_title ?></h2>
                </div>
                <? endif; ?>
                <? $townmainsix_item_editor = get_field('townmainsix_item_editor');
		        	if($townmainsix_item_editor): ?>
                <?= $townmainsix_item_editor ?>
                <? endif; ?>
            </div>
            <div class="col">
                <? $townmainsix_color_editor = get_field('townmainsix_color_editor');
		        	if($townmainsix_color_editor): ?>
                <div class="color_block">
                    <?= $townmainsix_color_editor ?>
                    <? $townmainsix_color_link= get_field('townmainsix_color_link');
		        	if($townmainsix_color_link): ?>
                    <a href="<?= $townmainsix_color_link['url'] ?>" class="btn"
                        target="<?= $townmainsix_color_link['target'] ? $townmainsix_color_link['target'] : "_self" ?>"><?= $townmainsix_color_link['title'] ?></a>
                    <? endif; ?>
                </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townmainsix', get_template_directory_uri() . '/template-parts/blocks/townmainsix/townmainsix.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townmainsix', get_template_directory_uri() . '/template-parts/blocks/townmainsix/townmainsix.js', array(), '1.0', true );
?>
<? endif; ?>