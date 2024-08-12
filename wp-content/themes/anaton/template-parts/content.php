<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package anaton
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- Single Item -->
<div class="blog-style-one item">
    <div class="thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('anaton-blog-standard'); ?></a>
    </div>
    <div class="info">
        <div class="meta">
            <ul>
				<li>
                    <i class="fas fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) ?>"><?php echo esc_html( get_the_author() ) ?></a>
                </li>
                <li>
                    <i class="fas fa-calendar-alt"></i> <?php the_time(get_option('date_format')) ?>
                </li>
            </ul>
        </div>
        <h2>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
            <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="button-regular">
            <?php esc_html_e ('Continue Reading','anaton' ); ?> <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>
<!-- Single Item -->
</div>