            <div style="clear:both"></div>
        </div> <!-- #contentWrapperOuter -->
            <section class="goodbye">
                <img src="<?php bloginfo('template_url');?>/images/telford-logo-bottom.png" alt="telford steam railway">        
            </section> 
    </div> <!--#wrapper-->

        <footer role="contentinfo" id="bottom">
            <div class="footerWrap">
                <section>
                    <a class="footer-link" href="<?php bloginfo('url');?>/volunteers" title="Telford Steam Railway Volunteers">Proudly operated by the volunteers of TSR. &copy 2014</a>
                    <a class="socialIconFooter twitterIconFooter" href="http://twitter.com/tsrheritage"></a>
                    <a class="socialIconFooter facebookIconFooter" href="http://www.facebook.com/groups/155261792870/"></a>
                    <a class="socialIconFooter googleplusIconFooter" alt="Google Plus" href="https://plus.google.com/106487102494693105178/"></a>
                    <a class="tripadvisor" alt="Tripadvisor" href="http://www.tripadvisor.co.uk/Attraction_Review-g187050-d3596554-Reviews-Telford_Steam_Railway-Telford_Shropshire_England.html"></a>
                    

                </section>
            </div>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script type="text/javascript">

            $(document).ready(function(){
                var pageWidth = $(window).width();  
                if ( pageWidth >= 801 ) {
                    $("#mobile-button").html("Menu");
                    $( "nav#mobile" ).css("display", "none");

                }
                $(window).resize(function() {
                    if ($(window).width() >= 801) {
                        $("#mobile-button").html("Menu");
                        $( "nav#mobile" ).css("display", "none");
                    }
                });
            });
        
            $( "#mobile-button" ).click(function() {
                var value = $("#mobile-button").html();
                if (value=="Menu"){
                    $("#mobile-button").html("Close");
                }

                else {
                    $("#mobile-button").html("Menu");
                }
                $( "nav#mobile" ).slideToggle("easing");


            });

            $(window).scroll(function () {
               if ($(window).scrollTop() >= 250) {
                    $( "footer#bottom" ).css("position", "fixed");
                    $( "footer#bottom" ).fadeIn( 350, function() {
                        // Animation complete
                      });
               }
               else {
                    $( "footer#bottom" ).css("position", "relative");
                    $( "footer#bottom" ).fadeOut( 100, function() {
                        // Animation complete
                      });
                  
               }

            });

        </script>

        <!-- Google Analytics: -->
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-51741923-1', 'telfordsteamrailway.co.uk');
              ga('send', 'pageview');

            </script>

        <?php wp_footer();?>
    </body>
</html>