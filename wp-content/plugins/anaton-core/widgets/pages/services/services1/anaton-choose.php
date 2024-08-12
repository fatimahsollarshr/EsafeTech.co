<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton choose Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_choose_Widget extends \Elementor\Widget_Base {

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
        return 'choose';
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
        return esc_html__( 'Pages Service Choose Section', 'anaton-core' );
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
                'label' => esc_html__( 'Choose Left Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class',
            [
                'label'         => esc_html__( 'Class','anaton-core' ),
                'default'         => esc_html__( 'choose-us-area default-padding overflow-hidden','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Illustrations', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'a_class',
            [
                'label'         => esc_html__( 'Animation Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Illustration', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Illustration', 'anaton-core' ),
                    ],
                ],
                'title_field' => 'Image',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Choose Right Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'         => esc_html__( 'Heading','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1 = new \Elementor\Repeater();


        $repeater1->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'des',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
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

        $choose_output = $this->get_settings_for_display(); ?>

       <!-- Start Choose Us 
    ============================================= -->
    <div class="<?php echo esc_html($choose_output['class']); ?>">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 choose-us-style-one">
                    <div class="choose-us-thumb">
                        <?php 
                            if(!empty($choose_output['list1'])):
                            foreach ($choose_output['list1'] as $choose_output_box):?>
                        <img class="<?php echo esc_attr($choose_output_box['a_class']); ?>" src="<?php echo esc_url($choose_output_box['img1']['url']);?>" alt="illustration">
                        <?php endforeach; endif;?>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 choose-us-style-one">
                    <h2 class="title"><?php echo $choose_output['heading']; ?></h2>
                    <ul class="list-double mt-50">
                        <?php 
                            if(!empty($choose_output['list2'])):
                            foreach ($choose_output['list2'] as $choose1_output_box):?>
                        <li>
                            <div class="content">
                                <h4><?php echo esc_html($choose1_output_box['title']); ?></h4>
                                <p>
                                    <?php echo esc_html($choose1_output_box['des']); ?>
                                </p>
                            </div>
                        </li>
                        <?php endforeach; endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Choose Us -->

    <?php }

}