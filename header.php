<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mrm_flower
 */
global $mrwflower;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,900%7CYesteryear" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;700&display=swap" rel="stylesheet"> <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

<style> 
.woocommerce button.button.alt{background-color: red!important;}
.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range{
    background: #72992f!important;
}

.woocommerce .widget_price_filter .ui-slider .ui-slider-handle{
    background-color:white!important;
    border: 5px solid #72992f;
}
</style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
       <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mrm-flower' ); ?></a>

       <div class="bigscreen">
         <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo do_shortcode('[gtranslate]'); ?>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-0 text-white pt-2 text-right">Yes, we are open for delivery. Contactless Delivery on all orders.</p>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">

                        <?php if (is_user_logged_in()) {
                            $username=wp_get_current_user();
                            ?>
                            <a href="<?php the_permalink( 9 ); ?>">Welcome <?php echo $username->user_nicename ?></a></p>
                            <?php
                            
                        }else{ ?>
                         <div class="dropdown">
                          <button class="btn btn-black dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #2b2b2b;color: white;border-radius: 0px;">
                            Login
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo esc_url( the_permalink(97 )); ?>">Login</a>
                            <a class="dropdown-item" href="<?php echo esc_url( the_permalink(99 )); ?>">Register</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <a href="#">Cart: <span class="ml-2"><a class="cart-customlocation" href="
                    <?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (  WC()->cart->get_cart_contents_count() ); ?> </a>
                </span></a>
            </div>
        </div>
    </div>
</div>

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo esc_url(home_url( ));?>"><img class="logo img-fluid" src="<?php echo $mrwflower['Header_side_images']['url']; ?>" alt="" width="80%;"></a>
            </div>
            <style>
                .headersearch{
                    margin-top: 1rem;
                }
                .headersearch form{
                    width: 100%;
                }
                .headersearch label{
                    width: 100%;
                }
             .headersearch   input[type="search"]{
                    width: 100%;
                    border-radius: 20px;
                }
               .headersearch [type="submit"]{
                    position: absolute;
right: 32px;
top: 1.8rem;
                }
            </style>
            <div class="col-md-4 py-4 headersearch">
   
                    <?php echo get_search_form(); ?></div>
            <div class="col-md-4 py-4 text-right">
             <h1 style="padding-top: 14px;"><i class="fa fa-phone " style="color: " aria-hidden="true"></i>  <a href="tel:<?php echo $mrwflower['Phonemain_sydeny_decking']; ?>"><?php echo $mrwflower['Phonemain_sydeny_decking']; ?></a>
 </h1>
         </div>
     </div>
 </div>
</header>
<div class="header-menu">
    <div class="container">
        <nav class="navbar navbar-expand-md " role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'menu-1',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
        </div> 
    </nav>
</div></div>
</div>

<!-- Start Header Area -->
<header class="header-area">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header middle area start -->
       
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="index.html">
                                <img src="<?php echo $mrwflower['Header_side_images']['url']; ?>" style="width:40%" alt="">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="mini-cart-wrap">
                                <a href="<?php echo esc_url( the_permalink(7)); ?>">
                                    <i class="lnr lnr-cart"></i>
                                </a>
                            </div>
                            <div class="mobile-menu-btn">
                                <div class="off-canvas-btn">
                                    <i class="lnr lnr-menu"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
</header>
<!-- end Header Area -->

<!-- off-canvas menu start -->
<aside class="off-canvas-wrapper">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="lnr lnr-cross"></i>
        </div>

        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box-offcanvas">
             <?php echo get_search_form(); ?>
         </div>
         <!-- search box end -->

         <!-- mobile menu start -->
         <div class="mobile-navigation">

            <!-- mobile menu navigation start -->
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'menu-1',
                'depth'             => 2,
                'container'         => 'div',
                
            ) );
            ?>
            <!-- mobile menu navigation end -->
        </div>
        <!-- mobile menu end -->
        <div class="offcanvas-widget-area">
            <div class="off-canvas-contact-widget">
                <ul>
                    <li><i class="fas fa-phone-volume"></i>
                        <a href="tel:<?php echo $mrwflower['Phonemain_sydeny_decking']; ?>"><?php echo $mrwflower['Phonemain_sydeny_decking']; ?></a>
                    </li>
                    <li><i class="far fa-envelope"></i>
                        <a href="mailto:<?php echo $mrwflower['emailmainsydeny_decking']; ?>"><?php echo $mrwflower['emailmainsydeny_decking']; ?></a>
                    </li>
                </ul>
            </div>
            <div class="off-canvas-social-widget">
                <a href="<?php echo $mrwflower['facebook_sydenydecking']; ?>"><i class="fab fa-facebook"></i></a>
                <a href="<?php echo $mrwflower['instagramss_sydenydecking']; ?>"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $mrwflower['Twitter_mobile_care']; ?>"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo $mrwflower['Youtube_hihtechhomes']; ?>"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="mobile-settings">
            <ul class="nav">
                
                <li>
                   <?php if (is_user_logged_in()) {
                    $username=wp_get_current_user();
                    ?>
                    <a href="<?php the_permalink( 9 ); ?>">Welcome <?php echo $username->user_nicename ?></a></p>
                <?php }else{
                    ?>                            
                    <div class="dropdown mobile-top-dropdown">
                        <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Account
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="myaccount">
                            
                          
                           <a class="dropdown-item" href="<?php echo esc_url( the_permalink(97 )); ?>"> login</a>
                           <a class="dropdown-item" href="<?php echo esc_url( the_permalink(99 )); ?>">register</a>
                           <?php
                       } ?>
                   </div>
               </div>
           </li>
       </ul>
   </div>

   <!-- offcanvas widget area start -->
   
   <!-- offcanvas widget area end -->
</div>
</div>
</aside>