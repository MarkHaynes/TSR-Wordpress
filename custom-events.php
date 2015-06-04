<?php
/*
Template Name: Events Page
*/
?>
<?php get_header();?>

<div id="contentWrapper">
  <article class="post-single">
    <h1 class="single-title"><?php the_title();?></h1>
    <hr>
  </article>
    
    <?php 
    $the_query = new WP_Query( array(
      'posts_per_page' => 10,
      'category_name' => 'Events',
      'post_type' => 'event_post', 
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_key' => '_eventstartdate', 
    ) );

      if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>


      <article class="attraction-wrap">
        <h1 class="post-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title();?></a></h1>

        <?php if ( has_post_thumbnail() ) {
              $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'attractions' );
                 echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'"><img src="' . $image_src[0]  . '" alt="'. get_the_title() . '"/></a>';
        }; ?>
        
        <div class="excerpt">
         <?php echo get_the_short_excerpt(); ?>
         <div class="clearfix"></div>

        </div>
        
      </article>

    <?php endwhile; else: ?>
      <p>Sorry, no posts matched your criteria.</p>
    <?php endif; 

    wp_reset_postdata();

    ?>

  <div style="clear:both"></div>
</div>
 
 			  </section><!-- #main section -->
			</div> <!--#contentWrapper -->	      
			<?php get_footer();?>