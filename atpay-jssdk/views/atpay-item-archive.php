<?php get_header(); ?>

<? while ( have_posts() ) : the_post(); ?>

<div style="overflow:hidden; width:200px; height: auto; float: left; margin:20px; ">

  <h1 style="margin-bottom:10px;"><?php the_title(); ?> </h1>
  
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( ); ?> </a>

</div>

<?php endwhile; ?>


<?php get_footer(); ?>
