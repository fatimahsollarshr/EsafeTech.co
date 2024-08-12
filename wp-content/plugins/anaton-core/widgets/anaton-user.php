<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton user Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_user_Widget extends \Elementor\Widget_Base {

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
        return 'user';
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
        return esc_html__( 'Home One User Section', 'anaton-core' );
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
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'User Left Section', 'anaton-core' ),
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
                'label'         => esc_html__( 'User Rating Class One','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'rating_two',
            [
                'label'         => esc_html__( 'User Rating Class Two','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'rating_three',
            [
                'label'         => esc_html__( 'User Rating Class Three','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'rating_four',
            [
                'label'         => esc_html__( 'User Rating Class Four','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'rating_five',
            [
                'label'         => esc_html__( 'User Rating Class Five','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'User Side', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add User', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'user Right Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bgimg1',
            [
                'label'     => esc_html__( 'BG Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'img',
            [
                'label'     => esc_html__( 'Image', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater1->add_control(
            'img2',
            [
                'label'     => esc_html__( 'Image Two', 'tanda-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Client Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Image', 'anaton-core' ),
                    ],
                ],
                'title_field' => 'image',
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

        $user_output = $this->get_settings_for_display(); ?>

        <!-- Start Current User 
    ============================================= -->
    <div class="current-user-area default-padding">
        <div class="shape-left-bottom-extra">
            <img src="<?php echo esc_url($user_output['bgimg']['url']);?>" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5">
                    <div class="user-fun-fact">
                
                        <?php
                            if(!empty($user_output['list1'])):
                            foreach ($user_output['list1'] as $user_output_box):?>
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="<?php echo esc_attr($user_output_box['number']); ?>" data-speed="2000"><?php echo esc_html($user_output_box['title']); ?></div>
                                <div class="operator"><?php echo esc_html($user_output_box['operator']); ?></div>
                            </div>
                            <?php if(!empty($user_output_box['rating_one'] || $user_output_box['rating_two'] || $user_output_box['rating_three'] || $user_output_box['rating_four'] || $user_output_box['rating_five'] )): ?>
                            <div class="user-ratings">
                                <?php if(!empty($user_output_box['rating_one'] )): ?>
                                <i class="<?php echo esc_attr($user_output_box['rating_one']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($user_output_box['rating_two'] )): ?>
                                <i class="<?php echo esc_attr($user_output_box['rating_two']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($user_output_box['rating_three'] )): ?>
                                <i class="<?php echo esc_attr($user_output_box['rating_three']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($user_output_box['rating_four'] )): ?>
                                <i class="<?php echo esc_attr($user_output_box['rating_four']); ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($user_output_box['rating_five'] )): ?>
                                <i class="<?php echo esc_attr($user_output_box['rating_five']); ?>"></i>
                                <?php endif;?>
                            </div>
                            <?php endif;?>
                            <span class="medium"><?php echo esc_html($user_output_box['title']); ?></span>
                        </div>
                        <?php endforeach; endif;?>

                        <ul class="list-circle mt-30">
                            <?php
                                if(!empty($user_output['list3'])):
                                foreach ($user_output['list3'] as $user_output_box1):?>
                            <li><?php echo esc_html($user_output_box1['list_text']); ?></li>
                             <?php endforeach; endif;?>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="active-user-info">
                        <div class="shape-globe">
                            <img class="wow fadeInUp" src="<?php echo esc_url($user_output['bgimg1']['url']);?>" alt="Image Not Found">
                        </div>
                        <div class="active-user-banner">
                            <?php
                                if(!empty($user_output['list2'])):
                                foreach ($user_output['list2'] as $user_output_box3):?>
                            <div class="item">
                                <?php if(!empty($user_output_box3['img']['url'] )): ?>
                                <img class="wow fadeInUp" data-wow-delay="200ms" src="<?php echo esc_url($user_output_box3['img']['url']);?>" alt="Image Not Found">
                                <?php endif;?>
                                <?php if(!empty($user_output_box3['img2']['url'] )): ?>
                                <img class="wow fadeInUp" data-wow-delay="600ms" src="<?php echo esc_url($user_output_box3['img2']['url']);?>" alt="Image Not Found">
                                <?php endif;?>
                            </div>
                             <?php endforeach; endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Current User -->

    <?php }

}