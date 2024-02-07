<?php
/* Template Name: cart */
get_header();

?>
<div class="cartpage pt-5">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
	the_content();
	} // end while
} // end if
?></div>
<?php get_footer(); ?>