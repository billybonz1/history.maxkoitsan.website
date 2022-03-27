<?php
/**
 * Block Name: townservicecontact 
 *
 * This is the template that displays the townservicecontact  block.
 */

$prefix = "townservicecontact";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="service_local_contact <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $title = get_field('townservicecontact_item_title');
               $link = get_field('townservicecontact_item_link');
		        	if($title): ?>
            <div class="col">
                <h2><?= $title ?></h2>
                <a href="<?= $link['url'] ?>" class="btn"
                    target="<?= $link['target'] ? $link['target'] : "_self" ?>"><?= $link['title'] ?></a>
            </div>
            <? endif; ?>
            <div class="col">
                <? $title_col = get_field('townservicecontact_item_col');
		        	if($title_col): ?>
                <h2><?= $title_col ?></h2>
                <? endif; ?>
                <? if(have_rows('townservicecontact_items')): ?>
                <div class="social_block">
                    <? while(have_rows('townservicecontact_items')): the_row(); ?>
                    <? $townservicecontact_items_link = get_sub_field('link');
                        $i++;
                        $image = get_sub_field('img');
                        $hover = get_sub_field('hover');
                            if($townservicecontact_items_link): 
                    ?>
                    <a href="<?= $townservicecontact_items_link['url'] ?>"
                        target="<?= $townservicecontact_items_link['target'] ? $townservicecontact_items_link['target'] : "_self" ?>">
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
	// wp_enqueue_style( 'church-townservicecontact', get_template_directory_uri() . '/template-parts/blocks/townservicecontact/townservicecontact.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townservicecontact', get_template_directory_uri() . '/template-parts/blocks/townservicecontact/townservicecontact.js', array(), '1.0', true );
?>
<? endif; ?>