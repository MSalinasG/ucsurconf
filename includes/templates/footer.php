<footer class="site-footer">
                <div class="contenedor clearfix">
                    <div class="footer-informacion">
                        <h3>Sobre <span>UcSurConf</span></h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis, explicabo! Nostrum rerum fugiat atque, modi commodi inventore non, sint reprehenderit velit nisi totam, labore voluptatem at eum fugit minus ex.</p>
                    </div>
                    <div class="ultimos-tweets">
                        <h3>Últimos <span>Tweets</span></h3>
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus earum distinctio similique voluptates modi voluptatem iusto a dignissimos aliquid, laborum commodi autem asperiores accusantium vel, recusandae placeat hic eaque debitis!</li>

                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus earum distinctio similique voluptates modi voluptatem iusto a dignissimos aliquid, laborum commodi autem asperiores accusantium vel, recusandae placeat hic eaque debitis!</li>

                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus earum distinctio similique voluptates modi voluptatem iusto a dignissimos aliquid, laborum commodi autem asperiores accusantium vel, recusandae placeat hic eaque debitis!</li>
                        </ul>
                    </div>
                    <div class="menu">
                        <h3>Redes <span>sociales</span></h3>
                        <nav class="redes-sociales">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </nav>
                    </div>
                </div>

                <p class="copyright">Todos los derechos Reservados UcSurConf 2021 &copy;</p>

        <!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div style="display:none;">
        <div id="mc_embed_signup">
        <form action="https://www.us20.list-manage.com/subscribe/post?u=bd002cfadd8627f54f2eb2ef6&amp;id=90e411eb0a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
            <h2>Suscribete</h2>
        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
        <div class="mc-field-group">
            <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
        </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bd002cfadd8627f54f2eb2ef6_90e411eb0a" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        <!--End mc_embed_signup-->
        </div>
        

            </footer> 
 
            <!--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>-->
            <script>
                window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
            </script>
            <script src="js/plugins.js"></script>
           
            <script language="JavaScript" type="text/javascript" src="js/main.js"></script>
           <!-- <script src="js/cotizador.js"></script>-->
            <script language="JavaScript" type="text/javascript" src="js/cargar_mapa.js"></script>
            <script src="js/jquery.animateNumber.min.js"></script>
            <script src="js/jquery.countdown.min.js"></script>
            <script src="js/jquery.lettering.js"></script>

            <?php
                $archivo = basename($_SERVER['PHP_SELF']);
                $pagina = str_replace(".php","",$archivo);
                if($pagina == 'invitado' || $pagina=='index'){
                   
                    echo ' <script language="JavaScript" type="text/javascript" src="js/main-jQuery.js"></script>';
                    echo '<script src="js/jquery.colorbox-min.js"></script>';                
                }else if($pagina == 'conferencia'){
                    echo '<script src="js/lightbox.js"></script>';
                }
            ?>
            
            <script language="JavaScript" type="text/javascript" src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>


        

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');

            //Animaciones para los Números
         $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6},1500);
         $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15},1500);
         $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3},1500);
         $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9},1500);    
    
         //Cuenta regresiva
         $('.cuenta-regresiva').countdown('2021/10/17 09:00:00', function(event){
            $('#dias').html(event.strftime('%D'));
            $('#horas').html(event.strftime('%H'));
            $('#minutos').html(event.strftime('%M'));
            $('#segundos').html(event.strftime('%S'));
         });
         
        var windowHeight = $(window).height(); //Cuanto mide la ventana
        var barraAltura = $('.barra').innerHeight(); //Cuanto mide la barra
        //Menu Fijo
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if(scroll > windowHeight){
                $('.barra').addClass('fixed');
                $('body').css({'margin-top' : barraAltura+'px'});
            }else{
                $('.barra').removeClass('fixed');
                $('body').css({'margin-top' : '0'+'px'});
            }
        });

        //Lettering
        $('.nombre-sitio').lettering();

        //Agregar clase a menu
        $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
        $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
        $('body.invitado .navegacion-principal a:contains("Invitados")').addClass('activo');   
         //Menu Responsive
        $('.menu-movil').on('click',function(){
            $('.navegacion-principal').slideToggle();
        });
    
        //Programa de conferencias
        $('.programa-evento .info-curso:first').show();
        $('.menu-programa a:first').addClass('activo');
    
         $('.menu-programa a').on('click', function(){
            $('.menu-programa a').removeClass('activo');
            $(this).addClass('activo');
            $('.ocultar').hide();
            var enlace = $(this).attr('href');
            $(enlace).fadeIn(1000);
            return false;
         }); 

        </script>

    </body>
</html>