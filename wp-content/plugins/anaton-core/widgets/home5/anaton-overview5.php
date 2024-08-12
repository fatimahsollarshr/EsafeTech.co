<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton overview5 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_overview5_Widget extends \Elementor\Widget_Base {

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
        return 'overview5';
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
        return esc_html__( 'Home Five Work Section', 'anaton-core' );
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
                'label' => esc_html__( 'OverView Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
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
            'stitle1', [
                'label'         => esc_html__( 'Section One Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_class1', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'title1', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'des1', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'link1',
            [
                'label'         => esc_html__( ' Link', 'anaton-core' ),
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
                'label'     => esc_html__( 'Section One', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add OverView', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title1 }}}',
            ]
        );

        $this->add_control(
            'stitle2', [
                'label'         => esc_html__( 'Section Two Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'icon_class2', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'title2', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'des2', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'link2',
            [
                'label'         => esc_html__( ' Link', 'anaton-core' ),
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
            'list2',
            [
                'label'     => esc_html__( 'Section Two', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Overview Two', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title2 }}}',
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

        $overview5_output = $this->get_settings_for_display(); ?>

        <!-- Start Overview 
    ============================================= -->
    <div class="overview-area default-padding" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $overview5_output['img']['id'], 'full' ));?>);">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h2 class="heading"><?php echo $overview5_output['title']; ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="service-overview-tab-items">
                <div class="row">

                    <div class="col-xl-10 offset-xl-1 text-center">
                        <div class="nav nav-tabs service-overview-tab-navs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-id-1" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">
                               <?php echo esc_html($overview5_output['stitle1']); ?>
                            </button>
                            <button class="nav-link" id="nav-id-2" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                <?php echo esc_html($overview5_output['stitle2']); ?>
                            </button>
                        </div>
                    </div>
    
                    <div class="col-lg-8 offset-lg-2">
                        <div class="tab-content service-overview-tab-content" id="nav-tabContent">
                            <!-- Tab Single Item -->
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-id-1">
                                <div class="row align-center">
                                    <?php
                            if(!empty($overview5_output['list1'])):
                            foreach ($overview5_output['list1'] as $overview5_output_box):?>
                                    <!-- Tab Inner Single -->
                                    <div class="col-md-6 service-overview-single">
                                        <i class="<?php echo esc_attr($overview5_output_box['icon_class1']); ?>"></i>
                                        <h4><a href="<?php echo esc_url($overview5_output_box['link1']['url']);?>"><?php echo esc_html($overview5_output_box['title1']); ?></a></h4>
                                        <p>
                                            <?php echo esc_html($overview5_output_box['des1']); ?>
                                        </p>
                                    </div>
                                    <!-- Tab Inner Single -->
                                     <?php endforeach; endif;?>
                                </div>
                            </div>
                            <!-- End Tab Single Item -->
    
                            <!-- Tab Single Item -->
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-id-2">
                                <div class="row align-center">
                                    <?php
                            if(!empty($overview5_output['list2'])):
                            foreach ($overview5_output['list2'] as $overview5_output_box1):?>
                                    <!-- Tab Inner Single -->
                                    <div class="col-md-6 service-overview-single">
                                        <i class="<?php echo esc_attr($overview5_output_box1['icon_class2']); ?>"></i>
                                        <h4><a href="<?php echo esc_url($overview5_output_box1['link2']['url']);?>"><?php echo esc_html($overview5_output_box1['title2']); ?></a></h4>
                                        <p>
                                            <?php echo esc_html($overview5_output_box1['des2']); ?>
                                        </p>
                                    </div>
                                                       <?php endforeach; endif;?>

                                </div>
                            </div>
                            <!-- End Tab Single Item -->
                           
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <!-- End Overview -->

    <?php }

}