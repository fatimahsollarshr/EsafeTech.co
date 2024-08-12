<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton about6 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_about6_Widget extends \Elementor\Widget_Base {

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
        return 'about6';
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
        return esc_html__( 'Home Six About Section', 'anaton-core' );
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
                'label' => esc_html__( 'About Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'img',
            [
                'label'     => esc_html__( 'Main Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Image Two', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Image Three', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list', [
                'label'         => esc_html__( 'List', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{list}}}',
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

        $about6_output = $this->get_settings_for_display(); ?>

        <!-- Start About 
    ============================================= -->
    <div class="about-style-five-area default-padding bg-gray">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6">
                    <div class="about-six-thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about6_output['img']['id'], 'full' ));?>" alt="Image Not Found">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about6_output['img1']['id'], 'full' ));?>" alt="Image Not Found">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $about6_output['img2']['id'], 'full' ));?>" alt="Image Not Found">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="about-style-sixe">
                        <h2 class="title mb-25"><?php echo esc_html($about6_output['title']); ?></h2>
                        <p>
                            <?php echo esc_html($about6_output['des']); ?>
                        </p>
                        <ul class="list-circle mt-30">
                            <?php
                            if(!empty($about6_output['list1'])):
                            foreach ($about6_output['list1'] as $about6_output_box):?>
                            <li><?php echo esc_html($about6_output_box['list']); ?></li>
                            <?php endforeach; endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <?php }

}