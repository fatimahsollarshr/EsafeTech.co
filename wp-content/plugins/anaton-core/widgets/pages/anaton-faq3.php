<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton faq3 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_faq3_Widget extends \Elementor\Widget_Base {

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
        return 'faq3';
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
        return esc_html__( 'Pages Faq Section', 'anaton-core' );
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
                'label' => esc_html__( 'Faq Section One', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq31_heading', [
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
            'faq31_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'faq31_des',
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
                'title_field' => '{{{ faq31_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'Faq Section Two', 'anaton-core' ),
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

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'faq32_heading_id',
            [
                'label'         => esc_html__( 'Heading ID','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq32_cl_id',
            [
                'label'         => esc_html__( 'ID','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq32_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq32_des',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list_three',
            [
                'label'     => esc_html__( 'Faq Box', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Faq Box', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ faq32_title }}}',
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

        $faq3_output = $this->get_settings_for_display(); ?>

         <!-- Start Faq 
    ============================================= -->
    <div class="faq-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="faq-style-one bg-light">


                        <div class="faq-style-one-content">
                            <div class="tab-content faq-tab-content" id="nav-tabContent">

                                <!-- Tab Single Item -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-id-1">
                                    <div class="accordion" id="faqAccordion">
                                        <?php 
                $counter = 0;
                if(!empty($faq3_output['list_two'])):
                foreach ($faq3_output['list_two'] as $faq31_box1):?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="<?php echo esc_attr($faq31_box1['heading_id']);?>">
                                                <button class="accordion-button <?php if($counter == 0){echo esc_attr("");} else {echo esc_attr("collapsed");}?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($faq31_box1['cl_id']);?>" aria-expanded="<?php if($counter == 0){echo esc_attr("true");} else {echo esc_attr("false");}?>" aria-controls="<?php echo esc_attr($faq31_box1['cl_id']);?>">
                                                     <?php echo esc_html($faq31_box1['faq31_title']);?>
                                                </button>
                                            </h2>
                                            <div id="<?php echo esc_attr($faq31_box1['cl_id']);?>" class="accordion-collapse collapse <?php if($counter == 0){echo esc_attr("show");}?>" aria-labelledby="<?php echo esc_attr($faq31_box1['heading_id']);?>" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    <p>
                                                       <?php echo esc_html($faq31_box1['faq31_des']);?>
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
                                <!-- End Tab Single Item -->
        
                                <!-- Tab Single Item -->
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-id-2">
                                    <div class="accordion" id="faqAccordionTwo">
                                        <?php 
                $counter1 = 0;
                if(!empty($faq3_output['list_three'])):
                foreach ($faq3_output['list_three'] as $faq31_box2):?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="<?php echo esc_attr($faq31_box2['faq32_heading_id']);?>">
                                                <button class="accordion-button <?php if($counter == 0){echo esc_attr("");} else {echo esc_attr("collapsed");}?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($faq31_box2['faq32_cl_id']);?>" aria-expanded="<?php if($counter == 0){echo esc_attr("true");} else {echo esc_attr("false");}?>" aria-controls="<?php echo esc_attr($faq31_box2['faq32_cl_id']);?>">
                                                    <?php echo esc_html($faq31_box2['faq32_title']);?>
                                                </button>
                                            </h2>
                                            <div id="<?php echo esc_attr($faq31_box2['faq32_cl_id']);?>" class="accordion-collapse collapse <?php if($counter1 == 0){echo esc_attr("show");}?>" aria-labelledby="<?php echo esc_attr($faq31_box2['faq32_heading_id']);?>" data-bs-parent="#faqAccordionTwo">
                                                <div class="accordion-body">
                                                    <p>
                                                        <?php echo esc_html($faq31_box2['faq32_des']);?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                $counter1++;
                                endforeach; endif;
                                ?>
                                        
                                    </div>
                                </div>
                                <!-- End Tab Single Item -->
                            </div>
                        
                            <div class="nav nav-tabs faq-tab-navs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-id-1" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">
                                    <i class="flaticon-portfolio"></i>
                                    <?php echo esc_html($faq3_output['faq31_heading']); ?>
                                </button>
                                <button class="nav-link" id="nav-id-2" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                    <i class="flaticon-megaphone"></i>
                                    <?php echo esc_html($faq3_output['faq32_heading']); ?>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->

    <?php }

}