<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor anaton Team Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_anaton_team_Widget extends \Elementor\Widget_Base {

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
        return 'team';
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
        return esc_html__( 'Pages About Team Section', 'anaton-core' );
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
                'label' => esc_html__( 'Pages About Team Section', 'anaton-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'class', [
                'label'         => esc_html__( 'Class', 'anaton-core' ),
                'default' => esc_html__( 'team-area default-padding bottom-less', 'anaton-core' ),
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img1',
            [
                'label'     => esc_html__( 'Image', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'name', [
                'label'         => esc_html__( 'Name', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         $repeater->add_control(
            'link',
            [
                'label'         => esc_html__( 'Link', 'anaton-core' ),
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
            'job', [
                'label'         => esc_html__( 'Job', 'anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         $repeater->add_control(
            'message',
            [
                'label'         => esc_html__( 'Message Link', 'anaton-core' ),
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
            'fb',
            [
                'label'         => esc_html__( 'FaceBook Url', 'anaton-core' ),
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
            'tw',
            [
                'label'         => esc_html__( 'Twitter Url', 'anaton-core' ),
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
            'yt',
            [
                'label'         => esc_html__( 'YouTube Url', 'anaton-core' ),
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
            'ln',
            [
                'label'         => esc_html__( 'Linkedin Url', 'anaton-core' ),
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
            'instagram',
            [
                'label'         => esc_html__( 'Instagram Url', 'anaton-core' ),
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
                'label'     => esc_html__( 'Team Members', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Team Members', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
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

        $team_output = $this->get_settings_for_display(); ?>

       <!-- Start Team 
    ============================================= -->
    <div class="<?php echo esc_html($team_output['class']); ?>">
        <?php if(!empty($team_output['title'] || $team_output['sub'] )): ?>
        <div class="container">
            <div class="team-box default-padding bottom-less pr-50 pr-md-0 pr-xs-0">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="site-heading text-light text-center">
                            <h5 class="sub-title"><?php echo esc_html($team_output['title']); ?></h5>
                            <h2 class="title"><?php echo esc_html($team_output['sub']); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php else: ?>
        <div class="container">
            <div class="row">
                 <?php endif;?>
                    <?php 
            if(!empty($team_output['list'])):
            foreach ($team_output['list'] as $team_box):?>
                    <!-- Single Item -->
                    <div class="team-style-one col-lg-4 col-md-6 mb-40">
                        <div class="item">
                            <div class="thumb">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $team_box['img1']['id'], 'full' ));?>" alt="Image Not Found">
                                <div class="team-social">
                                    <a href="<?php echo esc_url($team_box['message']['url']);?>"><i class="fas fa-comments-alt"></i></a>
                                    <div class="share-link">
                                        <i class="fas fa-share-alt"></i>
                                        <ul>
                                            <?php if(!empty($team_box['fb']['url'])):?>
                                            <li class="facebook">
                                                <a href="<?php echo esc_url($team_box['fb']['url']);?>">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($team_box['tw']['url'])):?>
                                            <li class="twitter">
                                                <a href="<?php echo esc_url($team_box['tw']['url']);?>">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($team_box['yt']['url'])):?>
                                            <li class="youtube">
                                                <a href="<?php echo esc_url($team_box['yt']['url']);?>">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($team_box['ln']['url'])):?>
                                            <li class="youtube">
                                                <a href="<?php echo esc_url($team_box['ln']['url']);?>">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </li>
                                            <?php endif;?>
                                            <?php if(!empty($team_box['instagram']['url'])):?>
                                            <li class="youtube">
                                                <a href="<?php echo esc_url($team_box['instagram']['url']);?>">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <?php endif;?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="content">
                                    <h4><a href="<?php echo esc_url($team_box['link']['url']);?>"><?php echo esc_html($team_box['name']);?></a></h4>
                                    <span><?php echo esc_attr($team_box['job']);?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <?php endforeach; endif;?>
                <?php if(!empty($team_output['title'] || $team_output['sub'] )): ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team -->
<?php else: ?>
    </div>
        </div>
    </div>
    <!-- End Team -->
<?php endif;?>

    <?php }

}