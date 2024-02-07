<?php
/**
 * mrm flower functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mrm_flower
 */

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
register_nav_menus( array(
    'header' => __( 'header Menu', 'THEMENAME' ),
) );
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 350,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/redux/sample/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux/sample/config.php' );
}
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

if ( ! function_exists( 'mrm_flower_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mrm_flower_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mrm flower, use a find and replace
		 * to change 'mrm-flower' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mrm-flower', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'mrm-flower' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mrm_flower_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'mrm_flower_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mrm_flower_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mrm_flower_content_width', 640 );
}
add_action( 'after_setup_theme', 'mrm_flower_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mrm_flower_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mrm-flower' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mrm-flower' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mrm_flower_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mrm_flower_scripts() {
	wp_enqueue_style( 'mrm-flower-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mrm-flower-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mrm-flower-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mrm_flower_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
 
  wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/css/main.css', array(), '1.1', 'all');
  wp_enqueue_style( 'font-awesome.min', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.1', 'all');
  wp_enqueue_style( 'vendor', get_template_directory_uri() . '/assets/css/vendor.css', array(), '1.1', 'all');
  wp_enqueue_style( 'fontawsome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', array(), '1.1', 'all');
  wp_enqueue_style( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css', array(), '1.1', 'all');

   wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/vendor.js', array ( 'jquery' ), 1.1, true);
   wp_enqueue_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array ( 'jquery' ), 1.1, true);

 


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


function ts_you_save() {
  
  global $product;
  
   if( $product->is_type('simple') || $product->is_type('external') || $product->is_type('grouped') ) {
      
     	$regular_price 	= get_post_meta( $product->get_id(), '_regular_price', true ); 
        $sale_price 	= get_post_meta( $product->get_id(), '_sale_price', true );
     
     	if( !empty($sale_price) ) {
  
              $amount_saved = $regular_price - $sale_price;
              $currency_symbol = get_woocommerce_currency_symbol();

              $percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
              ?>


          <?php echo "<span class='color-red'>". number_format($percentage,0, '', '')."%  Off </span>"; ?>					</span> 
            <?php		
        }
   }
}

add_action( 'woocommerce_single_product_summary', 'ts_you_save', 11 );


add_action("sale_percentage","ts_you_save");

function show_price(){

  global $product;
  if( $product->is_type('simple') || $product->is_type('external') || $product->is_type('grouped') ) {
      
     	$regular_price 	= get_post_meta( $product->get_id(), '_regular_price', true ); 
        $sale_price 	= get_post_meta( $product->get_id(), '_sale_price', true );
	
if (!empty($sale_price)) {
	

	?>
	      <span class="price-regular">Rs <?php echo $sale_price; ?></span>
                                    <span class="price-old"><del>Rs <?php echo $regular_price; ?></del></span>
	<?php
}else{
	?>
 <span class="price-regular">Rs  <?php echo $regular_price ?></span>
        
	<?php
}
}
}


add_action( "show_price_product", "show_price" );




function custom_post_type_Homeslider() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( "Homeslider", 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Homeslider', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Homeslider', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Homeslider ', 'twentythirteen' ),
        'all_items'           => __( 'All Homeslider', 'twentythirteen' ),
        'view_item'           => __( 'View Homeslider', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Homeslider', 'twentythirteen' ),
        'add_new'             => __( 'Add Homeslider', 'twentythirteen' ),
        'edit_item'           => __( 'Homeslider', 'twentythirteen' ),
        'update_item'         => __( 'Update Homeslider', 'twentythirteen' ),
        'search_items'        => __( 'Search Homeslider', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
    
// Set other options for Custom Post Type
    
    $args = array(
        'label'               => __( 'Homeslider', 'twentythirteen' ),
        'description'         => __( 'Homeslider company offer', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail',"comments" ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'show_in_rest'=>true,
        'menu_icon'=>"dashicons-images-alt",
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    
    // Registering your Custom Post Type
    register_post_type( 'homesliders', $args );    
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type_Homeslider' );




add_filter( 'projects_enqueue_styles', '__return_false' );





//wrappuing single product with container

add_action( "woocommerce_before_single_product", "wrapwithcontainter" );
function wrapwithcontainter(){
echo '<div class="container singleprodyct" style="margin-top:5rem;">';
}

add_action( "woocommerce_after_single_product", "wrapwithcontainter_end" );

function wrapwithcontainter_end(){
	echo '</div>';
}

remove_action( "woocommerce_sidebar", "woocommerce_get_sidebar", 10 );



/**
 * @snippet       Change Gallery Columns @ Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=20518
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.4
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_filter ( 'woocommerce_product_thumbnails_columns', 'bbloomer_change_gallery_columns' );
 
function bbloomer_change_gallery_columns() {
     return 1; 
}add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );
/** 
 * Filer WooCommerce Flexslider options - Add Navigation Arrows
 */
function sf_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;

    return $options;
}

// function wrapwithcontainer(){
// 	echo '<div class="flowbanner">';
// 	echo '</div>';
	

// }

// add_action( "woocommerce_archive_description", "wrapwithcontainer");



/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}



function cart_wrapper(){
	echo "<div class='container'>";
}

add_action( "woocommerce_before_cart","cart_wrapper");

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );
add_filter( 'woocommerce_account_menu_items', 'custom_remove_downloads_my_account', 999 );
 
function custom_remove_downloads_my_account( $items ) {
unset($items['downloads']);
return $items;
}

/**
 * @snippet       WooCommerce User Login Shortcode
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 4.0
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_shortcode( 'wc_login_form_bbloomer', 'bbloomer_separate_login_form' );
  
function bbloomer_separate_login_form() {
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return; 
   ob_start();
   woocommerce_login_form( array( 'redirect' => 'https://custom.url' ) );
   return ob_get_clean();
}


/**
 * @snippet       WooCommerce User Registration Shortcode
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 4.0
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
   
add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
    
function bbloomer_separate_registration_form() {
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return;
   ob_start();
 
   // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
   // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
 
   do_action( 'woocommerce_before_customer_login_form' );
 
   ?>
      <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
 
         <?php do_action( 'woocommerce_register_form_start' ); ?>
 
         <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
 
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
               <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
               <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>
 
         <?php endif; ?>
 
         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
         </p>
 
         <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
 
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
               <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
               <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
            </p>
 
         <?php else : ?>
 
            <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
 
         <?php endif; ?>
 
         <?php do_action( 'woocommerce_register_form' ); ?>
 
         <p class="woocommerce-FormRow form-row">
            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
         </p>
 
         <?php do_action( 'woocommerce_register_form_end' ); ?>
 
      </form>
 
   <?php
     
   return ob_get_clean();
}

/**
 * @snippet       Calculate Subtotal Based on Quantity - WooCommerce Single Product
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
// add_action( 'woocommerce_after_add_to_cart_button', 'bbloomer_product_price_recalculate' );
 
// function bbloomer_product_price_recalculate() {
//    global $product;
//    echo '<div id="subtot" style="display:inline-block;">Total: <span></span></div>';
//    $price = $product->get_price();
//    $currency = get_woocommerce_currency_symbol();
//    wc_enqueue_js( "      
//       $('[name=quantity]').on('input change', function() { 
//          var qty = $(this).val();
//          var price = '" . esc_js( $price ) . "';
//          var price_string = (price*qty).toFixed(2);
//          $('#subtot > span').html('" . esc_js( $currency ) . "'+price_string);
//       }).change();
//    " );
// }


/**
 * @snippet       Display RRP/MSRP @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WC 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
// -----------------------------------------
// 1. Add RRP field input @ product edit page
  
add_action( 'woocommerce_product_options_pricing', 'bbloomer_add_RRP_to_products' );      
  
function bbloomer_add_RRP_to_products() {          
    woocommerce_wp_text_input( array( 
        'id' => 'rrp', 
        'class' => 'short wc_input_price', 
        'label' => __( 'RRP', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')',
        'data_type' => 'price', 
    ));      
}
  
// -----------------------------------------
// 2. Save RRP field via custom field
  
add_action( 'save_post_product', 'bbloomer_save_RRP' );
  
function bbloomer_save_RRP( $product_id ) {
    global $pagenow, $typenow;
    if ( 'post.php' !== $pagenow || 'product' !== $typenow ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( isset( $_POST['rrp'] ) ) {
    if ( $_POST['rrp'] )
        update_post_meta( $product_id, 'rrp', $_POST['rrp'] );
    } else delete_post_meta( $product_id, 'rrp' );
}
  
// -----------------------------------------
// 3. Display RRP field @ single product page
  
add_action( 'woocommerce_single_product_summary', 'bbloomer_display_RRP', 9 );
  
function bbloomer_display_RRP() {
    global $product;
    if ( $product->get_type() <> 'variable' && $rrp = get_post_meta( $product->get_id(), 'rrp', true ) ) {
        echo '<div class="woocommerce_rrp">';
        _e( 'Retail Price: ', 'woocommerce' );
        echo '<span>' . wc_price( $rrp ) . '</span>';
        echo '</div>';
    }
}



remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

function woocommerce_template_single_excerpt() {
        return;
}


// add_filter('add_to_cart_redirect', 'cw_redirect_add_to_cart');
// function cw_redirect_add_to_cart() {
//     global $woocommerce;
//     $cw_redirect_url_checkout = $woocommerce->cart->get_checkout_url();
//     return $cw_redirect_url_checkout;
// }

// add_filter( 'woocommerce_product_single_add_to_cart_text', 'cw_btntext_cart' );
// add_filter( 'woocommerce_product_add_to_cart_text', 'cw_btntext_cart' );
// function cw_btntext_cart() {
//     return __( 'Order Now', 'woocommerce' );
// }


//Only show products in the front-end search results
function lw_search_filter_pages($query) {
    if ($query->is_search) {
        $query->set('post_type', 'product');
        $query->set( 'wc_query', 'product_query' );
    }
    return $query;
}
 
add_filter('pre_get_posts','lw_search_filter_pages');

add_filter( 'woocommerce_price_trim_zeros', '__return_true' ); 


// Function to change add to cart text on product archives pages
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Buy Now', 'woocommerce' );
}

// Change add to cart text on a single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Buy Now', 'woocommerce' ); 
} 

/**
 * @snippet       Redirect to Checkout Upon Add to Cart - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    Woo 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_filter( 'woocommerce_add_to_cart_redirect', 'bbloomer_redirect_checkout_add_cart' );
 
function bbloomer_redirect_checkout_add_cart() {
   return wc_get_checkout_url();
}