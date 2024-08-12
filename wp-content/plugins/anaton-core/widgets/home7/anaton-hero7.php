<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton hero7 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_hero7_Widget extends \Elementor\Widget_Base {

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
        return 'hero7';
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
        return esc_html__( 'Home Seven Hero Section', 'anaton-core' );
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
                'label' => esc_html__( 'Hero Section Left', 'anaton-core' ),
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
            'r_icon', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Rating', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Rating Class', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{r_icon}}}',
            ]
        );

        $this->add_control(
            'r_title', [
                'label'         => esc_html__( 'Rating Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'Hero Section Button', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'bticon', [
                'label'         => esc_html__( 'Button Icon', 'anaton-core' ),
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
            'bttext1', [
                'label'         => esc_html__( 'Button Text One', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'btlink',
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
            'list2',
            [
                'label'     => esc_html__( 'Add Button', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Buttons', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{bttext1}}}',
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

        $hero7_output = $this->get_settings_for_display(); ?>

       <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-style-seven-area text-light bg-cover overflow-hidden" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $hero7_output['bgimg']['id'], 'full' ));?>);">

        <!-- Single Item -->
        <div class="banner-style-seven">
            <div class="container">
                <div class="content">
                    
                    <div class="row align-center">
                        <div class="col-xl-6 col-lg-6 pr-80 pr-md-15 pr-xs-15">
                            <div class="information mt--180">
                                <h2 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms"><?php echo esc_html($hero7_output['title']); ?></h2>
                                <p class="wow fadeInUp"  data-wow-delay="900ms" data-wow-duration="400ms">
                                    <?php echo esc_html($hero7_output['des']); ?>
                                </p>
                                <div class="app-review">
                                    <div class="rating">
                                        <?php
                                        if(!empty($hero7_output['list1'])):
                                        foreach ($hero7_output['list1'] as $hero7_output_box):?>
                                        <i class="<?php echo esc_attr($hero7_output_box['r_icon']); ?>"></i>
                                        <?php endforeach; endif;?>
                                    </div>
                                    <span><?php echo esc_html($hero7_output['r_title']); ?></span>
                                </div>
                                <ul class="multi-button">
                                     <?php
                                        if(!empty($hero7_output['list2'])):
                                        foreach ($hero7_output['list2'] as $hero7_output_box1):?>
                                    <li>
                                        <a href="<?php echo esc_url($hero7_output_box1['btlink']['url']);?>">
                                            <div class="icon">
                                                <i class="<?php echo esc_attr($hero7_output_box1['bticon']); ?>"></i>
                                            </div>
                                            <div class="info">
                                                <h5><?php echo esc_html($hero7_output_box1['bttext']); ?></h5>
                                                <h4><?php echo esc_html($hero7_output_box1['bttext1']); ?></h4>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach; endif;?>
                                   
                                </ul>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 pl-60 pl-md-15 pl-xs-15">
                            <div class="thumb">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero7_output['img']['id'], 'full' ));?>" alt="Thumb">
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