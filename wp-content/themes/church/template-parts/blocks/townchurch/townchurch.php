<?php
/**
 * Block Name: townchurch 
 *
 * This is the template that displays the townchurch  block.
 */

$prefix = "townchurch";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="church_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bglineral.php")); ?>
    <div class="container">
        <div class="main_block">
            <? if(have_rows('townchurch_items')): ?>
            <div class="services">
                <? while(have_rows('townchurch_items')): the_row(); ?>
                <?  $link = get_sub_field('link');
                    $image = get_sub_field('img');
                    $title = get_sub_field('title');
                    if($link): 
                ?>
                <div class="service_inner"
                    style="background: linear-gradient(360deg, #FFBB00 0%, rgba(255, 187, 0, 0) 70.21%), url('<?= $image ?>');">
                    <p class="title_block"><?= $title ?></p>
                    <a href="<?= $link['url'] ?>" target="<?= $link['target'] ? $link['target'] : "_self" ?>"></a>
                </div>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townchurch', get_template_directory_uri() . '/template-parts/blocks/townchurch/townchurch.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townchurch', get_template_directory_uri() . '/template-parts/blocks/townchurch/townchurch.js', array(), '1.0', true );
?>
<? endif; ?>