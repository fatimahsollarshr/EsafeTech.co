<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton counter7 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_counter7_Widget extends \Elementor\Widget_Base {

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
        return 'counter7';
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
        return esc_html__( 'Home Seven Counter Section', 'anaton-core' );
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
                'label' => esc_html__( 'Counter Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Faq Class', 'anaton-core' ),
                'default'         => esc_html__( 'fun-factor-area default-padding-top', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'class1', [
                'label'         => esc_html__( 'List Style Class', 'anaton-core' ),
                'default'         => esc_html__( 'fun-fact-style-two-lists', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
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
            'operator', [
                'label'         => esc_html__( 'Operator', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'number', [
                'label'         => esc_html__( 'Number', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Counter', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Counters', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{title}}}',
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

        $counter7_output = $this->get_settings_for_display(); ?>

        <!-- Start Fun Factor 
    ============================================= -->
    <div class="<?php echo esc_html($counter7_output['class']);?>">
        <div class="container">
            <div class="row">
                <?php if($counter7_output['class1'] == "fun-fact-style-one-lists" ): ?>
                <div class="col-lg-12">
                <?php else: ?>
                <div class="col-lg-10 offset-lg-1">
                <?php endif; ?>
                    <div class="<?php echo esc_html($counter7_output['class1']);?>">
                        <?php
                            if(!empty($counter7_output['list1'])):
                            foreach ($counter7_output['list1'] as $counter7_output_box):?>
                        <!-- Single item -->
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="<?php echo esc_attr($counter7_output_box['number']);?>" data-speed="3000"><?php echo esc_html($counter7_output_box['number']);?></div>
                                <?php if(!empty($counter7_output_box['operator'] )): ?>
                                <div class="operator"><?php echo esc_html($counter7_output_box['operator']);?></div>
                            <?php endif;?>
                            </div>
                            <span class="medium"><?php if(!empty($counter7_output_box['icon'] )): ?><i class="<?php echo esc_attr($counter7_output_box['icon']);?>"></i><?php endif;?> <?php echo esc_html($counter7_output_box['title']);?></span>
                        </div>
                        <!-- End Single item -->
                        <?php endforeach; endif;?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Factor -->

    <?php }

}