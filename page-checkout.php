<?php
/* Template Name: checkout_new*/
get_header();

?>
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		echo do_shortcode( '[woocommerce_checkout]' );
	} // end while
} // end if
?>
<?php get_footer(); ?>