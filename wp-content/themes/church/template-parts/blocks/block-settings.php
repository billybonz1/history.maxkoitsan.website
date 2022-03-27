<?

// block vars
$block_is_active = get_field($prefix . '_block_is_active', $target);
$block_title = get_field($prefix . '_block_title', $target);
$block_subtitle = get_field($prefix . '_block_subtitle', $target);
$block_desc = get_field($prefix . '_block_desc', $target);
$block_btn = get_field($prefix . '_block_btn', $target);
$block_styling = get_field($prefix . '_block_styling', $target);
$block_bg_img = !empty($block_styling['bg_img']) ? $block_styling['bg_img'] : '';
$block_bg_color = !empty($block_styling['bg_color']) ? $block_styling['bg_color'] : '';
$block_style = !empty($block_styling['style']) ? $block_styling['style'] : '';

// block id
$id = str_replace('_', '-', $prefix);

// block styles
if($block_style) $block_style = implode(" ", $block_style);

// block classes
$class = $id . ' section';
if(!empty($block_style)) $class .= ' ' . $block_style;
if(!empty($block_bg_img)) $class .= ' section-has-bg-img';
if(!empty($block_btn)) $class .= ' section-has-header-btn';

// give unique block id if its guttenberg block
if($block['id']) $id = $block['id'];

?>