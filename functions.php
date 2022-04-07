<?php

//Custom logo

add_theme_support( 'custom-logo' );


// widget block

function wordpress_test_2021_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-Links', 'wordpress-test-2021' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordpress-test-2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wordpress_test_2021_widgets_init' );


// menu

// header menu

register_nav_menus( array(
	'menu-1' => esc_html__( 'header-menu', 'wordpress-test-2020' ),
) );


// footer menu one

register_nav_menus( array(
	'menu-footer-1' => esc_html__( 'footer-menu-one', 'wordpress-test-2020' ),
) );

// footer menu two

register_nav_menus( array(
	'menu-footer-2' => esc_html__( 'footer-menu-two', 'wordpress-test-2020' ),
) );

// footer menu three

register_nav_menus( array(
	'menu-footer-3' => esc_html__( 'footer-menu-three', 'wordpress-test-2020' ),
) );

/**
 * Enqueue scripts and styles.
 */


function wordpress_test_2021_scripts() {

	// styles
	wp_enqueue_style( 'mormalize', get_stylesheet_directory_uri() . '/assets/style/normalize.css' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/style/style.css' );
	wp_enqueue_style( 'slick-slider', get_stylesheet_directory_uri() . '/assets/style/slick-theme.css' );
	wp_enqueue_style( 'slick-slider-theme', get_stylesheet_directory_uri() . '/assets/style/slick.css' );
	wp_style_add_data( 'style', 'rtl', 'replace' );

	// scripts
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('slick', get_template_directory_uri() .'/assets/js/slick.min.js', array('jquery'), null, true);
	wp_enqueue_script('scripts', get_template_directory_uri() .'/assets/js/main.js', array('jquery'), null, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordpress_test_2021_scripts' );


// fontawesome-5


function wpschool_load_fontawesome() {
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/fontawesome-5/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'wpschool_load_fontawesome' );

// svg 

add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

// svg

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	if( $dosvg ){

		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );


# Creates data for displaying SVG as images in a media library.

function show_svg_in_media_library( $response ) {

	if ( $response['mime'] === 'image/svg+xml' ) {

		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}


// ACF pro development block to Gutenberg

add_action('enqueue_block_editor_assets','wordpress_test_2021_scripts');

// add_action( 'admin_enqueue_scripts', 'wordpress_test_2021_scripts' );

add_action('acf/init', 'my_acf_blocks_init');

function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register block content
        acf_register_block_type(array(
            'name'              => 'get-content',
            'title'             => __('Блок-контент'),
            'description'       => __('ACF test'),
            'render_template'   => 'modules/part-content.php',
            'category'          => 'formatting',
			'mode'              => 'preview',
			'keywords'          => array('Блок-контент','acf'),
        ));

		// Register block info
        acf_register_block_type(array(
            'name'              => 'get-info',
            'title'             => __('Блок-информации'),
            'description'       => __('ACF test'),
            'render_template'   => 'modules/part-info.php',
            'category'          => 'formatting',
			'mode'              => 'preview',
			'keywords'          => array('Блок-информации','acf'),
        ));

		// Register block slider
        acf_register_block_type(array(
            'name'              => 'get-slider',
            'title'             => __('Блок-слайдер'),
            'description'       => __('ACF test'),
            'render_template'   => 'modules/part-slider.php',
            'category'          => 'formatting',
			'mode'              => 'preview',
			'keywords'          => array('Блок-слайдер','acf'),
        ));

		// Register block form
        acf_register_block_type(array(
            'name'              => 'get-form',
            'title'             => __('Блок-форма'),
            'description'       => __('ACF test'),
            'render_template'   => 'modules/part-form.php',
            'category'          => 'formatting',
			'mode'              => 'preview',
			'keywords'          => array('Блок-форма','acf'),
        ));

		// register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('A custom slider block.'),
            'render_template'   => 'template-parts/blocks/slider/slider.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
				wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
				wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

				wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.js', array(), '1.0.0', true );
			  },
        ));

		// slider two register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'slider-two',
            'title'             => __('Slider-two'),
            'description'       => __('A custom slider-two block.'),
            'render_template'   => 'template-parts/blocks/slider-two/slider-two.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'slick-two', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
				wp_enqueue_style( 'slick-theme-two', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
				wp_enqueue_script( 'slick-two', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
				wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/fontawesome-5/css/all.min.css' );
				wp_enqueue_style( 'block-slider-two', get_template_directory_uri() . '/template-parts/blocks/slider-two/slider-two.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-slider-two', get_template_directory_uri() . '/template-parts/blocks/slider-two/slider-two.js', array(), '1.0.0', true );
			  },
        ));

    }
}


