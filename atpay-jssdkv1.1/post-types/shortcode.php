<?php


function lorem_function() {

if ( have_posts() )
{
    $content = '<section class="cms-pl-gallery">';
    while ( have_posts() )
    {
        $cms_pl_pages->the_post();
        $content .= sprintf(
            '<article class="cms-pl-item clearfix">
                %1$s
                <h2>
                    <a href="%2$s" title="Read %3$s">%4$s</a>
                </h2>
                %5$s
            </article>',
            get_the_post_thumbnail(),
            apply_filters( 'the_permalink', get_permalink() ),
            the_title_attribute( array( 'echo' => FALSE ) ),
            the_title( '', '', FALSE ),
            has_excerpt() ? apply_filters( 'the_excerpt', get_the_excerpt() ) : ''
        );
    }
    $content .= '</section> <!-- end .cms-pl-gallery -->';
}
return $content;






}


add_shortcode('lorem', 'lorem_function');

