<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton hero3 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_hero3_Widget extends \Elementor\Widget_Base {

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
        return 'hero3';
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
        return esc_html__( 'Home Three Hero Section', 'anaton-core' );
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

    public function get_script_depends() {
        return array('main');
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
            'content_section1',
            [
                'label' => esc_html__( 'Hero Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bgimg',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'bgimg1',
            [
                'label'     => esc_html__( 'BG Image Two', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
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
            'bticon1', [
                'label'         => esc_html__( 'Button Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bttext1', [
                'label'         => esc_html__( 'Button Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'btlink1',
            [
                'label'         => esc_html__( ' Button Link', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'anaton-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        $this->add_control(
            'img',
            [
                'label'     => esc_html__( 'Hero Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Hero Image Two', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'img3',
            [
                'label'     => esc_html__( 'Hero Image Three', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
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

        $hero3_output = $this->get_settings_for_display(); ?>

      <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-style-three-area overflow-hidden" style="background-image: url(<?php echo esc_url($hero3_output['bgimg']['url']);?>);">

        <div class="banner-shape-left-top" style="background-image: url(<?php echo esc_url($hero3_output['bgimg1']['url']);?>);"></div>

        <!-- Single Item -->
        <div class="banner-style-three">
            <div class="container">
                <div class="content">
                    
                    <div class="row align-center">
                        <div class="col-xl-6 col-lg-6 pr-50 pr-md-15 pr-xs-15">
                            <div class="information">
                                <h2 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms"><?php echo $hero3_output['title']; ?></h2>
                                <p class="wow fadeInUp"  data-wow-delay="900ms" data-wow-duration="400ms">
                                    <?php echo esc_html($hero3_output['des']); ?>
                                </p>
                                <div class="button mt-40 wow fadeInUp"  data-wow-delay="1200ms" data-wow-duration="400ms">
                                    <a href="<?php echo esc_url($hero3_output['btlink1']['url']);?>" class="popup-youtube video-play-button with-text mt-20">
                                        <div class="effect"></div>
                                        <span><i class="<?php echo esc_attr($hero3_output['bticon1']); ?>"></i> <?php echo esc_html($hero3_output['bttext1']); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 pl-60 pl-md-15 pl-xs-15">
                            <div class="thumb">
                                <img class="wow fadeInDown" src="<?php echo esc_url($hero3_output['img']['url']);?>" alt="Thumb">
                                <div class="inner wow fadeInUp" data-wow-delay="600ms">
                                    <img src="<?php echo esc_url($hero3_output['img2']['url']);?>" alt="Thumb">
                                </div>
                                <div class="thumb-right wow fadeInRight" data-wow-delay="1000ms">
                                    <img src="<?php echo esc_url($hero3_output['img3']['url']);?>" alt="Thumb">
                                </div>
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