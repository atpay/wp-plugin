<?php




if(!class_exists('WP_Plugin_Template_Settings'))
{
	class WP_Plugin_Template_Settings
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register actions
          add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));
        	
        	

        	
        	
        	
		} // END public function __construct
		
        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
        	// register your plugin's settings
        	register_setting('wp_plugin_template-group', 'setting_a');
        	register_setting('wp_plugin_template-group', 'setting_b');
        	register_setting('wp_plugin_template-group', 'setting_c');
        	register_setting('wp_plugin_template-group', 'setting_d');
        	register_setting('wp_plugin_template-group', 'setting_e');
        	register_setting('wp_plugin_template-group', 'setting_f');
        	register_setting('wp_plugin_template-group', 'setting_g');
        	register_setting('wp_plugin_template-group', 'setting_h');
        	register_setting('wp_plugin_template-group', 'setting_i');     	
        	register_setting('wp_plugin_template-group', 'setting_z');     	


        	register_setting('wp_plugin_template-group', 'btn_color');     	
        	register_setting('wp_plugin_template-group', 'btn_img');     	
        	
        	// add your settings section
        	add_settings_section(
        	    'wp_plugin_template-section', 
        	    '@Pay API Credentials', 
        	    array(&$this, 'settings_section_wp_plugin_template'), 
        	    'wp_plugin_template'
        	);
        	
        	
            add_settings_field(
                'wp_plugin_template-setting_e', 
                'Environment', 
                array(&$this, 'settings_field_input_check'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_e'
                )
            );        	
        	
        	
        	
        	// add your setting's fields
            add_settings_field(
                'wp_plugin_template-setting_a', 
                'Partner ID (Developer)', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_a'
                )
            );
            add_settings_field(
                'wp_plugin_template-setting_b', 
                'OAuth Client ID (Developer) ', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_b'
                )
            );

            add_settings_field(
                'wp_plugin_template-setting_c', 
                'Partner ID (Sandbox)', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_c'
                )
            );
            
            
           add_settings_field(
                'wp_plugin_template-setting_d', 
                'OAuth Client ID (Sandbox)', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_d'
                )
            );




            add_settings_field(
                'wp_plugin_template-setting_i', 
                'Partner ID (Beta)', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_i'
                )
            );
            
            
           add_settings_field(
                'wp_plugin_template-setting_f', 
                'OAuth Client ID (Beta)', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_f'
                )
            );

            add_settings_field(
                'wp_plugin_template-setting_g', 
                'Partner ID (Prod)', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_g'
                )
            );
            
            
           add_settings_field(
                'wp_plugin_template-setting_h', 
                'OAuth Client ID (Prod)', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_h'
                )
            );



           add_settings_field(
                'wp_plugin_template-setting_z', 
                '@Pay Store Slug', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_z'
                )
            );
            

           add_settings_field(
                'wp_plugin_template-btn_color', 
                '2 Click Button Color', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'btn_color'
                )
            );

           add_settings_field(
                'wp_plugin_template-btn_img', 
                '2 Click Button Icon', 
                array(&$this, 'settings_field_input_text'), 
                'wp_plugin_template', 
                'wp_plugin_template-section',
                array(
                    'field' => 'btn_img'
                )
            );            

            
           // Possibly do additional admin_init tasks
        } // END public static function activate
        
        public function settings_section_wp_plugin_template()
        {
            // Think of this as help text for the section.
            // echo '@Pay API Credentials';
        }
        
        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" /> ', $field, $field, $value);
            
            
        } // END public function settings_field_input_text($args)



        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_check($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            
            if($value == "http://localhost:4000"){ $check_dev = "checked";}
            if($value == "https://sandbox-api.atpay.com"){ $check_sb = "checked";}
            if($value == "https://beta-api.atpay.com"){ $check_beta = "checked";}
            if($value == "https://api.atpay.com"){ $check_prod = "checked";}

                  
            // echo a proper input type="text"
            // echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
            // echo sprintf('<input type="checkbox" name="%s" id="%s" value="1" %s>', $field, $field, $check );
            echo sprintf('<input type="radio" name="%s" id="%s" value="http://localhost:4000" %s> Development (localhost)<br>', $field, $field, $check_dev);
            echo sprintf('<input type="radio" name="%s" id="%s" value="https://sandbox-api.atpay.com" %s> Sandbox<br>', $field, $field, $check_sb);
            echo sprintf('<input type="radio" name="%s" id="%s" value="https://beta-api.atpay.com" %s> Beta<br>', $field, $field, $check_beta);
            echo sprintf('<input type="radio" name="%s" id="%s" value="https://api.atpay.com" %s> Production<br>', $field, $field, $check_prod);

            
            
        } // END public function settings_field_input_text($args)

        
        /**
         * add a menu
         */		
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
        	 add_submenu_page('edit.php?post_type=atpay-item', 'Options', 'Options', 'manage_options', 'atpay-item', array(&$this, 'plugin_settings_page') );

        	
        	
        } // END public function add_menu()
    
        /**
         * Menu Callback
         */		
        public function plugin_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}
	
        	// Render the settings template
        	include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class WP_Plugin_Template_Settings
} // END if(!class_exists('WP_Plugin_Template_Settings'))
