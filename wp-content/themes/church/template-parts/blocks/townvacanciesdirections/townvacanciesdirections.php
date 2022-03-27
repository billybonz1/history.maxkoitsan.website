<?php
/**
 * Block Name: townvacanciesdirections  
 *
 * This is the template that displays the townvacanciesdirections   block.
 */

$prefix = "townvacanciesdirections";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="service_local_second  vacancies_local <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townvacanciesdirections_item_title');
		        	if($title): ?>
            <div class="title_block">
                <h2><?= $title ?></h2>
            </div>
            <? endif; ?>
            <? if(have_rows('townvacanciesdirections_items')): ?>
            <div class="directions_main">
                <div class="section-bg"></div>
                <? while(have_rows('townvacanciesdirections_items')): the_row(); ?>
                <? $title = get_sub_field('title');
                    $editor = get_sub_field('editor');
                    if($title): 
                ?>
                <div class="direction">
                    <div class="title_block_inner">
                        <h3><?= $title ?></h3>
                    </div>
                    <div class="inner_block">
                        <? if(have_rows('inner_items')): ?>
                        <ul>
                            <? while(have_rows('inner_items')): the_row(); ?>
                            <? $text = get_sub_field('text');
                                $text_hover = get_sub_field('text_hover');
                                if($text): 
                            ?>
                            <li>
                                <?= $text ?>
                                <? if($text_hover): ?>
                                <span class="tooltiptext"><?= $text_hover ?></span>
                                <? endif; ?>
                            </li>
                            <? endif; ?>
                            <? endwhile; ?>
                        </ul>
                        <? endif; ?>
                    </div>
                </div>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townvacanciesdirections', get_template_directory_uri() . '/template-parts/blocks/townvacanciesdirections/townvacanciesdirections.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townvacanciesdirections', get_template_directory_uri() . '/template-parts/blocks/townvacanciesdirections/townvacanciesdirections.js', array(), '1.0', true );
?>
<? endif; ?>