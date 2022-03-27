<?php
/**
 * Custom post type
 */

add_action('init', 'my_custom_homegroup');
function my_custom_homegroup(){
	register_post_type('homegroup', array(
		'labels'             => array(
			'name'               => 'Домашние группы', // Основное название типа записи
			'singular_name'      => 'Домашняя группа', // отдельное название записи типа Book
			'add_new'            => 'Добавить Домашнюю группу',
			'add_new_item'       => 'Добавить новую Домашнюю группу',
			'edit_item'          => 'Редактировать Домашнюю группу',
			'new_item'           => 'Новая группа',
			'view_item'          => 'Посмотреть Домашнюю группу',
			'search_items'       => 'Найти Домашнюю группу',
			'not_found'          => 'Домашняя группа не найдена',
			'not_found_in_trash' => 'В корзине Домашняя группа не найдена',
			'parent_item_colon'  => '',
			'menu_name'          => 'Домашние группы'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' => 'dashicons-groups',
		'taxonomies'          => array( 'homegroups_category' ),
		'supports'           => array(
                                        'title',
                                        'editor',
                                        // 'author',
                                        // 'thumbnail',
										'custom-fields'
                                        // 'excerpt'
                                        // 'comments'
                                        )
	) );
}

function my_taxonomies_homegroup() {
    $labels = array(
        'name'              => _x( 'Категории', 'taxonomy general name' ),
        'singular_name'     => _x( 'Категория', 'taxonomy singular name' ),
        'search_items'      => __( 'Поиск категории' ),
        'all_items'         => __( 'Все категории' ),
        'parent_item'       => __( 'Родительская категория' ),
        'parent_item_colon' => __( 'Родительская категория:' ),
        'edit_item'         => __( 'Редактирование категории' ), 
        'update_item'       => __( 'Обновить категорию' ),
        'add_new_item'      => __( 'Добавить новую категорию' ),
        'new_item_name'     => __( 'Новая категория' ),
        'menu_name'         => __( 'Категории' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'homegroups_category', 'homegroup', $args );
}
add_action( 'init', 'my_taxonomies_homegroup', 0 );

function my_taxonomies_homegrouptheme() {
    $labels = array(
        'name'              => _x( 'Темы', 'taxonomy general name' ),
        'singular_name'     => _x( 'Тема', 'taxonomy singular name' ),
        'search_items'      => __( 'Поиск темы' ),
        'all_items'         => __( 'Все темы' ),
        'parent_item'       => __( 'Родительская тема' ),
        'parent_item_colon' => __( 'Родительская тема:' ),
        'edit_item'         => __( 'Редактирование темы' ), 
        'update_item'       => __( 'Обновить тему' ),
        'add_new_item'      => __( 'Добавить новую тему' ),
        'new_item_name'     => __( 'Новая тема' ),
        'menu_name'         => __( 'Темы' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'homegroups_themes', 'homegroup', $args );
}
add_action( 'init', 'my_taxonomies_homegrouptheme', 1 );

function display_select_filter() {
    global $post_type;
    if ($post_type == 'homegroup') { // must change post_type to yours
        $taxonomy = 'homegroups_themes'; // must change taxonomy to yours
        $terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
        ?>
<label class="screen-reader-text" for="<?= $taxonomy; ?>_filter"><?= esc_html__("Category", 'my-domain'); ?></label>
<select name="<?= $taxonomy; ?>" id="<?= $taxonomy; ?>_filter">
    <option value=""><?php _e("All themes", 'my-domain'); ?></option>
    <?php foreach ($terms as $k => $v): ?>
    <?php $selected = (!empty($_GET[$taxonomy]) && $_GET[$taxonomy] === $v->slug) ? ' selected="selected"' : ''; ?>
    <option value="<?= $v->slug; ?>" <?= $selected; ?>><?= $v->name; ?></option>
    <?php endforeach; ?>
</select>
<?php
    }
	if ($post_type == 'homegroup') { // must change post_type to yours
        $taxonomy = 'homegroups_category'; // must change taxonomy to yours
        $terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
        ?>
<label class="screen-reader-text" for="<?= $taxonomy; ?>_filter"><?= esc_html__("Category", 'my-domain'); ?></label>
<select name="<?= $taxonomy; ?>" id="<?= $taxonomy; ?>_filter">
    <option value=""><?php _e("All categories", 'my-domain'); ?></option>
    <?php foreach ($terms as $k => $v): ?>
    <?php $selected = (!empty($_GET[$taxonomy]) && $_GET[$taxonomy] === $v->slug) ? ' selected="selected"' : ''; ?>
    <option value="<?= $v->slug; ?>" <?= $selected; ?>><?= $v->name; ?></option>
    <?php endforeach; ?>
</select>
<?php
    }
}

add_action('restrict_manage_posts', 'display_select_filter');