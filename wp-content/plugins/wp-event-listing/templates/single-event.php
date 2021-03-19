<?php

get_header();

?>

<main id="site-content" role="main">

<?php

if ( have_posts() ) {

	$event_date = get_post_meta(get_the_ID(), 'event_date', true);
	$event_location = get_post_meta(get_the_ID(), 'event_location', true);
	$event_url = get_post_meta(get_the_ID(), 'event_url', true);
	?>
	<h1 class="ney_title"><?php the_title(); ?></h1>

	<h4 class="ney_event_date">
        <?php echo esc_html($event_date); ?>
    </h4>

	<p class="ney_event_location">
		Location: <?php echo esc_html($event_location); ?>
	</p>

	<a class="url" href="<?php echo esc_html($event_url); ?>">
		Link to the event
    </a>

	<a href="http://www.google.com/calendar/render?
	action=TEMPLATE
	&text=<?php the_title(); ?>
	&dates=<?php echo esc_html(date("ymd", strtotime($event_date))); ?>/<?php echo esc_html(date("ymd", strtotime($event_date))); ?>
	&location=<?php echo esc_html($event_location); ?>"
	target="_blank" rel="nofollow" class="add-to-calendar">Add to my calendar</a>


	<?php

}

?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>