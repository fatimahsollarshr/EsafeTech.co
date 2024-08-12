<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton price5 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_price5_Widget extends \Elementor\Widget_Base {

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
        return 'price5';
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
        return esc_html__( 'Home Five Price Section', 'anaton-core' );
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
                'default'         => esc_html__( 'pricing-style-three-area overflow-hidden default-padding bg-gray bottom-less', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
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
            'title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'sub',
            [
                'label'         => esc_html__( 'Sub Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
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
            'list1_icon',
            [
                'label'         => esc_html__( 'List One Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
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
            'list2_icon',
            [
                'label'         => esc_html__( 'List Two Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
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
            'list3_icon',
            [
                'label'         => esc_html__( 'List Three Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
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
            'list4_icon',
            [
                'label'         => esc_html__( 'List Four Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list4',
            [
                'label'         => esc_html__( 'List Four','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list5_icon',
            [
                'label'         => esc_html__( 'List Five Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list5',
            [
                'label'         => esc_html__( 'List Five','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list6_icon',
            [
                'label'         => esc_html__( 'List Six Icon Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'list6',
            [
                'label'         => esc_html__( 'List Six','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'price',
            [
                'label'         => esc_html__( 'Price','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'btclass',
            [
                'label'         => esc_html__( 'Button Class','anaton-core' ),
                'default'         => esc_html__( 'btn mt-25 btn-sm btn-theme secondary effect','anaton-core' ),
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
                        'list_title' => esc_html__( 'Add price5', 'anaton-core' ),
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

        $price5_output = $this->get_settings_for_display(); ?>

        <!-- Start Pricing 
    ============================================= -->
    <div class="<?php echo esc_attr($price5_output['class']); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading secondary text-center">
                        <h4 class="sub-heading"><?php echo esc_html($price5_output['title']); ?></h4>
                        <h2 class="heading"> <?php echo esc_html($price5_output['sub']); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row extra-gutter">
                <div class="pricing-shap">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $price5_output['img']['id'], 'full' ));?>" alt="Image Not Found">
                </div>
                 <?php
                        if(!empty($price5_output['list1'])):
                        foreach ($price5_output['list1'] as $price5_output_box):?>
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="pricing-style-threee <?php echo esc_html($price5_output_box['active_class']); ?>">
                        <div class="pricing-header">
                            <h4><?php echo $price5_output_box['title1']; ?></h4>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <?php if(!empty($price5_output_box['list1'])): ?>
                                <li><i class="<?php echo esc_html($price5_output_box['list1_icon']); ?>"></i> <?php echo esc_html($price5_output_box['list1']); ?></li>
                                <?php endif;?>
                                <?php if(!empty($price5_output_box['list2'])): ?>
                                <li><i class="<?php echo esc_html($price5_output_box['list2_icon']); ?>"></i> <?php echo esc_html($price5_output_box['list2']); ?></li>
                                <?php endif;?>
                                <?php if(!empty($price5_output_box['list3'])): ?>
                                <li><i class="<?php echo esc_html($price5_output_box['list3_icon']); ?>"></i> <?php echo esc_html($price5_output_box['list3']); ?></li>
                                <?php endif;?>
                                <?php if(!empty($price5_output_box['list4'])): ?>
                                <li><i class="<?php echo esc_html($price5_output_box['list4_icon']); ?>"></i> <?php echo esc_html($price5_output_box['list4']); ?></li>
                                <?php endif;?>
                                <?php if(!empty($price5_output_box['list5'])): ?>
                                <li><i class="<?php echo esc_html($price5_output_box['list5_icon']); ?>"></i> <?php echo esc_html($price5_output_box['list5']); ?></li>
                                <?php endif;?>
                                <?php if(!empty($price5_output_box['list6'])): ?>
                                <li><i class="<?php echo esc_html($price5_output_box['list6_icon']); ?>"></i> <?php echo esc_html($price5_output_box['list6']); ?></li>
                                <?php endif;?>
                            </ul>
                            <div class="price">
                                <?php if(!empty($price5_output_box['price'] )): ?>
                                <h2><?php echo $price5_output_box['price']; ?></h2>
                                <?php endif;?>
                                <a class="<?php echo esc_attr($price5_output_box['btclass']); ?>" href="<?php echo esc_url($price5_output_box['btlink1']['url']);?>"><?php echo esc_html($price5_output_box['bttext1']); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <?php endforeach; endif;?>
                
            </div>
        </div>
    </div>
    <!-- End Pricing -->

    <?php }

}