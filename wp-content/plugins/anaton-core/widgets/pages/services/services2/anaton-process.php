<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton process Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_process_Widget extends \Elementor\Widget_Base {

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
        return 'process';
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
        return esc_html__( 'Pages Services Process Section', 'anaton-core' );
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
                'label' => esc_html__( 'Process Section', 'anaton-core' ),
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
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'process-style-onea-rea default-padding', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'p_class', [
                'label'         => esc_html__( 'Process Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );   

        $repeater->add_control(
            'p_img',
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

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Process Section', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Process', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ p_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Process Counter Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'c_number',
            [
                'label'         => esc_html__( 'Number','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'c_operator',
            [
                'label'         => esc_html__( 'Operator','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'c_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Counter', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Counter', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ c_title }}}',
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

        $process_output = $this->get_settings_for_display(); ?>

        <!-- Start Process 
    ============================================= -->
    <div class="<?php echo esc_html($process_output['class']); ?>" style="background-image: url(<?php echo esc_url($process_output['bgimg']['url']);?>);">
        <?php if(!empty($process_output['title'] || $process_output['sub'] )): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5 class="sub-heading"><?php echo esc_html($process_output['title']); ?></h5>
                        <h2 class="heading"><?php echo esc_html($process_output['sub']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
                <?php endif;?>
        <div class="container">
            <div class="process-style-one-box text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <?php
                            $counter = 0;
                    if(!empty($process_output['list1'])):
                    foreach ($process_output['list1'] as $process_output_box):?>
                            <!-- Single Item -->
                            <div class="<?php echo esc_html($process_output_box['p_class']); ?>">
                                <div class="process-style-one">
                                    <div class="inner-info">
                                        <img src="<?php echo esc_url($process_output_box['p_img']['url']);?>" alt="Icon">
                                        <h4><?php echo esc_html($process_output_box['p_title']); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <?php if($counter == 1){
        echo'<div class="shape-center">
                                <img src="';?><?php echo esc_url(get_template_directory_uri() . '/img/shape/24.png'); ?><?php echo'" alt="Shape">
                            </div>';
    }?>
                            <?php 
                            $counter++;
                            endforeach; endif;?>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="process-fun-fact">
                            <?php
                    if(!empty($process_output['list2'])):
                    foreach ($process_output['list2'] as $process_output_box1):?>
                            <div class="fun-fact">
                                <div class="counter">
                                    <div class="timer" data-to="<?php echo esc_attr($process_output_box1['c_number']); ?>" data-speed="2000"><?php echo esc_attr($process_output_box1['c_number']); ?></div>
                                    <div class="operator"><?php echo esc_html($process_output_box1['c_operator']); ?></div>
                                </div>
                                <span class="medium"><?php echo esc_html($process_output_box1['c_title']); ?></span>
                            </div>
                            <?php endforeach; endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Process -->
    <?php }

}