<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton price3 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_price3_Widget extends \Elementor\Widget_Base {

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
        return 'price3';
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
        return esc_html__( 'Home Three Price Section', 'anaton-core' );
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
                'default'         => esc_html__( 'app-type-area bg-cover bg-dark default-padding bottom-less', 'anaton-core' ),
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
                'default'         => esc_html__( 'btn mt-25 btn-md btn-gradient animation','anaton-core' ),
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

        $repeater->add_control(
            'p_img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
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
                        'list_title' => esc_html__( 'Add price3', 'anaton-core' ),
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

        $price3_output = $this->get_settings_for_display(); ?>

        <!-- Start App Type 
    ============================================= -->
    <div class="<?php echo esc_html($price3_output['class']); ?>" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $price3_output['img']['id'], 'full' ));?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <?php
                        if(!empty($price3_output['list1'])):
                        foreach ($price3_output['list1'] as $price3_output_box):?>
                        <!-- Single Item -->
                        <div class="col-lg-6 col-md-6 mb-30">
                            <div class="app-type-style-one <?php echo esc_html($price3_output_box['active_class']); ?>">
                                <div class="content">
                                    <h3><?php echo esc_html($price3_output_box['title1']); ?> <br> <?php echo esc_html($price3_output_box['sub1']); ?></h3>
                                    <ul class="list-circle">
                                        <?php if(!empty($price3_output_box['list1'])): ?>
                                        <li><?php echo esc_html($price3_output_box['list1']); ?></li>
                                        <?php endif;?>
                                         <?php if(!empty($price3_output_box['list2'])): ?>
                                        <li><?php echo esc_html($price3_output_box['list2']); ?></li>
                                        <?php endif;?>
                                         <?php if(!empty($price3_output_box['list3'])): ?>
                                        <li><?php echo esc_html($price3_output_box['list3']); ?></li>
                                        <?php endif;?>
                                    </ul>
                                    <?php if(!empty($price3_output_box['price'] )): ?>
                                    <h2 class="price mt-20"><?php echo $price3_output_box['price']; ?></h2>
                                <?php endif;?>
                                </div>
                                <?php if(!empty($price3_output_box['bttext1'] )): ?>
                                <a class="<?php echo esc_attr($price3_output_box['btclass']); ?>" href="<?php echo esc_url($price3_output_box['btlink1']['url']);?>"><?php echo esc_html($price3_output_box['bttext1']); ?></a>
                                 <?php endif;?>
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $price3_output_box['p_img']['id'], 'full' ));?>" alt="Image Not Found">
                            </div>
                        </div>
                        <!-- End Single Item -->
                        <?php endforeach; endif;?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End App Type -->

    <?php }

}