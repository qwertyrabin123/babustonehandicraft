<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mrm_flower
 */

get_header();
?>
	<?php
		while ( have_posts() ) :
			the_post();?>

			 <div class="breadcrumb-area common-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <h1>blog</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url()); ?>"><i class="fa fa-home"></i></a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
<div class="container">
     <div class="col-lg-12 py-4">
                        <!-- blog single item start -->
                        <div class="blog-post-item blog-grid">
                            <div class="blog-post-thumb">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                <div class="post-date">
                                    <p class="date"><?php echo get_the_date('j'); ?></p>
                                    <p class="month"><?php echo get_the_date('F'); ?></p>
                                </div>
                            </div>
                            <div class="post-info-wrapper">
                                <div class="entry-header">
                                    <h2 class="entry-title"><?php the_title(); ?></h2>
                                    <div class="post-meta">
                                        <div class="post-author">
                                            Written by: <a href="#"><?php the_author(); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="entry-summary">
                              <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- blog single item end -->

                        <!-- comment area start -->
                      
                        <!-- comment area end -->

                        <!-- start blog comment box -->
                        
                        <!-- start blog comment box -->
                    </div>
                    <?php 
                    // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		 ?>
</div>
<?php
get_footer();
