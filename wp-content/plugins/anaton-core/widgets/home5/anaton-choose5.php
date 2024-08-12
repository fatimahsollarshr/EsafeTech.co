<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton choose5 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_choose5_Widget extends \Elementor\Widget_Base {

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
        return 'choose5';
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
        return esc_html__( 'Home Five Choose Section', 'anaton-core' );
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

    public function get_script_depends() {
        return array('main');
    }  

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the choose5 to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Choose Left Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bgimg',
            [
                'label'     => esc_html__( 'BG Img', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'number',
            [
                'label'         => esc_html__( 'Number','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'operator',
            [
                'label'         => esc_html__( 'Operator','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'rating_one',
            [
                'label'         => esc_html__( 'choose5 Rating Class One','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'rating_two',
            [
                'label'         => esc_html__( 'choose5 Rating Class Two','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'rating_three',
            [
                'label'         => esc_html__( 'choose5 Rating Class Three','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'rating_four',
            [
                'label'         => esc_html__( 'choose5 Rating Class Four','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'rating_five',
            [
                'label'         => esc_html__( 'choose5 Rating Class Five','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'choose5 Side', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add choose5', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Choose Right Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->add_control(
            'des',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bttext',
            [
                'label'         => esc_html__( 'Button Text','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'btlink',
            [
                'label'         => esc_html__( ' Button Link', 'anaton-core' ),
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

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'list_text',
            [
                'label'         => esc_html__( 'List','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list3',
            [
                'label'     => esc_html__( 'List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater2->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{list_text}}}',
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

        $choose5_output = $this->get_settings_for_display(); ?>

        <!-- Start Choose Us  
    ============================================= -->
    <div class="choose-us-style-two-area default-padding overflow-hidden bg-gray">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5">
                    <div class="choose-us-fun-fact text-center" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_url( $choose5_output['bgimg']['id'], 'full' ));?>);">
                        <?php
                            if(!empty($choose5_output['list1'])):
                            foreach ($choose5_output['list1'] as $choose5_output_box):?>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="<?php echo esc_attr($choose5_output_box['number']); ?>" data-speed="2000"><?php echo esc_html($choose5_output_box['title']); ?></div>
                                <div class="operator"><?php echo esc_html($choose5_output_box['operator']); ?></div>
                            </div>
                            <?php if(!empty($choose5_output_box['rating_one'] || $choose5_output_box['rating_two'] || $choose5_output_box['rating_three'] || $choose5_output_box['rating_four'] || $choose5_output_box['rating_five'] )): ?>
                            <div class="choose5-ratings">
                                <?php if(!empty($choose5_output_box['rating_one'] )): ?>
                                <i class="<?php echo esc_attr($choose5_output_box['rating_one']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($choose5_output_box['rating_two'] )): ?>
                                <i class="<?php echo esc_attr($choose5_output_box['rating_two']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($choose5_output_box['rating_three'] )): ?>
                                <i class="<?php echo esc_attr($choose5_output_box['rating_three']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($choose5_output_box['rating_four'] )): ?>
                                <i class="<?php echo esc_attr($choose5_output_box['rating_four']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($choose5_output_box['rating_five'] )): ?>
                                <i class="<?php echo esc_attr($choose5_output_box['rating_five']); ?>"></i>
                                <?php endif;?>
                            </div>
                            <?php endif;?>
                            <span class="medium"><?php echo esc_html($choose5_output_box['title']); ?></span>
                        </div>
                        <?php endforeach; endif;?>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="choose-us-style-two">
                        <h4 class="sub-heading theme"><?php echo esc_html($choose5_output['title']); ?></h4>
                        <h2 class="heading"><?php echo $choose5_output['sub']; ?></h2>
                        <p>
                            <?php echo esc_html($choose5_output['des']); ?>
                        </p>
                        <ul>
                            <?php
                                if(!empty($choose5_output['list3'])):
                                foreach ($choose5_output['list3'] as $choose5_output_box1):?>
                            <li><?php echo esc_html($choose5_output_box1['list_text']); ?></li>
                            <?php endforeach; endif;?>
                        </ul>
                        <a class="btn circle mt-35 btn-sm btn-border light secondary" href="<?php echo esc_url($choose5_output['btlink']['url']);?>"><?php echo esc_html($choose5_output['bttext']); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Choose Us  -->

    <?php }

}