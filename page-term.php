<?php
/* Template Name: Term and condition */
get_header();
global $mrwflower;
?>
<div class="container pt-5 pb-5 terma">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();?>
<h1 style="padding-bottom: 1rem;"><?php the_title(); ?></h1>
		<?php
		the_content();
	} // end while
} // end if
?>
</div>
<?php get_footer(); ?>


