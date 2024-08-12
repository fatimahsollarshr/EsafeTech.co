<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anaton
 */
$anaton_footerlink = "https://themeforest.net/user/wordpressriver/portfolio";
?>
<!-- Start Footer 
============================================= -->
<footer class="bg-dark text-light">
    
    <!-- Footer Bottom -->
    <div class="footer-bottom footer1 bg-dark text-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        <?php esc_html_e('Copyright &copy;  2023. Designed by' , 'anaton'); ?> <a href="<?php echo esc_url($anaton_footerlink); ?>"><?php esc_html_e('WordPressRiver' , 'anaton'); ?></a>
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