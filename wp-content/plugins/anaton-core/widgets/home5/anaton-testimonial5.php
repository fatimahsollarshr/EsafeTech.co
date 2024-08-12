<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton testimonial5 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_testimonial5_Widget extends \Elementor\Widget_Base {

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
        return 'testimonial5';
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
        return esc_html__( 'Home Five Testimonial Section', 'anaton-core' );
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
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'testimonial-style-three-area overflow-hidden default-padding', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Testimonail Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Image', 'anaton-core' ),
                    ],
                ],
                'title_field' => 'image',
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

        $testimonial5_output = $this->get_settings_for_display(); ?>

       <!-- Start Testimonials
    ============================================= -->
    <div class="<?php echo esc_html($testimonial5_output['class']); ?>">

        <div class="testimonial-shape">
            <?php
                                    if(!empty($testimonial5_output['list2'])):
                                    foreach ($testimonial5_output['list2'] as $testimonial5_output_box1):?>
             <?php if(!empty($testimonial5_output_box1['img1']['url'] )): ?>
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $testimonial5_output_box1['img1']['id'], 'full' ));?>" alt="Image Not Found">
        <?php endif; ?>
           <?php endforeach; endif;?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading secondary text-center">
                        <h2 class="heading"> <?php echo $testimonial5_output['title']; ?></h2>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-style-two-carousel swiper text-center">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php
                                    if(!empty($testimonial5_output['list1'])):
                                    foreach ($testimonial5_output['list1'] as $testimonial5_output_box):?>
                            <!-- Single item -->
                            <div class="swiper-slide">
                                <div class="testimonial-style-three">
                                    
                                    <div class="item">
                                        <div class="icon">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $testimonial5_output_box['img']['id'], 'full' ));?>" alt="Image Not Found">
                                        </div>
                                        <div class="content">
                                            <p>
                                                <?php echo esc_html($testimonial5_output_box['des']); ?>
                                            </p>
                                        </div>
                                        <div class="provider">
                                            <div class="info">
                                                <h4><?php echo esc_html($testimonial5_output_box['name']); ?></h4>
                                                <span><?php echo esc_html($testimonial5_output_box['job']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single item -->
                            <?php endforeach; endif;?>
                            
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination testimonial-three-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <?php }

}