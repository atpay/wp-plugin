<?php
/*
Plugin Name:  @Pay Connect
Description: Connect to your @Pay Merchant account and sell  right from wordpress.
Version: 1.1
Author: Isaiah Baca
Author URI: http://www.atpay.com
License: GPL2
*/


function atpay_item( $atts ) {
    extract( shortcode_atts( array(
        'price' => '10.00',
        'ref' => 'atpay-item',
    ), $atts ) );

    $price = "{$price}";
    $ref = "{$ref}";
    
    ob_start();
    include('templates/button.php');
    $string = ob_get_clean();
    return $string;
}

function atpay_session() {
    ob_start();
    include('templates/atpay-session.php');
    $string = ob_get_clean();
    return $string;
  }


add_shortcode( '@pay-item', 'atpay_item' );

add_shortcode( '@pay-login-status', 'atpay_session' );


add_filter( 'template_include', 'atpay_templates' );

function atpay_templates( $template ) {
    $post_types = array( 'atpay-item' );

    if ( is_post_type_archive( $post_types ) && ! file_exists( get_stylesheet_directory() . '/post-type-template.php' ) )
        $template = dirname( __FILE__ ) . '/views/atpay-item-archive.php';
    if ( is_singular( $post_types ) && ! file_exists( get_stylesheet_directory() . '/post-type-template.php' ) )

        $template = dirname( __FILE__ ) . '/views/atpay-item-single.php';

    return $template;
}



function js_local(){ ?>

  <script src='<?php echo get_option('atpay_env'); ?>/assets/api-jquery.min.js'></script>
  <script src='<?php echo get_option('atpay_env'); ?>/assets/atpay-sdk-v1.js'></script>

  <?php 
  if(get_option('atpay_env') == "http://localhost:4000"){ $partner_id = get_option('dev_partner_id'); $client_id = get_option('dev_client_id');}
  if(get_option('atpay_env') == "https://sandbox-api.atpay.com"){ $partner_id = get_option('sb_partner_id'); $client_id = get_option('sb_client_id');}
  if(get_option('atpay_env') == "https://beta-api.atpay.com"){ $partner_id = get_option('ba_partner_id'); $client_id = get_option('ba_client_id');}
  if(get_option('atpay_env') == "https://api.atpay.com"){ $partner_id = get_option('prod_partner_id'); $client_id = get_option('prod_client_id');}
  ?>

  <script type="text/javascript">

    $(function(){
      atpay.config({
        partner_id:   <?php echo $partner_id; ?>,
        client_id:    "<?php echo $client_id; ?>"
      });
    });

    atpaySessionCheck();

    function atpaySessionCheck(){
      var atpayName = localStorage.atPayName
      var atpayToken = localStorage.atPayToken
      if(atpayName && atpayToken){
        $('#atpayName').html(atpayName + " -");
        $('#atPayLogin').hide();
        $('#atPayLogout').show();
        for (var key in localStorage){
          $("."+key).css("opacity", "0.5");
          $("."+key+".purch_qty").fadeIn().html("Total Purchases: "+localStorage[key]);
        }
      }else{
        for (var key in localStorage){
          localStorage.removeItem(key);
          $("."+key).css("opacity", "1");
          $("."+key+".purch_qty").hide()
        }
        $('#atPayLogout').hide();
        $('#atPayLogin').show();
        $('#atpayName').html("");

      }
    } // end atpaySessionCheck


    function atpayLogin(amount, ref, atPayReturn) {
     atpay.connect(function(response){
       localStorage.atPayToken = response.access_token
       localStorage.atPayName = response.name
       atpaySessionCheck();
      if(amount){
        var r=confirm("Do you want to purchase this item?")
        if(r==true){
          var overlay = jQuery('<div class="atpay_overlay"><div class="atpay_overlayB"></div> </div>');
          $(overlay).hide().appendTo("body").fadeIn(1000);
          atpay.buy(amount, ref, atPayReturn); 
        }
      }
      });
    }// end atpayLogin
    

    function atpayLogout() {
     atpay.logout(function(response){
       console.log(response);
       localStorage.removeItem("atPayName");
       localStorage.removeItem("atPayToken");
       atpaySessionCheck();
      });
    } // end atpayLogout


    function btn_confirm(price, ref) {
      if(localStorage.atPayToken){
        var r=confirm("Do you want to purchase this item?")}else{ var r=true}
      if (r==true) {
        var amount =  parseFloat(price.replace("$", ""));
        if(localStorage.atPayToken){
          var overlay = jQuery('<div class="atpay_overlay"><div class="atpay_overlayB"></div> </div>');
          $(overlay).hide().appendTo("body").fadeIn(1000);
          atpay.buy(amount, ref, atPayReturn);
        }else{
          atpayLogin(amount, ref, atPayReturn);
        }
      }else{
        alert("You have not made a purchase");
      }
    } // btn_confirm
      


    function atPayReturn(data) {
	  
	  $(".atpay_overlay").fadeOut(1000);


      alert('Thank You, Your Purchase is Complete!');
      atPayResponse = data;
      if(localStorage[atPayResponse.referrer_context]){
        localStorage[atPayResponse.referrer_context]=Number(localStorage[atPayResponse.referrer_context])+1;
      } else {
        localStorage[atPayResponse.referrer_context]=1;
      }
      atpaySessionCheck();
    } // end atPayReturn

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
            $settings_link = '<a href="edit.php?post_type=atpay-item&page=atpay-item">Settings</a>'; 
            array_unshift($links, $settings_link); 
            return $links; 
        }

        $plugin = plugin_basename(__FILE__); 
        add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
    }
}


function config_check(){
if(!get_option('atpay_env') OR (!get_option('sb_partner_id') and !get_option('prod_partner_id')) ){
    echo "<div class='updated' style='background-color: #d54f4f; border:1px solid #993838; height:30px; color:#fff; text-align:center; padding:10px 0; font-size:16px;'>
            <img src='https://www.atpay.com/wp-content/themes/atpay/images/atpay_logo_42@2x.png' style='height:25px;margin-top:3px; margin-left:20px; float:left;'> <p style='float:left;'>Connect
            &nbsp; &nbsp; &nbsp;
            <a href='edit.php?post_type=atpay-item&page=atpay-item' style='color:#fff; text-decoration:underline;'>Configure now to start selling online.</a></p>
            </div>"; 
}
}

add_action('admin_notices', 'config_check', 999);



