<?php
defined( 'ABSPATH' ) or exit;

/**
 * Plugin Name: Advanced Custom Fields - Key Generator
 * Description: An add-on for Advanced Custom Fields. Adds a button at Custom Fields → Tools that generates field and group keys.
 * Plugin URI: https://github.com/csalzano/advanced-custom-fields-key-generator
 * Author: Corey Salzano
 * Author URI: https://breakfastco.xyz
 * Version: 0.1.0
 * Text Domain: acf-key-gen
 * License: GPLv2
 */

class ACF_Tool_Key_Generator
{
	public function add_hooks()
	{
		//Add an ACF admin tool after the ACF admin page is loaded
		add_action( 'acf/include_admin_tools', array( $this, 'add_admin_tool' ), 11 );
		// Backwards compatibility, the hook was renamed
		add_action( 'load-custom-fields_page_acf-tools', array( $this, 'add_admin_tool' ), 11 );
	}

	public function add_admin_tool()
	{
		//Add a box to Custom Fields > Tools
		include_once( dirname( __FILE__ ) .  '/class-tool.php' );
		acf_register_admin_tool( 'ACF_Admin_Tool_Key_Generator' );
	}
}
$acf_key_gen_29374 = new ACF_Tool_Key_Generator();
$acf_key_gen_29374->add_hooks();
