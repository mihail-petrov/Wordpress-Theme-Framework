<?php

/**
 * 
 */
add_action( 'admin_init', 'my_admin' );
function my_admin() {
    add_meta_box( 'movie_review_meta_box', 'Информация за събитието', 'display_event_fields', 'events', 'normal', 'high' );
    include_once 'events_extra_fields.php';

    add_meta_box( 'archive_event_box', 'Архивирай събитието', 'archive_current_event', 'events', 'normal', 'high' );
    include_once 'archive_current_event.php';

    // ... etc
}



function display_event_fields( $movie_review ) {

	/*==========================================*/
	/*       		CUSTOM METABOXES 
	/*==========================================*/
		
	    $event_count 		= esc_html( get_post_meta( $movie_review->ID, 'event_count', true ) );
	    $event_price 		= esc_html( get_post_meta( $movie_review->ID, 'event_price', true ) );
	    $event_place 		= esc_html( get_post_meta( $movie_review->ID, 'event_place', true ) );

	    $event_date_start 	= esc_html( get_post_meta( $movie_review->ID, 'event_date_start', true ) );
	    $event_date_end 	= esc_html( get_post_meta( $movie_review->ID, 'event_date_end', true ) );
	    $event_time_start	= esc_html( get_post_meta( $movie_review->ID, 'event_time_start', true ) );

	    $event_email		= esc_html( get_post_meta( $movie_review->ID, 'event_email', true ) );
        $event_extend       = esc_html( get_post_meta( $movie_review->ID, 'event_extend', true ) );

    ?>
    <table>
        <!-- Count for Event registration -->
        <tr>
            <td style="width: 100%">Количество за записване</td>
            <td><input type="text" size="80" name="event_count" value="<?php echo $event_count; ?>" /></td>
        </tr>
		
		<!-- Event Price for registration -->
        <tr>
            <td style="width: 100%">Цена за записване</td>
            <td><input type="text" size="80" name="event_price" value="<?php echo $event_price; ?>" /></td>
        </tr>

        <!-- Event date start -->
        <tr>
            <td style="width: 100%">Дата на стартиране</td>
            <td><input type="date" size="80" name="event_date_start" value="<?php echo $event_date_start; ?>" /></td>
        </tr>
		
		<!-- Event date end -->
        <tr>
            <td style="width: 100%">Дата за край</td>
            <td><input type="date" size="80" name="event_date_end" value="<?php echo $event_date_end; ?>" /></td>
        </tr>

		<!-- Event place performance -->
        <tr>
            <td style="width: 100%">Място на провеждане</td>
            <td>
                <?php 
                    wp_editor( $event_place, 'content-id', array( 'textarea_name' => 'event_place', 'media_buttons' => true, 'tinymce' => array( 'theme_advanced_buttons1' => 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,spellchecker,wp_fullscreen,wp_adv' ) ) ); 
                ?>
                <!-- <input type="text" size="80" name="event_place" value="<?php echo $event_place; ?>" /></td> -->
        </tr>

   
        <tr>
            <td style="width: 100%">Начален час</td>
            <td><input type="text" size="80" name="event_time_start" value="<?php echo $event_time_start; ?>" /></td>
        </tr>

        <tr>
            <td style="width: 100%">E-mail до потребителя</td>
            <td>
            	<?php 
            		wp_editor( $event_email, 'content-id', array( 'textarea_name' => 'event_email', 'media_buttons' => true, 'tinymce' => array( 'theme_advanced_buttons1' => 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,spellchecker,wp_fullscreen,wp_adv' ) ) ); 
            	?>
            </td>
        </tr>

        <tr>
            <td style="width: 100%">Разширена форма за E-mail</td>
            <td>
				

            	<label>Да:</label>
                <input type="radio" <?php if($event_extend == 'on') echo "checked='checked'";?> name="event_extend" value="on">
				
                <label>Не:</label>
                <input type="radio" <?php if($event_extend == 'off') echo "checked='checked'";?> name="event_extend" value="off">
            </td>
        </tr>

    </table>
    <?php
}