<?php
/* "Copyright 2012 A3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
/*-----------------------------------------------------------------------------------
Slider Template 2 Tab

TABLE OF CONTENTS

- var parent_page
- var position
- var tab_data

- __construct()
- tab_init()
- tab_data()
- add_tab()
- settings_include()
- tab_manager()

-----------------------------------------------------------------------------------*/

class A3_Responsive_Slider_Template_2_Tab extends A3_Responsive_Slider_Admin_UI
{	
	/**
	 * @var string
	 */
	private $parent_page = 'a3-rslider-skins';
	
	/**
	 * @var string
	 * You can change the order show of this tab in list tabs
	 */
	private $position = 2;
	
	/**
	 * @var array
	 */
	private $tab_data;
	
	/*-----------------------------------------------------------------------------------*/
	/* __construct() */
	/* Settings Constructor */
	/*-----------------------------------------------------------------------------------*/
	public function __construct() {
		
		$this->settings_include();
		$this->tab_init();
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* tab_init() */
	/* Tab Init */
	/*-----------------------------------------------------------------------------------*/
	public function tab_init() {
		
		add_filter( $this->plugin_name . '-' . $this->parent_page . '_settings_tabs_array', array( $this, 'add_tab' ), $this->position );
		
	}
	
	/**
	 * tab_data()
	 * Get Tab Data
	 * =============================================
	 * array ( 
	 *		'name'				=> 'my_tab_name'				: (required) Enter your tab name that you want to set for this tab
	 *		'label'				=> 'My Tab Name' 				: (required) Enter the tab label
	 * 		'callback_function'	=> 'my_callback_function'		: (required) The callback function is called to show content of this tab
	 * )
	 *
	 */
	public function tab_data() {
		
		$tab_data = array( 
			'name'				=> 'a3-rslider-template-2',
			'label'				=> A3_Responsive_Slider_Functions::get_slider_template( 'template-2' ),
			'callback_function'	=> 'a3_responsive_slider_template_2_tab_manager',
		);
		
		if ( $this->tab_data ) return $this->tab_data;
		return $this->tab_data = $tab_data;
		
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* add_tab() */
	/* Add tab to Admin Init and Parent Page
	/*-----------------------------------------------------------------------------------*/
	public function add_tab( $tabs_array ) {
			
		if ( ! is_array( $tabs_array ) ) $tabs_array = array();
		$tabs_array[] = $this->tab_data();
		
		return $tabs_array;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* panels_include() */
	/* Include form settings panels 
	/*-----------------------------------------------------------------------------------*/
	public function settings_include() {
		
		// Includes Settings file
		include_once( $this->admin_plugin_dir() . '/settings/template-2/global-settings.php' );
		include_once( $this->admin_plugin_dir() . '/settings/template-2/dimensions-settings.php' );
		include_once( $this->admin_plugin_dir() . '/settings/template-2/slider-styles-settings.php' );
		include_once( $this->admin_plugin_dir() . '/settings/template-2/control-settings.php' );
		include_once( $this->admin_plugin_dir() . '/settings/template-2/pager-settings.php' );
		include_once( $this->admin_plugin_dir() . '/settings/template-2/title-settings.php' );
		include_once( $this->admin_plugin_dir() . '/settings/template-2/caption-settings.php' );
		include_once( $this->admin_plugin_dir() . '/settings/template-2/readmore-settings.php' );
		include_once( $this->admin_plugin_dir() . '/settings/template-2/shortcode-settings.php' );
		
	}
	
	/*-----------------------------------------------------------------------------------*/
	/* tab_manager() */
	/* Call tab layout from Admin Init 
	/*-----------------------------------------------------------------------------------*/
	public function tab_manager() {
		global $a3_responsive_slider_admin_init;
		
		$this->plugin_extension_start();
		$a3_responsive_slider_admin_init->admin_settings_tab( $this->parent_page, $this->tab_data() );
		$this->plugin_extension_end();
		
	}
}

global $a3_responsive_slider_template_2_tab;
$a3_responsive_slider_template_2_tab = new A3_Responsive_Slider_Template_2_Tab();

/** 
 * people_contact_grid_view_tab_manager()
 * Define the callback function to show tab content
 */
function a3_responsive_slider_template_2_tab_manager() {
	global $a3_responsive_slider_template_2_tab;
	$a3_responsive_slider_template_2_tab->tab_manager();
}

?>