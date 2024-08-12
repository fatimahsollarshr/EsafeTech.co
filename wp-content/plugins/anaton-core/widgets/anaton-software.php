<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton software Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_software_Widget extends \Elementor\Widget_Base {

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
        return 'software';
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
        return esc_html__( 'Home One Software Section', 'anaton-core' );
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
            'content_section',
            [
                'label' => esc_html__( 'Software Left Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bgimg1',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'bgimg2',
            [
                'label'     => esc_html__( 'BG Image Two', 'tanda-core' ),
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
            'title1',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'des1',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list1',
            [
                'label'         => esc_html__( 'List One','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         $repeater->add_control(
            'list2',
            [
                'label'         => esc_html__( 'List Two','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

          $repeater->add_control(
            'list3',
            [
                'label'         => esc_html__( 'List Three','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'SoftWare Details', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Sotware Details', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title1 }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'software Right Section', 'anaton-core' ),
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
            'sub1', [
                'label'         => esc_html__( 'Sub', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'p_per',
            [
                'label'         => esc_html__( 'Percentage','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'p_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Progress Bar', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Progress', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ p_title }}}',
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

        $software_output = $this->get_settings_for_display(); ?>

        <!-- Start Software Details 
    ============================================= -->
    <div class="software-details-area default-padding-top pb-80 pb-xs-50" style="background-image: url(<?php echo esc_url($software_output['bgimg1']['url']);?>);">
        <div class="container">
            <div class="row align-center">

                <div class="col-xl-5 order-xl-last">
                    <div class="soft-details-style-one">
                        <h4 class="sub-title"><?php echo esc_html($software_output['title1']); ?></h4>
                        <h2 class="title"><?php echo esc_html($software_output['sub1']); ?></h2>
                        <div class="circle-process mt-40">
                            <ul>
                                <?php
                                    if(!empty($software_output['list2'])):
                                    foreach ($software_output['list2'] as $software_output_box):?>
                                <li>
                                    <div class="progressbar">
                                        <div class="circle" data-percent="<?php echo esc_attr($software_output_box['p_per']); ?>">
                                            <strong></strong>
                                        </div>
                                        <h4><?php echo esc_attr($software_output_box['p_title']); ?></h4>
                                    </div>
                                </li>
                                <?php endforeach; endif;?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="soft-details-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php
                                if(!empty($software_output['list1'])):
                                foreach ($software_output['list1'] as $software_output_box):?>
                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="soft-details-item">
                                    <div class="thumb">
                                        <img src="<?php echo esc_url($software_output_box['img1']['url']);?>" alt="Thumb">
                                    </div>
                                    <div class="soft-details-info">
                                        <h4><?php echo esc_html($software_output_box['title1']); ?></h4>
                                        <p>
                                            <?php echo esc_html($software_output_box['des1']); ?>
                                        </p>
                                        <ul class="list-circle">
                                            <li><?php echo esc_html($software_output_box['list1']); ?></li>
                                            <li><?php echo esc_html($software_output_box['list2']); ?></li>
                                            <li><?php echo esc_html($software_output_box['list3']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <?php endforeach; endif;?>
                            
                        </div>
                        <div class="shape-left-bottom">
                            <img src="<?php echo esc_url($software_output['bgimg2']['url']);?>" alt="Image Not Found">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Software Details -->

    <?php }

}