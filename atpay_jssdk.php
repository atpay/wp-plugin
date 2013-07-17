<?php
/*
Plugin Name:  @Pay Connect
Description: Connect to your @Pay Merchant account and sell  right from wordpress.
Version: 0.1
Author: Isaiah Baca
Author URI: http://www.atpay.com
License: GPL2
*/








add_filter( 'template_include', 'my_plugin_templates' );
function my_plugin_templates( $template ) {
    $post_types = array( 'atpay-item' );

    if ( is_post_type_archive( $post_types ) && ! file_exists( get_stylesheet_directory() . '/post-type-template.php' ) )

        $template = dirname( __FILE__ ) . '/views/atpay-item-archive.php';
    if ( is_singular( $post_types ) && ! file_exists( get_stylesheet_directory() . '/post-type-template.php' ) )

        $template = dirname( __FILE__ ) . '/views/atpay-item-single.php';

    return $template;
}




function js_local(){ ?>

    <script src='<?php echo get_option('setting_e'); ?>/assets/api-jquery.min.js'></script>
    <script src='<?php echo get_option('setting_e'); ?>/assets/atpay-sdk-v1.js'></script>

<?php 
if(get_option('setting_e') == "http://localhost:4000"){ $partner_id = get_option('setting_a'); $client_id = get_option('setting_b');}
if(get_option('setting_e') == "https://sandbox-api.atpay.com"){ $partner_id = get_option('setting_c'); $client_id = get_option('setting_d');}
if(get_option('setting_e') == "https://beta-api.atpay.com"){ $partner_id = get_option('setting_i'); $client_id = get_option('setting_f');}
if(get_option('setting_e') == "https://api.atpay.com"){ $partner_id = get_option('setting_g'); $client_id = get_option('setting_h');}
?>
    <script>
      $(function(){
        atpay.config({
          partner_id:   <?php echo $partner_id; ?>,
          client_id:    "<?php echo $client_id; ?>"
        });
        
      });
    </script>
    

    
 
<?php } 
add_action('wp_footer', 'js_local', 20);


if(!class_exists('WP_Plugin_Template'))
{
	class WP_Plugin_Template
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
        	// Initialize Settings
            require_once(sprintf("%s/settings.php", dirname(__FILE__)));
            $WP_Plugin_Template_Settings = new WP_Plugin_Template_Settings();
        	
        	// Register custom post types
            require_once(sprintf("%s/post-types/post_type_template.php", dirname(__FILE__)));
            $Post_Type_Template = new Post_Type_Template();
            
            require_once(sprintf("%s/post-types/shortcode.php", dirname(__FILE__)));
                      
            
            
		} // END public function __construct
	    
		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} // END public static function activate
	
		/**
		 * Deactivate the plugin
		 */		
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate
	} // END class WP_Plugin_Template
} // END if(!class_exists('WP_Plugin_Template'))

if(class_exists('WP_Plugin_Template'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('WP_Plugin_Template', 'activate'));
	register_deactivation_hook(__FILE__, array('WP_Plugin_Template', 'deactivate'));

	// instantiate the plugin class
	$wp_plugin_template = new WP_Plugin_Template();
	
    // Add a link to the settings page onto the plugin page
    if(isset($wp_plugin_template))
    {
        // Add the settings link to the plugins page
        function plugin_settings_link($links)
        { 
            $settings_link = '<a href="options-general.php?page=atpay-item">Settings</a>'; 
            array_unshift($links, $settings_link); 
            return $links; 
        }

        $plugin = plugin_basename(__FILE__); 
        add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
    }
}