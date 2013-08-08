<?php

/**
 * [create_custom_post_type description]
 * @return [type] [description]
 */
function create_custom_post_type() {
    register_post_type( 'custom_post_type',
        array(
            'labels' => array(
                'name'                  => '',
                'singular_name'         => '',
                'add_new'               => '',
                'add_new_item'          => '',
                'edit'                  => '',
                'edit_item'             => '',
                'new_item'              => '',
                'view'                  => '',
                'view_item'             => '',
                'search_items'          => '',
                'not_found'             => '',
                'not_found_in_trash'    => '',
                'parent'                => ''
            ),
            'public'        => true,
            'menu_position' => 15,
            'supports'      => array( 
                'title',
                'editor',
                'comments',
                'thumbnail',
                'custom-fields',
                'page-attributes'
            ),
            'taxonomies'    => array( '' ),
            'menu_icon'     => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive'   => true
        )
    );
}
add_action( 'init', 'create_custom_post_type' );