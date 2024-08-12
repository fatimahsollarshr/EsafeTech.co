<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Anaton Service Single Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_servicesingle_Widget extends \Elementor\Widget_Base {

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
        return 'servicesingle';
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
        return esc_html__( 'Service Single Section', 'anaton-core' );
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
                'label' => esc_html__( 'Service Single Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Hero Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'details_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'details_service', [
                'label'         => esc_html__( 'Details', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_list_class', [
                'label'         => esc_html__( 'Column Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'service_list_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'service_list_des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'Service List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ service_list_title }}}',
            ]
        );

        $this->add_control(
            'details_service1', [
                'label'         => esc_html__( 'Details', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_faq',
            [
                'label' => esc_html__( 'Service FAQ Section', 'anaton-core' ),
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
            'content_section_service',
            [
                'label' => esc_html__( 'Popular Services Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'popular_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'p_icon',
            [
                'label'         => esc_html__( 'Icon Class','anaton-core' ),
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

        $repeater1->add_control(
            'p_des',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
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
            'list_three',
            [
                'label'     => esc_html__( 'Service Box', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service Box', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ p_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'content_section_sid',
            [
                'label' => esc_html__( 'Service SideBar', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sidebar_heading', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'sidebar_class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'sidebar_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'sidebar_link',
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
                'label'     => esc_html__( 'Sidebar List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ sidebar_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Sidebar Section One', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'img4',
            [
                'label'     => esc_html__( 'Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'one_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'one_des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $this->add_control(
            'one_class', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'one_text', [
                'label'         => esc_html__( 'Icon Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'two_text', [
                'label'         => esc_html__( 'Text Two', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'two_text_link',
            [
                'label'         => esc_html__( 'Text Two Link', 'anaton-core' ),
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
            'one_bttext', [
                'label'         => esc_html__( 'Button Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'one_btlink',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Sidebar Section Two', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'two_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'class1', [
                'label'         => esc_html__( 'Icon Class One', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'text1', [
                'label'         => esc_html__( 'Icon Text One', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'link1',
            [
                'label'         => esc_html__( 'Icon Link One', 'anaton-core' ),
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
            'class2', [
                'label'         => esc_html__( 'Icon Class Two', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'text2', [
                'label'         => esc_html__( 'Icon Text Two', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'link2',
            [
                'label'         => esc_html__( 'Icon Link Two', 'anaton-core' ),
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

        $servicesingle_output = $this->get_settings_for_display(); ?>

        <!-- Star Services Details Area
    ============================================= -->
    <div class="services-details-area default-padding">
        <div class="container">
            <div class="services-details-items">
                <div class="row">
                    
                    <div class="col-xl-8 col-lg-7 pr-45 pr-md-15 pr-xs-15 services-single-content">
                        <div class="service-single-thumb">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $servicesingle_output['img1']['id'], 'full' ));?>" alt="Thumb">
                        </div>
                        <h2><?php echo esc_html($servicesingle_output['details_title']);?></h2>
                        <p>
                             <?php echo esc_html($servicesingle_output['details_service']);?>
                        </p>
                        <div class="features mt-40 mt-xs-30 mb-30 mb-xs-20">
                            <div class="row">
                                <?php 
                            if(!empty($servicesingle_output['list'])):
                            foreach ($servicesingle_output['list'] as $servicesingle_service_op):?>
                                <div class="<?php echo esc_attr($servicesingle_service_op['service_list_class']);?>">
                                    <div class="content">
                                        <h3><?php echo esc_html($servicesingle_service_op['service_list_title']);?></h3>
                                        <?php echo $servicesingle_service_op['service_list_des'];?>
                                    </div>
                                </div>
                                <?php endforeach; endif;?>
                            </div>
                        </div>
                        <?php echo $servicesingle_output['details_service1'];?>

                        <div class="faq-style-one mt-40">
                            <h2 class="mb-30"><?php echo esc_html($servicesingle_output['faq32_heading']);?></h2>
                            <div class="accordion" id="faqAccordion">
                                <?php 
                                $counter = 0;
                                if(!empty($servicesingle_output['list_two'])):
                                foreach ($servicesingle_output['list_two'] as $faq31_box1):?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="<?php echo esc_attr($faq31_box1['heading_id']);?>">
                                        <button class="accordion-button <?php if($counter == 0){echo esc_attr("");} else {echo esc_attr("collapsed");}?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($faq31_box1['cl_id']);?>" aria-expanded="true" aria-controls="<?php echo esc_attr($faq31_box1['cl_id']);?>">
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

                        <div class="services-more mt-40">
                            <h2><?php echo esc_html($servicesingle_output['popular_title']);?></h2>
                            <div class="row">
                                <?php 
                                if(!empty($servicesingle_output['list_three'])):
                                foreach ($servicesingle_output['list_three'] as $popular_service):?>
                                <div class="col-md-6">
                                    <div class="item">
                                        <i class="<?php echo esc_attr($popular_service['p_icon']);?>"></i>
                                        <h4><a href="<?php echo esc_url($popular_service['p_link']['url']);?>"><?php echo esc_html($popular_service['p_title']);?></a></h4>
                                        <p>
                                            <?php echo esc_html($popular_service['p_des']);?>
                                        </p>
                                    </div>
                                </div>
                                <?php endforeach; endif;?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5 mt-md-50 mt-xs-50 services-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget services-list-widget">
                            <h4 class="widget-title"><?php echo esc_html($servicesingle_output['sidebar_heading']);?></h4>
                            <div class="content">
                                <ul>
                                    <?php 
                                if(!empty($servicesingle_output['list1'])):
                                foreach ($servicesingle_output['list1'] as $servicesingle_sidebar):?>
                                    <li class="<?php echo esc_attr($servicesingle_sidebar['sidebar_class']);?>"><a href="<?php echo esc_url($servicesingle_sidebar['sidebar_link']['url']);?>"><?php echo esc_html($servicesingle_sidebar['sidebar_title']);?></a></li>
                                    <?php endforeach; endif;?>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <div class="single-widget quick-contact-widget text-light" style="background-image: url(<?php echo esc_url($servicesingle_output['img4']['url']);?>);">
                            <div class="content">
                                <h3><?php echo esc_html($servicesingle_output['one_title']);?></h3>
                                <p>
                                    <?php echo esc_html($servicesingle_output['one_des']);?>
                                </p>
                                <h2><?php echo esc_html($servicesingle_output['one_text']);?></h2>
                                <h4><a href="<?php echo $servicesingle_output['two_text_link']['url'];?>"><?php echo esc_html($servicesingle_output['two_text']);?></a></h4>
                                <a class="btn mt-30 circle btn-sm btn-gradient" href="<?php echo esc_url($servicesingle_output['one_btlink']['url']);?>"><?php echo esc_html($servicesingle_output['one_bttext']);?></a>
                            </div>
                        </div>
                        <!-- Single Widget -->
                        <div class="single-widget widget-brochure">
                            <h4 class="widget-title"><?php echo esc_html($servicesingle_output['two_title']);?></h4>
                            <ul>
                                <li><a href="<?php echo esc_url($servicesingle_output['link1']['url']);?>"><i class="<?php echo esc_attr($servicesingle_output['class1']);?>"></i> <?php echo esc_html($servicesingle_output['text1']);?></a></li>
                            <li><a href="<?php echo esc_url($servicesingle_output['link2']['url']);?>"><i class="<?php echo esc_attr($servicesingle_output['class2']);?>"></i> <?php echo esc_html($servicesingle_output['text2']);?></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Services Details Area -->

    <?php }

}