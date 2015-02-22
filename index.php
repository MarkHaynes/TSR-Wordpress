<?php get_header();?>


  <div id="contentWrapper">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="post-wrap">
        <div class="post-featured">
          <?php if ( has_post_thumbnail() ) {
              $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'news-homepage' );
                 echo '<img src="' . $image_src[0]  . '" alt="'. get_the_title() . '"/>';
                 }; ?>
        </div>

        <div class="post-excerpt">
          <h1 class="post-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title();?></a></h1>
          <div class="post-meta">
            Posted on: <?php the_time('jS F Y') ?> by <?php the_author_posts_link() ?>  
          </div>

          <p><?php the_excerpt();?></p>

          <a class="post-more" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">Read More...</a>

          <div class="clearfix"></div>

          <hr>
        </div>
        <div class="clearfix"></div>
      </article>
    <?php endwhile; else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

    <div class="bottom-nav"><?php posts_nav_link(); ?></div>

  </div>
    
<?php get_footer();?>