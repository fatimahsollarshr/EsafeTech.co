<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton work5 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_work5_Widget extends \Elementor\Widget_Base {

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
        return 'work5';
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
        return esc_html__( 'Home Five Work Section', 'anaton-core' );
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
                'label' => esc_html__( 'Work Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
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
            'sub', [
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'p_class', [
                'label'         => esc_html__( 'Active Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'p_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'p_des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'p_list', [
                'label'         => esc_html__( 'List', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Work List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Work', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ p_title }}}',
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

        $work5_output = $this->get_settings_for_display(); ?>

        <!-- Start Work Process 
    ============================================= -->
    <div class="process-style-two-area default-padding bg-gray bg-fixed overflow-hidden" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $work5_output['img']['id'], 'full' ));?>);">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading-left">
                        <h5 class="sub-heading theme"><?php echo esc_html($work5_output['title']); ?></h5>
                        <h2 class="heading"><?php echo esc_html($work5_output['sub']); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="process-style-two-items">
                <div class="row">
                    <!-- Signle Item -->
                    <?php
                            if(!empty($work5_output['list1'])):
                            foreach ($work5_output['list1'] as $work5_output_box):?>
                    <div class="col-lg-4">
                        <div class="process-style-two <?php echo esc_attr($work5_output_box['p_class']); ?>">
                            <h4><?php echo esc_html($work5_output_box['p_title']); ?></h4>
                            <p>
                                <?php echo esc_html($work5_output_box['p_des']); ?>
                            </p>
                            <ul>
                                <?php echo $work5_output_box['p_list']; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- End Signle Item -->
                    <?php endforeach; endif;?>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- End Work Process -->

    <?php }

}