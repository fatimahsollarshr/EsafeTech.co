<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton info Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_info_Widget extends \Elementor\Widget_Base {

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
        return 'info';
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
        return esc_html__( 'Home Two Info Section', 'anaton-core' );
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
                'label' => esc_html__( 'Info Left Section', 'anaton-core' ),
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

        $this->add_control(
            'heading', [
                'label'         => esc_html__( 'Heading', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list', [
                'label'         => esc_html__( 'List', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Info Description', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Description Box', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{list}}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'Info Right Section', 'anaton-core' ),
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
            'title1', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'sub1', [
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'heading1', [
                'label'         => esc_html__( 'Heading', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
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

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Info Image', 'anaton-core' ),
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

        $info_output = $this->get_settings_for_display(); ?>

        <!-- Start Software Info 
    ============================================= -->
    <div class="soft-info-area default-padding bg-gray" style="background-image: url(<?php echo esc_url($info_output['bgimg']['url']);?>);">
        <div class="container">
            <div class="row align-center">
                
                <div class="col-lg-5 soft-info-style-one">
                    <div class="soft-info-list">
                        <h3><?php echo esc_html($info_output['title']); ?></h3>
                        <p>
                           <?php echo esc_html($info_output['des']); ?>
                        </p>
                    </div>
                    <div class="soft-info-list mt-30">
                        <h3><?php echo esc_html($info_output['heading']); ?></h3>
                        <ul>
                            <?php
                                        if(!empty($info_output['list1'])):
                                        foreach ($info_output['list1'] as $info_output_box):?>
                            <li>
                                <?php echo esc_html($info_output_box['list']); ?>
                            </li>
                             <?php endforeach; endif;?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-1">
                    <div class="soft-info-thumb">
                        <img class="wow fadeInUp" src="<?php echo esc_url($info_output['img']['url']);?>" alt="Dashboard">
                        <div class="go-premium wow fadeInRight" data-wow-delay="500ms">
                            <span><?php echo esc_html($info_output['title1']); ?></span>
                            <h5><?php echo esc_html($info_output['sub1']); ?></h5>
                            <ul class="user-lists">
                                <?php
                                        if(!empty($info_output['list2'])):
                                        foreach ($info_output['list2'] as $info_output_box1):?>
                                <li><img src="<?php echo esc_url($info_output_box1['img1']['url']);?>" alt="Image Not Found"></li>
                                 <?php endforeach; endif;?>
                                <li><i class="fas fa-plus"></i></li>
                            </ul>
                            <p><?php echo esc_html($info_output['heading1']); ?></p>
                            <a class="btn circle mt-25 btn-sm btn-theme secondary animation" href="<?php echo esc_url($info_output['btlink']['url']); ?>"><?php echo esc_html($info_output['bttext']); ?></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Software Info -->

    <?php }

}