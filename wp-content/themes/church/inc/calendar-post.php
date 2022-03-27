<?php
/**
 * Custom post type
 */

add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('calendar', array(
		'labels'             => array(
			'name'               => 'Ивенты', // Основное название типа записи
			'singular_name'      => 'Ивент', // отдельное название записи типа Book
			'add_new'            => 'Добавить ивент',
			'add_new_item'       => 'Добавить новый ивент',
			'edit_item'          => 'Редактировать ивент',
			'new_item'           => 'Новая криптовалюта',
			'view_item'          => 'Посмотреть ивент',
			'search_items'       => 'Найти ивент',
			'not_found'          => 'Ивент не найден',
			'not_found_in_trash' => 'В корзине ивент не найден',
			'parent_item_colon'  => '',
			'menu_name'          => 'Ивенты'

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
		'menu_icon' => 'dashicons-calendar',
		// 'taxonomies'          => array( 'category' ),
		'supports'           => array(
                                        'title',
                                        'editor',
                                        // 'author',
                                        'thumbnail',
                                        // 'excerpt'
                                        // 'comments'
                                        )
	) );
}

function my_taxonomies_calendar() {
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
    register_taxonomy( 'calendar_category', 'calendar', $args );
}
add_action( 'init', 'my_taxonomies_calendar', 0 );