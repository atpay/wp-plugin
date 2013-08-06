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
		
        public function admin_init()
        {


        	register_setting('wp_plugin_template-group', 'atpay_env');


        	register_setting('wp_plugin_template-group', 'dev_partner_id');
        	register_setting('wp_plugin_template-group', 'dev_client_id');

        	register_setting('wp_plugin_template-group', 'sb_partner_id');
        	register_setting('wp_plugin_template-group', 'sb_client_id');
        	
        	register_setting('wp_plugin_template-group', 'ba_client_id');
        	register_setting('wp_plugin_template-group', 'ba_partner_id');     	

        	register_setting('wp_plugin_template-group', 'prod_client_id');
        	register_setting('wp_plugin_template-group', 'prod_partner_id');    


        	register_setting('wp_plugin_template-group', 'store_slug');     	
        	register_setting('wp_plugin_template-group', 'btn_color');     	
        	register_setting('wp_plugin_template-group', 'btn_img');     	
        	
        	// add your settings section


        	add_settings_section(
        	    'wp_plugin_template-section', 
        	    '@Pay API Environment options', 
        	    array(&$this, 'settings_section_wp_plugin_template'), 
        	    'env_options'
        	);
        	

			            add_settings_field(
			                'atpay_env', 
			                'Environment', 
			                array(&$this, 'settings_field_input_check'), 
			                'env_options', 
			                'wp_plugin_template-section',
			                array(
			                    'field' => 'atpay_env'
			                )
			            );        	
			        	
	        	
 
 
 
        	add_settings_section(
        	    'wp_plugin_template-section', 
        	    '@Pay API Dev Credentials', 
        	    array(&$this, 'settings_section_wp_plugin_template'), 
        	    'dev_options'
        	);
        	

        
		           add_settings_field(
		                'dev_partner_id', 
		                'Partner ID (Dev)', 
		                array(&$this, 'settings_field_input_text'), 
		                'dev_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'dev_partner_id'
		                )
		            );
		            
		            
		           add_settings_field(
		                'dev_client_id', 
		                'OAuth Client ID (Dev)', 
		                array(&$this, 'settings_field_input_text'), 
		                'dev_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'dev_client_id'
		                )
		            ); 
 
 
 
        	add_settings_section(
        	    'wp_plugin_template-section', 
        	    '@Pay API Sandbox Credentials', 
        	    array(&$this, 'settings_section_wp_plugin_template'), 
        	    'sb_options'
        	);
        	

        
		           add_settings_field(
		                'dev_partner_id', 
		                'Partner ID (Sandbox)', 
		                array(&$this, 'settings_field_input_text'), 
		                'sb_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'sb_partner_id'
		                )
		            );
		            
		            
		           add_settings_field(
		                'dev_client_id', 
		                'OAuth Client ID (Sandbox)', 
		                array(&$this, 'settings_field_input_text'), 
		                'sb_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'sb_client_id'
		                )
		            ); 
 

 
        	add_settings_section(
        	    'wp_plugin_template-section', 
        	    '@Pay API Beta Credentials', 
        	    array(&$this, 'settings_section_wp_plugin_template'), 
        	    'beta_options'
        	);

		            add_settings_field(
		                'ba_partner_id', 
		                'Partner ID (Beta)', 
		                array(&$this, 'settings_field_input_text'), 
		                'beta_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'ba_partner_id'
		                )
		            );
		            
		            
		           add_settings_field(
		                'ba_client_id', 
		                'OAuth Client ID (Beta)', 
		                array(&$this, 'settings_field_input_text'), 
		                'beta_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'ba_client_id'
		                )
		            );


        	add_settings_section(
        	    'wp_plugin_template-section', 
        	    '@Pay API Production Credentials', 
        	    array(&$this, 'settings_section_wp_plugin_template'), 
        	    'prod_options'
        	);

		            add_settings_field(
		                'prod_partner_id', 
		                'Partner ID (Prod)', 
		                array(&$this, 'settings_field_input_text'), 
		                'prod_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'prod_partner_id'
		                )
		            );
		            
		            
		           add_settings_field(
		                'prod_client_id', 
		                'OAuth Client ID (Prod)', 
		                array(&$this, 'settings_field_input_text'), 
		                'prod_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'prod_client_id'
		                )
		            );


        	add_settings_section(
        	    'wp_plugin_template-section', 
        	    '@Pay API Store Options', 
        	    array(&$this, 'settings_section_wp_plugin_template'), 
        	    'store_options'
        	);

		           add_settings_field(
		                'store_slug', 
		                '@Pay Store Slug', 
		                array(&$this, 'settings_field_input_text'), 
		                'store_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'store_slug'
		                )
		            );
		            
		
		           add_settings_field(
		                'btn_color', 
		                '2 Click Button Color', 
		                array(&$this, 'settings_field_input_text'), 
		                'store_options', 
		                'wp_plugin_template-section',
		                array(
		                    'field' => 'btn_color'
		                )
		            );
		
		           add_settings_field(
		                'btn_img', 
		                '2 Click Button Icon', 
		                array(&$this, 'settings_field_input_text'), 
		                'store_options', 
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
            
            if($value == "http://localhost:4000"){ $check_dev = "checked"; $field_value = "dev_options";}
            if($value == "https://sandbox-api.atpay.com"){ $check_sb = "checked"; $field_value = "sb_options";}
            if($value == "https://beta-api.atpay.com"){ $check_beta = "checked"; $field_value = "beta_options";}
            if($value == "https://api.atpay.com"){ $check_prod = "checked"; $field_value = "prod_options";}

  
            echo sprintf('<input type="radio" style="float:;"name="%s" id="dev_options" value="http://localhost:4000" %s> Dev &nbsp;', $field, $check_dev);
            echo sprintf('&nbsp; &nbsp;<input type="radio" style="float:;"name="%s" id="sb_options" value="https://sandbox-api.atpay.com" %s> Sandbox', $field, $check_sb);
           echo sprintf('&nbsp; &nbsp;<input type="radio" style="float:;" name="%s" id="beta_options" value="https://beta-api.atpay.com" %s> Beta', $field, $check_beta);
            echo sprintf('&nbsp; &nbsp;<input type="radio" style="float:;" name="%s" id="prod_options" value="https://api.atpay.com" %s> Production', $field, $check_prod);
            
            
            
        } // END public function settings_field_input_check($args)

        
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