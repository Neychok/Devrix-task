<?php

function ney_shortcode() {

    $args = array(
        'post_type'      => 'event',
        'posts_per_page' => 10,
        'order'          => 'ASC',
        'orderby'        => 'event_date'
    );
    $loop = new WP_Query($args);
    while ( $loop->have_posts() ) {
        $loop->the_post();
        ?>
        <a class="archive-event-row" href=<?php the_permalink() ?>>
                    <h2><?php the_title(); ?></h2>
                </a>
        <?php
    }
}
add_shortcode( 'event_listing', 'ney_shortcode' );