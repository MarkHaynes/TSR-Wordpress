            <div style="clear:both"></div>
        </div> <!-- #contentWrapperOuter -->
            <section class="goodbye">
                <img src="<?php bloginfo('template_url');?>/images/telford-logo-bottom.png" alt="telford steam railway">        
            </section> 
    
</div> <!--#wrapper-->
        <footer role="contentinfo" id="bottom">
            <div class="footerWrap">
                <section>
                    <a class="footer-link" href="<?php bloginfo('url');?>/volunteers" title="Telford Steam Railway Volunteers">Proudly operated by the volunteers of TSR. &copy 2015</a>
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
                if ( pageWidth >= 851 ) {
                    $("#fixed-mobile-button").html("Menu");
                    $( "main" ).css("right", "0");
                    $( "footer" ).css("right", "0");
                    $( "nav#mobile" ).css("display", "none");

                }
                $(window).resize(function() {
                    if ($(window).width() >= 851) {
                        $("#fixed-mobile-button").html("Menu");
                        $( "main" ).css("right", "0");
                        $( "footer" ).css("right", "0");
                        $( "nav#mobile" ).css("display", "none");
                    }
                });
            });

        
            $( "#fixed-mobile-button" ).click(function() {
                var value = $("#fixed-mobile-button").html();
                if (value=="Menu"){
                    $("#fixed-mobile-button").html("Close");
                    $( "main" ).css("right", "-70%");
                    //$( "footer" ).css("right", "-70%");
                    $( "nav#mobile" ).css("display", "table-cell");
                }

                else {
                    $("#fixed-mobile-button").html("Menu");
                    $( "main" ).css("right", "0");
                    $( "footer" ).css("right", "0");
                    setTimeout( function(){
                        $( "nav#mobile" ).css("display", "none");
                    },0);                   
                }
                
                $( "nav#mobile" ).css("height", "90%");

            });
        
            $(document).ready(function(){
                if( $(window).width() <= 850)  {
                   
                    $( ".fixed-header-wrap" ).fadeIn( 'slow', function() {
                        // Animation complete
                      });
               }
               else {
                   
                    $( ".fixed-header-wrap" ).fadeOut( 'slow', function() {
                        // Animation complete
                      });
                  
               }

            });


            $(window).scroll(function () {
               if ($(window).scrollTop() >= 360 || $(window).width() <= 850)  {
                   
                    $( ".fixed-header-wrap" ).fadeIn( 'slow', function() {
                        // Animation complete
                      });
               }
               else {
                   
                    $( ".fixed-header-wrap" ).fadeOut( 'slow', function() {
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
        </main>
    </body>
</html>