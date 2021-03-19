<?php
/**
 * Plugin Name: Event Listing
 * Plugin URL: https://www.thisworldthesedays.com/event-listing.html
 * Author: Neycho Kalaydzhiev
 * Version: 1.0
 * License: GPLv2
 * Description: Event Listing Plugin / Created for Devrix
 */

 // Exits if accessed directly (safety measure)
if ( ! defined( 'ABSPATH' ) ) {
    exit;
};

require_once ( plugin_dir_path( __FILE__ ) . 'event-listing-cpt.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'event-listing-fields.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'event-listing-shortcode.php' );

function ney_admin_enqueue_scripts() {
    
    global $pagenow, $typenow;

    if ( ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) && $typenow == 'event' ) {

        wp_enqueue_style( 'ney-admin-css', plugins_url( 'css/admin-events.css', __FILE__ ) );
        wp_enqueue_script( 'ney-admin-js', plugins_url( 'js/admin-events.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20210418', true );
        wp_enqueue_style( 'jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css' );
    }

    wp_enqueue_style( 'ney-front-css', plugins_url( 'css/front-events.css', __FILE__ ) );


}

function ney_front_enqueue_scripts() {

        wp_enqueue_style( 'ney-front-css', plugins_url( 'css/front-events.css', __FILE__ ) );

}

add_action( 'admin_enqueue_scripts', 'ney_admin_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'ney_front_enqueue_scripts' );


// Sorts events on the archive page
add_action( 'pre_get_posts', 'my_change_sort_order'); 
    function my_change_sort_order( $query ) {
        if ( is_archive() || is_post_type_archive( 'event' ) ) {

           $query->set( 'order', 'ASC' );
           $query->set( 'orderby', 'event_date' );
        
        }
    };