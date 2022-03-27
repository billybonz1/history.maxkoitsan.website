<?php
/**
 * Block Name: townlifeleft 
 *
 * This is the template that displays the townlifeleft  block.
 */

$prefix = "townlifeleft";
$target = "";

$className = '';
if( !empty($block['className']) ) {
    $className .= '' . $block['className'];
}

// include block settings vars
include(get_theme_file_path("/template-parts/blocks/block-settings.php"));
?>

<? if($block_is_active): ?>
<section id="<?= esc_attr($id) ?>" class="life_local_left <?= esc_attr($class) ?> <?php echo esc_attr($className); ?>">
    <? include(get_theme_file_path("/template-parts/blocks/block-bg.php")); ?>
    <div class="container">
        <div class="main_block">
            <? $townlifeleft_item_title = get_field('townlifeleft_item_title');
               $townlifeleft_item_editor = get_field('townlifeleft_item_editor');
               $link = get_field('townlifeleft_item_link');
		        if($townlifeleft_item_title): ?>
            <div class="text_block">
                <h2><?= $townlifeleft_item_title ?></h2>
                <?= $townlifeleft_item_editor ?>
                <? 	if($link): ?>
                <a href="<?= $link['url'] ?>" class="btn"
                    target="<?= $link['target'] ? $link['target'] : "_self" ?>"><?= $link['title'] ?></a>
                <? endif; ?>
            </div>
            <? endif; ?>
            <? $img_1 = get_field('townlifeleft_item_img_1');
               $img_2 = get_field('townlifeleft_item_img_2');
               $img_3 = get_field('townlifeleft_item_img_3');
            if(!empty($img_1) || !empty($img_2) || !empty($img_3)): ?>
            <div class="img_block">
                <img src="<?= $img_1 ?>" alt="" class="first_img">
                <img src="<?= $img_2 ?>" alt="" class="second_img">
                <img src="<?= $img_3 ?>" alt="" class="third_img">
            </div>
            <? endif; ?>
        </div>
    </div>
</section>

<?
	// wp_enqueue_style( 'church-townlifeleft', get_template_directory_uri() . '/template-parts/blocks/townlifeleft/townlifeleft.css', array(), '1.0' );
	// wp_enqueue_script( 'church-townlifeleft', get_template_directory_uri() . '/template-parts/blocks/townlifeleft/townlifeleft.js', array(), '1.0', true );
?>
<? endif; ?>