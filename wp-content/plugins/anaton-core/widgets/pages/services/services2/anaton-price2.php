<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton price2 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_price2_Widget extends \Elementor\Widget_Base {

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
        return 'price2';
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
        return esc_html__( 'Pages Services Price Section', 'anaton-core' );
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
                'label' => esc_html__( 'Price Title Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'pricing-style-two-area shadow top-shape-gray default-padding', 'anaton-core' ),
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
            'des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Price Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'active_class',
            [
                'label'         => esc_html__( 'Active Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'title1',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'sub1',
            [
                'label'         => esc_html__( 'Sub Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'des1',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list1',
            [
                'label'         => esc_html__( 'List One','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list2',
            [
                'label'         => esc_html__( 'List Two','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list3',
            [
                'label'         => esc_html__( 'List Three','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'btclass',
            [
                'label'         => esc_html__( 'Button Class','anaton-core' ),
                'default'         => esc_html__( 'btn circle mt-25 btn-sm btn-border effect','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'bttext1',
            [
                'label'         => esc_html__( 'Button Text','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'btlink1',
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
                'label'     => esc_html__( 'Price List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Price', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title1 }}}',
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

        $price2_output = $this->get_settings_for_display(); ?>

        <!-- Start Pricing 
    ============================================= -->
    <div class="<?php echo esc_attr($price2_output['class']); ?>">
         <?php if(!empty($price2_output['title'] || $price2_output['des'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-light text-center">
                        <h5 class="sub-heading"><?php echo esc_html($price2_output['title']); ?></h5>
                        <h2 class="heading"><?php echo $price2_output['des']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="pricing-style-two-items mt-25">
                <div class="row">
                     <?php
                        if(!empty($price2_output['list1'])):
                        foreach ($price2_output['list1'] as $price2_output_box):?>
                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 pricing-style-two <?php echo esc_html($price2_output_box['active_class']); ?>">
                        <div class="item">
                            <div class="pricing-header">
                                <h4><?php echo esc_html($price2_output_box['title1']); ?></h4>
                                <div class="price">
                                    <h2><?php echo $price2_output_box['sub1']; ?></h2>
                                </div>
                            </div>
                            <div class="pricing-content">
                                <p>
                                    <?php echo $price2_output_box['des1']; ?>
                                </p>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> <?php echo esc_html($price2_output_box['list1']); ?></li>
                                    <li><i class="fas fa-check-circle"></i> <?php echo esc_html($price2_output_box['list2']); ?></li>
                                    <li><i class="fas fa-times-circle"></i> <?php echo esc_html($price2_output_box['list3']); ?></li>
                                </ul>
                                <?php if(!empty($price2_output_box['bttext1'] )): ?>
                                <a class="<?php echo esc_html($price2_output_box['btclass']); ?>" href="<?php echo esc_url($price2_output_box['btlink1']['url']);?>"><?php echo esc_html($price2_output_box['bttext1']); ?></a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <?php endforeach; endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing -->

    <?php }

}