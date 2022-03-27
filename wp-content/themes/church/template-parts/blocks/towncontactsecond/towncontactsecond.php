<?php
/**
 * Block Name: towncontactsecond
 *
 * This is the template that displays the towncontactsecond block.
 */

$prefix = "towncontactsecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="contact_local_second <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <div class="inner_block">
                <div class="col adres">
                    <div class="img">
                        <img src="<?= get_template_directory_uri() ?>/img/contact/map_icon.svg" alt="">
                    </div>
                    <div class="content">
                        <p class="subtitle">Адрес</p>
                        <? $contact_item_link = get_field('towncontactsecond_item_link');
						        	if($contact_item_link): ?>
                        <a href="<?= $contact_item_link['url'] ?>"
                            target="<?= $contact_item_link['target'] ? $contact_item_link['target'] : "_self" ?>"><?= $contact_item_link['title'] ?></a>
                        <? endif; ?>
                    </div>
                </div>
                <div class="col email">
                    <div class="img">
                        <img src="<?= get_template_directory_uri() ?>/img/contact/email_icon.svg" alt="">
                    </div>
                    <div class="content">
                        <p class="subtitle">Почта</p>
                        <? $towncontactsecond_item_email = get_field('towncontactsecond_item_email');
                            if($towncontactsecond_item_email): ?>
                        <a href="<?= get_href_email($towncontactsecond_item_email); ?>">
                            <?= $towncontactsecond_item_email; ?>
                        </a>
                        <? endif; ?>
                    </div>
                </div>
                <div class="col tel">
                    <div class="img">
                        <img src="<?= get_template_directory_uri() ?>/img/contact/phone_icon.svg" alt="">
                    </div>
                    <div class="content">
                        <p class="subtitle">Телефон</p>
                        <? $towncontactsecond_item_phone = get_field('towncontactsecond_item_phone');
                            if($towncontactsecond_item_phone): ?>
                        <a href="<?= get_href_phone($towncontactsecond_item_phone); ?>">
                            <?= $towncontactsecond_item_phone; ?>
                        </a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <? $regon = get_field('regon');
               $nip = get_field('nip');
						        	if($regon): ?>
            <div class="bottom_block">
                <p>REGON: <?= $regon; ?></p>
                <p>NIP: <?= $nip ; ?></p>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-towncontactsecond', get_template_directory_uri() . '/template-parts/blocks/towncontactsecond/towncontactsecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-towncontactsecond', get_template_directory_uri() . '/template-parts/blocks/towncontactsecond/towncontactsecond.js', array(), '1.0', true );
?>
<? endif; ?>