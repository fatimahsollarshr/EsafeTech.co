<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton feature6 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_feature6_Widget extends \Elementor\Widget_Base {

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
        return 'feature6';
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
        return esc_html__( 'Home Six Feature Section', 'anaton-core' );
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
                'label' => esc_html__( 'Feature Title Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'feature-style-five-area default-padding overflow-hidden', 'anaton-core' ),
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

        $this->add_control(
            'des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bttext', [
                'label'         => esc_html__( 'Button Text', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bticon', [
                'label'         => esc_html__( 'Button Icon', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
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

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Feature Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            't_title', [
                'label'         => esc_html__( 'Tab Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );   

        $repeater->add_control(
            't_des', [
                'label'         => esc_html__( 'Tab Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'f_img',
            [
                'label'     => esc_html__( 'Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'f_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'f_des',
            [
                'label'         => esc_html__( 'Description','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'f_text1', [
                'label'         => esc_html__( 'Text One', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'f_link1',
            [
                'label'         => esc_html__( 'Link One', 'anaton-core' ),
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
            'f_text2', [
                'label'         => esc_html__( 'Text Two', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'f_link2',
            [
                'label'         => esc_html__( 'Link Two', 'anaton-core' ),
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
            'f_text3', [
                'label'         => esc_html__( 'Text Three', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'f_link3',
            [
                'label'         => esc_html__( 'Link Three', 'anaton-core' ),
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
                'label'     => esc_html__( 'Features Section', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ t_title }}}',
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

        $feature6_output = $this->get_settings_for_display(); ?>

        <!-- Start Feature
    ============================================= -->
    <div class="<?php echo esc_html($feature6_output['class']); ?>">

        <div class="container">
            <div class="left-heading mb-60">
                 <?php if(!empty($feature6_output['title'] )): ?>
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="sub-title"><?php echo esc_html($feature6_output['title']); ?></h4>
                        <h2 class="title"><?php echo esc_html($feature6_output['sub']); ?></h2>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <p>
                            <?php echo esc_html($feature6_output['des']); ?>
                        </p>
                        <a class="btn btn-md circle btn-dark animation mt-15" href="<?php echo esc_url($feature6_output['btlink']['url']); ?>"><?php echo esc_html($feature6_output['bttext']); ?> <i class="<?php echo esc_attr($feature6_output['bticon']); ?>"></i></a>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>

        <div class="container">
            <div class="feaute-style-five-items">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="nav nav-tabs bot-feature-tab-navs" id="nav-tabs" role="tablist">
                            <?php
                                $counter = 1;
                    if(!empty($feature6_output['list1'])):
                    foreach ($feature6_output['list1'] as $feature6_output_box):?>
                            <button class="nav-link <?php if($counter == 1){echo esc_attr("active");}?>" id="nav-id-<?php echo esc_attr($counter);?>" data-bs-toggle="tab" data-bs-target="#tab<?php echo esc_attr($counter);?>" type="button" role="tab" aria-controls="tab<?php echo esc_attr($counter);?>" aria-selected="true">
                                <strong><?php echo esc_html($feature6_output_box['t_title']); ?></strong>
                                <?php echo esc_html($feature6_output_box['t_des']); ?>
                            </button>
                            
                            <?php 
                                $counter++;
                                endforeach; endif;
                                ?>
                        </div>
                    </div>

                    <div class="col-lg-7 offset-lg-1">
                        <div class="tab-content bot-feature-tab-content" id="nav-tabContents">
                            <!-- Tab Single Item -->
                            <?php
                                $counter = 1;
                    if(!empty($feature6_output['list1'])):
                    foreach ($feature6_output['list1'] as $feature6_output_box):?>
                            <div class="tab-pane fade show <?php if($counter == 1){echo esc_attr("active");}?>" id="tab<?php echo esc_attr($counter);?>" role="tabpanel" aria-labelledby="nav-id-<?php echo esc_attr($counter);?>">
                                <div class="top">
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $feature6_output_box['f_img']['id'], 'full' ));?>" alt="Image not Found">
                                    <h4><?php echo esc_html($feature6_output_box['f_title']); ?></h4>
                                </div>
                                <p>
                                    <?php echo esc_html($feature6_output_box['f_des']); ?>
                                </p>
                                <ul class="link-btn">
                                    <?php if(!empty($feature6_output_box['f_text1'] )): ?>
                                    <li>
                                        <a href="<?php echo esc_url($feature6_output_box['f_link1']['url']);?>"><?php echo esc_html($feature6_output_box['f_text1']); ?></a>
                                    </li>
                                    <?php endif;?>
                                    <?php if(!empty($feature6_output_box['f_text2'] )): ?>
                                    <li>
                                        <a href="<?php echo esc_url($feature6_output_box['f_link2']['url']);?>"><?php echo esc_html($feature6_output_box['f_text2']); ?></a>
                                    </li>
                                     <?php endif;?>
                                     <?php if(!empty($feature6_output_box['f_text3'] )): ?>
                                    <li>
                                        <a href="<?php echo esc_url($feature6_output_box['f_link3']['url']);?>"><?php echo esc_html($feature6_output_box['f_text3']); ?></a>
                                    </li>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <!-- End Tab Single Item -->
                            <?php 
                                $counter++;
                                endforeach; endif;
                                ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Feature -->

    <?php }

}