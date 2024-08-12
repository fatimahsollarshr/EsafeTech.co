<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton project8 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_project8_Widget extends \Elementor\Widget_Base {

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
        return 'project8';
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
        return esc_html__( 'Home Version Eight Project Section', 'anaton-core' );
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
            'content_section1',
            [
                'label' => esc_html__( 'Project Section', 'anaton-core' ),
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
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'p_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'p_tag', [
                'label'         => esc_html__( 'Tag', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'p_taglink',
            [
                'label'         => esc_html__( 'Tag Link', 'anaton-core' ),
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

        $repeater->add_control(
            'p_icon', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'p_link',
            [
                'label'         => esc_html__( 'Link', 'anaton-core' ),
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
                'label'     => esc_html__( 'Project Section', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Projects', 'anaton-core' ),
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

        $project8_output = $this->get_settings_for_display(); ?>

        <!-- Start Portfolio 
    ============================================= -->
    <div class="relative overflow-hidden text-light">

        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content-left">
                            <h4 class="sub-heading"><?php echo esc_html($project8_output['title']); ?></h4>
                            <h2 class="title"><?php echo esc_html($project8_output['sub']); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Navigation -->
                        <div class="portfolio-pagination">
                            <div class="pf-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="container container-stage">
            <div class="row">
                <div class="col-xl-12">
                    <div class="portfolio-item-one-items">
                        <div class="portfolio-stage-right swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php
                    if(!empty($project8_output['list1'])):
                    foreach ($project8_output['list1'] as $project8_output_box):?>
                                <!-- Single Item -->
                                <div class="swiper-slide">
                                    <div class="portfolio-style-one">
                                        <div class="thumb">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $project8_output_box['img']['id'], 'full' ));?>" alt="Image Not Found">
                                        </div>
                                        <div class="info">
                                            <div class="left">
                                                <div class="tags">
                                                    <a href="<?php echo esc_url($project8_output_box['p_taglink']['url']);?>"><?php echo esc_html($project8_output_box['p_tag']); ?></a>

                                                </div>
                                                <h4><a href="<?php echo esc_url($project8_output_box['p_link']['url']);?>"><?php echo esc_html($project8_output_box['p_title']); ?></a></h4>
                                            </div>
                                            <div class="right">
                                                <a href="<?php echo esc_url($project8_output_box['p_link']['url']);?>" class="link"><i class="<?php echo esc_attr($project8_output_box['p_icon']); ?>"></i></a>
                                            </div>
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
        </div>        
    </div>
    <!-- End Portfolio -->

    <?php }

}