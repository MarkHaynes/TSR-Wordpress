<?php
/*
Template Name: Homepage
*/
?>
<?php get_header();?>

<div id="contentWrapper">
  <div class="home-slider-wrap">
    <div class="home-slider">
      <?php if (has_post_thumbnail( $post->ID ) ){ ?>
        <?php $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'welcome-homepage' );?>
          <img class="img-home-slider" src="<?php echo $featuredImage[0]; ?>" alt="<?php echo the_title();?>">      
              
            <?php } else {?>
             <img class="img-home-slider" src="<?php bloginfo("template_url");?>/images/telford-home-slider.jpg" alt="Telford Steam Railway">
            <?php } ?>

      <section class="welcome">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
          <?php the_content(); ?>

        <?php endwhile; else: ?>
          <h1>Welcome</h1>

         <p>Telford Steam Railway welcomes you to our website. Telford Steam Railway is open every Sunday & Bank Holiday 11am - 5pm and we invite you and your family to visit us.</p>

        <?php endif; ?>

      </section>
    </div>

  <section class="social">
    
    <div class="social-box">
    <div class="social-image twitter">
      <a class="info-link info-twitter" href="http://twitter.com/tsrheritage" title="Follow us on Twitter"></a>
    </div>
      <?php include_once (TEMPLATEPATH . '/tweets.php'); ?>
      <a class="share-home share-link-home share-twitter" href="http://twitter.com/tsrheritage" title="Follow us on Twitter">Follow us on Twitter</a>
    </div>
  </section>

  <section class="social">

    
    <div class="social-box">
    <div class="social-image facebook">
    <a class="info-link info-facebook" href="http://www.facebook.com/groups/155261792870" title="Join us on Facebook"></a>
    </div>
        <ul class="home-tweets-ul"><li><p class="home-tweet-tweet">"Join our Facebook Group for the latest news and information from Telford Steam Railway."<br></p></li></ul>
        <a class="share-home share-link-home share-facebook" href="http://www.facebook.com/groups/155261792870" title="Join us on Facebook">Join us on Facebook</a>
    </div>
    <div class="clearfix"></div>
</section>

  <section class="social">
  <div class="social-box">
    <div class="social-tripadvisor">
      <div id="TA_certificateOfExcellence483" class="TA_certificateOfExcellence">
        <ul id="m9vBYIofXL" class="TA_links MJEngwLDtNT">
          <li id="ATvalWia2" class="yFkiNdYIIRYO">
            <a target="_blank" href="http://www.tripadvisor.co.uk/Attraction_Review-g187050-d3596554-Reviews-Telford_Steam_Railway-Telford_Shropshire_England.html"><img src="http://www.tripadvisor.co.uk/img/cdsi/img2/awards/CoE2015_WidgetAsset-14348-2.png" alt="TripAdvisor" class="widCOEImg" id="CDSWIDCOELOGO"/></a>
          </li>
        </ul>
      </div>
      <script src="http://www.jscache.com/wejs?wtype=certificateOfExcellence&amp;uniq=483&amp;locationId=3596554&amp;lang=en_UK&amp;year=2015&amp;display_version=2"></script>

    </div>
    
      <ul class="home-tweets-ul"><li><p class="home-tweet-tweet">"In 2015 we were awarded with a certificate of excellence from tripadvisor."<br></p></li></ul>
      <a class="share-home share-link-home share-tripadvisor" href="http://www.tripadvisor.co.uk/Attraction_Review-g187050-d3596554-Reviews-Telford_Steam_Railway-Telford_Shropshire_England.html" title="Check us out of Tripadvisor">Find us on Tripadvisor</a>
    </div>
  </section>


  <section class="latest-news">
    <h1> Latest News</h1>
    <?php  query_posts('showposts=2&category_name=news'); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <article class="post-wrap">
        <div class="post-featured">
          <?php if ( has_post_thumbnail() ) {
              $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'news-homepage' );
                 echo '<img src="' . $image_src[0]  . '" alt="'. get_the_title() . '"/>';
                 }; ?> 
        <div class="post-meta">
                <div class="post-meta-date">
                  <div style="font-size: 1.6rem; font-size: 16px;"> Posted On:</div><?php the_time('jS F Y') ?>
                </div>
                  
            <div class="post-meta-author"><div style="font-size: 1.6rem; font-size: 16px;"> Author:</div><?php the_author_posts_link(); ?>  </div>
          </div>
        </div>

        <div class="post-excerpt">
          <h1 class="post-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title();?></a></h1>
         
          <p><?php the_excerpt();?></p>

          <a class="post-more" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">Read More...</a>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </article>

    <?php endwhile; else: ?>
      <p>Sorry, no posts matched your criteria.</p>
     <?php endif; ?>
  </section>
  
  <?php 
  $time = time();
  $loop = new WP_Query( array(
            'post_type'      => 'event_post',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'meta_query'     => array(
              array(
                'key'     => '_eventenddate',
                'value'   => $time,
                'compare' => '>=',
              ) 
            )
  ));
  ?>

  <?php if ( $loop->have_posts() ) : ?>
  
  <section class="latest-news">
    <h1> Events</h1>
    <? while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <article class="post-wrap">
        <div class="post-featured">
          <?php if ( has_post_thumbnail() ) {
              $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'news-homepage' );
                 echo '<img src="' . $image_src[0]  . '" alt="'. get_the_title() . '"/>';
                 }; ?> <div class="post-meta-event">

                 <?php $meta_event_start_date = get_post_meta( $post->ID, '_eventstartdate', true ); ?>
                 <?php $meta_event_end_date = get_post_meta( $post->ID, '_eventenddate', true ); ?>

                  <div class="post-meta-date-side"><?php echo (date ("dS F Y",$meta_event_start_date)); ?> 
                  <?php if ($meta_event_start_date != $meta_event_end_date) { ?>
                    <br> to <br> <?php echo (date ("dS F Y",$meta_event_end_date)); ?>
                  <?php 
                  }
                  ?>
                  </div>
                  <div class="post-meta-month"></div>
          </div>
        </div>

        <div class="post-excerpt">
          <h1 class="post-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title();?></a></h1>
          
          <p><?php the_excerpt();?></p>

          <a class="post-more" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">Read More...</a>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </article>

  

  <?php endwhile; ?>
  </section> 
<?php else: ?>
      
  <?php endif; ?>

  <section class="info">
    <a class="info-link info-clock" href="<?php bloginfo('home');?>/plan-visit/opening-times" title="Telford Steam Railway Opening Times"></a>
    <h2 class="info">Opening Times</h2>
    <p>We would love to see you soon find out when we are open.</p>
    
    <div class="sign">
      <a href="<?php bloginfo('home');?>/plan-visit/opening-times" title="Train Timetable">Timetables</a>
    </div>
  </section><!--

  --><section class="info">
    <a class="info-link info-tickets" href="<?php bloginfo('home');?>/plan-visit/pricing" title="Telford Steam Railway Tickets"></a>
    <h2 class="info">Pricing and Tickets</h2>
    <p>Our Fares include unlimited travel and admission to the model railway.</p>

    <div class="sign">
      <a href="<?php bloginfo('home');?>/plan-visit/pricing" title="More Info">More Info</a>
    </div>
  </section><!--

  --><section class="info">
    <a class="info-link info-maps" href="<?php bloginfo('home');?>/plan-visit/how-to-get-here" title="Telford Steam Railway Directions"></a>
    <h2 class="info">How to Get Here</h2>
    <p>We are really easy to get to and can help you get directions.</p>

    <div class="sign">
      <a href="<?php bloginfo('home');?>/plan-visit/how-to-get-here" title="Get Directions">Get Directions</a>
    </div>
  </section><!--

  --><section class="info">
    <a class="info-link info-events" href="<?php bloginfo('home');?>/plan-visit/events" title="Telford Steam Railway Special Events"></a>
    <h2 class="info">Special Events</h2>
    <p>Come and visit us during one of our special events.</p>
    <div class="sign">
      <a href="<?php bloginfo('home');?>/plan-visit/events" title="Special Events">More Info</a>
    </div>

  </section>

</div>
 
 			  </section><!-- #main section -->
			</div> <!--#contentWrapper -->	      
			<?php get_footer();?>