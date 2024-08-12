<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton hero5 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_hero5_Widget extends \Elementor\Widget_Base {

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
        return 'hero5';
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
        return esc_html__( 'Home Five Hero Section', 'anaton-core' );
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'r_class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'r_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Rotating Text', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Rotating Text', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{r_title}}}',
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
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
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

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'Hero Section Bottom', 'anaton-core' ),
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
            'user_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

         $repeater1->add_control(
            'user_review',
            [
                'label'     => esc_html__( 'User Review Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Review Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Image', 'anaton-core' ),
                    ],
                ],
                'title_field' => 'Image',
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

        $hero5_output = $this->get_settings_for_display(); ?>

      <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-style-four-area text-center text-light" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $hero5_output['bgimg']['id'], 'full' ));?>
)">
        <div class="banner-style-four-shape">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero5_output['bgimg1']['id'], 'full' ));?>" alt="Image Not Found">
        </div>
        <!-- Single Item -->
        <div class="banner-style-four">
            <div class="container">
                <div class="row align-center">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="content">
                            <h3 class="title">
                                <?php echo esc_html($hero5_output['title']); ?>
                                <span class="header-caption" id="page-top">
                                    <!-- type headline start-->
                                    <span class="cd-headline clip is-full-width">
                                        <!-- ROTATING TEXT -->
                                        <span class="cd-words-wrapper">
                                            <?php
                                        if(!empty($hero5_output['list1'])):
                                        foreach ($hero5_output['list1'] as $hero5_output_box):?>
                                            <b class="<?php echo esc_attr($hero5_output_box['r_class']); ?>"><?php echo esc_html($hero5_output_box['r_title']); ?></b>
                                            <?php endforeach; endif;?>
                                        </span>
                                    </span>
                                    <!-- type headline end -->
                                </span>
                            </h3>
                            <p>
                                <?php echo esc_html($hero5_output['des']); ?>
                            </p>
                            <a class="btn circle mt-25 btn-md btn-theme secondary animation" href="<?php echo esc_url($hero5_output['btlink']['url']);?>"><?php echo esc_html($hero5_output['bttext']); ?></a>
                            <div class="service-review">
                                <div class="rating-provider">
                                    <?php
                                        if(!empty($hero5_output['list2'])):
                                        foreach ($hero5_output['list2'] as $hero5_output_box1):?>
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero5_output_box1['user_review']['id'], 'full' ));?>" alt="Image Not Found">
                                    <?php endforeach; endif;?>
                                </div>
                                <h4> <?php echo esc_html($hero5_output['user_title']); ?></h4>
                            </div>
                        </div>
                        <div class="illustration">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero5_output['img']['id'], 'full' ));?>" alt="Image Not Found">
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