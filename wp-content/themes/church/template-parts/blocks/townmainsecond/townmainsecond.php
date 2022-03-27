<?php
/**
 * Block Name: townmainsecond 
 *
 * This is the template that displays the townmainsecond  block.
 */

$prefix = "townmainsecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="service_local section <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="text_block">
                <? $townmainsecond_item_title = get_field('townmainsecond_item_title');
		        	if($townmainsecond_item_title): ?>
                <div class="title_block">
                    <h2><?= $townmainsecond_item_title ?></h2>
                </div>
                <? endif; ?>
                <? $townmainsecond_item_subtitle = get_field('townmainsecond_item_subtitle');
		        	if($townmainsecond_item_subtitle): ?>
                <p class="subtitle"><?= $townmainsecond_item_subtitle ?></p>
                <? endif; ?>
                <div class="date_block">
                    <? $townmainsecond_item_time = get_field('townmainsecond_item_time');
		        	if($townmainsecond_item_time): ?>
                    <div class="time">
                        <div class="time_icon">
                            <img src="<?= get_template_directory_uri() ?>/img/wroclaw/time_icon.svg" alt="">
                        </div>
                        <?= $townmainsecond_item_time ?>
                    </div>
                    <? endif; ?>
                    <? $townmainsecond_item_adres = get_field('townmainsecond_item_adres');
		        	if($townmainsecond_item_adres): ?>
                    <div class="adres">
                        <div class="adres_icon">
                            <img src="<?= get_template_directory_uri() ?>/img/wroclaw/adres_icon.svg" alt="">
                        </div>
                        <?= $townmainsecond_item_adres ?>
                    </div>
                    <? endif; ?>
                </div>
                <div class="social_block">
                    <p><?= pl__('Нужна помощь, пиши сюда:') ?></p>
                    <? if(have_rows('townmainsecond_items')): ?>
                    <div>
                        <? while(have_rows('townmainsecond_items')): the_row(); ?>
                        <? $townmainsecond_items_link = get_sub_field('link');
                                $i++;
                                $image = get_sub_field('img');
                                $hover = get_sub_field('hover');
                                                if($townmainsecond_items_link): 
                            ?>
                        <a href="<?= $townmainsecond_items_link['url'] ?>"
                            target="<?= $townmainsecond_items_link['target'] ? $townmainsecond_items_link['target'] : "_self" ?>">
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
            <? $img_1 = get_field('second_group_img_1');
                $img_2 = get_field('second_group_img_2');
		        	if($img_1): ?>
            <div class="img_block">
                <img src="<?= $img_1 ?>" alt="" class="first_img">
                <img src="<?= $img_2 ?>" alt="" class="second_img">
                <div class="stripe_block">
                    <img src="<?= get_template_directory_uri() ?>/img/wroclaw/stripe_yellow.svg" alt="">
                </div>
            </div>
        </div>
        <? endif; ?>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townmainsecond', get_template_directory_uri() . '/template-parts/blocks/townmainsecond/townmainsecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townmainsecond', get_template_directory_uri() . '/template-parts/blocks/townmainsecond/townmainsecond.js', array(), '1.0', true );
?>
<? endif; ?>