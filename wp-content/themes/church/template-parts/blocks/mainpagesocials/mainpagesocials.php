<?php
/**
 * Block Name: mainpagesocials
 *
 * This is the template that displays the mainpagesocials block.
 */

$prefix = "mainpagesocials";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="socials section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="text_block">
                <? $mainpagesocials_item_editor = get_field('mainpagesocials_item_editor');
		        	if($mainpagesocials_item_editor): ?>
                <?= $mainpagesocials_item_editor ?>
                <? endif; ?>
            </div>
            <? if(have_rows('mainpagesocials_items')): ?>
            <div class="socials_block">
                <? while(have_rows('mainpagesocials_items')): the_row(); ?>
                <? $mainpagesocials_items_link = get_sub_field('link');
                    $i++;
                    $image = get_sub_field('img');
                    $hover = get_sub_field('hover');
						        	if($mainpagesocials_items_link): 
                ?>

                <a href="<?= $mainpagesocials_items_link['url'] ?>"
                    target="<?= $mainpagesocials_items_link['target'] ? $mainpagesocials_items_link['target'] : "_self" ?>"
                    style="">
                    <style type="text/css">
                    .preview-page<?php echo $i;

                    ?> {
                        background-image: url('<?= $image ?>');
                    }

                    .preview-page<?php echo $i;

                    ?>:hover {
                        background-image: url('<?= $hover ?>');
                    }
                    </style>
                    <div class="preview-page preview-page<?php echo $i; ?>">

                    </div>
                </a>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
    </div>

</section>
<?
	// wp_enqueue_style( 'church-mainpagevision', get_template_directory_uri() . '/template-parts/blocks/mainpagevision/mainpagevision.css', array(), '1.0' );
	// wp_enqueue_script( 'church-mainpagevision', get_template_directory_uri() . '/template-parts/blocks/mainpagevision/mainpagevision.js', array(), '1.0', true );
?>
<? endif; ?>