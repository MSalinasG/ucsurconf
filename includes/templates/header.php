<!DOCTYPE html> 
<html class="no-js" lang="es">
    <head>
        <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Diseño Web</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">        

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
        <link rel="stylesheet" href="css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
        <link rel="stylesheet" href="admin/css/font-awesome.min.css">

        <?php

            $archivo = basename($_SERVER['PHP_SELF']);
            $pagina = str_replace(".php","",$archivo);
            if($pagina == 'invitado' || $pagina=='index'){
                echo '<link rel="stylesheet" href="css/colorbox.css">';
            }else if($pagina == 'conferencia'){
                echo '<link rel="stylesheet" href="css/lightbox.css">';
            }

        ?>

        <link rel="stylesheet" href="css/fontawesome-all.min.css"> 
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="<?php echo $pagina;?>">
        <header class="site-header">
            <div class="hero">
                <div class="contenido-header">
                    <nav class="redes-sociales">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </nav>

                    <div class="informacion-evento">
                        <div class="clearfix">
                            <p class="fecha"><i class="far fa-calendar-alt"></i> 17-10 Oct</p>
                            <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Lima, Perú</p>
                        </div>
                        <h1 class="nombre-sitio">UcSurConf</h1>
                        <p class="slogan" style="margin-top: 10px">La mejor conferencia de <span>Diseño Web</span></p>
                    </div><!--informacion-evento-->

                </div> <!--contenido-header-->
            </div> <!--.hero-->
        </header>

            <div class="barra">
                <div class="contenedor clearfix">
                    <div class="logo">
                        <a href="index.php">
                        <img src="img/logo.png" alt="logo GdlWebcamp">
                        </a>
                    </div>

                    <div class="menu-movil">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <nav class="navegacion-principal clearfix">
                        <a href="conferencia.php">Conferencia</a>
                        <a href="calendario.php">Calendario</a>
                        <a href="invitado.php">Invitados</a>
                        <a href="registro.php">Reservaciones</a>
                    </nav>
                </div><!--contenedor-->
            </div><!--barra-->
            