<?php
/**
 * Block Name: contactmainsecond
 *
 * This is the template that displays the contactmainsecond block.
 */

$prefix = "contactmainsecond";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="contact_second section <?= esc_attr($class) ?>">
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
                        <? $contact_item_link = get_field('contactmainsecond_item_link');
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
                        <? $contactmainsecond_item_email = get_field('contactmainsecond_item_email');
                            if($contactmainsecond_item_email): ?>
                        <a href="<?= get_href_email($contactmainsecond_item_email); ?>">
                            <?= $contactmainsecond_item_email; ?>
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
                        <? $contactmainsecond_item_phone = get_field('contactmainsecond_item_phone');
                            if($contactmainsecond_item_phone): ?>
                        <a href="<?= get_href_phone($contactmainsecond_item_phone); ?>">
                            <?= $contactmainsecond_item_phone; ?>
                        </a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?
	// wp_enqueue_style( 'church-contactmainsecond', get_template_directory_uri() . '/template-parts/blocks/contactmainsecond/contactmainsecond.css', array(), '1.0' );
	// wp_enqueue_script( 'church-contactmainsecond', get_template_directory_uri() . '/template-parts/blocks/contactmainsecond/contactmainsecond.js', array(), '1.0', true );
?>
<? endif; ?>