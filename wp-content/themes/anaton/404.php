<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anaton
 */

if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_header('v1');
}
else {
    get_header();
}
?>

<!-- Start Breadcrumb 
============================================= -->
<div class="breadcrumb-area text-center bg-dark text-light" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/img/shape/42.png'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1><?php esc_html_e( 'Error Page', 'anaton' )?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> <?php esc_html_e( 'Home', 'anaton' )?></a></li>
                        <li class="active"><?php esc_html_e( '404', 'anaton' )?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start 404 
============================================= -->
<div class="error-page-area default-padding text-center">
    <!-- Shape -->
    <div class="shape-left" style="background: url(<?php echo esc_url(get_template_directory_uri() . '/img/shape/44-left.png'); ?>);"></div>
    <div class="shape-right" style="background: url(<?php echo esc_url(get_template_directory_uri() . '/img/shape/44-right.png'); ?>);"></div>
    <!-- End Shape -->
    <div class="container">
        <div class="error-box">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1><?php esc_html_e( '404', 'anaton' )?></h1>
                    <h2><?php esc_html_e( 'SORRY PAGE WAS NOT FOUND!', 'anaton' )?></h2>
                    <a class="btn mt-20 btn-md btn-theme" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e( 'Back to home', 'anaton' )?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End 404 -->

<?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_footer('v1');
}
else {
    get_footer();
}