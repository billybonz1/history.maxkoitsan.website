<?php
/**
 * Block Name: towncontacthelp 
 *
 * This is the template that displays the towncontacthelp  block.
 */

$prefix = "towncontacthelp";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="contact_local_help <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="left_col">
                <div class="img_block">
                    <img src="<?= get_template_directory_uri() ?>/img/wroclaw/contact/help_img.svg" alt="">
                </div>
                <? $title = get_field('towncontacthelp_item_title');
                $subtitle = get_field('towncontacthelp_item_subtitle');
                if($title): ?>
                <h2><?= $title ?></h2>
                <p><?= $subtitle ?></p>
                <? endif; ?>
            </div>
            <div class="right_col">
                <? $towncontacthelp_item_phone = get_field('towncontacthelp_item_phone');
                    if($towncontacthelp_item_phone): ?>
                <div class="phone_block">
                    <img src="<?= get_template_directory_uri() ?>/img/wroclaw/contact/phone_icon.svg" alt="">
                    <a
                        href="<?= get_href_phone($towncontacthelp_item_phone); ?>"><?= $towncontacthelp_item_phone; ?></a>
                </div>
                <? endif; ?>
                <? $towncontacthelp_item_mail = get_field('towncontacthelp_item_mail');
                    if($towncontacthelp_item_mail): ?>
                <div class="email_block">
                    <img src="<?= get_template_directory_uri() ?>/img/wroclaw/contact/email_icon.svg" alt="">
                    <a href="<?= get_href_email($towncontacthelp_item_mail); ?>"><?= $towncontacthelp_item_mail; ?></a>
                </div>
                <? endif; ?>
                <? if(have_rows('towncontacthelp_items')): ?>
                <div class="social_block">
                    <p>Напишите нам:</p>
                    <div>
                        <? while(have_rows('towncontacthelp_items')): the_row(); ?>
                        <? $towncontacthelp_items_link = get_sub_field('link');
                        $i++;
                        $image = get_sub_field('img');
                        $hover = get_sub_field('hover');
                            if($towncontacthelp_items_link): 
                    ?>
                        <a href="<?= $towncontacthelp_items_link['url'] ?>"
                            target="<?= $towncontacthelp_items_link['target'] ? $towncontacthelp_items_link['target'] : "_self" ?>">
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
                </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-towncontacthelp', get_template_directory_uri() . '/template-parts/blocks/towncontacthelp/towncontacthelp.css', array(), '1.0' );
	// wp_enqueue_script( 'church-towncontacthelp', get_template_directory_uri() . '/template-parts/blocks/towncontacthelp/towncontacthelp.js', array(), '1.0', true );
?>
<? endif; ?>