<?php
/* Template Name: gallery */
get_header();
global $mrwflower;
?>
<div class="container pt-5 pb-5 terma">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		the_content();
	} // end while
} // end if
?>
</div>
<?php get_footer(); ?>


