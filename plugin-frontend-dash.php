<?php
/**
 * Plugin Name:       Frontend dash
 * Plugin URI:        https://github.com/axielroque
 * Description:       Handle the basics with this plugin.
 * Version:           1.
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Axiel Roque
 * Author URI:       https://github.com/axielroque
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       arc
 */

 define("ARC_PATH", plugin_dir_path(__FILE__));

// API REST
require_once ARC_PATH."includes/API/api-registro.php";
require_once ARC_PATH."includes/API/api-login.php";
require_once ARC_PATH."includes/API/api-create-post.php";

// Shortcodes 
 require_once  ARC_PATH."public/shortcode/form-registro.php";
 require_once  ARC_PATH."public/shortcode/form-login.php";
 require_once  ARC_PATH."public/shortcode/form-publicPost.php";

 function arc_plugin_active(){
     add_role('cliente', "Cliente", "read_post");
 }
 register_activation_hook( __FILE__, "arc_plugin_active" );

 function arc_plugin_desactive(){
     remove_role( "cliente" );
 }
 register_deactivation_hook( __FILE__, "arc_plugin_desactive" );