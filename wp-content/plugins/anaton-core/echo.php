<?php echo esc_html($hero_output['title']); ?>

<?php echo esc_html($hero_output['sub']); ?>

<?php echo esc_html($hero_output['des']); ?>

<?php echo esc_attr($hero_output['icon']); ?>

<?php echo esc_url($hero_output['btlink1']['url']);?>

<?php echo esc_html($hero_output['bttext1']); ?>

<?php echo esc_url($hero_output['heroimg1']['url']);?>

<?php echo esc_url(wp_get_attachment_image_url( $feature2_output_box['img2']['id'], 'full' ));?>

		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title1',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1',
            [
                'label'     => esc_html__( 'Feature Left Side', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title1 }}}',
            ]
        );

        $this->end_controls_section();

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'title1',
            [
                'label'         => esc_html__( 'Title','anaton-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2',
            [
                'label'     => esc_html__( 'Feature Right Side', 'anaton-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater1->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features', 'anaton-core' ),
                    ],
                ],
                'title_field' => '{{{ title1 }}}',
            ]
        );

        $this->end_controls_section();