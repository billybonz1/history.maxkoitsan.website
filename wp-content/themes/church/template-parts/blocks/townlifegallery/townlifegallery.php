<?php
/**
 * Block Name: townlifegallery 
 *
 * This is the template that displays the townlifegallery  block.
 */

$prefix = "townlifegallery";
$target = "";

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="church_life <?= esc_attr($class) ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $townlifegallery_item_title = get_field('townlifegallery_item_title');
		        if($townlifegallery_item_title): ?>
            <div class="title_block">
                <h2><?= $townlifegallery_item_title ?></h2>
            </div>
            <? endif; ?>
            <? if(have_rows('townlifegallery_items')): ?>
            <div class="church_inner">
                <? while(have_rows('townlifegallery_items')): the_row(); 
                $parent_link = get_sub_field('link');
                $style_btn = get_sub_field('style_btn');   
                $i++; ?>
                <div class="wrap swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Loop over sub repeater rows. -->
                        <? if( have_rows('townlifegallery_child') ):
                            while( have_rows('townlifegallery_child') ) : the_row(); 
                            // Get sub value.
                            
                            $child_img = get_sub_field('child_img');
                        ?>
                        <div class="swiper-slide">
                            <div class="col">
                                <a href="<?= $child_img ?>" data-fancybox="gallery-<?php echo $i; ?>">
                                    <img src="<?= $child_img ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <? endwhile;
                        endif; ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <? if($parent_link): ?>

                    <div class="link_block <?php if( $style_btn ): ?><?php echo 'long'; ?><?php endif; ?>">
                        <a href="<?= $parent_link['url'] ?>" class="link"
                            target="<?= $parent_link['target'] ? $parent_link['target'] : "_self" ?>"><?= $parent_link['title'] ?></a>
                    </div>
                    <?
                    endif; ?>
                </div>
                <? endwhile; ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
    wp_enqueue_style( 'church-swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), '1.0' );
    wp_enqueue_style( 'church-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), '1.0' );
    // wp_enqueue_style( 'church-townlifegallery', get_template_directory_uri() . '/template-parts/blocks/townlifegallery/townlifegallery.css', array(), '1.0' );
    wp_enqueue_script( 'church-swiper-bundle', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), '1.0', true );
    wp_enqueue_script( 'church-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), '1.0', true );
    wp_enqueue_script( 'church-townlifegallery', get_template_directory_uri() . '/template-parts/blocks/townlifegallery/townlifegallery.js', array(), '1.0', true );

?>
<? endif; ?>