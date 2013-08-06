<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 


  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />

  <script>
  jQuery(function() {
    $( "#tabs" ).tabs( { fx: { opacity: 'toggle' }}).addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  });
  </script>
  <style>
  .ui-tabs-vertical { width: 55em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
  .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
  </style>
        
        <script type="text/javascript">
	        jQuery(document).ready(function(){
			        var selected_env = $("div#env_options input:checked").attr("id")
			        $("div#"+selected_env).show();

					if (typeof selected_env != "undefined") {
								        $("p.signup").hide();
					}

			    jQuery("input[name$='atpay_env']").click(function() {
			        var env = $(this).attr("id");
			        $("div.desc").slideUp('slow');
			        $("p.signup").hide();
			        $("div#"+env).slideDown('slow');

			    }); 
	    	});

        </script>


<div class="wrap">
    <h2>@Pay Api Options</h2>
    <form method="post" action="options.php"> 



        <?php @settings_fields('wp_plugin_template-group'); ?>
        <?php @do_settings_fields('wp_plugin_template-group'); ?>



<div id="tabs">
  <ul>
    <li><a href="#tabs-1">API Settings</a></li>
    <li><a href="#tabs-2">Store Settings</a></li>
    <li><a href="#tabs-3">Reports</a></li>
    <li><a href="#tabs-4">FAQ & Docs</a></li>

  </ul>
  
  
  
    <div id="tabs-2">
    <h2>Store Settings</h2>

        <?php do_settings_sections('store_options'); ?>

  </div>
  
  
  
  <div id="tabs-1">
    <h2>API Settings</h2>


        <div id="env_options"> 
        <?php do_settings_sections('env_options'); ?>
        
        <p class="signup" style="margin-top:20px; text-align:center; font-weight: bold; font-size: 16px; width: 50%; margin: 20px auto; line-height: 20px;  "> Don't have an account? Get your sandbox credentials <a href="https://wpdev.atpay.com/request-sandbox-access/" target="_blank";>here.</a>
        
        
        </div>

       <div style="height:120px; overflow: hidden; ">
        <div id="dev_options" class="desc" style="display:none;"> 
        	<?php do_settings_sections('dev_options'); ?>
        </div>
   
        <div id="sb_options" class="desc"  style="display:none;"> 
        	<?php do_settings_sections('sb_options'); ?>
        </div>
   
        <div id="beta_options"  class="desc" style="display:none;"> 
        	<?php do_settings_sections('beta_options'); ?>
        </div>
   
        <div id="prod_options" class="desc"  style="display:none;"> 
        	<?php do_settings_sections('prod_options'); ?>
        </div>
       </div>
    
  </div>
 
    <div id="tabs-3">
    <h2>Reports Section</h2>

        <p>Coming Soon! </p>

  </div>
  
  
  
      <div id="tabs-4">
    <h2>FAQ & Docs</h2>

        <p>Coming Soon! </p>

  </div>
  

  </div>
</div>










        <?php do_settings_sections('wp_plugin_template'); ?>

        <?php @submit_button(); ?>
        
        
    </form>
</div>