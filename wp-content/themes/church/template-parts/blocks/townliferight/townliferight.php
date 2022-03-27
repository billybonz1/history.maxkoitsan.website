<?php
/**
 * Block Name: townliferight 
 *
 * This is the template that displays the townliferight  block.
 */

$prefix = "townliferight";
$target = "";

$className = '';
if( !empty($block['className']) ) {
    $className .= '' . $block['className'];
}

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="life_local_right <?= esc_attr($class) ?> <?php echo esc_attr($className); ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $img_1 = get_field('townliferight_item_img_1');
               $img_2 = get_field('townliferight_item_img_2');
               $img_3 = get_field('townliferight_item_img_3');
            if(!empty($img_1) || !empty($img_2) || !empty($img_3)): ?>
            <div class="img_block">
                <img src="<?= $img_1 ?>" alt="" class="first_img">
                <img src="<?= $img_2 ?>" alt="" class="second_img">
                <img src="<?= $img_3 ?>" alt="" class="third_img">
            </div>
            <? endif; ?>
            <? $townliferight_item_title = get_field('townliferight_item_title');
               $townliferight_item_editor = get_field('townliferight_item_editor');
               $link = get_field('townliferight_item_link');
		        if($townliferight_item_title): ?>
            <div class="text_block">
                <h2><?= $townliferight_item_title ?></h2>
                <?= $townliferight_item_editor ?>
                <? 	if($link): ?>
                <a href="<?= $link['url'] ?>" class="btn"
                    target="<?= $link['target'] ? $link['target'] : "_self" ?>"><?= $link['title'] ?></a>
                <? endif; ?>
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townliferight', get_template_directory_uri() . '/template-parts/blocks/townliferight/townliferight.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townliferight', get_template_directory_uri() . '/template-parts/blocks/townliferight/townliferight.js', array(), '1.0', true );
?>
<? endif; ?>