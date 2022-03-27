<?php
/**
 * Block Name: servicesmainsecond
 *
 * This is the template that displays the servicesmainsecond block.
 */

$prefix = "servicesmainsecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="service_second section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? if(have_rows('servicesmainsecond_items')): ?>
            <div class="services">
                <? while(have_rows('servicesmainsecond_items')): the_row(); ?>
                <? $img = get_sub_field('servicesmainsecond_item_imgurl');
		        	if($img): ?>
                <div class="service_inner"
                    style="background: linear-gradient(360deg, #FFBB00 0%, rgba(255, 187, 0, 0) 70.21%), url('<?= $img ?>');">
                    <? $title = get_sub_field('servicesmainsecond_item_title');
		        	if($title): ?>
                    <p class="title_block"><?= $title ?></p>
                    <? endif; ?>
                </div>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
            <div class="choose_block">
                <div class="text">
                    <? $title = get_field('choose_block_item_title');
		        	if($title): ?>
                    <div class="decor_block">
                        <p class="decor"><?= $title ?></p>
                    </div>
                    <? endif; ?>
                    <? $subtitle = get_field('choose_block_item_subtitle');
		        	if($subtitle): ?>
                    <p><?= $subtitle ?></p>
                    <? endif; ?>
                </div>
                <div class="button">
                    <a href="#" class="btn">
                        <span>Выбрать</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-servicesmainsecond', get_template_directory_uri() . '/template-parts/blocks/servicesmainsecond/servicesmainsecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-servicesmainsecond', get_template_directory_uri() . '/template-parts/blocks/servicesmainsecond/servicesmainsecond.js', array(), '1.0', true );
?>
<? endif; ?>