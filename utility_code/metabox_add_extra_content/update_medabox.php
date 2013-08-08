<?php

function add_movie_review_fields( $pua_event_id, $event_type ) {
    // Check post type for movie reviews
    if ( $event_type->post_type == 'events' ) {
        
        // Store Event Count
        if ( isset( $_POST['event_count'] ) && $_POST['event_count'] != '' ) {
            update_post_meta( $pua_event_id, 'event_count', $_POST['event_count'] );
        }
    
        // Store Event Price for registration
        if ( isset( $_POST['event_price'] ) && $_POST['event_price'] != '' ) {
            update_post_meta( $pua_event_id, 'event_price', $_POST['event_price'] );
        }

        // ... ETC
    }
}
add_action( 'save_post', 'add_movie_review_fields', 10, 2 );
