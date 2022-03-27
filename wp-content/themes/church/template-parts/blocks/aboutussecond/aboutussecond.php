<?php
/**
 * Block Name: aboutussecond
 *
 * This is the template that displays the aboutussecond block.
 */

$prefix = "aboutussecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="pastors section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $aboutussecond_item_title = get_field('aboutussecond_item_title');
		        	if($aboutussecond_item_title): ?>
            <div class="title_block">
                <h2><?= $aboutussecond_item_title ?></h2>
            </div>
            <? endif; ?>
            <div class="content_block">
                <div class="top_block">
                    <div class="img_block">
                        <?php 
                        $image = get_field('pastors_image');
                        if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="text_block">
                        <? $aboutussecond_item_editor = get_field('aboutussecond_item_editor', false);
		        	        if($aboutussecond_item_editor): ?>
                        <div class="h3"><?= $aboutussecond_item_editor ?></div>
                        <? endif; ?>
                        <? $pastors_item_editor = get_field('pastors_item_small');
		        	        if($pastors_item_editor): ?>
                        <?= $pastors_item_editor ?>
                        <? endif; ?>
                    </div>
                </div>
                <div class="main_content hideContent">
                    <? $pastors_item_editor = get_field('pastors_item');
		        	        if($pastors_item_editor): ?>
                    <?= $pastors_item_editor ?>
                    <? endif; ?>
                </div>
                <div class="show-more">
                    <button class="more" id="more_1">Читать больше</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-aboutussecond', get_template_directory_uri() . '/template-parts/blocks/aboutussecond/aboutussecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-aboutussecond', get_template_directory_uri() . '/template-parts/blocks/aboutussecond/aboutussecond.js', array(), '1.0', true );
?>
<? endif; ?>