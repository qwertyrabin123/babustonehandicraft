<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mrm_flower
 */
global $mrwflower;
?><footer class="footer-wrapper">

        <!-- footer widget area start -->
        <div class="footer-widget-area">
            <div class="container">
                <div class="footer-widget-inner section-space">
                    <div class="row mbn-30">
                        <!-- footer widget item start -->
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="footer-widget-item mb-30">
                                <div class="footer-widget-title">
                                    <h5><?php bloginfo('title'); ?></h5>
                                </div>
                                <ul class="footer-widget-body accout-widget">
                                    <li class="address" style="line-height: 28px;">
                                        <em><i class="lnr lnr-map-marker"></i></em>
                                        <?php echo $mrwflower['Address_sydeny_decking_field']; ?>
                                    </li>
                                    <li class="email">
                                        <em><i class="lnr lnr-envelope"></i> </em>
                                        <a href="mailto:<?php echo $mrwflower['emailmainsydeny_decking']; ?>"><?php echo $mrwflower['emailmainsydeny_decking']; ?></a>
                                    </li>
                                    <li class="phone">
                                        <em><i class="lnr lnr-phone-handset"></i>  </em>
                                        <a href="tel:<?php echo $mrwflower['Phonemain_sydeny_decking']; ?>"><?php echo $mrwflower['Phonemain_sydeny_decking']; ?></a>
                                    </li>
                                </ul>
                             
                            </div>
                        </div>
                        <!-- footer widget item end -->

                        <!-- footer widget item start -->
                        <div class="col-lg-3 col-md-6 col-sm-4">
                            <div class="footer-widget-item mb-30">
                                <div class="footer-widget-title">
                                    <h5>categories</h5>
                                </div>
                                <ul class="footer-widget-body lisyu">
                                    <?php 
                                  $sub_cats = get_categories(  array(
            'hide_empty' =>  0,
            //'exclude'  =>  1,
            'taxonomy'   =>  'product_cat' // mention taxonomy here. 
        ) );
            if($sub_cats) {
                foreach($sub_cats as $sub_category) {
                    echo  '<li/><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a><li>';
                }
            } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- footer widget item end -->

                        <!-- footer widget item start -->
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-widget-item mb-30">
                                <div class="footer-widget-title">
                                    <h5>Information</h5>
                                </div>
                                <ul class="footer-widget-body">
                                    <li><a href="<?php the_permalink(10  ); ?>">Home</a></li>
                                    <li><a href="<?php the_permalink( 6 ); ?>">Shop</a></li>
                                    
                                    <li><a href="<?php the_permalink( 225 ); ?>">Marble Writing</a></li>
                                      <li><a href="<?php the_permalink(247 ); ?>">Special Order</a></li>
                                    
                                  <li><a href="<?php the_permalink( 3 ); ?>">Terms & Condition</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- footer widget item end -->

                        <!-- footer widget item start -->
                        <div class="col-lg-3  col-md-6 col-sm-6">
                            <div class="footer-widget-item mb-30">
                                <div class="footer-widget-title">
                                    <h5>Our Store Location:</h5>
                                </div>
                                <div class="addresfooter">
                                    <?php echo $mrwflower['Google_map_sydeny_decking']; ?>
                                </div>
                            </div>
                        </div>
                        <!-- footer widget item end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- footer widget area end -->

        <!-- footer bottom area start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="copyright-text">
                            <p>Copyright © <?php bloginfo('title'); ?>. All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 order-md-2">
                        <div class="footer-social-link">
                             <a href="<?php echo $mrwflower['facebook_sydenydecking']; ?>"><i class="fab fa-facebook"></i></a>
                <a href="<?php echo $mrwflower['instagramss_sydenydecking']; ?>"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $mrwflower['Twitter_mobile_care']; ?>"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo $mrwflower['Youtube_hihtechhomes']; ?>"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom area end -->

    </footer>
    <!-- End Footer Area Wrapper -->

    <!-- Quick view modal start -->
    
    <!-- Quick view modal end -->

    <!-- offcanvas search form start -->
    <div class="offcanvas-search-wrapper">
        <div class="offcanvas-search-inner">
            <div class="offcanvas-close">
                <i class="lnr lnr-cross"></i>
            </div>
            <div class="container">
                <div class="offcanvas-search-box">
                    <form class="d-flex bdr-bottom w-100">
                        <input type="text" placeholder="Search entire storage here...">
                        <button class="search-btn"><i class="lnr lnr-magnifier"></i>search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas search form end -->

    <!-- offcanvas mini cart start -->
   
    <!-- offcanvas mini cart end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
<script>
    
    jQuery( ".woocommerce-breadcrumb" ).wrap( "<div class='newssd'><div class='container'></div></div>" );

jQuery(".shop_table").addClass("table table-stripped");

function myFunction_print() {

window.print();

}

jQuery(".lnr-menu").on("click",function(){
   $(".off-canvas-wrapper").addClass("open");
})

jQuery(".lnr-cross").on("click",function(){
   $(".off-canvas-wrapper").removeClass("open");
});

jQuery("#show_search").on("click",function(e){
e.preventDefault();
   jQuery(".nomobile").toggle("slow");
});
jQuery('.wp-block-table table').addClass('table table-striped table-bordered');
// jQuery(".price").html("Our Price: ");
</script>
   <script>
  jQuery(".blocks-gallery-item  img").each(function(i,item) {

    var src = jQuery(this).attr('src');
   
    var a = jQuery('<a>').attr('href', src).attr("data-fancybox",'group');
    jQuery(this).wrap(a);

  });
</script>
<?php wp_footer(); ?>

</body>
</html>
