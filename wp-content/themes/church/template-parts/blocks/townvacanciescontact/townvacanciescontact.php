<?php
/**
 * Block Name: townvacanciescontact 
 *
 * This is the template that displays the townvacanciescontact  block.
 */

$prefix = "townvacanciescontact";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="vacancy_local_contact <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="col">
                <? $title_col = get_field('townvacanciescontact_item_col');
		        	if($title_col): ?>
                <p><?= $title_col ?></p>
                <? endif; ?>
                <? if(have_rows('townvacanciescontact_items')): ?>
                <div class="social_block">
                    <? while(have_rows('townvacanciescontact_items')): the_row(); ?>
                    <? $townvacanciescontact_items_link = get_sub_field('link');
                        $i++;
                        $image = get_sub_field('img');
                        $hover = get_sub_field('hover');
                            if($townvacanciescontact_items_link): 
                    ?>
                    <a href="<?= $townvacanciescontact_items_link['url'] ?>"
                        target="<?= $townvacanciescontact_items_link['target'] ? $townvacanciescontact_items_link['target'] : "_self" ?>">
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
            <? $title = get_field('townvacanciescontact_item_title');
               $editor = get_field('townvacanciescontact_item_editor');
		        	if($title): ?>
            <div class="col">
                <h2><span class="longdecor"><?= $title ?></span></h2>
                <?= $editor ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townvacanciescontact', get_template_directory_uri() . '/template-parts/blocks/townvacanciescontact/townvacanciescontact.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townvacanciescontact', get_template_directory_uri() . '/template-parts/blocks/townvacanciescontact/townvacanciescontact.js', array(), '1.0', true );
?>
<? endif; ?>