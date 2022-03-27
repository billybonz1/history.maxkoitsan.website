<?

/**
 * Custom block category
 */
function custom_block_categories( $categories, $post ) {
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'custom-blocks',
        'title' => 'Кастомные блоки',
        'icon'  => 'screenoptions',
      ),
    )
  );
}
add_filter( 'block_categories', 'custom_block_categories', 10, 2 );

/**
 * Register custom acf blocks.
 */
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(acfrb_settings('mainpagewelcome'));
		acf_register_block_type(acfrb_settings('mainpagemap'));
		acf_register_block_type(acfrb_settings('mainpagevision'));
		acf_register_block_type(acfrb_settings('mainpagesocials'));
		acf_register_block_type(acfrb_settings('jesusfirst'));
		acf_register_block_type(acfrb_settings('jesussecond'));
		acf_register_block_type(acfrb_settings('jesusthird'));
		acf_register_block_type(acfrb_settings('valuesmain'));
		acf_register_block_type(acfrb_settings('visionmain'));
		acf_register_block_type(acfrb_settings('aboutusfirst'));
		acf_register_block_type(acfrb_settings('aboutussecond'));
		acf_register_block_type(acfrb_settings('aboutusthird'));
		acf_register_block_type(acfrb_settings('servicesmainfirst'));
		acf_register_block_type(acfrb_settings('servicesmainsecond'));
		acf_register_block_type(acfrb_settings('contactmain'));
		acf_register_block_type(acfrb_settings('contactmainsecond'));
		acf_register_block_type(acfrb_settings('contactmainmap'));
		acf_register_block_type(acfrb_settings('controlmain'));
		acf_register_block_type(acfrb_settings('textblock'));
		// Внутренние страницы
		acf_register_block_type(acfrb_settings('townmainfirst'));
		acf_register_block_type(acfrb_settings('townmainsecond'));
		acf_register_block_type(acfrb_settings('townmainthird'));
		acf_register_block_type(acfrb_settings('townmainfour'));
		acf_register_block_type(acfrb_settings('townmaincalendar'));
		acf_register_block_type(acfrb_settings('townmainsix'));
		acf_register_block_type(acfrb_settings('townmainsocials'));
		acf_register_block_type(acfrb_settings('townchurch'));
		acf_register_block_type(acfrb_settings('townaboutuswelcome'));
		acf_register_block_type(acfrb_settings('townaboutussecond'));
		acf_register_block_type(acfrb_settings('townaboutusthird'));
		acf_register_block_type(acfrb_settings('townaboutusfour'));
		acf_register_block_type(acfrb_settings('townaboutusfive'));
		acf_register_block_type(acfrb_settings('townlifewelcome'));
		acf_register_block_type(acfrb_settings('townliferight'));
		acf_register_block_type(acfrb_settings('townlifeleft'));
		acf_register_block_type(acfrb_settings('townlifegallery'));
		acf_register_block_type(acfrb_settings('townservicewelcome'));
		acf_register_block_type(acfrb_settings('townservicedirections'));
		acf_register_block_type(acfrb_settings('townservicethird'));
		acf_register_block_type(acfrb_settings('townservicecontact'));
		acf_register_block_type(acfrb_settings('townvacansieswelcome'));
		acf_register_block_type(acfrb_settings('townvacanciesdirections'));
		acf_register_block_type(acfrb_settings('townvacanciescontact'));
		acf_register_block_type(acfrb_settings('townvisitwelcome'));
		acf_register_block_type(acfrb_settings('townvisitsecond'));
		acf_register_block_type(acfrb_settings('townvisitthird'));
		acf_register_block_type(acfrb_settings('townvisitcontact'));
		acf_register_block_type(acfrb_settings('townvisityoutube'));
		acf_register_block_type(acfrb_settings('towncontactsecond'));
		acf_register_block_type(acfrb_settings('towncontactmap'));
		acf_register_block_type(acfrb_settings('towncontacthelp'));
		acf_register_block_type(acfrb_settings('towndonatewelcome'));
		acf_register_block_type(acfrb_settings('towndonatesecond'));
		acf_register_block_type(acfrb_settings('towndonatethird'));
		acf_register_block_type(acfrb_settings('towndonatecontact'));
	}
}

function acfrb_settings($block_name){
	$block_title = 'Block: ' . $block_name;
	return $settings = array(
		'name'						=> $block_name,
		'title'						=> $block_title,
		'category'				=> 'custom-blocks',
		'icon'						=> 'layout',
		'mode' 						=> 'edit',
		'supports' => array( 
			'align' => false,
			'mode' => false,
		),
		'render_callback'	=> 'my_acf_block_render_callback',
	);
}

function my_acf_block_render_callback($block) {
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/blocks" folder
	if(file_exists(get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php"))) {
		include(get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php"));
	}
}