<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton faq Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_faq_Widget extends \Elementor\Widget_Base {

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
        return 'faq';
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
        return esc_html__( 'Home One Faq Section', 'anaton-core' );
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
                'label' => esc_html__( 'Faq Heading Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bgimg1',
            [
                'label'     => esc_html__( 'Banner Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'bgimg2',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Faq Section One', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq1_heading', [
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
            'faq1_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'faq1_des',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list_two',
            [
                'label'     => esc_html__( 'faq1 Box', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add faq1 Box', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ faq1_title }}}',
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
            'faq2_heading', [
                'label'         => esc_html__( 'Heading', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'faq2_heading_id',
            [
                'label'         => esc_html__( 'Heading ID','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq2_cl_id',
            [
                'label'         => esc_html__( 'ID','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq2_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'faq2_des',
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

        $faq_output = $this->get_settings_for_display(); ?>

        <!-- Start Faq 
    ============================================= -->
    <div class="faq-area bg-cover pt-250 pt-xs-50 pt-md-120" style="background-image: url(<?php echo esc_url($faq_output['bgimg1']['url']);?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <div class="faq-style-one">

                        <div class="shape-arro">
                            <img src="<?php echo esc_url($faq_output['bgimg2']['url']);?>" alt="Image not found">
                        </div>

                        <div class="heading">
                            <h2 class="title"><?php echo $faq_output['title']; ?></h2>
                        </div>

                        <div class="faq-style-one-content">
                            <div class="tab-content faq-tab-content" id="nav-tabContent">

                                <!-- Tab Single Item -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-id-1">
                                    <div class="accordion" id="faqAccordion">
                <?php 
                $counter = 0;
                if(!empty($faq_output['list_two'])):
                foreach ($faq_output['list_two'] as $faq1_box1):?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="<?php echo esc_attr($faq1_box1['heading_id']);?>">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($faq1_box1['cl_id']);?>" aria-expanded="true" aria-controls="<?php echo esc_attr($faq1_box1['cl_id']);?>">
                                                    <?php echo esc_html($faq1_box1['faq1_title']);?>
                                                </button>
                                            </h2>
                                            <div id="<?php echo esc_attr($faq1_box1['cl_id']);?>" class="accordion-collapse collapse <?php if($counter == 0){echo esc_attr("show");}?>" aria-labelledby="<?php echo esc_attr($faq1_box1['heading_id']);?>" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    <p>
                                                        <?php echo esc_html($faq1_box1['faq1_des']);?>
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
                if(!empty($faq_output['list_three'])):
                foreach ($faq_output['list_three'] as $faq1_box2):?>
                                        <div class="accordion-item">
    <h2 class="accordion-header" id="<?php echo esc_attr($faq1_box2['faq2_heading_id']);?>">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($faq1_box2['faq2_cl_id']);?>" aria-expanded="true" aria-controls="<?php echo esc_attr($faq1_box2['faq2_cl_id']);?>">
            <?php echo esc_html($faq1_box2['faq2_title']);?>
        </button>
    </h2>
    <div id="<?php echo esc_attr($faq1_box2['faq2_cl_id']);?>" class="accordion-collapse collapse <?php if($counter1 == 0){echo esc_attr("show");}?>" aria-labelledby="<?php echo esc_attr($faq1_box2['faq2_heading_id']);?>" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
            <p>
                <?php echo esc_html($faq1_box2['faq2_des']);?>
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
                                    <?php echo esc_html($faq_output['faq1_heading']); ?>
                                </button>
                                <button class="nav-link" id="nav-id-2" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                    <i class="flaticon-megaphone"></i>
                                    <?php echo esc_html($faq_output['faq2_heading']); ?>
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