<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package church
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="robots" content="noindex, nofollow" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="site">
        <header>
            <div class="desktop_header">
                <div class="top_header">
                    <div class="container">
                        <div class="header_block">
                            <div class="main_menu">
                                <nav>
                                    <?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										)
									);
									?>
                                </nav>
                            </div>
                            <div class="right_block">
                                <? if(function_exists('pll_the_languages')): ?>
                                <nav class="lang_block">
                                    <ul>
                                        <? 
                                                pll_the_languages(array()); 
                                            ?>
                                    </ul>
                                </nav>
                                <? endif; ?>
                                <div class="location_menu">
                                    <a class="location_button" href="#"><?= pl__('Выбери локацию') ?></a>
                                </div>
                                <div class="btn_block">
                                    <div class="burger_button">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="bottom_header">
                    <div class="container">
                        <div class="header_block">
                            <div class="logo_block">
                                <?php
								    the_custom_logo();
								?>
                            </div>
                            <div class="bottom_menu">
                                <nav>
                                    <?php
											wp_nav_menu(
												array(
													'theme_location' => 'menu-2',
													'menu_id'        => 'main-menu',
												)
											);
										?>
                                </nav>
                            </div>
                            <div class="right_block">
                                <div class="location_menu">
                                    <a class="location_button" href="#">
                                        <img src="<?= get_template_directory_uri() ?>/img/location_icon_black.svg"
                                            alt="">
                                    </a>
                                </div>
                                <? if(function_exists('pll_the_languages')): ?>
                                <nav class="lang_block">
                                    <ul>
                                        <? 
                                                pll_the_languages(array()); 
                                            ?>
                                    </ul>
                                </nav>
                                <? endif; ?>
                                <div class="btn_block">
                                    <div class="burger_button">
                                        <div class="line"></div>
                                        <div class="line"></div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu_box-panel" class="menu_box-panel custom-scrollbar">
                    <div class="menu_box-inner">
                        <div class="container">
                            <div class="white_bg">
                                <div class="menu_box-header">
                                    <div class="menu_boxlogo">
                                        <? $logo_header_mob = get_field('logo_header_mob', 'option');
					                        if($logo_header_mob): ?>
                                        <img src="<?= $logo_header_mob ?>" alt="">
                                        <? endif; ?>
                                    </div>
                                    <div id="menu_box-close-btn" class="menu_box-close-btn">
                                        <button>
                                            <span></span>
                                            <span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="menu_box_main">
                                    <div class="left_block">
                                        <nav>
                                            <?php
											wp_nav_menu(
												array(
													'theme_location' => 'menu-1',
													'menu_id'        => 'primary-menu',
												)
											);
											?>
                                        </nav>
                                    </div>
                                    <div class="right_block">
                                        <nav>
                                            <?php
											wp_nav_menu(
												array(
													'theme_location' => 'menu-3',
													'menu_id'        => 'main-mobile-menu',
												)
											);
										?>
                                        </nav>
                                    </div>
                                </div>
                                <div class="separator">
                                    <div class="separator_loc">
                                        <a class="location_button" href="#"><?= pl__('Найти церковь') ?></a>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="menu_box_bottom">
                                    <span><?= pl__('Следи за нами') ?></span>
                                    <? if(have_rows('header_messengers_items', 'options')): ?>
                                    <div class="social_block">
                                        <? while(have_rows('header_messengers_items', 'options')): the_row(); ?>
                                        <? $header_messengers_items_link = get_sub_field('link');
						        	if($header_messengers_items_link): ?>
                                        <a href="<?= $header_messengers_items_link['url'] ?>"
                                            target="<?= $header_messengers_items_link['target'] ? $header_messengers_items_link['target'] : "_self" ?>">
                                            <? $header_messengers_items_img = get_sub_field('img');
								        	if($header_messengers_items_img): ?>
                                            <img src="<?= $header_messengers_items_img ?>" alt="">
                                            <? endif; ?>
                                        </a>
                                        <? endif; ?>
                                        <? endwhile; ?>
                                    </div>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="side-panel" class="side-panel custom-scrollbar">
                    <div class="side-inner">
                        <div class="white_bg">
                            <div class="side-header">
                                <div class="sidelogo">
                                    <? $logo_header_mob = get_field('logo_header_mob', 'option');
					                        if($logo_header_mob): ?>
                                    <img src="<?= $logo_header_mob ?>" alt="">
                                    <? endif; ?>
                                </div>
                                <div id="side-close-btn" class="side-close-btn">
                                    <button>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="side_container">
                                <div class="header_text">
                                    <p><?= pl__('Найди ближайшую церковь') ?></p>
                                </div>
                                <div class="separator">
                                    <div class="line"></div>
                                </div>
                                <div class="location_menu_block">
                                    <div class="inner_menu">
                                        <nav class="side-nav">
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
                    </div>
                </div>
            </div>
        </header>
        <main class="main-page">