<?php

function ney_add_custom_metabox() {

    add_meta_box(
        'ney_meta',
        'Event Details',
        'ney_meta_callback',
        'event',
        'normal',
        'core',
    );

};

add_action( 'add_meta_boxes', 'ney_add_custom_metabox' );

function ney_meta_callback( $post ) {

    wp_nonce_field( basename( __FILE__ ), 'ney_event_nonce' );
    $ney_stored_meta = get_post_meta( $post->ID );

    ?>

    <div>
        <!-- Event date field -->
        <div class="meta-row">
            <div class="meta-th">
                <label for="event-date" class="ney-row-title">Event Date</label>
            </div>
            <div class="meta-td">
                <input 
                type="text" 
                name="event_date"
                class="datepicker" 
                id="event-date" 
                value="<?php if ( ! empty ( $ney_stored_meta['event_date'] ) ) echo esc_attr( $ney_stored_meta['event_date'][0] ); ?>"
                >
            </div>
        </div>

        <!-- Event URL field -->
        <div class="meta-row">
            <div class="meta-th">
                <label for="event-url" class="ney-row-title">Event URL</label>
            </div>
            <div class="meta-td">
                <input 
                type="text" 
                name="event_url" 
                id="event-url" 
                value="<?php if ( ! empty ( $ney_stored_meta['event_url'] ) ) echo esc_attr( $ney_stored_meta['event_url'][0] ); ?>"
                >
            </div>
        </div>

        <!-- Google Maps field -->
        <div class="meta-row">
            <div class="meta-th">
                <label for="event-location" class="ney-row-title">Event Location</label>
            </div>
            <div class="meta-td">
                <input 
                type="text" 
                name="event_location" 
                id="event-location" 
                value="<?php if ( ! empty ( $ney_stored_meta['event_location'] ) ) echo esc_attr( $ney_stored_meta['event_location'][0] ); ?>"
                >
            </div>
        </div>
    </div>

    <?php
}

function ney_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'ney_event_nonce' ] ) && wp_verify_nonce( $_POST[ 'ney_event_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ){
        return;
    }

    if ( isset( $_POST[ 'event_url' ] ) ){
        update_post_meta( $post_id, 'event_url', sanitize_text_field( $_POST['event_url'] ) );
    }

    if ( isset( $_POST[ 'event_date' ] ) ){
        update_post_meta( $post_id, 'event_date', sanitize_text_field( $_POST['event_date'] ) );
    }

    if ( isset( $_POST[ 'event_location' ] ) ){
        update_post_meta( $post_id, 'event_location', sanitize_text_field( $_POST['event_location'] ) );
    }
}

add_action( 'save_post', 'ney_meta_save' );