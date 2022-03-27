<?php
/**
 * Block Name: towndonatecontact 
 *
 * This is the template that displays the towndonatecontact  block.
 */

$prefix = "towndonatecontact";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="giving_local_contacts <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="triangle"></div>
            <? $title = get_field('towndonatecontact_item_title');
               $subtitle = get_field('towndonatecontact_item_subtitle');
		        	if($title): ?>
            <div class="title_block">
                <h2><?= $title ?></h2>
                <p><?= $subtitle ?></p>
            </div>
            <? endif; ?>
            <? if(have_rows('towndonatecontact_items')): ?>
            <div class="social_block">
                <? while(have_rows('towndonatecontact_items')): the_row(); ?>
                <? $towndonatecontact_items_link = get_sub_field('link');
                                $i++;
                                $image = get_sub_field('img');
                                $hover = get_sub_field('hover');
                                                if($towndonatecontact_items_link): 
                            ?>
                <a href="<?= $towndonatecontact_items_link['url'] ?>"
                    target="<?= $towndonatecontact_items_link['target'] ? $towndonatecontact_items_link['target'] : "_self" ?>">
                    <style type="text/css">
                    .preview-img<?php echo $i;

                    ?> {
                        background-image: url('<?= $image ?>');
                    }

                    .preview-img<?php echo $i;

                    ?>:hover {
                        background-image: url('<?= $hover ?>');
                    }
                    </style>
                    <div class="preview-img preview-img<?php echo $i; ?>">

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
	// wp_enqueue_style( 'church-towndonatecontact', get_template_directory_uri() . '/template-parts/blocks/towndonatecontact/towndonatecontact.css', array(), '1.0' );
	// wp_enqueue_script( 'church-towndonatecontact', get_template_directory_uri() . '/template-parts/blocks/towndonatecontact/towndonatecontact.js', array(), '1.0', true );
?>
<? endif; ?>