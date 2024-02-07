<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mrm_flower
 */

?>

<div id="post-<?php the_ID(); ?>" class="col-md-3" >
	<div class="itemu">
		<header class="entry-header">

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
					mrm_flower_posted_on();
					mrm_flower_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="imhgs">
			<?php mrm_flower_post_thumbnail(); ?>
		</div>
		<div class="contyss">
			<?php 
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'
				 ); ?>
		</div>

		</div>
	</div><!-- #post-<?php the_ID(); ?> -->
