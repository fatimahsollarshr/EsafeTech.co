<?php
/*
 * Template Name: Blog With Sidebar 
 */
get_header('v1'); ?>


<!-- Start Breadcrumb 
============================================= -->
<div class="breadcrumb-area text-center bg-dark text-light" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1><?php the_title(); ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> <?php esc_html_e( 'Home', 'anaton' )?></a></li>
                        <li class="active"><?php esc_html_e( 'Blog', 'anaton' )?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Blog
============================================= -->
<div class="blog-area full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="blog-content col-xl-8 col-lg-7 col-md-12 pr-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15">
                    <div class="blog-item-box">
                        <?php $args = array(    
            'paged' => $paged,
            'post_type' => 'post',
            );
        $wp_query = new WP_Query($args);
        while (have_posts()): the_post(); 

            get_template_part( 'template-parts/content', 'single' );

    endwhile; 
     
    ?>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 pagi-area text-center">
                            <?php echo anaton_pagination(); ?>
                        </div>
                    </div>
                </div>

                <!-- Start Sidebar -->
                <div class="sidebar col-xl-4 col-lg-5 col-md-12 mt-md-50 mt-xs-50">
                    <aside>
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
                <!-- End Start Sidebar -->

            </div>
        </div>
    </div>
</div>
<!-- End Blog -->


<?php get_footer('v1'); ?>