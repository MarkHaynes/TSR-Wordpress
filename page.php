<?php get_header();?>

<div id="contentWrapper">
  <div class="home-slider-wrap">
    <div class="home-slider">
      <?php if (has_post_thumbnail( $post->ID ) ){ ?>
        <?php $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'welcome-homepage' );?>
          <img class="img-home-slider pageHeader" src="<?php echo $featuredImage[0]; ?>" alt="<?php echo the_title();?>">      
              
            <?php } else {?>
             <img class="img-home-slider pageHeader" src="<?php bloginfo("template_url");?>/images/telford-home-slider.jpg" alt="Telford Steam Railway">
            <?php } ?>
    </div>
  </div>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="post-single">
        <h1 class="single-title"><?php the_title();?></h1>
              
        <hr>
        
        <div class="page-content">

         <?php the_content();?>

         <div class="clearfix"></div>

        </div>

        <hr>
        
        <h2>More for you to see...</h2>  

        <?php 
          $parents = $post->post_parent;
          $current_postID = $post->ID;
          
          $child_pages = new WP_Query( array(
            'post_type'      => 'page', // set the post type to page
            'posts_per_page' => 2, // number of posts (pages) to show
            'post_parent' => $parents, // enter the post ID of the parent page
            'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
            'order_by' => 'rand',
           'post__not_in' => array($current_postID),
          ) );

          if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

            <article class="post-wrap">

              <div class="post-featured">

                
                <?php if ( has_post_thumbnail() ) {
                    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'news-homepage' );
                       echo '<img src="' . $image_src[0]  . '" alt="'. get_the_title() . '"/>';
                       }; ?>
              
              </div>

              <div class="post-excerpt">

                <h1 class="post-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title();?></a></h1>

                <p><?php the_excerpt();?></p>

                <a class="post-more" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">Read More...</a>
              
                <div class="clearfix"></div>
            
              </div>

            <div class="clearfix"></div>
            <hr>

          </article>

      <?php endwhile; else: ?>
      
      <?php endif; ?>
        
        <section class="single-sharing">
          <h3>Share On</h3>
            <div class="single-sharing-buttons">
            <?php $share = get_sharinglinks();
            echo $share;?>
          </div>  
        </section> 

      </article>

    <?php endwhile; else: ?>
      <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>

  <div style="clear:both"></div>
</div>
 
        </section><!-- #main section -->
      </div> <!--#contentWrapper -->        
      <?php get_footer();?>