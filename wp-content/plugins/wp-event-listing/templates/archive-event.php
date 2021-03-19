<?php
get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php  while ( have_posts() ) : the_post(); ?>
                <a class="archive-event-row" href=<?php the_permalink() ?>>
                    <h2><?php the_title(); ?></h2>
                </a>
            <?php endwhile; ?>
        </main>
    </div>
</div>

<?php get_footer();