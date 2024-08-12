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
                <h1><?php esc_html_e('Search Results For : ' , 'anaton' ); echo get_search_query(); ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> <?php esc_html_e( 'Home', 'anaton' )?></a></li>
                        <li class="active"><?php esc_html_e( 'Search Results', 'anaton' )?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Blog
============================================= -->
<?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
<div class="blog-area full-blog default-padding">
    <?php } else : ?>
    <div class="blog-area full-blog blog-standard default-padding">
    <?php endif; ?>
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
                <div class="blog-content col-xl-8 col-lg-7 col-md-12 pr-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15">
                    <?php } else : ?>
                    <div class="blog-content col-xl-10 offset-xl-1 col-md-12">
                        <?php endif; ?>
                    <div class="blog-item-box">
                       <?php 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'single' );

    endwhile;  else : ?>
    <div class="search-custom side-bar" >
    <h2><?php esc_html_e( 'Nothing Found', 'anaton' ) ;?></h2>
    <p><?php
            // If no content, include the "No posts found" template.
            esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'anaton' ) ;?></p>
            <div class="sidebar-item search">
    <div class="sidebar-info">
		<div class="widget widget_search mb-0">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type='search' name="s" placeholder="<?php esc_attr_e( 'Search Here...', 'anaton' )?>" class="form-control search-fix" id="search-box" value="<?php the_search_query(); ?>" >
            <button class="button-fix" type="submit"><i class="fas fa-search"></i></button>
        </form>
		</div>
    </div>
</div>
            </div>

    <?php endif; 
    ?>

                    </div>
                    
                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 pagi-area text-center">
                            <?php echo anaton_pagination(); ?>
                        </div>
                    </div>
                </div>

                <?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
                <!-- Start Sidebar -->
                <div class="sidebar col-xl-4 col-lg-5 col-md-12 mt-md-50 mt-xs-50">
                    <aside>
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
                <!-- End Start Sidebar -->
                <?php } else : ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<!-- End Blog -->

<?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_footer('v1');
}
else {
    get_footer();
}