

<?php
get_header();
if (have_posts()) :
   while (have_posts()) :
      the_post();?>
      
      
      
 
<?php $price = preg_replace('/[\$,]/', '', @get_post_meta($post->ID, 'price', true)   ); ?>


 
<!--
 <a id="connect" href='#' onclick="atpay.connect(function(data){ $('#connect').html(data.username); $('#logout').show(); });">Connect </a>
  <a id="logout" style="display:none;" href='#' onclick="atpay.logout(function(data){ alert('Cleared'); });">Logout </a>
-->

 
 <div style="float:left; width:600px;">     
      <h1 style="font-size:30px; margin-bottom:0px; float:left;"><?php the_title(); ?> </h1>



<a border='0' class='not_outlook' href='#' onclick="atpay.buy(<?php echo $price ?>, '<?php the_title(); ?> - Buy My Themes', function(){alert('Thanks!');});" style='text-underline:none; display:block; float:right; margin-top:-10px; margin-right:10px'>
    <table border='0' cellpadding='0' cellspacing='0' style='background-color: <?php echo get_option('btn_color') ?>;'>
      <tr>
        <td style='padding:3px 5px 5px 5px;' width='145'>
          <table>
            <tr>
              <td>
                <a class='not_outlook' href='#'  style='color:#ffffff; text-decoration:none; border:none; display:inline;'>
                  <img src='<?php echo get_option('btn_img') ?>' style='margin-left: 5px; margin-right:10px; margin-top:8px;'>
                </a>
              </td>
              <td>
                <table border='0' cellpadding='0' cellspacing='0' style='float:left; margin:0; margin-left:5px;'>
                  <tr>
                    <td style='font-size: 11px; color: #ffffff; font-family: Tahoma; text-align:center; padding:0; margin:0;'>
                      Buy
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table border='0' cellpadding='0' cellspacing='0' style='margin:0; padding:0;'>
                        <tr>
                          <td style='padding:0; margin:0; font-size: 24px; color: #ffffff; font-family: Tahoma; vertical-align:top; line-height:25px;' valign='top'>
                            <a class='not_outlook' href='#'  style='color:#ffffff; text-decoration:none; border:none; display:inline; text-align:center'>
                              $<?php echo money_format('%i', $price); ?>
                            </a>
                          </td>

                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </a>


<div style="clear:both;"> </div>

<div style="margin-top:20px">

 <?php the_post_thumbnail( ); ?> 

</div>

      
  <div style="margin-top:20px; line-height:23px; width:600px;">
        <?php the_content(); ?>
  </div>       


 </div>    
      
  <?php endwhile; endif; ?>
  
  
  
        <?php get_sidebar(); ?>

<?php get_footer();  ?>





