<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton testimonial Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_testimonial_Widget extends \Elementor\Widget_Base {

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
        return 'testimonial1';
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
        return esc_html__( 'Home One Testimonial Section', 'anaton-core' );
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
            'content_section',
            [
                'label' => esc_html__( 'Testimonial Title Section', 'anaton-core' ),
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
            'bgimg',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
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
                'label' => esc_html__( 'Testimonial Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

         $repeater->add_control(
            'name', [
                'label'         => esc_html__( 'Name', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'job', [
                'label'         => esc_html__( 'Job', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Testimonials', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Testimonials', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
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

        $testimonial_output = $this->get_settings_for_display(); ?>

        <!-- Start Testimonials 
    ============================================= -->
    <div class="testimonials-area bg-gray default-padding-bottom" style="background-image: url(<?php echo esc_url($testimonial_output['bgimg']['url']);?>);">

        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content-left">
                            <h2 class="title"><?php echo esc_html($testimonial_output['title']); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-stage">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonail-item-one-items">
                        <!-- Navigation -->
                        <div class="testimonial-nav">
                            <div class="testimonial-button-prev"></div>
                            <div class="testimonial-button-next"></div>
                        </div>
                        <div class="carousel-stage-right swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php
                                    if(!empty($testimonial_output['list1'])):
                                    foreach ($testimonial_output['list1'] as $testimonial_output_box):?>
                                <!-- Single Item -->
                                <div class="swiper-slide">
                                    <div class="testimonial-style-one">
                                        <p>
                                            <?php echo esc_html($testimonial_output_box['des']); ?>
                                        </p>
                                        <div class="privider">
                                            <div class="thumb">
                                                <img src="<?php echo esc_url($testimonial_output_box['img']['url']);?>" alt="Thumb">
                                            </div>
                                            <div class="info">
                                                <h4><?php echo esc_html($testimonial_output_box['name']); ?></h4>
                                                <span><?php echo esc_html($testimonial_output_box['job']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <?php endforeach; endif;?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <!-- End Testimonials -->

    <?php }

}