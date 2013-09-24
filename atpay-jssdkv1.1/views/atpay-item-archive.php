<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div style="overflow:hidden; width:200px; height: auto; float: left; margin:20px; ">

  <h2 style="margin-bottom:10px;"><?php the_title(); ?> </h2>
  
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( ); ?> </a>

</div>



<?php endwhile; ?>

<div style="clear:both;"> </div>


<?php get_footer(); ?>