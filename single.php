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

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="post-single">
        <h1 class="single-title"><?php the_title();?></h1>
        <p class="single-date">Posted on: <?php the_time('jS F Y'); ?> by: <?php the_author();?></p>
        <hr>
        
        <div class="page-content">
         <?php the_content();?>
         <div class="clearfix"></div>
        </div>
        <hr>        

        <section class="single-sharing">
          <h3>Share Article On</h3>
            <div class="single-sharing-buttons">
            <?php $share = get_sharinglinks();
            echo $share;?>
          </div>  
        </section>

        <section class="single-sharing">
          <h3>Tagged Under</h3>
          <div class="single-categories">                  
            <p><?php the_category(' '); ?></p>
          </div>  
        </section>   

        <section id="single-comments">
            <?php comments_template();?>
            <div style="clear:both"></div>
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