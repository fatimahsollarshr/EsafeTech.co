<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton Hero Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_contact_Widget extends \Elementor\Widget_Base {

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
        return 'contact';
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
        return esc_html__( 'Pages Contact Section', 'anaton-core' );
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
                'label' => esc_html__( 'Contact Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'contact-area  overflow-hidden default-padding', 'anaton-core' ),
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_class', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_title', [
                'label'         => esc_html__( 'Icon Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_des', [
                'label'         => esc_html__( 'Icon Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_link',
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
            'list',
            [
                'label'     => esc_html__( 'Icon List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Contact Section Right', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
         $this->add_control(
            'r_title_class', [
                'label'         => esc_html__( 'Title Class', 'anaton-core' ),
                'default'         => esc_html__( 'sub-title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $this->add_control(
            'r_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'default'         => esc_html__( 'Have Questions?', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'r_sub', [
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'default'         => esc_html__( 'Send us a Massage', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bgimg1',
            [
                'label'     => esc_html__( 'BG Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
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

        $contact_output = $this->get_settings_for_display(); ?>

 <!-- Start Contact Us 
    ============================================= -->
    <div class="<?php echo esc_html($contact_output['class']);?>">
        <div class="container">
            <div class="row align-center">
                <div class="col-tact-stye-one col-lg-5 pr-60 pr-md-15 pr-xs-15">
                    <div class="contact-style-one-info">
                        <div class="mb-30">
                            <h2><?php echo esc_html($contact_output['title']);?></h2>
                            <p>
                                <?php echo esc_html($contact_output['sub']);?>
                            </p>
                        </div>
                        <ul>
                             <?php 
                        if(!empty($contact_output['list'])):
                        foreach ($contact_output['list'] as $contact_icon):?>
                            <li class="wow fadeInUp">
                                <div class="icon">
                                    <i class="<?php echo esc_attr($contact_icon['icon_class']);?>"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><?php echo esc_html($contact_icon['icon_title']);?></h4>
                                    <a href="<?php echo $contact_icon['icon_link']['url'];?>"><?php echo esc_html($contact_icon['icon_des']);?></a>
                                </div>
                            </li>
                            <?php endforeach; endif;?>
                        </ul>
                    </div>
                </div>
                <div class="col-tact-stye-one col-lg-7">
                    <div class="contact-form-style-one">
                        <div class="shape-right-bottom">
                            <img src="<?php echo esc_url($contact_output['bgimg1']['url']);?>" alt="Image not Found">
                        </div>
                        <h4 class="<?php echo esc_attr($contact_output['r_title_class']);?>"><?php echo esc_html($contact_output['r_title']);?></h4>
                        <h2 class="title"><?php echo esc_html($contact_output['r_sub']);?></h2>
                        <?php echo do_shortcode($contact_output['contact_shortcode']);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
    <?php }

}