<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton feature3 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_feature3_Widget extends \Elementor\Widget_Base {

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
        return 'feature3';
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
        return esc_html__( 'Home Three Features Section', 'anaton-core' );
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
                'label' => esc_html__( 'Features Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'feature-style-three-area default-padding bg-dark text-light', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Features Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'active_class', [
                'label'         => esc_html__( 'Active Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );  

        $repeater->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'sub', [
                'label'         => esc_html__( 'Sub Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Image One', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Image Two', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label'         => esc_html__( 'Button Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'show_class', [
                'label'         => esc_html__( 'Show Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Features Section', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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

        $feature3_output = $this->get_settings_for_display(); ?>

        <!-- Start Features 
    ============================================= -->
    <div class="<?php echo esc_html($feature3_output['class']); ?>">
        <div class="container">
            <div class="row align-center">

                <div class="col-lg-4 feature-style-three">
                    <div class="nav nav-tabs feature-tab-navs" id="nav-tab" role="tablist">
                        <?php
                    $counter = 1;
                    if(!empty($feature3_output['list1'])):
                    foreach ($feature3_output['list1'] as $feature3_output_box):?>

                        <button class="nav-link <?php echo esc_attr($feature3_output_box['active_class']); ?>" id="nav-id-<?php echo esc_attr($counter); ?>" data-bs-toggle="tab" data-bs-target="#tab<?php echo esc_attr($counter); ?>" type="button" role="tab" aria-controls="tab<?php echo esc_attr($counter); ?>" aria-selected="true">
                            <?php echo esc_html($feature3_output_box['title']); ?>
                            <span><?php echo esc_html($feature3_output_box['sub']); ?></span>
                        </button>
                        
                        <?php $counter++;
                            endforeach; endif;?>

                    </div>
                </div>

                <div class="col-lg-7 offset-lg-1 feature-style-three">
                    <div class="tab-content feature-tab-content" id="nav-tabContent">
                        <?php
                    $counter1 = 1;
                    if(!empty($feature3_output['list1'])):
                    foreach ($feature3_output['list1'] as $feature3_output_box):?>
                        <!-- Tab Single Item -->
                        <div class="tab-pane fade <?php echo esc_attr($feature3_output_box['show_class']); ?> <?php echo esc_attr($feature3_output_box['active_class']); ?>" id="tab<?php echo esc_attr($counter1); ?>" role="tabpanel" aria-labelledby="nav-id-<?php echo esc_attr($counter1); ?>">
                            <div class="row align-center">
                                <div class="col-lg-12">
                                    <div class="feature-three-thumb">
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $feature3_output_box['img1']['id'], 'full' ));?>" alt="Image Not Found">
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $feature3_output_box['img2']['id'], 'full' ));?>" alt="Image Not Found">
                                        <div class="icon">
                                            <i class="<?php echo esc_attr($feature3_output_box['icon']); ?>"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab Single Item -->
                        <?php $counter1++;
                            endforeach; endif;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->

    <?php }

}