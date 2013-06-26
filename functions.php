<?php
/*==========================================*/
/*               WORDPRESS FETURS
/*==========================================*/

// Enable post thumbnail in Wordpress admin pannel
add_theme_support('post-thumbnails');

// Enable custom Header
$custom_header_properties = array(
    'default-image'          => '',
    'random-default'         => false,
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'default-text-color'     => '',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header_properties );

// Enable Custom Background
$custom_backgroud_properties = array(
    'default-color'          => '555',
    'default-image'          => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $custom_backgroud_properties );


/*==========================================*/
/*               CUSTOM FETURS
/*==========================================*/

/**
 * [custom_excerpt_length description]
 * @param  [type] $length [description]
 * @return [type]         [description]
 */
function custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);


/**
 * [new_excerpt_more description]
 * @param  [type] $more [description]
 * @return [type]       [description]
 */
function new_excerpt_more($more) {
    global $post;
    return ' <a href="' . get_permalink($post->ID) . '">има още...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * [home_page_menu_args description]
 * @param  [type] $args [description]
 * @return [type]       [description]
 */
function home_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );


/*==========================================*/
/*                STYLE FUNCTIONS
/*==========================================*/

/**
 * [remove_more_link_scroll description]
 * @param  [type] $link [description]
 * @return [type]       [description]
 */
function remove_more_link_scroll($link) {
    $link = preg_replace('|#more-[0-9]+|', '', $link);
    return $link;
}
add_filter('the_content_more_link', 'remove_more_link_scroll');


/**
 * [the_category_unlinked description]
 * @param  string $separator [description]
 * @return [type]            [description]
 */
function the_category_unlinked($separator = ' ') {
    $categories = (array) get_the_category();

    $thelist = '';
    foreach ($categories as $category) {    // concate
        $thelist .= $separator . $category->category_nicename;
    }
    echo $thelist;
}

/*==========================================*/
/*                WORDPRESS MENU
/*==========================================*/

/**
 * 
 */
function register_my_menus() {
    register_nav_menus(
            array('header-menu'     => __('Header Menu'),
                  'secondary-menu'    => 'secondary menu'
            )
    );
}
add_action('init', 'register_my_menus');



/*==========================================*/
/*                WORDPRESS SIDEBAR
/*==========================================*/

/**
 * 
 */
if (function_exists('register_sidebar')) {
    register_sidebar(array('name' => __('Widget sidebar', 'theme_text_domain'), 'id' => 'custom'));
}


/*==========================================*/
/*                PAGINATION
/*==========================================*/

/**
 * [pagination description]
 * @return [type] [description]
 */
function pagination() {
    echo '<div class="pagination">';
        posts_nav_link('   ', '<< ', ' >>'); 
    echo '</div>';
}

/*==========================================*/
/*                LOAD JQUERY
/*==========================================*/

if (!is_admin()) add_action("wp_enqueue_scripts", "jquery_enqueue", 11);

function jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}