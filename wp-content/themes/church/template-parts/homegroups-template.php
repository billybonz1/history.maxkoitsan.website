<div id="group-<?php the_ID(); ?>" class="group_inner">
    <div class="img_block" style="background-image: url('<?php the_field('photo_homegroups', get_the_ID()); ?>');">
    </div>
    <div class="author_block">
        <h3><?php the_title(); ?></h3>
        <div class="time">
            <img src="<?= get_template_directory_uri() ?>/img/wroclaw/groups/time_icon.svg" alt="">
            <span><?php the_field('homegroups_age', get_the_ID()); ?> лет</span>
        </div>
    </div>
    <div class="week_block">
        <span><?php the_field('date_homegroups', get_the_ID()); ?></span>
        <p><?php the_field('time_text_homegroups', get_the_ID()); ?></p>
    </div>
    <div class="contact_block">
        <? $phone_homegroups = get_field('phone_homegroups', get_the_ID());
            if($phone_homegroups): ?>
        <div class="phone">
            <span>Связаться с лидером</span>
            <a href="<?= get_href_phone($phone_homegroups); ?>"><?= $phone_homegroups; ?></a>
        </div>
        <? endif; ?>
        <div class="social_block">
            <? $link = get_field('homegroups_tel', get_the_ID());
                if($link): ?>
            <a href="<?= $link['url'] ?>" target="<?= $link['target'] ? $link['target'] : "_self" ?>">
                <img src="<?= get_template_directory_uri() ?>/img/wroclaw/groups/tel_icon.svg" alt="">
            </a>
            <? endif; ?>
            <? $link = get_field('homegroups_viber', get_the_ID());
                if($link): ?>
            <a href="<?= $link['url'] ?>" target="<?= $link['target'] ? $link['target'] : "_self" ?>">
                <img src="<?= get_template_directory_uri() ?>/img/wroclaw/groups/phone_icon.svg" alt="">
            </a>
            <? endif; ?>
            <? $link = get_field('homegroups_whatsapp', get_the_ID());
                if($link): ?>
            <a href="<?= $link['url'] ?>" target="<?= $link['target'] ? $link['target'] : "_self" ?>">
                <img src="<?= get_template_directory_uri() ?>/img/wroclaw/groups/whatsapp_icon.svg" alt="">
            </a>
            <? endif; ?>
        </div>
    </div>
    <div class="adres">
        <span><?php the_field('adres_homegroups', get_the_ID()); ?></span>
    </div>
</div>