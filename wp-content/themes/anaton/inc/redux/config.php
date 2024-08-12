<?php

if (!class_exists('Redux'))
    {
    return;
    }
function newIconFont() 
    { 
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome-all.css' );
    }

add_action( 'redux/page/anaton_options/enqueue', 'newIconFont' );

$opt_name = "anaton_options";
$theme    = wp_get_theme();
$args = array(
    'opt_name' => $opt_name,
    'display_name' => $theme->get('Name') ,
    'display_version' => $theme->get('Version') ,
    'menu_type' => 'menu',
    'allow_sub_menu' => true,
    'menu_title'        => esc_html__( 'Anaton Options', 'anaton' ),
    'google_api_key' => '',
    'google_update_weekly' => false,
    'async_typography' => true,
    'admin_bar' => false,
    'admin_bar_icon' => '',
    'admin_bar_priority' => 50,
    'global_variable' => $opt_name,
    'dev_mode' => false,
    'update_notice' => false,
    'customizer' => false,
    'page_priority' => 3,
    'page_parent' => 'themes.php',
    'page_permissions' => 'manage_options',
    'menu_icon' => '',
    'last_tab' => '',
    'page_icon' => 'icon-themes',
    'page_slug' => 'themeoptions',
    'save_defaults' => true,
    'default_show' => false,
    'default_mark' => '',
    'show_import_export' => true
);
Redux::setArgs( $opt_name, $args );

Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'anaton') ,
    'id' => esc_html__('header', 'anaton') ,
    'icon' => 'far fa-arrow-alt-circle-up',
    'fields' => array(

        array(
            'title'     => esc_html__( 'Favicon', 'anaton' ),
            'id'        => 'favicon',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/img/favicon.png'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Logo', 'anaton' ),
            'id'        => 'logo_start',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Logo Version One', 'anaton' ),
            'id'        => 'logo1',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/img/logo-light.png'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Logo Version Two', 'anaton' ),
            'id'        => 'logo2',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/img/logo.png'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Logo Version Three', 'anaton' ),
            'id'        => 'logo3',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/img/logo-blue.png'
                ), 
            'indent'    => true
        ),
    )
));

Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Preloader', 'anaton' ),
        'id'               => 'anaton_preloader',
        'icon' => 'far fa-arrow-alt-circle-up',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'pre_text_option',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'anaton' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Preloader.', 'anaton' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','anaton'),
                'off'      => esc_html__('Disabled','anaton'),
            ),

            array(
                'id'       => 'anaton_preloader_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'ANATON', 'anaton' ),
            ),
        )
    ));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Buttons', 'anaton') ,
    'id' => esc_html__('headerbuttons', 'anaton') ,
    'icon' => 'far fa-arrow-alt-circle-up',
    'subsection' => true,
    'fields' => array(

        array(
            'title'     => esc_html__( 'Button One', 'anaton' ),
            'id'        => 'button_1',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Text', 'anaton' ),
            'id'        => 'h_bttext1',
            'type'      => 'text',
            'default'   => esc_html__( 'Get consultant', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link', 'anaton' ),
            'id'        => 'h_btlink1',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Home Version Three Button', 'anaton' ),
            'id'        => 'button_2',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Text One', 'anaton' ),
            'id'        => 'h_bttext2',
            'type'      => 'text',
            'default'   => esc_html__( 'Free Trial', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link One', 'anaton' ),
            'id'        => 'h_btlink2',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Text Two', 'anaton' ),
            'id'        => 'h_bttext3',
            'type'      => 'text',
            'default'   => esc_html__( 'Login', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link Two', 'anaton' ),
            'id'        => 'h_btlink3',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Home Version Four Button', 'anaton' ),
            'id'        => 'h_button_3',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Text', 'anaton' ),
            'id'        => 'h_bttext4',
            'type'      => 'text',
            'default'   => esc_html__( 'Hire me now', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link', 'anaton' ),
            'id'        => 'h_btlink4',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Home Version Five Button', 'anaton' ),
            'id'        => 'h_button_4',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Text', 'anaton' ),
            'id'        => 'h_bttext5',
            'type'      => 'text',
            'default'   => esc_html__( 'Start Writting', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button Link', 'anaton' ),
            'id'        => 'h_btlink5',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'anaton') ,
    'id' => esc_html__('footer', 'anaton') ,
    'icon' => 'far fa-arrow-alt-circle-up',
    'fields' => array(

        array(
            'title'     => esc_html__( 'Footer Logo Version One', 'anaton' ),
            'id'        => 'footerlogo1',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/img/logo-light.png'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Footer Logo Version Two', 'anaton' ),
            'id'        => 'footerlogo2',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/img/logo.png'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Footer Logo Version Three', 'anaton' ),
            'id'        => 'footerlogo3',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/img/logo-blue.png'
                ), 
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Description', 'anaton' ),
            'id'        => 'footerdes',
            'type'      => 'textarea',
            'default'   => esc_html__( 'Join our subscribers list to get the instant', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Description Two', 'anaton' ),
            'id'        => 'footerdes2',
            'type'      => 'textarea',
            'default'   => esc_html__( 'latest news and special offers.', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Contact Form ShortCode', 'anaton' ),
            'id'        => 'footercontact',
            'type'      => 'textarea',
            'default'   => esc_html__( 'Enter Contact From 7 ShortCode Here', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'CopyRight Text', 'anaton' ),
            'id'        => 'copyright',
            'type'      => 'textarea',
            'default'   => esc_html__( '&copy; Copyright 2023. Anaton WordPres Theme By ', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'CopyRight Text Two', 'anaton' ),
            'id'        => 'copyright1',
            'type'      => 'textarea',
            'default'   => esc_html__( 'WordPressRiver', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'CopyRight Text Link', 'anaton' ),
            'id'        => 'copyright_link',
            'type'      => 'textarea',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),

    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Social Icons', 'anaton') ,
    'id' => esc_html__('socialicons', 'anaton') ,
    'icon' => 'fas fa-heading',
    'subsection' => true,
    'fields' => array(

        array(
            'title'     => esc_html__( 'Section One', 'anaton' ),
            'id'        => 'se1',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Class', 'anaton' ),
            'id'        => 'sicon1',
            'description' => esc_html__( 'Paste Font-Aweosme Icon Class', 'anaton' ),
            'type'      => 'text',
            'default'   => esc_html__( 'fab fa-facebook-f', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Link', 'anaton' ),
            'id'        => 'sl1',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Section Two', 'anaton' ),
            'id'        => 'se2',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Class', 'anaton' ),
            'id'        => 'sicon2',
            'description' => esc_html__( 'Paste Font-Aweosme Icon Class', 'anaton' ),
            'type'      => 'text',
            'default'   => esc_html__( 'fab fa-twitter', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Link', 'anaton' ),
            'id'        => 'sl2',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),

         array(
            'title'     => esc_html__( 'Section Three', 'anaton' ),
            'id'        => 'se3',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Class', 'anaton' ),
            'id'        => 'sicon3',
            'description' => esc_html__( 'Paste Font-Aweosme Icon Class', 'anaton' ),
            'type'      => 'text',
            'default'   => esc_html__( 'fab fa-linkedin-in', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Link', 'anaton' ),
            'id'        => 'sl3',
            'type'      => 'text',
            'default'   => esc_html__( '#', 'anaton' ),
            'indent'    => true
        ),


        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Company Links', 'anaton') ,
    'id' => esc_html__('companylinkshead', 'anaton') ,
    'icon' => 'far fa-arrow-alt-circle-up',
    'subsection' => true,
    'fields' => array(

        array(
            'title'     => esc_html__( 'Heading', 'anaton' ),
            'id'        => 'companylinks',
            'type'      => 'text',
            'default'   => esc_html__( 'Company', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Menu Location', 'anaton' ),
            'id'        => 'c1',
            'type'      => 'text',
            'default'   => esc_html__( 'Company Links', 'anaton' ),
            'readonly' => true,
            'indent'    => true
        ),

    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Community Links', 'anaton') ,
    'id' => esc_html__('communityshead', 'anaton') ,
    'icon' => 'far fa-arrow-alt-circle-up',
    'subsection' => true,
    'fields' => array(

        array(
            'title'     => esc_html__( 'Heading', 'anaton' ),
            'id'        => 'communitylinks',
            'type'      => 'text',
            'default'   => esc_html__( 'Community', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Menu Location', 'anaton' ),
            'id'        => 'sol1',
            'type'      => 'text',
            'default'   => esc_html__( 'Community Links', 'anaton' ),
            'readonly' => true,
            'indent'    => true
        ),

    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Contact Info', 'anaton') ,
    'id' => esc_html__('contactinfofooter', 'anaton') ,
    'icon' => 'far fa-arrow-alt-circle-up',
    'subsection' => true,
    'fields' => array(

        array(
            'title'     => esc_html__( 'Heading', 'anaton' ),
            'id'        => 'contactinfo1',
            'type'      => 'text',
            'default'   => esc_html__( 'Contact Info', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Section 1', 'anaton' ),
            'id'        => 'c_1',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Class', 'anaton' ),
            'id'        => 'c_icon1',
            'description' => esc_html__( 'Paste Font-Aweosme Icon Class', 'anaton' ),
            'type'      => 'text',
            'default'   => esc_html__( 'fas fa-home', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Text', 'anaton' ),
            'id'        => 'c_text1',
            'type'      => 'textarea',
            'default'   => esc_html__( 'Address:', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Text Two', 'anaton' ),
            'id'        => 'c_text11',
            'type'      => 'textarea',
            'default'   => esc_html__( '5919 Trussville Crossings Pkwy, Birmingham', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Section 2', 'anaton' ),
            'id'        => 'c_2',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Class', 'anaton' ),
            'id'        => 'c_icon2',
            'description' => esc_html__( 'Paste Font-Aweosme Icon Class', 'anaton' ),
            'type'      => 'text',
            'default'   => esc_html__( 'fas fa-envelope', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Text', 'anaton' ),
            'id'        => 'c_text2',
            'type'      => 'textarea',
            'default'   => esc_html__( 'Email:', 'anaton' ),
            'indent'    => true
        ),
        
        array(
            'title'     => esc_html__( 'Text 2', 'anaton' ),
            'id'        => 'c_text22',
            'type'      => 'textarea',
            'default'   => esc_html__( 'support@gmail.com', 'anaton' ),
            'indent'    => true
        ),
        
        array(
            'title'     => esc_html__( 'Section 3', 'anaton' ),
            'id'        => 'c_3',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Icon Class', 'anaton' ),
            'id'        => 'c_icon3',
            'description' => esc_html__( 'Paste Font-Aweosme Icon Class', 'anaton' ),
            'type'      => 'text',
            'default'   => esc_html__( 'fas fa-phone', 'anaton' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Text', 'anaton' ),
            'id'        => 'c_text3',
            'type'      => 'textarea',
            'default'   => esc_html__( 'Phone:', 'anaton' ),
            'indent'    => true
        ),
        
        array(
            'title'     => esc_html__( 'Text 2', 'anaton' ),
            'id'        => 'c_text33',
            'type'      => 'textarea',
            'default'   => esc_html__( '+456 123 4455', 'anaton' ),
            'indent'    => true
        ),

    )
));