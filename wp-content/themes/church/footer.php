<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package church
 */

?>

<footer>
    <div class="container">
        <div class="main_block">
            <div class="logo_block">
                <div class="logo desc">
                    <? $footer_logo = get_field('logo_footer', 'option');
					if($footer_logo): ?>
                    <img src="<?= $footer_logo ?>" alt="">
                    <? endif; ?>
                </div>
                <div class="logo mob">
                    <? $logo_footer_mob = get_field('logo_footer_mob', 'option');
					if($logo_footer_mob): ?>
                    <img src="<?= $logo_footer_mob ?>" alt="">
                    <? endif; ?>
                </div>
                <div class="logo_menu">
                    <nav>
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-1',
                                    'menu_id'        => 'footer-menu',
                                )
                            );
                        ?>
                    </nav>
                </div>
            </div>
            <div class="footer_menu_block">
                <div class="inner_block">
                    <h3><?= pl__('Церковь') ?></h3>
                    <nav>
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-2',
                                    'menu_id'        => 'church-menu',
                                )
                            );
                        ?>
                    </nav>
                </div>
                <div class="inner_block">
                    <h3><?= pl__('Действуй') ?></h3>
                    <nav>
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-3',
                                    'menu_id'        => 'act-menu',
                                )
                            );
                        ?>
                    </nav>
                </div>
                <div class="inner_block">
                    <h3><?= pl__('Служения') ?></h3>
                    <nav>
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-4',
                                    'menu_id'        => 'service-menu',
                                )
                            );
                        ?>
                    </nav>
                </div>
                <div class="inner_block">
                    <h3><?= pl__('Локации') ?></h3>
                    <nav>
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'location',
                                    'menu_id'        => 'location-menu',
                                )
                            );
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="center_block">
        <div class="container">
            <? if(have_rows('footer_messengers_items', 'options')): ?>
            <div class="social_block">
                <? while(have_rows('footer_messengers_items', 'options')): the_row(); ?>
                <? $footer_messengers_items_link = get_sub_field('link');
						        	if($footer_messengers_items_link): ?>
                <a href="<?= $footer_messengers_items_link['url'] ?>"
                    target="<?= $footer_messengers_items_link['target'] ? $footer_messengers_items_link['target'] : "_self" ?>">
                    <? $footer_messengers_items_img = get_sub_field('img');
								        	if($footer_messengers_items_img): ?>
                    <img src="<?= $footer_messengers_items_img ?>" alt="">
                    <? endif; ?>
                </a>
                <? endif; ?>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
        <div class="line"></div>
    </div>

    <div class="container">
        <div class="logo_menu_mob">
            <nav>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-1',
                            'menu_id'        => 'footer-menu',
                        )
                    );
                ?>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="bottom_block">
            <? $copyright_text = get_field('copyright', 'option');
					if($copyright_text): ?>
            <div class="copyright">
                <p><?= $copyright_text ?></p>
            </div>
            <? endif; ?>
            <div class="right_block">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footet-bottom',
                            'menu_id'        => 'footet-bottom',
                        )
                    );
                ?>
            </div>
        </div>
    </div>

</footer>
</div><!-- #page -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php wp_footer(); ?>

</body>
</html>