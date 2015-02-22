<?php
/*
Template Name: Directions
*/
?>
<?php get_header();?>

<div id="contentWrapper">
  <div class="home-slider-wrap">
    <div class="home-slider">
    <script>
     function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
            '&signed_in=true&callback=initialize';
        document.body.appendChild(script);
      }

    window.onload = loadScript; </script>
      <div id="map" style="border: 0;">
            </div><!-- map Ends Here --> 

       <div id="directions-panel"></div>
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
        
        <section class="single-sharing">
          <h3>Share Article On</h3>
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