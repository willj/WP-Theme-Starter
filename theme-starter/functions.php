<?php

/******

*/

function theme_starter_setup(){
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'editor-styles' ); 
	add_theme_support( 'html5', array( 'search-form' ) );
    add_theme_support( 'custom-logo', array(
        'height' => 80,
        'width'  => 200,
        'flex-height' => true,
		'flex-width' => true,
    ) );

	add_theme_support( 'editor-color-palette', array(
		array(
            'name'  => esc_attr__( 'Red', 'themeLangDomain' ),
            'slug'  => 'theme-starter-red',
            'color' => '#ff0000',
        ),
	));

	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_attr__( 'Small', 'themeLangDomain' ),
			'size' => 14,
			'slug' => 'small'
		),
		array(
			'name' => esc_attr__( 'Regular', 'themeLangDomain' ),
			'size' => 16,
			'slug' => 'regular'
		),
		array(
			'name' => esc_attr__( 'Large', 'themeLangDomain' ),
			'size' => 20,
			'slug' => 'large'
		),
		array(
			'name' => esc_attr__( 'Extra Large', 'themeLangDomain' ),
			'size' => 28,
			'slug' => 'extra large'
		)
	) );

	// remove default block patterns
	remove_theme_support('core-block-patterns');

    // add image sizes
	add_image_size( 'theme-starter-post-thumb', 690, 560, true );
	
    register_nav_menus( array(
		'header'    => 'Main Menu',
	) );
}   

add_action( 'after_setup_theme', 'theme_starter_setup' );

/*********************************************************************************************
    init
*/

function theme_starter_init(){
	
}

add_action( 'init', 'theme_starter_init' );

/*********************************************************************************************
    Widgets
*/

function theme_starter_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'sidebar-f1',
		'description'   => 'Add widgets here to appear in footer 1',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-title">',
		'after_title'   => '</h2>',
	) );

}

add_action( 'widgets_init', 'theme_starter_widgets_init' );

/*********************************************************************************************
    Scripts/styles
*/

function theme_starter_scripts() {
	// just theme header
	wp_enqueue_style( 'theme-starter', get_stylesheet_uri() );

	// theme styles
	$style_version = file_get_contents( get_stylesheet_directory() . '/build/style-version' );
	wp_enqueue_style( 'theme-starter-style', get_theme_file_uri( '/build/theme-starter.min.css' ), array(), $style_version );

	$script_version = file_get_contents( get_stylesheet_directory() . '/build/script-version' );
	wp_enqueue_script( 'theme-starter-js', get_theme_file_uri( '/build/theme-starter.min.js' ), array( 'jquery' ), $script_version );
}

add_action( 'wp_enqueue_scripts', 'theme_starter_scripts' );

// Remove Jetpack CSS junk
add_filter( 'jetpack_implode_frontend_css', '__return_false' );


function theme_starter_add_editor_styles() {
    //add_editor_style('https://fonts.googleapis.com/css2?family=');
	//add_editor_style( 'style-editor.css' );
}

add_action( 'init', 'theme_starter_add_editor_styles' );

/*********************************************************************************************
    Everything else
*/

//require get_parent_theme_file_path( '/inc/template-functions.php' );
