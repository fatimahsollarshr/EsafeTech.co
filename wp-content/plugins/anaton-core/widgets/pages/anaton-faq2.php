<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton faq2 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_faq2_Widget extends \Elementor\Widget_Base {

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
        return 'faq2';
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
        return esc_html__( 'Pages About Faq Section', 'anaton-core' );
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
                'label' => esc_html__( 'Faq Left Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'faq-style-two-area default-padding', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
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
            'title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'title1', [
                'label'         => esc_html__( 'List Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'no1', [
                'label'         => esc_html__( 'List Number', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'operator1', [
                'label'         => esc_html__( 'List Operator', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Faq Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq32_heading', [
                'label'         => esc_html__( 'Heading', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'heading_id',
            [
                'label'         => esc_html__( 'Heading ID','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'cl_id',
            [
                'label'         => esc_html__( 'ID','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'faq2_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'faq2_des',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list_two',
            [
                'label'     => esc_html__( 'Faq Box', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Faq Box', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ faq2_title }}}',
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

        $faq2_output = $this->get_settings_for_display(); ?>

        <!-- Start Faq 
    ============================================= -->
    <div class="<?php echo esc_attr($faq2_output['class']); ?>" style="background-image: url(<?php echo esc_url($faq2_output['bgimg1']['url']);?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 faq-style-two">
                    <h2 class="title"><?php echo esc_html($faq2_output['title']); ?></h2>
                    <div class="user-fun-fact mt-35">
                        <div class="fun-fact secondary">
                            <div class="content">
                                <div class="counter">
                                    <div class="timer" data-to="<?php echo esc_html($faq2_output['no1']); ?>" data-speed="2000"><?php echo esc_html($faq2_output['no1']); ?></div>
                                    <div class="operator"><?php echo esc_html($faq2_output['operator1']); ?></div>
                                </div>
                                <span class="medium"><?php echo esc_html($faq2_output['title1']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="faq-style-two mt--20">
                        <div class="accordion" id="faqAccordion">
                            <?php 
                $counter = 0;
                if(!empty($faq2_output['list_two'])):
                foreach ($faq2_output['list_two'] as $faq2_box1):?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="<?php echo esc_attr($faq2_box1['heading_id']);?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($faq2_box1['cl_id']);?>" aria-expanded="true" aria-controls="<?php echo esc_attr($faq2_box1['cl_id']);?>">
                                        <?php echo esc_html($faq2_box1['faq2_title']);?>
                                    </button>
                                </h2>
                                <div id="<?php echo esc_attr($faq2_box1['cl_id']);?>" class="accordion-collapse collapse <?php if($counter == 0){echo esc_attr("show");}?>" aria-labelledby="<?php echo esc_attr($faq2_box1['heading_id']);?>" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            <?php echo esc_html($faq2_box1['faq2_des']);?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                $counter++;
                                endforeach; endif;
                                ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->

    <?php }

}