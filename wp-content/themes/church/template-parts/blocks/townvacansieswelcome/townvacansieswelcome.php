<?php
/**
 * Block Name: townvacansieswelcome 
 *
 * This is the template that displays the townvacansieswelcome  block.
 */

$prefix = "townvacansieswelcome";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="vacancies_local_first <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townvacansieswelcome_item_title');
		        	if($title): ?>
            <div class="title_block">
                <h1><?= $title ?></h1>
            </div>
            <? endif; ?>
            <? $big = get_field('townvacansieswelcome_item_big');
               $small = get_field('townvacansieswelcome_item_small');
		        if($big): ?>
            <div class="text_block">
                <p class="big">
                    <?= $big ?>
                </p>
                <p>
                    <?= $small ?>
                </p>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townvacansieswelcome', get_template_directory_uri() . '/template-parts/blocks/townvacansieswelcome/townvacansieswelcome.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townvacansieswelcome', get_template_directory_uri() . '/template-parts/blocks/townvacansieswelcome/townvacansieswelcome.js', array(), '1.0', true );
?>
<? endif; ?>