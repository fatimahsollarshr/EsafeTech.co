<?php
global $anaton_options;
/**
 * Header file for the anaton WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anaton
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Anaton - SaaS Landing Page Template">

    <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="<?php echo esc_url($anaton_options['favicon']['url']); ?>" type="image/x-icon">
    <?php } wp_head(); ?>

    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php if($anaton_options['pre_text_option'] == true ){ ?>
    <!-- Start Preloader 
    ============================================= -->
    <div id="preloader">
        <div id="anaton-preloader" class="anaton-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">

                    <?php $chars = str_split($anaton_options['anaton_preloader_text']);
                    foreach ($chars as $char) {
                        echo '<span data-text-preloader="'.esc_attr($char).'" class="letters-loading"> '.esc_html($char).' </span>';
                    } ?>

                </div>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->
<?php } ?>
    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed white no-background">

            <div class="container d-flex justify-content-between align-items-center">            
                
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($anaton_options['logo1']['url']); ?>" class="logo logo-display" alt="<?php echo esc_attr__( 'Logo', 'anaton' )?>">
                        <img src="<?php echo esc_url($anaton_options['logo2']['url']); ?>" class="logo logo-scrolled" alt="<?php echo esc_attr__( 'Logo', 'anaton' )?>">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="navbar-menu-responsive">

                    <img src="<?php echo esc_url($anaton_options['logo2']['url']); ?>" alt="Logo">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>
                    

                <!-- Collect the nav links, forms, and other content for toggling -->

                    <?php 
                    wp_nav_menu( array(
                    'theme_location'  => 'main-menu',
                    'depth'           => 8, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'ul',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'navbar-menu',
                    'menu_class'      => 'nav navbar-nav navbar-center',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>',
                    'walker'          => new Anaton_Bootstrap_Navwalker(),
                    ) );
                ?>

                </div> <!-- /.navbar-collapse -->

                <div class="attr-right">
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav">
                        <ul>
                            <li class="button border-btn">
                                <a href="<?php echo esc_url($anaton_options['h_btlink1']); ?>"><?php echo esc_html($anaton_options['h_bttext1']); ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Atribute Navigation -->

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->

            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header -->