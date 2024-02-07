<?php
/* Template Name: Home */
get_header();
global $mrwflower;
?>



<main>
  <section class="slider-area">
    <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
      <?php 
      $args = array(
        'posts_per_page' => 4,

        'post_type'=>'homesliders'
      );
      $custom_query = new WP_Query( $args );

      while($custom_query->have_posts()) :
        $custom_query->the_post();
        ?>

        <div class="hero-single-slide ">
          <div class="hero-slider-item_2 bg-img" data-bg="<?php echo get_the_post_thumbnail_url(); ?>">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="hero-slider-content slide-1">
                    <span><?php the_title(); ?></span>
                    <?php the_content(); ?>
                    <a href="<?php echo esc_url(get_the_permalink( 172  ));?>" class="btn-hero">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php endwhile;wp_reset_query(); ?>
    </div>
  </section>

  <div class="aboutus" style="padding-top: 3rem">
    <div class="container">
    <?php $about=get_post(172);
?>
<h3 class="text-center"><?php echo wp_trim_words($about->post_content,50);?></h3>
<?php
     ?>
    </div>
  </div>

  <div class="category">
    <div class="container">
      <div class="row">
       <?php 
       $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
      ) );
       foreach ($terms as $catw) {
        $ids=$catw->term_id;
        $thumbnail_id = get_woocommerce_term_meta( $catw->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
        ?>
        <div class="col-md-3 col-6">
          <div class="wraps">
            <img src="<?php echo   $image[0]; ?>" alt="">
            <div class="contys">
              <h5><a href="<?php echo esc_url( get_term_link( $ids ) );?>"><?php echo $catw->name;  ?></a></h5> 
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<section class="new-product section-space">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title text-center">
          <h2>Designer Choice</h2>
          <div class="line1"></div>
        </div>
      </div>
    </div>
    <div class="row mtn-40">


     <?php
     $args = array(
      'post_type'           => 'product',
      'posts_per_page'      => 8,
      'orderby'             => 'date',
      'order'               => 'DESC',
      'post__in'            => wc_get_featured_product_ids(),
    );


     $loop = new WP_Query( $args );
     if ( $loop->have_posts() ) :
      while ( $loop->have_posts() ) : $loop->the_post(); 
       global $product;
       $regular_price 	= get_post_meta( $product->get_id(), '_regular_price', true ); 
       $sale_price 	= get_post_meta( $product->get_id(), '_sale_price', true );

       ?>
       <!-- product single item start -->
       <div class="col-lg-3 col-md-4 col-6">
        <div class="product-item mt-40">
          <figure class="product-thumb">
            <a href="<?php echo esc_html( the_permalink(  ) ); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
            <div class="product-badge">
              <div class="product-label new">
                <span>new</span>
              </div>
              <div class="product-label discount">
                <span><?php do_action('sale_percentage'); ?></span>
              </div>
            </div>
            <div class="addtocarts">
              <p> <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></p>
            </div>
          </figure>
          <div class="product-caption">
            <p class="product-name">
              <a href="<?php echo esc_html( the_permalink(  ) ); ?>"><?php the_title(); ?></a>
            </p>
            <div class="price-box">

              <?php do_action( "show_price_product" ); ?>

            </div>
          </div>
        </div>
      </div>

    <?php endwhile;endif;wp_reset_query(); ?>
   
  </div>
</div>
</section>

<section class="top-sellers section-space" style="background: #DCDCDC;margin-top: 2rem;position: relative;overflow: hidden;">
 <div class="koius" style="left: -7rem;
bottom: -3rem;">
  <img src="<?php bloginfo('stylesheet_directory');?>/img/new.png" alt="">
</div>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="section-title text-center">
        <h2>New Product</h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="product-carousel--4 slick-row-15 slick-sm-row-10 slick-arrow-style">
        <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 8
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) :
          while ( $loop->have_posts() ) : $loop->the_post();
            global $product;
            $regular_price 	= get_post_meta( $product->get_id(), '_regular_price', true ); 
            $sale_price 	= get_post_meta( $product->get_id(), '_sale_price', true );
            ?>
            <div class="product-item">
              <figure class="product-thumb">
                <a href="<?php echo esc_html( the_permalink(  ) ); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <div class="product-badge">
                  <div class="product-label discount">
                    <span><?php do_action('sale_percentage'); ?></span>
                  </div>
                </div>
                <div class="addtocarts">
                  <p> <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></p>
                </div>
              </figure>
              <div class="product-caption">
                <p class="product-name">
                  <a href="<?php echo esc_html( the_permalink(  ) ); ?>"><?php the_title(); ?></a>
                </p>
                <div class="price-box">
                 <?php do_action( "show_price_product" ); ?>
               </div>
             </div>
           </div>

         <?php endwhile;endif;wp_reset_query(); ?>
       </div>
     </div>
   </div>
 </div>
</section>

<section class="top-sellers section-space" style="
background: url(<?php bloginfo('stylesheet_directory');?>/poi.png);">
<div class="container">
  <div class="koius">
    <img src="<?php bloginfo('stylesheet_directory');?>/img/kali.png" alt="">
  </div>
  <div class="row">
    <div class="col-12">
      <div class="section-title text-center">
        <h2>On Sell</h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="product-carousel--4 slick-row-15 slick-sm-row-10 slick-arrow-style">
        <!-- product single item start -->
        <?php
        $query_args = array(
          'posts_per_page'    => 8,
          'no_found_rows'     => 1,
          'post_status'       => 'publish',
          'post_type'         => 'product',
          'meta_query'        => WC()->query->get_meta_query(),
          'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
        );
        $sellproducts = new WP_Query( $query_args ); 

        if ( $sellproducts->have_posts() ) :
          while ( $sellproducts->have_posts() ) : $sellproducts->the_post();
            global $product;
            $regular_price  = get_post_meta( $product->get_id(), '_regular_price', true ); 
            $sale_price     = get_post_meta( $product->get_id(), '_sale_price', true );
            ?>
            <!-- product single item end -->

            <!-- product single item start -->

            <!-- product single item start -->
            <div class="product-item">
              <figure class="product-thumb">
                <a href="<?php echo esc_html( the_permalink(  ) ); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <div class="product-badge">
                  <div class="product-label discount">
                    <span><?php do_action('sale_percentage'); ?></span>
                  </div>
                </div>
                <div class="addtocarts">
                  <p> <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></p>
                </div>
              </figure>
              <div class="product-caption">
                <p class="product-name">
                  <a href="<?php echo esc_html( the_permalink(  ) ); ?>"><?php the_title(); ?></a>
                </p>
                <div class="price-box">
                 <?php do_action( "show_price_product" ); ?>

               </div>
             </div>
           </div>

         <?php endwhile;endif;wp_reset_query(); ?>

       </div>
     </div>
   </div>
 </div>
</section>


 <!-- latest news area start -->
 <section class="latest-news section-space pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title text-center">
          <h2 style="padding-top: 3rem">Latest blog</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="latest-blog-carousel slick-arrow-style slick-row-15">
          <!-- blog sinle post start -->
          <?php 
          $args = array(
            'posts_per_page' => 8,

            'post_type'=>'post'
          );
          $the_query = new WP_Query($args );

          if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
             ?>


             <div class="blog-post-item">
              <div class="blog-post-thumb" style="height: 16rem;">
                <a href="<?php the_permalink(  ); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <div class="post-date">
                  <p class="date"><?php echo get_the_Date('d') ?></p>
                  <p class="month"><?php echo get_the_Date('M') ?></p>
                </div>
              </div>
              <div class="post-info-wrapper">
                <div class="entry-header">
                  <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>
                  <div class="post-meta">
                    <div class="post-author">
                      Written by: <a href="#"><?php the_author(); ?></a>
                    </div>
                  </div>
                </div>
                <div class="entry-summary">
                  <p><?php the_excerpt(); ?>
                </p>
              </div>
              <a href="<?php the_permalink(  ); ?>" class="btn-read">read more...</a>
            </div>
          </div>
        <?php endwhile;endif;wp_reset_query(); ?>


        <!-- blog sinle post end -->

        <!-- blog sinle post start -->

        <!-- blog sinle post end -->
      </div>
    </div>
  </div>
</div>
</section>
<!-- latest news area end -->

<!-- Instagram Feed Area Start -->

<!-- Instagram Feed Area End -->
</main>




<?php get_footer(); ?>