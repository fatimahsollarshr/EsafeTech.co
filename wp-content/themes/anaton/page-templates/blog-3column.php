<?php
/*
 * Template Name: Blog Three Column
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
    <div class="blog-area blog-grid-colum home-blog default-padding">
        <div class="container">
            <div class="row">
                        <?php $args = array(    
                            'paged' => $paged,
                            'post_type' => 'post',
                            );
                        $wp_query = new WP_Query($args);
                        while (have_posts()): the_post(); ?>
                        <!-- Single Item -->
                <div class="col-lg-4 mb-50">
                    <div class="blog-style-one">
                        <div class="thumb">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('anaton-three-column'); ?></a>
                        </div>
                        <div class="info">
                            <div class="meta">
                                <ul>
                                    <li>
                                        <?php echo get_the_author_link() ?>
                                    </li>
                                    <li>
                                        <?php the_time(get_option('date_format')) ?>
                                    </li>
                                </ul>
                            </div>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <a href="<?php the_permalink(); ?>" class="button-regular">
                                <?php esc_html_e ('Continue Reading','anaton' ); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <?php endwhile; ?>
            </div>
            <!-- Pagination -->
            <div class="row">
                <div class="col-md-12 pagi-area text-center">
                    <?php echo anaton_pagination(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->


<?php get_footer('v1'); ?>