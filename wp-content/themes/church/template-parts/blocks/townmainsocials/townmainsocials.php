<?php
/**
 * Block Name: townmainsocials 
 *
 * This is the template that displays the townmainsocials  block.
 */

$prefix = "townmainsocials";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="socials_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="socials_block_main">
                <? $townmainsocials_item_title = get_field('townmainsocials_item_title');
		        	if($townmainsocials_item_title): ?>
                <div class="title_block">
                    <h2><?= $townmainsocials_item_title ?></h2>
                </div>
                <? endif; ?>
                <? if(have_rows('townmainsocials_items')): ?>
                <div class="socials_block desctop">
                    <? while(have_rows('townmainsocials_items')): the_row(); ?>
                    <? $townmainsocials_items_link = get_sub_field('link');
                                $i++;
                                $image = get_sub_field('img');
                                $hover = get_sub_field('hover');
                                                if($townmainsocials_items_link): 
                            ?>
                    <a href="<?= $townmainsocials_items_link['url'] ?>"
                        target="<?= $townmainsocials_items_link['target'] ? $townmainsocials_items_link['target'] : "_self" ?>">
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
                <? if(have_rows('townmainsocials_mob_items')): ?>
                <div class="socials_block mob">
                    <? while(have_rows('townmainsocials_mob_items')): the_row(); ?>
                    <? $townmainsocials_mob_items_link = get_sub_field('link');
                                $i++;
                                $image = get_sub_field('img');
                                $hover = get_sub_field('hover');
                                                if($townmainsocials_mob_items_link): 
                            ?>
                    <a href="<?= $townmainsocials_mob_items_link['url'] ?>"
                        target="<?= $townmainsocials_mob_items_link['target'] ? $townmainsocials_mob_items_link['target'] : "_self" ?>">
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
            <div class="right_img">
                <img src="<?= get_template_directory_uri() ?>/img/wroclaw/contacts_img.png" alt="" class="desctop">
                <img src="<?= get_template_directory_uri() ?>/img/wroclaw/contacts_img_mob.png" alt="" class="mob">
            </div>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townmainsocials', get_template_directory_uri() . '/template-parts/blocks/townmainsocials/townmainsocials.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townmainsocials', get_template_directory_uri() . '/template-parts/blocks/townmainsocials/townmainsocials.js', array(), '1.0', true );
?>
<? endif; ?>