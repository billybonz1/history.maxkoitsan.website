<?php
/**
 * Block Name: townvisitcontact 
 *
 * This is the template that displays the townvisitcontact  block.
 */

$prefix = "townvisitcontact";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="visit_local_contact <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townvisitcontact_item_title');
               $editor = get_field('townvisitcontact_item_editor');
		        	if($title): ?>
            <div class="col">
                <h2><?= $title ?></h2>
                <?= $editor ?>
            </div>
            <? endif; ?>
            <div class="col">
                <? $title_col = get_field('townvisitcontact_item_col');
		        	if($title_col): ?>
                <?= $title_col ?>
                <? endif; ?>
                <? if(have_rows('townvisitcontact_items')): ?>
                <div class="social_block">
                    <? while(have_rows('townvisitcontact_items')): the_row(); ?>
                    <? $townvisitcontact_items_link = get_sub_field('link');
                        $i++;
                        $image = get_sub_field('img');
                        $hover = get_sub_field('hover');
                            if($townvisitcontact_items_link): 
                    ?>
                    <a href="<?= $townvisitcontact_items_link['url'] ?>"
                        target="<?= $townvisitcontact_items_link['target'] ? $townvisitcontact_items_link['target'] : "_self" ?>">
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
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townvisitcontact', get_template_directory_uri() . '/template-parts/blocks/townvisitcontact/townvisitcontact.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townvisitcontact', get_template_directory_uri() . '/template-parts/blocks/townvisitcontact/townvisitcontact.js', array(), '1.0', true );
?>
<? endif; ?>