<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton blog Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_blog_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'blog';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Blog Section', 'anaton-core' );
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'anaton' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Home One Blog Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'class',[
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'blog-area home-blog default-padding bottom-less', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            't_class',[
                'label'         => esc_html__( 'Title Class', 'anaton-core' ),
                'default'         => esc_html__( 'sub-title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        

        $this->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'sub', [
                'label'         => esc_html__( ' Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'slug', [
                'label'         => esc_html__( 'Category Slug', 'anaton-core' ),
                'description' => esc_html__( 'Display Three Latest Post From Category or Leave empty to display three latest post', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $blog_output = $this->get_settings_for_display(); ?>

       <!-- Start Blog 
============================================= -->
<div class="<?php echo esc_html($blog_output['class']); ?>">
    <?php if(!empty($blog_output['title'] && $blog_output['sub'] )): ?>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h5 class="<?php echo esc_attr($blog_output['t_class']); ?>"><?php echo esc_html($blog_output['title']); ?></h5>
                    <h2 class="title"><?php echo esc_html($blog_output['sub']); ?></h2>
                </div>
            </div>
        </div>
    </div>
        <?php else: ?>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h2 class="heading"><?php echo $blog_output['title']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    <div class="container">
        <div class="row">
            <?php if (empty($blog_output['slug'])) {
        $qry_args = array(
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
      );
    }
            else {
        $qry_args = array(
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
        'category_name' => $blog_output['slug'],
    ); }

    $qry = new WP_Query( $qry_args );

    if( $qry->have_posts() ) {

                while ( $qry->have_posts() ) : $qry->the_post(); ?>

            <!-- Single Item -->
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="blog-style-one">
                    <div class="thumb">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('anaton-blog-widget'); ?></a>
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
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <a href="<?php the_permalink(); ?>" class="button-regular">
                            <?php esc_html_e ('Continue Reading','anaton' ); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            <?php
                endwhile;
                
                //Reset Post Data
                wp_reset_postdata(); } ?>
        </div>
    </div>
</div>
<!-- End Blog -->

    <?php }

}