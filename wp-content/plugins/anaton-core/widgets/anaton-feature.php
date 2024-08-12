<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton feature Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_feature_Widget extends \Elementor\Widget_Base {

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
        return 'feature';
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
        return esc_html__( 'Home One Feature Section', 'anaton-core' );
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
                'label' => esc_html__( 'Feature Left Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class',
            [
                'label'         => esc_html__( 'Class','anaton-core' ),
                'default'         => esc_html__( 'default-padding bg-contain-right-bottom overflow-hidden mt-xs--50 mt-md--60','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bgimg1',
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
            'img1',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'f_title1',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'f_icon1',
            [
                'label'         => esc_html__( 'Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Feature Left Side', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ f_title1 }}}',
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater1->add_control(
            'f_title2',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'f_icon2',
            [
                'label'         => esc_html__( 'Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'f_des2',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Feature Right Side', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ f_title2 }}}',
            ]
        );

        $this->add_control(
            'bgimg2',
            [
                'label'     => esc_html__( 'BG Img', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Feature Right Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'list',
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
                'title_field' => '{{{ list }}}',
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

        $feature_output = $this->get_settings_for_display(); ?>

        <!-- Start Features 
    ============================================= -->
    <div class="<?php echo esc_html($feature_output['class']); ?>" style="background-image: url(<?php echo esc_url($feature_output['bgimg1']['url']);?>);">
        <div class="container">
            <div class="relative">
                <div class="row align-center">

                    <div class="col-lg-6">
                        <div class="feature-style-one-box">
                            <div class="row align-center">
                                <div class="col-lg-6">
                                    <div class="item-grid">
                                        <?php 
                                            if(!empty($feature_output['list1'])):
                                            foreach ($feature_output['list1'] as $feature_output_box):?>
                                        <!-- Single Item -->
                                        <div class="feature-style-one">
                                            <div class="bg" style="background-image: url(<?php echo esc_url($feature_output_box['img1']['url']);?>);"></div>
                                            <div class="icon">
                                                <i class="<?php echo esc_attr($feature_output_box['f_icon1']); ?>"></i>
                                            </div>
                                            <h4><?php echo esc_html($feature_output_box['f_title1']); ?></h4>
                                        </div>
                                        <!-- End Single Item -->
                                       <?php endforeach; endif;?>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-md-30 mt-xs-30">
                                    <div class="item-grid">
                                        <?php 
                                            if(!empty($feature_output['list2'])):
                                            foreach ($feature_output['list2'] as $feature1_output_box):?>
                                        <!-- Single Item -->
                                        <div class="feature-style-one active">
                                            <div class="bg" style="background-image: url(<?php echo esc_url($feature1_output_box['img2']['url']);?>);"></div>
                                            <div class="icon">
                                                <i class="<?php echo esc_attr($feature1_output_box['f_icon2']); ?>"></i>
                                            </div>
                                            <h4><?php echo esc_html($feature1_output_box['f_title2']); ?></h4>
                                            <p>
                                                <?php echo esc_html($feature1_output_box['f_des2']); ?>
                                            </p>
                                        </div>
                                        <!-- End Single Item -->
                                        <?php endforeach; endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-shape">
                                <img src="<?php echo esc_url($feature_output['bgimg2']['url']);?>" alt="Image Not Found">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1">
                        <div class="description-layout-one mt-md-50 mt-xs-30">
                            <h4 class="sub-title"><?php echo esc_html($feature_output['title']); ?>
</h4>
                            <h2 class="title"><?php echo $feature_output['sub']; ?></h2>
                            <p>
                                <?php echo esc_html($feature_output['des']); ?>
                            </p>
                            <ul class="list-check">
                                <?php 
                                    if(!empty($feature_output['list3'])):
                                    foreach ($feature_output['list3'] as $feature3_output_box):?>
                                <li><?php echo esc_html($feature3_output_box['list']); ?></li>
                                <?php endforeach; endif;?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->

    <?php }

}