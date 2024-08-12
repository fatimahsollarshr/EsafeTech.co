<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="blog-style-one item">

    <div class="blog-item-box">
       <?php if ( has_post_thumbnail() ) { ?>
        <div class="thumb">
       <?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('anaton-blog-sidebar'); ?></a>
		<?php } else : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('anaton-blog-standard'); ?></a>
		<?php endif; ?>
    </div>
		<?php } ?>
    <div class="info">
        <div class="meta">
            <ul>
                <li>
                    <i class="fas fa-user"></i> <?php echo get_the_author_link() ?>
                </li>
                <li>
                    <i class="fas fa-calendar-alt"></i> <?php the_time(get_option('date_format')) ?>
                </li>
            </ul>
        </div>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
        </div>
    </div>
</div>
</div>
<?php if(has_tag()) { ?>
<!-- Post Tags Share -->
<div class="post-tags share">
    <div class="tags">
        <h4><?php echo esc_html__( 'Tags', 'anaton' ); ?></h4>
        <?php the_tags('','',''); ?>
    </div>
</div>
<!-- Post Tags Share -->
<?php } ?>

<!-- Start Post Pagination -->
<div class="post-pagi-area">
    <?php if (empty(get_adjacent_post(false,'',true)->ID)) {} else { ?>
    <div class="post-previous">
        <a href="<?php echo get_permalink( get_adjacent_post(false,'',true)->ID ); ?>">
            <div class="icon"><i class="fas fa-angle-double-left"></i></div>
            <div class="nav-title"> <?php echo esc_html__( 'Prev Post', 'anaton' ); ?> <h5><?php echo get_the_title( get_adjacent_post(false,'',true)->ID ); ?></h5></div>
        </a>
    </div>
    <?php } ?>
    <?php if (empty(get_adjacent_post(false,'',false)->ID)) {} else { ?>
    <div class="post-next">
        <a href="<?php echo get_permalink( get_adjacent_post(false,'',false)->ID );  ?>">
            <div class="nav-title"><?php echo esc_html__( 'Next Post', 'anaton' ); ?> <h5><?php echo get_the_title( get_adjacent_post(false,'',false)->ID ); ?></h5></div> 
            <div class="icon"><i class="fas fa-angle-double-right"></i></div>
        </a>
    </div>
    <?php } ?>
</div>
<!-- End Post Pagination -->