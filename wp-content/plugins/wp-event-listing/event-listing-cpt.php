<?php

function ney_register_post_type() {

    $singular = 'Event';
    $plural = 'Events';
    
    $labels = array(
        'name'                  => $plural,
        'singular'              => $singular,
        'add_name'              => 'Add New',
        'add_new_item'          => 'Add New ' . $singular,
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit ' . $singular,
        'new_item'              => 'New ' . $singular,
        'view'                  => 'View ' . $singular,
        'view_item'             => 'View ' . $singular,
        'search_term'           => 'Search ' . $plural,
        'parent'                => 'Parent '  . $singular,
        'not_found'             => 'No ' . $singular,
        'not_found_in_trash'    => 'No ' . $plural . ' in Trash',
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'menu_position'     => 4,
        'menu_icon'         => 'dashicons-calendar-alt',
        'can_export'        => true,
        'delete_with_user'  => false,
        'hierarchical'      => false,
        'has_archive'       => true,
        'query_var'         => true,
        'capability_type'   => 'post',
        'map_meta_cap'      => true,
        'rewrite'           => array(
            'slug' => 'events',
        ),
        'supports'          => array(
            'title'
        ),
    );

    register_post_type( 'event', $args );
}

add_action( 'init', 'ney_register_post_type' );

function ney_load_templates( $original_template ) {

     if ( get_query_var( 'post_type' ) == 'event' ) {

        if (  is_post_type_archive() || is_search() ) {

            if ( file_exists( get_stylesheet_directory() . '/archive-event.php' ) ) {

                return get_stylesheet_directory() . '/archive-event.php';

            } else {

                return plugin_dir_path( __FILE__ ) . 'templates/archive-event.php';

            }

        } else {

            if ( file_exists( get_stylesheet_directory() . '/single-event.php' ) ) {

                return get_stylesheet_directory() . '/single-event.php';

            } else {

                return plugin_dir_path( __FILE__ ) . 'templates/single-event.php';

            }

        }
    }
    return $original_template;

}

add_action( 'template_include', 'ney_load_templates' );