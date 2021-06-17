<?php
/***********************************************************************************/
// Theme Dependencies
/***********************************************************************************/
function add_theme_scripts(){
    // Bootstrap
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css',false,'5.0.0','all');
    // Theme Style
    wp_enqueue_style( 'theme-style',  get_template_directory_uri() . '/assets/css/main.css' );
    // Fancybox Style
    wp_enqueue_style( 'fancyCss',  get_template_directory_uri() . '/assets/vendors/fancybox-master/dist/jquery.fancybox.min.css' );
    // SlickSlider Style
    wp_enqueue_style( 'slick-slider',  get_template_directory_uri() . '/assets/vendors/slick-1.8.1/slick/slick.css' );

    //personalizados******************************************************************************************
    wp_enqueue_style( 'reset-home-style',  get_template_directory_uri() . '/assets/css/reset.css');
    wp_enqueue_style( 'home-style',  get_template_directory_uri() . '/assets/css/home.css');


    // Bootstrap Script
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendors/bootstrap-5.0.0-beta2-dist/js/bootstrap.bundle.min.js', array('jquery'), '5.0.0', true );
    // Slick Slider
    wp_enqueue_script( 'slick-slider-js', get_template_directory_uri() . '/assets/vendors/slick-1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
    // fancybox
    wp_enqueue_script( 'fancyboxjs', get_template_directory_uri() . '/assets/vendors/fancybox-master/dist/jquery.fancybox.min.js', array('jquery'), null, true );

    
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/***********************************************************************************/
// Theme Supports
/***********************************************************************************/
// Theme Support
add_theme_support( 'post-thumbnails' );
// Theme Title Support
add_theme_support('title-tag');
// Theme Thumbnail Support and Sizes
add_theme_support('post-thumbnails');
// Theme Custom Logo Support
add_theme_support( 'custom-logo' );
add_image_size( 'custom-size', 220, 180, true ); // 220 pixels wide by 180 pixels tall, hard crop mode

/***********************************************************************************/
// Theme Functions
/***********************************************************************************/
// Title Truncate
function titulo($max) {
    $titulo = get_the_title(); /* or you can use get_the_title() */
    $getlength = strlen($titulo);
    $thelength = $max;
    if($getlength > $max) {
        echo substr($titulo, 0, $thelength) . "...";
    } else {
        echo $titulo;
    }
}

// Image sets
if(isset($content_width)){
    $content_width = 1170; //pixels - Max Bootstrap width
}

// Paginacao
function paginacao() {
    if( is_singular() )
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="paginacao"><ul  class="list-unstyled list-inline">' . "\n";
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="txt">%s</li>' . "\n", get_previous_posts_link() );
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)),'1');
        if ( ! in_array( 2, $links ) )
        echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
        echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="txt">%s</li>' . "\n", get_next_posts_link() );
    echo '</ul"></div>' . "\n";
}


/***********************************************************************************/
// Theme Widgets
/***********************************************************************************/
/**
 * Register three Rede Wordpress MS 2015 widget areas.
 *
 * @since Rede Wordpress
 */
function sindifiscoms_footer_widget() {

    register_sidebar( array(
        'name'          => 'Widget Footer',
        'id'            => 'footer-widgets',
        'description'   => 'Widgets para o footer',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s col-12 col-sm-6  col-lg-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="footer-widget-title">',
        'after_title'   => '</h6>',
    ) );
}
add_action( 'widgets_init', 'sindifiscoms_footer_widget' );


/***********************************************************************************/
// Theme Menu
/***********************************************************************************/
// Menu Register
function register_my_menus() {
    register_nav_menus(
        array(
        'header-menu' => __( 'Header Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );
