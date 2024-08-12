<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton Hero Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_projectsingle_Widget extends \Elementor\Widget_Base {

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
        return 'projectsingle';
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
        return esc_html__( 'Project Single Section', 'anaton-core' );
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
                'label' => esc_html__( 'Project Single Section', 'anaton-core' ),
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
            'title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'title1', [
                'label'         => esc_html__( 'Title Two', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'des1', [
                'label'         => esc_html__( 'Description Two', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => esc_html__( 'List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
            ]
        );


        $this->add_control(
            'des2', [
                'label'         => esc_html__( 'Description Three', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Image One', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'img3',
            [
                'label'     => esc_html__( 'Image Two', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'project Single Social Media', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'icon_class', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'icon_title', [
                'label'         => esc_html__( 'Icon Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'icon_des', [
                'label'         => esc_html__( 'Icon Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );


        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Team Details Box', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Box', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
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

        $projectsingle_output = $this->get_settings_for_display(); ?>

        <!-- Star Project Details Area
    ============================================= -->
    <div class="project-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-thumb">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $projectsingle_output['img1']['id'], 'full' ));?>" alt="Thumb">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="project-details-items">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">

                        <div class="top-info">
                            <div class="row">

                                <div class="col-lg-5 order-lg-last">
                                    <ul class="gallery-project-basic-info">
                                        <?php 
                            if(!empty($projectsingle_output['list1'])):
                            foreach ($projectsingle_output['list1'] as $projectsingle_box):?>
                                        <li>
                                            <div class="icon">
                                                <i class="<?php echo esc_attr($projectsingle_box['icon_class']);?>"></i>
                                            </div>
                                            <div class="info">
                                                <?php echo esc_html($projectsingle_box['icon_title']);?> <span><?php echo esc_html($projectsingle_box['icon_des']);?></span>
                                            </div>
                                        </li>
                                        <?php endforeach; endif;?>
                                    </ul>
                                </div>

                                <div class="col-lg-7 pr-50 pr-md-15 pr-xs-15">
                                    <h2><?php echo esc_html($projectsingle_output['title']);?></h2>
                                    <p>
                                       <?php echo esc_html($projectsingle_output['des']);?>
                                    </p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="project-details mt-40">
                            <h3><?php echo esc_html($projectsingle_output['title1']);?></h3>
                            <p>
                                <?php echo esc_html($projectsingle_output['des1']);?>
                            </p>
                            <ul class="check-list mt-40 mb-30">
                                <?php 
                            if(!empty($projectsingle_output['list'])):
                            foreach ($projectsingle_output['list'] as $projectsingle_list):?>
                                <li>
                                    <h3><?php echo esc_html($projectsingle_list['icon_title']);?></h3>
                                    <p>
                                        <?php echo esc_html($projectsingle_list['icon_des']);?>
                                    </p>
                                </li>
                                 <?php endforeach; endif;?>
                            </ul>

                            <p>
                                <?php echo esc_html($projectsingle_output['des2']);?>
                            </p>
                            <div class="row mt-50">
                                <div class="col-lg-6 col-md-6">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $projectsingle_output['img2']['id'], 'full' ));?>" alt="Thumb">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $projectsingle_output['img3']['id'], 'full' ));?>" alt="Thumb">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Project Details Area -->

    <?php }

}