<?php
/*
Template Name: Page to Pages
*/
?>
<?php get_header();?>

<div id="contentWrapper">
  <article class="post-single">
    <h1 class="single-title"><?php the_title();?></h1>
    <hr>
  </article>
    
    <?php 
    $this_page_id=$wp_query->post->ID;

    $child_pages = new WP_Query( array(
        'post_type'      => 'page', // set the post type to page
        'posts_per_page' => 10, // number of posts (pages) to show
        'post_parent' => $this_page_id, // enter the post ID of the parent page
        'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
        'order_by' => 'date',
    ) );

    if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
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