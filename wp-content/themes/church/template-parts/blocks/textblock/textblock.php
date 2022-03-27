<?php
/**
 * Block Name: textblock
 *
 * This is the template that displays the textblock block.
 */

$prefix = "textblock";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="text_page_section section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <? include(get_theme_file_path("/template-parts/blocks/block-header.php")); ?>
        <div class="main_block">
            <div class="content">
                <? $text = get_field('textblock_item_editor');
		        	if($text): ?>
                <?= $text ?>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-textblock', get_template_directory_uri() . '/template-parts/blocks/textblock/textblock.css', array(), '1.0' );
	// wp_enqueue_script( 'church-textblock', get_template_directory_uri() . '/template-parts/blocks/textblock/textblock.js', array(), '1.0', true );
?>
<? endif; ?>