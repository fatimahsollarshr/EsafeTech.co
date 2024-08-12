<?php
/**
 * ThemeREX Addons Custom post type: Dishes (Shortcodes)
 *
 * @package ThemeREX Addons
 * @since v1.6.09
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	exit;
}


// trx_sc_dishes
//-------------------------------------------------------------
/*
[trx_sc_dishes id="unique_id" type="default" cat="category_slug or id" count="3" columns="3" slider="0|1"]
*/
if ( !function_exists( 'trx_addons_sc_dishes' ) ) {
	function trx_addons_sc_dishes($atts, $content = '') {	

		// Exit to prevent recursion
		if (trx_addons_sc_stack_check('trx_sc_dishes')) return '';

		$atts = trx_addons_sc_prepare_atts('trx_sc_dishes', $atts, trx_addons_sc_common_atts('id,title,slider,query', array(
			// Individual params
			"type" => "default",
			"no_margin" => 0,
			"popup" => 0,
			"featured_position" => "top",
			"hide_excerpt" => 0,
			"more_text" => esc_html__('Read more', 'trx_addons'),
			"pagination" => "none",
			"page" => 1,
			'posts_exclude' => '',	// comma-separated list of IDs to exclude from output
			))
		);

		if (!empty($atts['ids'])) {
			if ( is_array( $atts['ids'] ) ) {
				$atts['ids'] = join(',', $atts['ids']);
			}
			$atts['ids'] = str_replace(array(';', ' '), array(',', ''), $atts['ids']);
			$ids_count = count( explode( ',', $atts['ids'] ) );
			if ( empty( $atts['count'] ) || $atts['count'] >= $ids_count || empty( $atts['pagination'] ) || trx_addons_is_off( $atts['pagination'] ) ) {
				$atts['count'] = $ids_count;
			}
		}
		$atts['count'] = max(1, (int) $atts['count']);
		$atts['offset'] = max(0, (int) $atts['offset']);
		if (empty($atts['orderby'])) $atts['orderby'] = 'title';
		if (empty($atts['order'])) $atts['order'] = 'asc';
		$atts['popup'] = max(0, (int) $atts['popup']);
		if ($atts['popup']) $atts['class'] .= (!empty($atts['class']) ? ' ' : '') . 'sc_dishes_popup sc_post_details_popup';
		$atts['slider'] = max(0, (int) $atts['slider']);
		if ($atts['slider'] > 0 && (int) $atts['slider_pagination'] > 0) $atts['slider_pagination'] = 'bottom';
		if ($atts['slider'] > 0) $atts['pagination'] = 'none';

		// Load CPT-specific scripts and styles
		trx_addons_cpt_dishes_load_scripts_front( true );

		// Load template
		ob_start();
		trx_addons_get_template_part(array(
										TRX_ADDONS_PLUGIN_CPT . 'dishes/tpl.'.trx_addons_esc($atts['type']).'.php',
										TRX_ADDONS_PLUGIN_CPT . 'dishes/tpl.default.php'
										),
									'trx_addons_args_sc_dishes',
									$atts
									);
		$output = ob_get_contents();
		ob_end_clean();
		
		return apply_filters('trx_addons_sc_output', $output, 'trx_sc_dishes', $atts, $content);
	}
}


// Add shortcode [trx_sc_dishes]
if (!function_exists('trx_addons_sc_dishes_add_shortcode')) {
	function trx_addons_sc_dishes_add_shortcode() {
		add_shortcode("trx_sc_dishes", "trx_addons_sc_dishes");
	}
	add_action('init', 'trx_addons_sc_dishes_add_shortcode', 20);
}
