<?php
global $anaton_options;
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anaton
 */
?>
<!-- Start Footer 
============================================= -->
<footer class="bg-dark text-light">
    <div class="container">
        <div class="f-items default-padding">
            <div class="row">
                <!-- Singel Item -->
                <div class="col-lg-5 col-md-6 footer-item pr-50 pr-xs-15 pr-md-15">
                    <div class="f-item about">
                        <img class="logo" src="<?php echo esc_url($anaton_options['footerlogo2']['url']); ?>"
                            alt="<?php echo esc_attr__('Logo', 'anaton') ?>">

                        <div class="f-item newsletter">
                            <p>
                                <?php echo esc_html($anaton_options['footerdes']); ?><br>
                                <?php echo esc_html($anaton_options['footerdes2']); ?>
                            </p>
                            <?php echo apply_shortcodes($anaton_options['footercontact']); ?>
                        </div>
                        <div class="copyright-text mt-40">
                            <p><?php echo esc_html($anaton_options['copyright']); ?><a
                                    href="<?php echo esc_url($anaton_options['copyright_link']); ?>"><?php echo esc_html($anaton_options['copyright1']); ?></a>
                            </p>
                        </div>
                        <div class="footer-social mt-20">
                            <ul>
                                <?php if (!empty($anaton_options['sicon1'])) { ?>
                                    <li><a href="<?php echo esc_url($anaton_options['sl1']); ?>"><i
                                                class="<?php echo esc_attr($anaton_options['sicon1']); ?>"></i></a></li>
                                <?php } ?>
                                <?php if (!empty($anaton_options['sicon2'])) { ?>
                                    <li><a href="<?php echo esc_url($anaton_options['sl2']); ?>"><i
                                                class="<?php echo esc_attr($anaton_options['sicon2']); ?>"></i></a></li>
                                <?php } ?>
                                <?php if (!empty($anaton_options['sl3'])) { ?>
                                    <li><a href="<?php echo esc_url($anaton_options['sl3']); ?>"><i
                                                class="<?php echo esc_attr($anaton_options['sicon3']); ?>"></i></a></li>
                                <?php } ?>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 64 64.000002" width="40" height="40"
                                            style="margin-top: -5px;fill:#ffffff">
                                            <title>logo_crunchbase</title>
                                            <path
                                                style="clip-rule:evenodd;fill:#ee7879;fill-opacity:1;fill-rule:evenodd;stroke-width:0.10474632;stroke-linejoin:round;stroke-miterlimit:1.41400003"
                                                d="m 64.000001,8.0000025 c 0,-4.41736 -3.58264,-8 -8,-8 H 7.9999985 c -4.41736,0 -8,3.58264 -8,8 V 55.999997 c 0,4.41736 3.58264,8 8,8 H 56.000001 c 4.41736,0 8,-3.58264 8,-8 z">
                                            </path>
                                            <g transform="matrix(2.3849106,0,0,2.3849106,-9.5449499,-43.547318)"
                                                style="fill:#ffffff">
                                                <path style="fill:#ffffff;fill-opacity:1;stroke-width:0.57408553"
                                                    d="m 13.939838,33.65836 a 2.9622812,2.9622812 0 1 1 0.03444,-2.439863 h 2.296342 a 5.1667696,5.1667696 0 1 0 0,2.439863 h -2.296342 z">
                                                </path>
                                                <path style="fill:#ffffff;fill-opacity:1;stroke-width:0.57408553"
                                                    d="m 23.510509,27.257306 h -0.378897 a 5.0978793,5.0978793 0 0 0 -2.525976,0.889833 v -5.752337 h -2.095412 v 14.794184 h 2.106894 v -0.539641 a 5.1667696,5.1667696 0 1 0 2.893391,-9.392039 z m 2.962281,5.534185 v 0.09185 a 2.9393178,2.9393178 0 0 1 -0.08037,0.361674 v 0 a 2.933577,2.933577 0 0 1 -0.143521,0.373156 v 0.04593 a 2.9795038,2.9795038 0 0 1 -2.072449,1.624662 v 0 l -0.281302,0.04593 h -0.06315 a 2.9163544,2.9163544 0 0 1 -0.321488,0 v 0 a 2.9622812,2.9622812 0 0 1 -0.40186,-0.02871 H 23.0168 a 2.933577,2.933577 0 0 1 -0.752052,-0.229634 h -0.05741 a 2.9737629,2.9737629 0 0 1 -0.66594,-0.447787 v 0 a 2.9909855,2.9909855 0 0 1 -0.522417,-0.625753 v 0 a 2.9622812,2.9622812 0 0 1 -0.189449,-0.367414 v 0 a 2.9450587,2.9450587 0 0 1 0.03445,-2.439864 v 0 a 2.9680221,2.9680221 0 0 1 2.376714,-1.68207 2.933577,2.933577 0 0 1 0.304265,0 v 0 a 2.9680221,2.9680221 0 0 1 2.927836,2.881909 v 0 a 2.9565404,2.9565404 0 0 1 0,0.396119 z">
                                                </path>
                                            </g>
                                        </svg>
                                    </a></li>
                                <li><a><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                            viewBox="0 0 64 64" version="1.1" style="
    margin-top: -5px;
">
                                            <title>F6S-logo</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs></defs>
                                            <g style="fill:none;fill-rule:evenodd;stroke:none;stroke-width:1"
                                                transform="scale(0.08)">
                                                <g>
                                                    <path
                                                        d="M 400,0 C 179.086,0 0,179.086 0,400 0,620.914 179.086,800 400,800 620.914,800 800,620.914 800,400 800,179.086 620.914,0 400,0 Z"
                                                        style="fill:#ee7879"></path>
                                                    <polygon
                                                        points="156.901,180.139 289.76,180.139 293.734,180.139 293.734,184.113 293.734,233.935 293.734,237.909 289.76,237.909 210.697,237.909 210.697,362.821 256.545,362.821 260.519,362.821 260.519,366.795 260.519,416.617 260.519,420.591 256.545,420.591 210.697,420.591 210.697,615.905 210.697,619.879 206.723,619.879 156.901,619.879 152.927,619.879 152.927,615.905 152.927,184.113 152.927,180.139 "
                                                        style="fill:#ffffff"></polygon>
                                                    <path
                                                        d="m 372.428,237.909 v 124.912 h 68.517 c 16.582,0 31.127,14.476 31.127,30.977 v 194.721 c 0,16.705 -14.545,31.359 -31.127,31.359 h -95.027 c -16.59,0 -31.143,-14.289 -31.143,-30.578 V 212.296 c 0,-16.829 14.448,-32.156 30.313,-32.156 h 95.858 c 16.582,0 31.127,14.468 31.127,30.961 v 72.657 3.974 h -3.974 -49.822 -3.974 v -3.974 -45.849 z m 0.016,182.68 v 141.519 h 41.875 V 420.589 Z"
                                                        style="fill:#ffffff"></path>
                                                    <path
                                                        d="m 647.073,283.74 v 3.974 h -3.974 -49.822 -3.974 v -3.974 -45.849 h -41.875 v 124.913 l 69.116,0.016 c 16.441,0 30.529,19.672 30.529,35.777 v 189.705 c 0,16.812 -14.266,31.558 -30.529,31.558 h -92.918 c -16.254,0 -30.512,-14.367 -30.512,-30.744 v -106.004 -3.966 l 3.966,-0.007 46.368,-0.083 3.981,-0.007 v 3.981 79.063 h 41.875 V 420.574 l -65.706,0.016 c -16.239,0 -30.484,-14.553 -30.484,-31.143 V 211.282 c 0,-16.599 14.258,-31.16 30.512,-31.16 h 92.918 c 16.263,0 30.529,14.561 30.529,31.16 z"
                                                        style="fill:#ffffff"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Singel Item -->

                <!-- Singel Item -->
                <div class="col-lg-2 col-md-6 footer-item">
                    <div class="f-item link">
                        <h4 class="widget-title"><?php echo esc_html($anaton_options['companylinks']); ?></h4>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu1',
                            )
                        );
                        ?>
                    </div>
                </div>
                <!-- End Singel Item -->

                <!-- Singel Item -->
                <div class="col-lg-2 col-md-6 footer-item">
                    <div class="f-item link">
                        <h4 class="widget-title"><?php echo esc_html($anaton_options['communitylinks']); ?></h4>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu2',
                            )
                        );
                        ?>
                    </div>
                </div>
                <!-- End Singel Item -->

                <!-- Singel Item -->
                <div class="col-lg-3 col-md-6 item">
                    <div class="footer-item contact">
                        <h4 class="widget-title"><?php echo esc_html($anaton_options['contactinfo1']); ?></h4>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="<?php echo esc_attr($anaton_options['c_icon1']); ?>"></i>
                                </div>
                                <div class="content">
                                    <strong><?php echo esc_html($anaton_options['c_text1']); ?></strong>
                                    <?php echo esc_html($anaton_options['c_text11']); ?>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="<?php echo esc_attr($anaton_options['c_icon2']); ?>"></i>
                                </div>
                                <div class="content">
                                    <strong><?php echo esc_html($anaton_options['c_text2']); ?></strong>
                                    <?php echo esc_html($anaton_options['c_text22']); ?>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="<?php echo esc_attr($anaton_options['c_icon3']); ?>"></i>
                                </div>
                                <div class="content">
                                    <strong><?php echo esc_html($anaton_options['c_text3']); ?></strong>
                                    <?php echo esc_html($anaton_options['c_text33']); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Singel Item -->

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom bg-dark text-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p><?php echo esc_html($anaton_options['copyright']); ?><a
                            href="<?php echo esc_url($anaton_options['copyright_link']); ?>"><?php echo esc_html($anaton_options['copyright1']); ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->

    <div class="foter-shape-right-bottom">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/shape/10.png'); ?>" alt="Thumb">
    </div>
</footer>
<!-- End Footer -->

<?php wp_footer(); ?>
</body>

</html>