<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton project4 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_project4_Widget extends \Elementor\Widget_Base {

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
        return 'project4';
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
        return esc_html__( 'Home Four Project Section', 'anaton-core' );
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
                'label' => esc_html__( 'Project Title Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'portfolio-style-two-area bg-gray default-padding', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
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

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'c_class', [
                'label'         => esc_html__( 'Filter ID', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'c_cat', [
                'label'         => esc_html__( 'Category Name', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Project Category', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Category', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ c_cat }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Project Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'p_img',
            [
                'label'     => esc_html__( 'Project Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'p_class', [
                'label'         => esc_html__( 'Category Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
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
            'p_des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'btlink',
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

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Project Section', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Project', 'anaton-core' ),
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

        $project4_output = $this->get_settings_for_display(); ?>

       <!-- Start Portfolio 
    ============================================= -->
    <div id="portfolio" class="<?php echo esc_html($project4_output['class']); ?>">
        <div class="container">
            <div class="heading-left">
                <div class="row">
					<?php if(!empty($project4_output['title'] )): ?>
                    <div class="col-xl-6">
                        <h4 class="sub-heading"><?php echo esc_html($project4_output['title']); ?></h4>
                        <h2 class="heading"><?php echo esc_html($project4_output['sub']); ?></h2>
                    </div>
					 <?php endif;?>
					<?php if(!empty($project4_output['title'] )): ?>
                    <div class="col-xl-6">
					<?php else: ?>
					<div class="col-xl-12 text-center">
					<?php endif;?>
                        <!-- End Mixitup Nav-->
                        <div class="mix-item-menu">
                            <button class="active" data-filter="*">All</button>
                            <?php
                    if(!empty($project4_output['list2'])):
                    foreach ($project4_output['list2'] as $project4_output_box1):?>
                            <button data-filter="<?php echo esc_html($project4_output_box1['c_class']); ?>"><?php echo esc_html($project4_output_box1['c_cat']); ?></button>
                            <?php endforeach; endif;?>
                        </div>
                        <!-- End Mixitup Nav-->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="portfolio-style-two-items">
                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="magnific-mix-gallery masonary">
                            <div id="portfolio-grid" class="portfolio-items colums-2">
                                <?php
                    if(!empty($project4_output['list1'])):
                    foreach ($project4_output['list1'] as $project4_output_box):?>
                                <!-- Single Item -->
                                <div class="pf-item <?php echo esc_attr($project4_output_box['p_class']); ?>">
                                    <div class="thumb">
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $project4_output_box['p_img']['id'], 'full' ));?>" alt="thumb">
                                        <a href="<?php echo esc_url(wp_get_attachment_image_url( $project4_output_box['p_img']['id'], 'full' ));?>" class="item popup-link"><i class="fa fa-plus"></i></a>
                                    </div>
                                    <div class="info">
                                        <h4><a href="<?php echo esc_url($project4_output_box['btlink']['url']);?>"><?php echo esc_html($project4_output_box['p_title']); ?></a></h4>
                                        <div class="cat">
                                            <?php echo $project4_output_box['p_des']; ?>
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