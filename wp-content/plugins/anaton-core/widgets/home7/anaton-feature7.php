<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton feature7 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_feature7_Widget extends \Elementor\Widget_Base {

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
        return 'feature7';
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
        return esc_html__( 'Home Seven Feature Section', 'anaton-core' );
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
                'label' => esc_html__( 'Feature Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bgimg',
            [
                'label'     => esc_html__( 'Text BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'bgimg1',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'text1', [
                'label'         => esc_html__( 'Text One', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'text2', [
                'label'         => esc_html__( 'Text Two', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
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
                'label'     => esc_html__( 'Features', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{title}}}',
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

        $feature7_output = $this->get_settings_for_display(); ?>

        <!-- Start Feature 
    ============================================= -->
    <div class="feature-style-four-area default-padding bottom-less overflow-hidden">
        <div class="container">
            <div class="site-heading text-center">
                <div class="row">
                    <div class="col-xl-12">
                        <h4 class="bg-text" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $feature7_output['bgimg']['id'], 'full' ));?>);"><?php echo esc_html($feature7_output['text1']);?> <br> <b><?php echo esc_html($feature7_output['text2']);?></b></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="feature-style-four-items">
                <div class="shape-left-top">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $feature7_output['bgimg1']['id'], 'full' ));?>" alt="Image not Found">
                </div>
                <div class="row">
                    <?php
                            if(!empty($feature7_output['list1'])):
                            foreach ($feature7_output['list1'] as $feature7_output_box):?>
                    <!-- Single item -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="feature-style-four">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $feature7_output_box['img']['id'], 'full' ));?>" alt="Image Not Found">
                            <h4><?php echo esc_html($feature7_output_box['title']);?></h4>
                            <p>
                                <?php echo esc_html($feature7_output_box['des']);?>
                            </p>
                        </div>
                    </div>
                    <!-- End Single item -->
                    <?php endforeach; endif;?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Feature -->

    <?php }

}