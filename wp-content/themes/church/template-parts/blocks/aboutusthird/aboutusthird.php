<?php
/**
 * Block Name: aboutusthird
 *
 * This is the template that displays the aboutusthird block.
 */

$prefix = "aboutusthird";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="history section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $aboutusthird_item_title = get_field('aboutusthird_item_title');
		        	if($aboutusthird_item_title): ?>
            <div class="title_block">
                <h2><?= $aboutusthird_item_title ?></h2>
            </div>
            <? endif; ?>
            <? if(have_rows('aboutusthird_items')): ?>
            <div class="content_block">
                <? while(have_rows('aboutusthird_items')): the_row(); ?>
                <div class="inner_block first">
                    <div class="top_block">
                        <div class="img_block_main">
                            <div class="img_block">
                                <?php 
                                $image = get_sub_field('image');
                                if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <? $history_item_title = get_sub_field('history_item_title');
						        	if($history_item_title): ?>
                            <p class="title"><?= $history_item_title ?></p>
                            <?php endif; ?>
                        </div>
                        <? $short_text = get_sub_field('short_text');
						        	if($short_text): ?>
                        <div class="text_block">
                            <?= $short_text ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <? $main_text = get_sub_field('main_text');
						        	if($main_text): ?>
                    <div class="main_text hideContent">
                        <?= $main_text ?>
                    </div>
                    <?php endif; ?>
                    <div class="show-more">
                        <button class="more">Читать больше</button>
                    </div>
                </div>
                <? endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-aboutusthird', get_template_directory_uri() . '/template-parts/blocks/aboutusthird/aboutusthird.css', array(), '1.0' );
	// wp_enqueue_script( 'church-aboutusthird', get_template_directory_uri() . '/template-parts/blocks/aboutusthird/aboutusthird.js', array(), '1.0', true );
?>
<? endif; ?>