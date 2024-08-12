<?php

/**
 * Anaton functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package anaton
 */

/**
 * Required Files
 */

require_once get_template_directory() . '/inc/anaton-class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/redux/config.php';

/*TGM PLUGIN*/

require_once get_template_directory() . '/tgm-plugin/recommend_plugins.php';

/**
 * Enqueue Google Fonts
 */

function anaton_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'anaton' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Outfit:100,200,300,400,500,600,700,800,900&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
        }
    return $font_url;
}

/**
 * Register and Enqueue Styles.
 */

function anaton_register_styles() {
    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

    wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/css/themify-icons.css' );

    wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/css/elegant-icons.css' );

    wp_enqueue_style( 'flaticons', get_template_directory_uri() . '/css/flaticon-set.css' );

    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );

    wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.min.css' );

    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );

    wp_enqueue_style( 'anaton-validnavs', get_template_directory_uri() . '/css/validnavs.css' );

    wp_enqueue_style( 'anaton-helper', get_template_directory_uri() . '/css/helper.css' );

    wp_enqueue_style( 'anaton-unittest', get_template_directory_uri() . '/css/unit-test.css' );

    wp_enqueue_style( 'anaton-style', get_template_directory_uri() . '/css/style.css' );
    
    wp_enqueue_style( 'anaton-unittest', get_template_directory_uri() . '/css/unit-test.css' );

    wp_enqueue_style( 'anaton-fonts', anaton_fonts_url(), array(), '1.0.0' );

}
add_action( 'wp_enqueue_scripts', 'anaton_register_styles' );


/**
 * Register and Enqueue Scripts.
 */

function anaton_register_scripts() {

    wp_enqueue_script(
        'bootstrap-bundle',
        get_template_directory_uri() . '/js/bootstrap.bundle.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'jquery-appear',
        get_template_directory_uri() . '/js/jquery.appear.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'jquery-easing',
        get_template_directory_uri() . '/js/jquery.easing.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'magnific-popup',
        get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'modernizr',
        get_template_directory_uri() . '/js/modernizr.custom.13711.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'swiper',
        get_template_directory_uri() . '/js/swiper-bundle.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'wow',
        get_template_directory_uri() . '/js/wow.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'progress-bar',
        get_template_directory_uri() . '/js/progress-bar.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'circle-progress',
        get_template_directory_uri() . '/js/circle-progress.js',
        array( 'jquery' ),
        '',
        true
    );

     wp_enqueue_script(
        'isotope',
        get_template_directory_uri() . '/js/isotope.pkgd.min.js',
        array( 'jquery' ),
        '',
        true
    );

     wp_enqueue_script(
        'imagesloaded'
    );

    wp_enqueue_script(
        'jquery-nice-select',
        get_template_directory_uri() . '/js/jquery.nice-select.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'count-to',
        get_template_directory_uri() . '/js/count-to.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'jquery-scrolla',
        get_template_directory_uri() . '/js/jquery.scrolla.min.js',
        array( 'jquery' ),
        '',
        true
    );


   wp_enqueue_script(
        'ytplayer',
        get_template_directory_uri() . '/js/YTPlayer.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'tweenmax',
        get_template_directory_uri() . '/js/TweenMax.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'typed',
        get_template_directory_uri() . '/js/typed.js',
        array( 'jquery' ),
        '',
        true
    );

   wp_enqueue_script(
        'anaton-validnavs',
        get_template_directory_uri() . '/js/validnavs.js',
        array( 'jquery' ),
        '',
        true
    );

   wp_enqueue_script(
        'anaton-main',
        get_template_directory_uri() . '/js/main.js',
        array( 'jquery' ),
        '',
        true
    );
}

add_action( 'wp_enqueue_scripts', 'anaton_register_scripts' );

/**
 * anaton Theme Configuration
 */

function anaton_theme_config(){

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

        add_image_size( 'anaton-blog-widget', 800, 600, true);
	 	add_image_size( 'anaton-two-column', 600, 450, true);
		add_image_size( 'anaton-three-column', 390, 290, true);
        add_image_size( 'anaton-blog-standard', 1017, 572, false);
        add_image_size( 'anaton-blog-sidebar', 790, 440, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',

        ) );

    if ( ! isset( $content_width ) ) $content_width = 900;

    $anaton_lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('anaton', $anaton_lang);

    if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
            register_nav_menus(
                array(
                'main-menu' => esc_html__( 'Main Menu', 'anaton' ),
                'footer-menu1' => esc_html__( 'Company Links', 'anaton' ),
                'footer-menu2' => esc_html__( 'Community Links', 'anaton' ),
                )
            ); 
        } else
        {
            register_nav_menus(
                array(
                'main-menu' => esc_html__( 'Main Menu', 'anaton' ),
                )
            ); 
        }

    

}

add_action( 'after_setup_theme', 'anaton_theme_config' , 0 );

function anaton_pagination() {

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) return; 

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'prev_text' => wp_specialchars_decode('<i class="fas fa-angle-double-left"></i>',ENT_QUOTES),
        'next_text' => wp_specialchars_decode('<i class="fas fa-angle-double-right"></i>',ENT_QUOTES),
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
    ) );
    $output = '';

    if ( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var( 'paged' );

        $output .=  '<ul class="pagination">';
        foreach ( $pages as $page ) {
            $output .= "<li class='page-item'>$page</li>";
        }
        $output .= '</ul>';

        // Create an instance of DOMDocument 
        $dom = new \DOMDocument();

        // Populate $dom with $output, making sure to handle UTF-8, otherwise
        // problems will occur with UTF-8 characters.
        $dom->loadHTML( mb_convert_encoding( $output, 'HTML-ENTITIES', 'UTF-8' ) );

        // Create an instance of DOMXpath and all elements with the class 'page-numbers' 
        $xpath = new \DOMXpath( $dom );

        // http://stackoverflow.com/a/26126336/3059883
        $page_numbers = $xpath->query( "//*[contains(concat(' ', normalize-space(@class), ' '), ' page-numbers ')]" );

        // Iterate over the $page_numbers node...
        foreach ( $page_numbers as $page_numbers_item ) {

            // Add class="mynewclass" to the <li> when its child contains the current item.
            $page_numbers_item_classes = explode( ' ', $page_numbers_item->attributes->item(0)->value );
            if ( in_array( 'current', $page_numbers_item_classes ) ) {          
                $list_item_attr_class = $dom->createAttribute( 'class' );
                $list_item_attr_class->value = 'page-item';
                $page_numbers_item->parentNode->appendChild( $list_item_attr_class );
            }

            // Replace the class 'current' with 'active'
            $page_numbers_item->attributes->item(0)->value = str_replace( 
                            'current',
                            'active',
                            $page_numbers_item->attributes->item(0)->value );

            // Replace the class 'page-numbers' with 'page-link'
            $page_numbers_item->attributes->item(0)->value = str_replace( 
                            'page-numbers',
                            'page-link',
                            $page_numbers_item->attributes->item(0)->value );
        }

        // Save the updated HTML and output it.
        $output = $dom->saveHTML();
    }

    return $output;
}

add_filter( 'widget_tag_cloud_args', 'anaton_change_tag_cloud_font_sizes');
function anaton_change_tag_cloud_font_sizes( array $args ) {
    $args['default'] = '13';
    $args['smallest'] = '13';
    $args['largest'] = '13';
    $args['unit'] = 'px';

    return $args;
}

/**
 * Anaton Register Widgets
 */

add_action( 'widgets_init', 'anaton_widgets_init' );
function anaton_widgets_init() {

        register_sidebar( array(
        'name' => esc_html__( 'Main Sidebar', 'anaton' ),
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'anaton' ),
        'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
    'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ) );
}

// Anaton Comments Display

function anaton_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment;
   $gravatar = get_avatar($comment,$size='100' ); ?>
    <div class="comment-item">
        <div class="avatar">
        <?php echo get_avatar($comment,$size='80' ); ?>
        </div>
        <div class="content">
            <div class="title">
                <h5><?php printf( get_comment_author_link()) ?></h5>
                <span><?php the_time('F j, Y'); ?></span>
            </div>
                <?php comment_text() ?> 
			<div class='comments-info'>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <span class="unapproved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'anaton' ); ?></span>
                <?php endif; ?>
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text' => '<i class="fa fa-reply"></i>Reply' ) ) ) ?>
            </div>
        </div>
    </div>
<?php
}

function anaton_categories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post_count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','anaton_categories_postcount_filter');

function anaton_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'anaton' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'anaton' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}

// password protected form
add_filter('the_password_form','anaton_password_form',10,1);
function anaton_password_form( $output ) {
    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post"><div class="theme-input-group">
        <input name="post_password" type="password" class="theme-input-style" placeholder="'.esc_attr__( 'Enter Password','anaton' ).'">
        <button type="submit" class="submit-btn btn-fill">'.esc_html__( 'Enter','anaton' ).'</button></div></form>';
    return $output;
}

/**
 * Anaton PreDefined Imports
 */

function anaton_import_files() {
    return array(
        array(
            'import_file_name'           => 'Home Version One',
            'categories'                 => array( 'MultiPage' ),
            'import_file_url'            => 'https://wpriverthemes.com/import/anaton/data.xml',
            'import_widget_file_url'     => 'https://wpriverthemes.com/import/anaton/widget.wie',
            'import_customizer_file_url' => 'https://wpriverthemes.com/import/anaton/custom.dat',
            'import_redux'               => array(
                array(
                    'file_url'    => 'https://wpriverthemes.com/import/anaton/redux.json',
                    'option_name' => 'anaton_options',
                ),
            ),
            'import_preview_image_url'   => 'https://wpriverthemes.com/import/anatonelem/preview/index-1.jpeg',
            'import_notice'                => esc_html__( 'Import process may take 2-5 minutes. If you facing any issues please contact our support.', 'anaton' ),
            'preview_url'                => 'https://wpriverthemes.com/anaton/',
        ),

    );
}
add_filter( 'pt-ocdi/import_files', 'anaton_import_files' );