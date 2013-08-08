<?php

/**
 * [create_my_taxonomies description]
 * @return [type] [description]
 */
function create_my_taxonomies() {
    register_taxonomy( 'custom_taxonomy', 'custom_post_type',
        array(
            'labels' => array(
                'name' 			=> '',
                'add_new_item' 	=> '',
                'new_item_name' => ''
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}
add_action( 'init', 'create_my_taxonomies', 0 );
