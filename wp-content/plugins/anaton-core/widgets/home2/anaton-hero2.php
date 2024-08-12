<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton hero2 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_hero2_Widget extends \Elementor\Widget_Base {

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
        return 'hero2';
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
        return esc_html__( 'Home Two Hero Section', 'anaton-core' );
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
            'bgimg1',
            [
                'label'     => esc_html__( 'BG Image Two', 'tanda-core' ),
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
            'des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
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
            'h_icon', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

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

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Hero Features', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features Box', 'anaton-core' ),
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

        $hero2_output = $this->get_settings_for_display(); ?>

       <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-style-two-area text-light overflow-hidden" style="background-image: url(<?php echo esc_url($hero2_output['bgimg']['url']);?>);">

        <div class="banner-shape-right-top">
            <img src="<?php echo esc_url($hero2_output['bgimg1']['url']);?>" alt="Image Not Found">
        </div>

        <!-- Single Item -->
        <div class="banner-style-two">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-xl-5">
                            <h2 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms"><?php echo $hero2_output['title']; ?></h2>
                        </div>
                        <div class="col-xl-6 offset-xl-1">
                            <p class="wow fadeInUp"  data-wow-delay="900ms" data-wow-duration="400ms">
                                <?php echo esc_html($hero2_output['des']); ?>
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="thumb">
                                <img class="wow fadeInDown" src="<?php echo esc_url($hero2_output['img']['url']);?>" alt="Thumb">
                                <div class="banner-app-features">
                                    <ul>
                                        <?php
                                        if(!empty($hero2_output['list1'])):
                                        foreach ($hero2_output['list1'] as $hero2_output_box):?>
                                        <li>
                                            <div class="icon">
                                                <i class="<?php echo esc_attr($hero2_output_box['h_icon']); ?>"></i>
                                            </div>
                                            <div class="info">
                                                <span><?php echo esc_html($hero2_output_box['h_title']); ?></span>
                                                <h4><?php echo esc_html($hero2_output_box['h_sub']); ?></h4>
                                            </div>
                                        </li>
                                         <?php endforeach; endif;?>
                                    </ul>
                                </div>
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