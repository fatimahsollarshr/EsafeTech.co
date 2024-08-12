<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton Hero Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_teamsingle_Widget extends \Elementor\Widget_Base {

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
        return 'teamsingle';
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
        return esc_html__( 'Pages Team Single Section', 'anaton-core' );
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
                'label' => esc_html__( 'Team Single Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'name', [
                'label'         => esc_html__( 'Name', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'job', [
                'label'         => esc_html__( 'Job', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'des',
            [
                'label'         => esc_html__( 'Description', 'dustra-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]

        );
        
        $this->add_control(
            'headingone', [
                'label'         => esc_html__( 'Social Heading', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        
        $this->add_control(
            'headingoneu',
            [
                'label'         => esc_html__( 'Social Heading Url', 'anaton-core' ),
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'basic_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'basic_text', [
                'label'         => esc_html__( 'Info', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'basic_texturl',
            [
                'label'         => esc_html__( 'Info Link', 'anaton-core' ),
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
                'label'     => esc_html__( 'Basic Info List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ basic_title }}}',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_class', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'icon_link',
            [
                'label'         => esc_html__( 'Icon Link', 'anaton-core' ),
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
            'list',
            [
                'label'     => esc_html__( 'Social Icon List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ icon_class }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'About Member', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_title1', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'ql_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater1->add_control(
            'ql_icon', [
                'label'         => esc_html__( 'Icon Class', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list3',
            [
                'label'     => esc_html__( 'Qualifications List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ ql_title }}}',
            ]
        );

        $this->add_control(
            'about_title2', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'skill_title', [
                'label'         => esc_html__( 'Title', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'skill_per', [
                'label'         => esc_html__( 'Number', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Skill List', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add List', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ skill_title }}}',
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

        $teamsingle_output = $this->get_settings_for_display(); ?>


      <!-- Start Team Single Area
    ============================================= -->
    <div class="team-single-area default-padding-top">
        <div class="container">
            <div class="team-content-top">
                <div class="row">
                    <div class="col-lg-6 left-info">
                        <div class="thumb">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $teamsingle_output['img1']['id'], 'full' ));?>" alt="Thumb">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-right-info">
                            <h2><?php echo esc_html($teamsingle_output['name']); ?></h2>
                            <span><?php echo esc_html($teamsingle_output['job']); ?></span>
                            <p>
                                <?php echo esc_html($teamsingle_output['des']); ?>
                            </p>
                            <ul>
                                <?php 
                        if(!empty($teamsingle_output['list1'])):
                        foreach ($teamsingle_output['list1'] as $teamsingle_info):?>
                                <li>
                                    <strong><?php echo esc_html($teamsingle_info['basic_title']);?></strong>
                                    <a href="<?php echo $teamsingle_info['basic_texturl']['url'];?>"><?php echo esc_html($teamsingle_info['basic_text']);?></a>
                                </li>
                                <?php endforeach; endif;?>
                            </ul>
                            <div class="social">
                                <a class="btn circle btn-sm btn-gradient animation" href="<?php echo esc_url($teamsingle_output['headingoneu']['url']);?>"><?php echo esc_html($teamsingle_output['headingone']);?></a>
                                <div class="share-link">
                                    <i class="fas fa-share-alt"></i>
                                    <ul>
                                        <?php 
            if(!empty($teamsingle_output['list'])):
            foreach ($teamsingle_output['list'] as $teamsingle_social):?>
                                        <li class="<?php echo esc_attr($teamsingle_social['class']);?>">
                                            <a href="<?php echo esc_url($teamsingle_social['icon_link']['url']);?>">
                                                <i class="<?php echo esc_attr($teamsingle_social['icon_class']);?>"></i>
                                            </a>
                                        </li>
                                        <?php endforeach; endif;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-info default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <h2><?php echo esc_html($teamsingle_output['about_title1']); ?></h2>
                        <div class="qualification-grid">
                            <?php 
            if(!empty($teamsingle_output['list3'])):
            foreach ($teamsingle_output['list3'] as $teamsingle_ql):?>
                            <div class="qualification-item">
                                <i class="<?php echo esc_attr($teamsingle_ql['ql_icon']); ?>"></i>
                                <h4><?php echo esc_attr($teamsingle_ql['ql_title']); ?></h4>
                            </div>
                            <?php endforeach; endif;?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="skill-items pl-50 pl-md-0 pl-xs-0 mt-md-50 mt-xs-30">
                            <h2><?php echo esc_html($teamsingle_output['about_title2']); ?></h2>
                            <?php 
            if(!empty($teamsingle_output['list2'])):
            foreach ($teamsingle_output['list2'] as $teamsingle_skill):?>
                            <!-- Progress Bar Start -->
                            <div class="progress-box">
                                <h5><?php echo esc_html($teamsingle_skill['skill_title']); ?></h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" data-width="<?php echo esc_html($teamsingle_skill['skill_per']); ?>">
                                         <span><?php echo esc_html($teamsingle_skill['skill_per']); ?>%</span>
                                    </div>
                                </div>
                            </div>                   
                            <!-- End Progressbar -->
                            <?php endforeach; endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Single Area -->

    <?php }

}