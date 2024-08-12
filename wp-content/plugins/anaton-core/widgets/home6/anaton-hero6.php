<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton hero6 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_hero6_Widget extends \Elementor\Widget_Base {

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
        return 'hero6';
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
        return esc_html__( 'Home One hero6 Section', 'anaton-core' );
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
                'label' => esc_html__( 'Hero Section Images', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'bgimg',
            [
                'label'     => esc_html__( 'BG Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Main Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

         $this->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Image One', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'img3',
            [
                'label'     => esc_html__( 'Image Two', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'img4',
            [
                'label'     => esc_html__( 'Image Three', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Hero Section Content', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contact_shortcode',
            [
                'label'         => esc_html__( 'Contact Form Shortcode', 'dustra-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'rows'          => 2,
                'placeholder'   => esc_html__( 'Put your shortcode Here', 'dustra-core' ),
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

        $hero6_output = $this->get_settings_for_display(); ?>

    <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-style-six-area bg-cover overflow-hidden" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $hero6_output['bgimg']['id'], 'full' ));?>
);">

        <!-- Single Item -->
        <div class="banner-style-six">
            <div class="container">
                <div class="content">
                    
                    <div class="row align-center">
                        <div class="col-xl-6 col-lg-6 pr-80 pr-md-15 pr-xs-15">
                            <div class="information mt--70">
                                <h2 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms"><?php echo $hero6_output['title']; ?></h2>
                                <p class="wow fadeInUp"  data-wow-delay="900ms" data-wow-duration="400ms">
                                    <?php echo esc_html($hero6_output['des']); ?>
                                </p>
                                <?php echo do_shortcode($hero6_output['contact_shortcode']);?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 pl-60 pl-md-15 pl-xs-15">
                            <div class="thumb">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero6_output['img1']['id'], 'full' ));?>" alt="Thumb">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero6_output['img2']['id'], 'full' ));?>" class="wow fadeInLeft" alt="Thumb">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero6_output['img3']['id'], 'full' ));?>" class="wow fadeInRight" data-wow-delay="500ms" alt="Thumb">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero6_output['img4']['id'], 'full' ));?>" class="wow fadeInLeft" data-wow-delay="1000ms" alt="Thumb">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Item -->
    </div>
    <!-- End Banner -->

    <?php }

}