<? $style = ''; ?>

<? if($block_bg_img || $block_bg_color): ?>


<? if($block_bg_img) $style = "background: linear-gradient(0deg, rgba(0, 0, 0, 0.56), rgba(0, 0, 0, 0.56)), url(${block_bg_img});"; ?>
<? if($block_bg_color) $style .= "background-color: ${block_bg_color}"; ?>

<? endif; ?>

<div class="section-bg" style="<?= $style ?>"></div>