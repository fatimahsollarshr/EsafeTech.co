<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton about4 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_about4_Widget extends \Elementor\Widget_Base {

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
        return 'about4';
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
        return esc_html__( 'Home Four About Section', 'anaton-core' );
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
     * Add input fields to allow the about4 to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'About Left Section', 'anaton-core' ),
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
            'des',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'l_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'l_sub',
            [
                'label'         => esc_html__( 'Sub Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'About List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ l_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'About Right Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'w_img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater2->add_control(
            'w_title',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater2->add_control(
            'w_exp',
            [
                'label'         => esc_html__( 'Experience','anaton-core' ),
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
                'title_field' => '{{{w_title}}}',
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

        $about4_output = $this->get_settings_for_display(); ?>

       <!-- Start About 
    ============================================= -->
    <div id="about" class="about-style-three-area">
        <div class="container">
            <div class="about-style-three-items">
                <div class="row align-center">
                    <div class="col-lg-5">
                        <div class="about-style-three text-light">
                            <h2 class="heading"><?php echo esc_html($about4_output['title']); ?></h2>
                            <p>
                                <?php echo $about4_output['des']; ?>
                            </p>
                            <ul class="about-list">
                                <?php
                            if(!empty($about4_output['list1'])):
                            foreach ($about4_output['list1'] as $about4_output_box):?>
                                <li><strong><?php echo esc_html($about4_output_box['l_title']); ?></strong> <?php echo esc_html($about4_output_box['l_sub']); ?></li>
                                <?php endforeach; endif;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <ul class="work-now">
                            <?php
                                if(!empty($about4_output['list3'])):
                                foreach ($about4_output['list3'] as $about4_output_box1):?>
                            <li>
                                <div class="info">
                                    <h4><?php echo esc_html($about4_output_box1['w_title']); ?></h4>
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $about4_output_box1['w_img']['id'], 'full' ));?>" alt="Image Not Found">
                                </div>
                                <div class="work-time"><?php echo esc_html($about4_output_box1['w_exp']); ?></div>
                            </li>
                            <?php endforeach; endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <?php }

}