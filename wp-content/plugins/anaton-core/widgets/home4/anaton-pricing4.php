<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton pricing4 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_pricing4_Widget extends \Elementor\Widget_Base {

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
        return 'pricing4';
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
        return esc_html__( 'Home Four Pricing Section', 'anaton-core' );
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
                'label' => esc_html__( 'Pricing Title Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default'         => esc_html__( 'pricing-style-four-area bg-dark text-light default-padding bottom-less', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hclass', [
                'label'         => esc_html__( 'Heading Class', 'anaton-core' ),
                'default'         => esc_html__( 'site-heading text-light text-center', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

		$this->add_control(
            'tclass', [
                'label'         => esc_html__( 'Title Class', 'anaton-core' ),
                'default'         => esc_html__( 'sub-heading', 'anaton-core' ),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section1',
            [
                'label' => esc_html__( 'Pricing Monthly Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'm_title1', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'm_class', [
                'label'         => esc_html__( 'Active Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'm_icon', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'm_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'm_des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'm_symbol', [
                'label'         => esc_html__( 'Currency', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'm_price', [
                'label'         => esc_html__( 'Price', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'm_btclass',
            [
                'label'         => esc_html__( 'Button Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'm_bttext',
            [
                'label'         => esc_html__( 'Button Text','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'm_btlink',
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
                'label'     => esc_html__( 'Pricing Section One', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Pricing', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ m_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section2',
            [
                'label' => esc_html__( 'Pricing Yearly Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'y_title1', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'y_class', [
                'label'         => esc_html__( 'Active Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'y_icon', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'y_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'y_des', [
                'label'         => esc_html__( 'Description', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'y_symbol', [
                'label'         => esc_html__( 'Currency', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'y_price', [
                'label'         => esc_html__( 'Price', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'y_btclass',
            [
                'label'         => esc_html__( 'Button Class','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'y_bttext',
            [
                'label'         => esc_html__( 'Button Text','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $repeater1->add_control(
            'y_btlink',
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
            'list2',
            [
                'label'     => esc_html__( 'Pricing Section One', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Pricing', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ y_title }}}',
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

        $pricing4_output = $this->get_settings_for_display(); ?>

       
    <!-- Start Pricing 
    ============================================= -->
    <div id="pricing" class="<?php echo esc_html($pricing4_output['class']); ?>">
        <?php if(!empty($pricing4_output['title'] )): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="<?php echo esc_attr($pricing4_output['hclass']); ?>">
                        <h5 class="<?php echo esc_attr($pricing4_output['tclass']); ?>"><?php echo esc_html($pricing4_output['title']); ?></h5>
                        <h2 class="heading"><?php echo $pricing4_output['sub']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="container">
            <div class="pricing-style-four-items">

                <div class="row">
                    <div class="col-lg-12 text-center">
                        
                        <div class="nav nav-tabs pricing-tab-navs" id="nav-tab" role="tablist">
                            <?php if($pricing4_output['class'] == "pricing-style-four-area bg-dark text-light default-padding bottom-less" ): ?>
                            <button class="nav-link active" id="nav-id-1" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">
                                <span><?php echo esc_html($pricing4_output['m_title1']); ?></span>
                            </button>
                            <?php else: ?>
                             <button class="nav-link active" id="nav-id-8" data-bs-toggle="tab" data-bs-target="#tab8" type="button" role="tab" aria-controls="tab3" aria-selected="true">
                                <span><?php echo esc_html($pricing4_output['m_title1']); ?></span>
                            </button>
                            <?php endif; ?>
                            <?php if($pricing4_output['class'] == "pricing-style-four-area bg-dark text-light default-padding bottom-less" ): ?>
                            <button class="nav-link" id="nav-id-2" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">
                                <span><?php echo esc_html($pricing4_output['y_title1']); ?></span>
                            </button>
                            <?php else: ?>
                             <button class="nav-link" id="nav-id-9" data-bs-toggle="tab" data-bs-target="#tab9" type="button" role="tab" aria-controls="tab9" aria-selected="false">
                                <span><?php echo esc_html($pricing4_output['y_title1']); ?></span>
                            </button>
                            <?php endif; ?>
                            
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                        <div class="tab-content pricing-tab-content" id="nav-tabContent">
                            <?php if($pricing4_output['class'] == "pricing-style-four-area bg-dark text-light default-padding bottom-less" ): ?>
                            <!-- Tab Single Item -->
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-id-1">
                                <?php else: ?>
                                <div class="tab-pane fade show active" id="tab8" role="tabpanel" aria-labelledby="nav-id-8">
                                <?php endif; ?>
                                <div class="row">
                                    <?php
                    if(!empty($pricing4_output['list1'])):
                    foreach ($pricing4_output['list1'] as $pricing4_output_box):?>
                                    <!-- Single Item -->
                                    <div class="col-lg-6 col-md-6 mb-30">
                                        <div class="pricing-style-four <?php echo esc_attr($pricing4_output_box['m_class']); ?>">
                                            <i class="<?php echo esc_attr($pricing4_output_box['m_icon']); ?>"></i>
                                            <h4><?php echo esc_html($pricing4_output_box['m_title']); ?></h4>
                                            <ul>
                                                <?php echo $pricing4_output_box['m_des']; ?>
                                            </ul>
                                            <div class="price">
                                                <h2><sup><?php echo esc_html($pricing4_output_box['m_symbol']); ?></sup><?php echo esc_html($pricing4_output_box['m_price']); ?></h2>
                                            </div>
                                            <a class="btn mt-25 btn-sm circle <?php echo esc_html($pricing4_output_box['m_btclass']); ?>" href="<?php echo esc_url($pricing4_output_box['m_btlink']['url']);?>"><?php echo esc_html($pricing4_output_box['m_bttext']); ?></a>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                    <?php endforeach; endif;?>
                                    
                                </div>
                            </div>
                            <!-- End Tab Single Item -->
        
                            <!-- Tab Single Item -->
                            <?php if($pricing4_output['class'] == "pricing-style-four-area bg-dark text-light default-padding bottom-less" ): ?>
                            <!-- Tab Single Item -->
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-id-2">
                                <?php else: ?>
                               <div class="tab-pane fade" id="tab9" role="tabpanel" aria-labelledby="nav-id-9">
                                <?php endif; ?>
                                <div class="row">
                                    <?php
                    if(!empty($pricing4_output['list2'])):
                    foreach ($pricing4_output['list2'] as $pricing4_output_box1):?>
                                    <!-- Single Item -->
                                    <div class="col-lg-6 col-md-6 mb-30">
                                        <div class="pricing-style-four <?php echo esc_attr($pricing4_output_box1['y_class']); ?>">
                                            <i class="<?php echo esc_attr($pricing4_output_box1['y_icon']); ?>"></i>
                                            <h4><?php echo esc_html($pricing4_output_box1['y_title']); ?></h4>
                                            <ul>
                                                <?php echo $pricing4_output_box1['y_des']; ?>
                                            </ul>
                                            <div class="price">
                                                <h2><sup><?php echo esc_html($pricing4_output_box1['y_symbol']); ?></sup><?php echo esc_html($pricing4_output_box1['y_price']); ?></h2>
                                            </div>
                                            <a class="btn mt-25 btn-sm circle <?php echo esc_html($pricing4_output_box1['y_btclass']); ?>" href="<?php echo esc_url($pricing4_output_box1['y_btlink']['url']);?>"><?php echo esc_html($pricing4_output_box1['y_bttext']); ?></a>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
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
    <!-- End Pricing -->

    <?php }

}