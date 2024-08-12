<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton hero4 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_hero4_Widget extends \Elementor\Widget_Base {

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
        return 'hero4';
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
        return esc_html__( 'Home Four Hero Section', 'anaton-core' );
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

        $this->add_control(
            'sub', [
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
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


        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Expert In', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Expert In', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{h_title}}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'Hero Section Right', 'anaton-core' ),
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
            'img2',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            's_class', [
                'label'         => esc_html__( 'Social Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            's_icon', [
                'label'         => esc_html__( 'Social Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

       $repeater1->add_control(
            's_link',
            [
                'label'         => esc_html__( 'Social Link', 'anaton-core' ),
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
                'label'     => esc_html__( 'Social', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Social Icons', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{s_icon}}}',
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

        $hero4_output = $this->get_settings_for_display(); ?>

       <!-- Start Banner Area 
    ============================================= -->
    <div class="banner-style-five-area auto-height overflow-hidden bg-cover" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $hero4_output['bgimg']['id'], 'full' ));?>);">

        <!-- Single Item -->
        <div class="banner-style-five">
            <div class="container">
                <div class="content">
                    
                    <div class="row align-center">
                        <div class="col-xl-6 pr-50 pr-md-15 pr-xs-15">
                            <div class="information">
                                <h2><?php echo esc_html($hero4_output['title']); ?></h2>
                                <h4>
                                    <?php echo esc_html($hero4_output['sub']); ?>
                                    <!-- type headline start-->
                                    <span class="cd-headline clip is-full-width">
                                        <!-- ROTATING TEXT -->
                                        <span class="cd-words-wrapper">
                                            <?php
                                        if(!empty($hero4_output['list1'])):
                                        foreach ($hero4_output['list1'] as $hero4_output_box):?>
                                            <b class="<?php echo esc_attr($hero4_output_box['h_icon']); ?>"><?php echo esc_html($hero4_output_box['h_title']); ?></b>
                                            <?php endforeach; endif;?>
                                        </span>
                                    </span>
                                    <!-- type headline end -->
                                </h4>
                                <p>
                                    <?php echo $hero4_output['des']; ?>
                                </p>
                                <a href="<?php echo esc_url($hero4_output['btlink']['url']);?>" class="btn-shape mt-35"><?php echo esc_html($hero4_output['bttext']); ?></a>
                            </div>
                        </div>

                        <div class="col-xl-6 pl-60 pl-md-15 pl-xs-15">
                            <div class="thumb">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero4_output['img']['id'], 'full' ));?>" alt="Thumb">
                                <div class="author-social">
                                    <input type="checkbox" id="toggle" class="share-toggle" hidden>
                                    <label for="toggle" class="share-button">
                                        <i class="fas fa-plus"></i>
                                    </label>
                                    <?php
                                        if(!empty($hero4_output['list2'])):
                                        foreach ($hero4_output['list2'] as $hero4_output_box1):?>
                                    <a href="<?php echo esc_url($hero4_output_box1['s_link']['url']);?>
" class="<?php echo esc_attr($hero4_output_box1['s_class']); ?>">
                                        <i class="<?php echo esc_attr($hero4_output_box1['s_icon']); ?>"></i>
                                    </a>
                                    <?php endforeach; endif;?>
                                </div>
                                <div class="shape">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $hero4_output['img2']['id'], 'full' ));?>" alt="Image Not Found">
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