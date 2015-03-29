<?php session_start(); 
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( '|', true, 'right' );?></title>
       
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500italic,500' rel='stylesheet' type='text/css'>

        <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>


        <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/map.js"></script>
        
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <?php wp_head();?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

            <div id="wrapper">
                
                <nav id="mobile" role="navigation">

                    <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_class' => 'menu-mobile' ) ); ?>
                </nav>
            
                <header role="banner">

                    <div class="container">           
                        <div class="headerButtonMobile"><a href="#" id="mobile-button" title="Mobile">Menu</a></div>
                        <div class="headerButton">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="DF7JNKZF7WHLS">
                                <input type="image" id="paypal-full" src="http://telfordsteamrailway.co.uk/wp-content/themes/TSR-Rocket/images/paypal.png" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
                                <img alt="" border="0" src="http://telfordsteamrailway.co.uk/wp-content/themes/TSR-Rocket/images/paypal.png" width="0" height="0">
                            </form>
                        </div>

                    </div>
                    <!-- FUTURE
                    <div class="containerRight">           
                        
                        <div class="headerButtonRight">
                            <a href="#" class="headerButtonMembers" title="Members Area">Members Area</a>
                        </div>

                 
                    </div> 
                    -->     
                    <img src="<?php bloginfo('template_url');?>/images/telford-logo-large.png" alt="telford steam railway">
                
                </header>

                <div class="header-promo"><a href="http://telfordsteamrailway.co.uk/attractions/drive-a-steam-train/" title="Book Your Driving Experience Today"><img class="header-promo-image" src="<?php bloginfo('template_url');?>/images/driving-book-bar.png" alt="Book Your Driving Experience Today"></a></div>

                <div id="contentWrapperOuter">

                    <nav id="main" role="navigation">
                        <?php 
                            wp_nav_menu( array( 'theme_location' => 'header-menu', 'sub_menu' => true, 'menu_class' => 'menu-header', 'depth' => 2, ) ); 
                          
                            $parent = $post->post_parent;

                            if ($parent != 0) {

                                echo '<ul class="fixed-sub-menu">';

                                wp_list_pages( array('child_of' => $parent, 'title_li' => __(''),));

                                echo "</ul>";

                            }
                        ?>

                    </nav>