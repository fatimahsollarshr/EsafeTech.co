<?php
/**
 * Plugin Name: Anaton Core
 * Description: Anaton Core Plugin Contains Elementor Widgets Specifically created for Anaton WordPress Theme.
 * Plugin URI:  wordpressriverthemes.com/anaton
 * Version:     1.0
 * Author:      WordPressRiver
 * Author URI:  https://themeforest.net/user/wordpressriver/portfolio
 * Text Domain: anaton-core
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */


if ( !defined('ABSPATH') )
    die('-1');

// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'anaton_core' ) ) {
	/**
	 * Main anaton Core Class
	 *
	 * The main class that initiates and runs the anaton Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class anaton_core {
		/**
		 * anaton Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `anaton_core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var anaton_core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return anaton_core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'anaton-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'anaton-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the anaton Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'anaton_core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
		
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'anaton-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}



		/**
		 * Init anaton Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a sanatonlone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Styles
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this,'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a sanatonlone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: anaton Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'anaton-core' ),
				'<strong>' . esc_html__( 'anaton core', 'anaton-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'anaton-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a sanatonlone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: anaton Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'anaton-core' ),
				'<strong>' . esc_html__( 'anaton Core', 'anaton-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'anaton-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: anaton Core 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'anaton-core' ),
				'<strong>' . esc_html__( 'anaton Core', 'anaton-core' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'anaton-core' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for anaton Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'anaton', [
				'title' => __( 'Anaton Elements', 'anaton-core' ),
			], 1 );
		}


		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Saasland Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			wp_register_script( 'main', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), false, true );
		}




		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Saasland Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		
		public function enqueue_widget_styles() {

		}

		/**
		 * Register New Widgets
		 *
		 * Include anaton Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load anaton Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {
		    
		    // Home 1
					
			require_once( __DIR__ . '/widgets/anaton-hero.php' );

			require_once( __DIR__ . '/widgets/anaton-feature.php' );

			require_once( __DIR__ . '/widgets/anaton-brand.php' );

			require_once( __DIR__ . '/widgets/anaton-software.php' );

			require_once( __DIR__ . '/widgets/anaton-service.php' );

			require_once( __DIR__ . '/widgets/anaton-user.php' );

			require_once( __DIR__ . '/widgets/anaton-price.php' );

			require_once( __DIR__ . '/widgets/anaton-testimonial.php' );

			require_once( __DIR__ . '/widgets/anaton-faq.php' );

			require_once( __DIR__ . '/widgets/anaton-blog.php' );

			// Pages

				// About Page

				require_once( __DIR__ . '/widgets/pages/anaton-about.php' );

				require_once( __DIR__ . '/widgets/pages/anaton-tools.php' );

				require_once( __DIR__ . '/widgets/pages/anaton-testimonial2.php' );

				require_once( __DIR__ . '/widgets/pages/anaton-faq2.php' );

				// Team

				require_once( __DIR__ . '/widgets/pages/anaton-team.php' );

				// Faq

				require_once( __DIR__ . '/widgets/pages/anaton-faq3.php' );

				// Contact

				require_once( __DIR__ . '/widgets/pages/anaton-contact.php' );

				// Team Single

				require_once( __DIR__ . '/widgets/pages/anaton-teamsingle.php' );

			// Projects

				// Version One

				require_once( __DIR__ . '/widgets/pages/project/anaton-project1.php' );

				// Project Single

				require_once( __DIR__ . '/widgets/pages/project/anaton-projectsingle.php' );

			// Services

				// Service Version One

				require_once( __DIR__ . '/widgets/pages/services/services1/anaton-choose.php' );

				// Service Version Two

				require_once( __DIR__ . '/widgets/pages/services/services2/anaton-process.php' );

				require_once( __DIR__ . '/widgets/pages/services/services2/anaton-feature2.php' );

				require_once( __DIR__ . '/widgets/pages/services/services2/anaton-trial.php' );

				require_once( __DIR__ . '/widgets/pages/services/services2/anaton-price2.php' );

				require_once( __DIR__ . '/widgets/pages/services/anaton-servicesingle.php' );

		// Home Two

				// Hero

				require_once( __DIR__ . '/widgets/home2/anaton-hero2.php' );

				// Info

				require_once( __DIR__ . '/widgets/home2/anaton-info.php' );

				// Blog

				require_once( __DIR__ . '/widgets/home2/anaton-blog2.php' );

		// Home Three

				// Hero

				require_once( __DIR__ . '/widgets/home3/anaton-hero3.php' );

				// Feature

				require_once( __DIR__ . '/widgets/home3/anaton-feature3.php' );

				// Services

				require_once( __DIR__ . '/widgets/home3/anaton-service3.php' );

				// Price

				require_once( __DIR__ . '/widgets/home3/anaton-price3.php' );

		// Home Four

				// Hero

				require_once( __DIR__ . '/widgets/home4/anaton-hero4.php' );

				// Performance

				require_once( __DIR__ . '/widgets/home4/anaton-performance.php' );

				// About

				require_once( __DIR__ . '/widgets/home4/anaton-about4.php' );

				// Service

				require_once( __DIR__ . '/widgets/home4/anaton-service4.php' );

				// Project

				require_once( __DIR__ . '/widgets/home4/anaton-project4.php' );

				// Pricing

				require_once( __DIR__ . '/widgets/home4/anaton-pricing4.php' );

		// Home Version Five AI Writer

				// Hero

				require_once( __DIR__ . '/widgets/home5/anaton-hero5.php' );

				// Work

				require_once( __DIR__ . '/widgets/home5/anaton-work5.php' );

				// Overview

				require_once( __DIR__ . '/widgets/home5/anaton-overview5.php' );

				// Choose

				require_once( __DIR__ . '/widgets/home5/anaton-choose5.php' );

				// Testimonial

				require_once( __DIR__ . '/widgets/home5/anaton-testimonial5.php' );

				// Pricing

				require_once( __DIR__ . '/widgets/home5/anaton-price5.php' );

				// Faq

				require_once( __DIR__ . '/widgets/home5/anaton-faq5.php' );

		// Home Version Six ChatBot

				// Hero

				require_once( __DIR__ . '/widgets/home6/anaton-hero6.php' );

				// Feature

				require_once( __DIR__ . '/widgets/home6/anaton-feature6.php' );

				// About

				require_once( __DIR__ . '/widgets/home6/anaton-about6.php' );

				// Techonolgy

				require_once( __DIR__ . '/widgets/home6/anaton-technology6.php' );

				// Faq

				require_once( __DIR__ . '/widgets/home6/anaton-faq6.php' );

		// Home Version Seven

				// Hero

				require_once( __DIR__ . '/widgets/home7/anaton-hero7.php' );

				// Counter

				require_once( __DIR__ . '/widgets/home7/anaton-counter7.php' );

				// Feature

				require_once( __DIR__ . '/widgets/home7/anaton-feature7.php' );

				// Trial

				require_once( __DIR__ . '/widgets/home7/anaton-trial7.php' );

				// Process

				require_once( __DIR__ . '/widgets/home7/anaton-process7.php' );

				// Feature

				require_once( __DIR__ . '/widgets/home7/anaton-software7.php' );

		// Home Version Eight ( Creative Agency )

				// Hero 

				require_once( __DIR__ . '/widgets/home8/anaton-hero8.php' );

				// Service

				require_once( __DIR__ . '/widgets/home8/anaton-service8.php' );

				// About

				require_once( __DIR__ . '/widgets/home8/anaton-about8.php' );

				// Project

				require_once( __DIR__ . '/widgets/home8/anaton-project8.php' );

				// Faq

				require_once( __DIR__ . '/widgets/home8/anaton-faq8.php' );


        }
			
		/**
		 * Register Widgets
		 *
		 * Register anaton Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_hero_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_feature_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_brand_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_software_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_service_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_user_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_price_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_testimonial_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_faq_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_blog_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_about1_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_tools_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_testimonial2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_faq2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_team_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_faq3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_contact_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_teamsingle_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_project1_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_projectsingle_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_choose_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_process_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_feature2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_trial_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_price2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_servicesingle_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_blog2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_info_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_hero2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_hero3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_feature3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_service3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_price3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_hero4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_performance_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_about4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_service4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_project4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_pricing4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_hero5_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_work5_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_overview5_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_choose5_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_testimonial5_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_price5_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_faq5_Widget() );		

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_hero6_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_feature6_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_about6_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_technology6_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_faq6_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_hero7_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_counter7_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_feature7_Widget() );		

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_trial7_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_process7_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_software7_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_hero8_Widget() );		

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_service8_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_about8_Widget() );		

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_project8_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_anaton_faq8_Widget() );			
		}
	}
} 
// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'anaton_core_load' ) ) {
	/**
	 * Load anaton Core
	 *
	 * Main instance of anaton_core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function anaton_core_load() {
		return anaton_core::instance();
	}

	// Run anaton Core
    anaton_core_load();
}