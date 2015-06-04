<?php 

function widgets_init() {
register_sidebar(array(
'name' => __( 'Sidebar 1'),
'id' => 'sidebar-1',
'before_widget' => '',
'after_widget' => '<br>',
'before_title' => '<h4 class="side">',
'after_title' => '</h4>',
));
}
add_action( 'init', 'widgets_init' );

// Custom Link Header Menu FULL

add_filter( 'wp_nav_menu_items','add_social_full', 10, 2 );
function add_social_full( $items, $args ) {

    $templateurl = get_bloginfo('template_url');
    /*if ($args->theme_location == 'header-menu') {
        $items .= '<li id="menu-item-paypal" class="menu-item-paypal"> 
        		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="DF7JNKZF7WHLS">
					<input type="image" id="paypal" src="http://telfordsteamrailway.co.uk/wp-content/themes/TSR-Rocket/images/paypal.png" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
					<img alt="" border="0" src="http://telfordsteamrailway.co.uk/wp-content/themes/TSR-Rocket/images/paypal.png" width="0" height="0">
				</form>
        	</li>
        ';
    } */
    if ($args->theme_location == 'mobile-menu') {
        $items .= '<li id="mobile-item-paypal" class="menu-item mobile-item-paypal"> 
        		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="DF7JNKZF7WHLS">
					<input type="image" id="paypal-mobile" src="http://telfordsteamrailway.co.uk/wp-content/themes/TSR-Rocket/images/paypal.png" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
					<img alt="" border="0" src="http://telfordsteamrailway.co.uk/wp-content/themes/TSR-Rocket/images/paypal.png" width="0" height="0">
				</form>
        	</li>
        ';
    }

    return $items;
}
//Navigation
function register_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu'),
			'mobile-menu' => __( 'Mobile Menu'),
			'footer-menu' => __( 'Footer Menu')
		)
	);
}
add_action ('init', 'register_menus');

//Sub Menu

//Featured Images

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1100, 366 );
  add_image_size( 'welcome-homepage', 1100, 366, true); 
}

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails2' );
  set_post_thumbnail_size( 200, 150 );
  add_image_size( 'news-homepage', 200, 150, true); 
}

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails3' );
  set_post_thumbnail_size( 500, 281 );
  add_image_size( 'attractions', 500, 281, true); 
}

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails4' );
  set_post_thumbnail_size( 600, 360 );
  add_image_size( 'news-homepage', 600, 360, true); 
}


//Google Maps

function map_func() {

return'<div id="map" style="width:600px;height:400px;margin:40px auto;"></div>';
}

add_shortcode( 'map', 'map_func' );

// Short Excerpt 
function get_the_short_excerpt(){
    $permalink = get_permalink();
    $title = get_the_title();
    $excerpt = get_the_excerpt();
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $the_str = substr($excerpt, 0, 200);
    $the_str .= "... <br>";
    $the_str .= <<< EOD
        <a class="attraction-more" href="$permalink" title="$title"> Read More </a>
EOD;
    return $the_str;
}

// Sharing Links
function get_sharinglinks(){
	$sharingtitle = get_the_title();
	$sharinglink = get_permalink();
	$sharingimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$uri_title = utf8_uri_encode($sharingtitle);
	$uri_link = utf8_uri_encode($sharinglink);
	$uri_image = utf8_uri_encode($sharingimage);

	$sharing = '<a class="share-link share-twitter" href="https://twitter.com/intent/tweet?text=' . $sharingtitle . '&url=' . $sharinglink . '/&via=CloudBite" title="Share on Twitter">Twitter</a>
	<a class="share-link share-facebook" href="https://facebook.com/sharer/sharer.php?u='.$sharinglink.'" title="Share on Facebook">Facebook</a>
	<a class="share-link share-googleplus" href="https://plus.google.com/share?url='.$sharinglink.'" title="Share on Google+">Google+</a>
	<a class="share-link share-pinterest" href="http://pinterest.com/pin/create/button/?url='.$uri_link.'&media='.$uri_image.'&description='.$uri_title.'">Pinterest</a>';

	return $sharing;
}

//comments

function comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; 
	?>
	<?php if ( $comment->comment_approved == '1' ): ?>	
	<li>
		<article id="comment-<?php comment_ID() ?>">
			<div class="commentsAvatar">
				<?php echo get_avatar( $comment ); ?>
			</div>
			<h4 class="commentsHeader"><?php comment_author_link() ?></h4>
			<time class="comments"><?php comment_date() ?> at <?php comment_time() ?></time>
			<div style="clear:both;"></div>
			<div class="commentsText">
				<?php comment_text() ?>
			</div>
		</article>
	<?php endif;
}
?>