<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton service3 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_service3_Widget extends \Elementor\Widget_Base {

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
        return 'service3';
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
        return esc_html__( 'Home Three Services Section', 'anaton-core' );
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
                'label' => esc_html__( 'Service Title Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'services-style-two-area bg-gray default-padding bottom-less', 'anaton-core' ),
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
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Service Section Top', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            's_img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            's_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'bticon',
            [
                'label'     => esc_html__( 'Button Icon Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $repeater->add_control(
            'btlink',
            [
                'label'         => esc_html__( 'Button Link', 'anaton-core' ),
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
                'label'     => esc_html__( 'Services Section', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Services', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ s_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'Service Section Bottom', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            's_img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater1->add_control(
            's_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'bticon',
            [
                'label'     => esc_html__( 'Button Icon Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $repeater1->add_control(
            'btlink',
            [
                'label'         => esc_html__( 'Button Link', 'anaton-core' ),
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
            'list2',
            [
                'label'     => esc_html__( 'Services Section', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Services', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ s_title }}}',
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

        $service3_output = $this->get_settings_for_display(); ?>

        <!-- Start Services 
    ============================================= -->
    <div class="<?php echo esc_html($service3_output['class']); ?>">
        <div class="container">
            <div class="row align-center">

                <div class="col-xl-5">
                    <div class="site-heading">
                        <h5 class="sub-title"><?php echo esc_html($service3_output['title']); ?></h5>
                        <h2 class="title"><?php echo esc_html($service3_output['sub']); ?></h2>
                    </div>
                </div>

                <div class="col-xl-6 offset-xl-1">
                    <div class="row">
                        <!-- Single Item -->
                        <?php
                    if(!empty($service3_output['list1'])):
                    foreach ($service3_output['list1'] as $service3_output_box):?>
                        <!-- Single Item -->
                        <div class="services-style-two col-lg-6 col-md-6 mb-30">
                            <div class="item">
                                <div class="icon">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $service3_output_box['s_img']['id'], 'full' ));?>" alt="Icon">
                                </div>
                                <h3><a href="<?php echo esc_url($service3_output_box['btlink']['url']);?>"><?php echo esc_html($service3_output_box['s_title']); ?></a></h3>
                                <div class="bottom">
                                    <span><?php echo esc_html($service3_output_box['bttext']); ?></span>
                                    <a href="<?php echo esc_url($service3_output_box['btlink']['url']);?>" class="angle-btn">
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $service3_output_box['bticon']['id'], 'full' ));?>" alt="Arrow Icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <?php endforeach; endif;?>
                       

                    </div>
                </div>

                <div class="col-xl-9">
                    <div class="row">
                        <!-- Single Item -->
                        <?php
                    if(!empty($service3_output['list2'])):
                    foreach ($service3_output['list2'] as $service3_output_box1):?>
                        <div class="services-style-two col-xl-4 col-lg-6 col-md-6 mb-30">
                            <div class="item">
                                <div class="icon">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $service3_output_box1['s_img']['id'], 'full' ));?>" alt="Icon">
                                </div>
                                <h3><a href="<?php echo esc_url($service3_output_box1['btlink']['url']);?>"><?php echo esc_html($service3_output_box1['s_title']); ?></a></h3>
                                <div class="bottom">
                                    <span><?php echo esc_html($service3_output_box1['bttext']); ?></span>
                                    <a href="<?php echo esc_url($service3_output_box1['btlink']['url']);?>" class="angle-btn">
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $service3_output_box1['bticon']['id'], 'full' ));?>" alt="Arrow Icon">
                                    </a>
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
    <!-- End Services -->

    <?php }

}