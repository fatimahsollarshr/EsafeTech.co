<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton hero8 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_hero8_Widget extends \Elementor\Widget_Base {

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
        return 'hero8';
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
        return esc_html__( 'Home Eight Hero Section', 'anaton-core' );
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
            'title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bgimg1',
            [
                'label'     => esc_html__( 'Sub Title BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'sub', [
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'h_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'h_sub', [
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'h_link',
            [
                'label'         => esc_html__( 'Sub Title Link', 'anaton-core' ),
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
            'list1',
            [
                'label'     => esc_html__( 'Hero List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List Box', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{h_title}}}',
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

        $hero8_output = $this->get_settings_for_display(); ?>

      <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-creative text-light overflow-hidden">

        <div class="creative-banner bg-cover" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $hero8_output['bgimg']['id'], 'full' ));?>
);"></div>
        <!-- Single Item -->
        <div class="banner-style-creative">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><?php echo esc_html($hero8_output['title']); ?> <br> <strong style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $hero8_output['bgimg1']['id'], 'full' ));?>);"><?php echo esc_html($hero8_output['sub']); ?></strong></h2>
                        </div>
                    </div>
                </div>
                <div class="creative-thumb">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero8_output['img']['id'], 'full' ));?>" alt="Image Not Found">
                    <ul class="contact-list">
                        <?php
                                        if(!empty($hero8_output['list1'])):
                                        foreach ($hero8_output['list1'] as $hero8_output_box):?>
                        <li>
                            <h5><?php echo esc_html($hero8_output_box['h_title']); ?></h5>
                            <a href="<?php echo esc_html($hero8_output_box['h_link']['url']); ?>"><?php echo esc_html($hero8_output_box['h_sub']); ?></a>
                        </li>
                        <?php endforeach; endif;?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Single Item -->
    </div>
    <!-- End Banner -->
    <?php }

}