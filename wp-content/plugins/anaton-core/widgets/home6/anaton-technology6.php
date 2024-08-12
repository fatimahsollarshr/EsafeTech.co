<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton technology6 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_technology6_Widget extends \Elementor\Widget_Base {

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
        return 'technology6';
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
        return esc_html__( 'Home Six Technology Section', 'anaton-core' );
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
                'label' => esc_html__( 'Technology Section', 'anaton-core' ),
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list', [
                'label'         => esc_html__( 'List Item', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'List Left', 'anaton-core' ),
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

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'list1', [
                'label'         => esc_html__( 'List Item', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'List Right', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{list1}}}',
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

        $technology6_output = $this->get_settings_for_display(); ?>

        <!-- Start Technology 
    ============================================= -->
    <div class="technology-area default-padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="technology-items">
                        <div class="technology-content">
                            <ul>
                                <?php
                            if(!empty($technology6_output['list1'])):
                            foreach ($technology6_output['list1'] as $technology6_output_box):?>
                                <li>
                                    <h4><?php echo esc_html($technology6_output_box['list']); ?></h4>
                                </li>
                                <?php endforeach; endif;?>
                            
                            </ul>
                        </div>
                        <div class="technology-thumb text-center">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $technology6_output['img']['id'], 'full' ));?>" alt="Image not Found">
                        </div>
                        <div class="technology-content">
                            <ul>
                                 <?php
                            if(!empty($technology6_output['list2'])):
                            foreach ($technology6_output['list2'] as $technology6_output_box):?>
                                <li>
                                    <h4><?php echo esc_html($technology6_output_box['list1']); ?></h4>
                                </li>
                                <?php endforeach; endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Technolgoy -->

    <?php }

}