<?php
/* Template Name: login */
get_header();

?>
<div class="container py-5 loginpage">
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