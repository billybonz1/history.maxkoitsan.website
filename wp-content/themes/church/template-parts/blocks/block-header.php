<? if(!empty($block_title['text']) || !empty($block_subtitle['text'])): ?>

<? if($block_title['text']): ?>
<div class="title-block">
    <<?= $block_title['tag'] ?>><?= $block_title['text'] ?></<?= $block_title['tag'] ?>>
    <? if($block_subtitle['text']): ?>
    <div class="subtitle">
        <<?= $block_subtitle['tag'] ?>><?= $block_subtitle['text'] ?></<?= $block_subtitle['tag'] ?>>
    </div>
    <? endif; ?>
</div>
<? endif; ?>

<? endif; ?>