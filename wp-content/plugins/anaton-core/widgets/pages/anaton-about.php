<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton about1 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_about1_Widget extends \Elementor\Widget_Base {

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
        return 'about1';
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
        return esc_html__( 'Pages About Section', 'anaton-core' );
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
     * Add input fields to allow the about1 to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'About Left Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bgimg',
            [
                'label'     => esc_html__( 'BG Img', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'number',
            [
                'label'         => esc_html__( 'Number','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'operator',
            [
                'label'         => esc_html__( 'Operator','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'About Side', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'About Right Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title1', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'des1', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'list_text',
            [
                'label'         => esc_html__( 'List','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list3',
            [
                'label'     => esc_html__( 'List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater2->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{list_text}}}',
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

        $about1_output = $this->get_settings_for_display(); ?>

       <!-- Start About
    ============================================= -->
    <div class="about-style-one-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 about-style-one">
                    <div class="about-thumb">
                        <img src="<?php echo esc_url($about1_output['bgimg']['url']);?>" alt="Image Not Found">
                        <div class="user-fun-fact">
                            <?php
                            if(!empty($about1_output['list1'])):
                            foreach ($about1_output['list1'] as $about1_output_box):?>
                            <div class="fun-fact">
                                <div class="counter">
                                    <div class="timer" data-to="<?php echo esc_attr($about1_output_box['number']); ?>" data-speed="2000"><?php echo esc_attr($about1_output_box['number']); ?></div>
                                    <div class="operator"><?php echo esc_html($about1_output_box['operator']); ?></div>
                                </div>
                                <span class="medium"><?php echo esc_html($about1_output_box['title']); ?></span>
                            </div>
                            <?php endforeach; endif;?>
                           
    
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 about-style-one mt-80 mt-md-50 mt-xs-30">
                    <h2 class="title mb-25"><?php echo esc_html($about1_output['title1']);?></h2>
                    <p>
                        <?php echo esc_html($about1_output['des1']);?>
                    </p>
                    <ul class="list-circle mt-30">
                       <?php
                                if(!empty($about1_output['list3'])):
                                foreach ($about1_output['list3'] as $about1_output_box1):?>
                            <li><?php echo esc_html($about1_output_box1['list_text']); ?></li>
                             <?php endforeach; endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <?php }

}