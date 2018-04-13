<?php
/*
 * Plugin Name: WP Indicador de Progreso de Lectura
 * Version: 0.5.0
 * Plugin URI: http://mispinitoswp.wordpress.com/
 * Description: Muestra un indicador de progreso de lectura de la entrada en curso.
 * El indicador es una barra roja que va incrementando su ancho en función de la lectura de la entrada.
 * Author: Juan Carlos Gomez-Lobo
 * Author URI: https://profiles.wordpress.org/jcglp
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;


define('WPIPL_VERSION', '0.5.0');
define('WPIPL_SCRIPT_SUFFIX', '.min');



/**
 * Enqueue Plugin Styles
 */
function wpipl_enqueue_styles() {

	if (!is_admin() && is_single()) {
    wp_enqueue_style( 'wp-style', plugins_url( '/assets/css/wpipl_style' . WPIPL_SCRIPT_SUFFIX . '.css', __FILE__ ) , array(), WPIPL_VERSION);
	}

}
add_action( 'wp_enqueue_scripts', 'wpipl_enqueue_styles' );



/**
 * Enqueue Plugin Scripts
*/
function wpipl_enqueue_scripts() {

	if (!is_admin() && is_single()) {
		wp_enqueue_script( 'wp-script', plugins_url( '/assets/js/wpipl_scripts' . WPIPL_SCRIPT_SUFFIX . '.js', __FILE__ ),  array(), WPIPL_VERSION, true );
	}

}
add_action( 'wp_enqueue_scripts', 'wpipl_enqueue_scripts');


function ipl_donate_link($links, $file) {
    if ($file == plugin_basename(__FILE__)) {
        $links[] = '<a href="https://www.paypal.me/jcglp" target="_blank">' . __('Donar') . '</a>';
    }

    return $links;
}
add_filter( 'plugin_row_meta', 'ipl_donate_link', 10, 2 );
