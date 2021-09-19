<?php
    include_once 'includes/templates/header.php';
?>

            <section class="seccion contenedor">
                <h2>La mejor conferencia de Diseño Web en español</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo quibusdam reprehenderit labore dolor. Ipsam incidunt exercitationem quam accusantium sit, nobis earum illum quaerat corrupti rerum eaque officia reiciendis illo commodi.
                </p>
            </section><!--seccion-->

            <section class="programa">
                <div class="contenedor-video">
                    <video autoplay loop poster="img/bg-talleres.jpg">
                        <source src="video/video.mp4" type="video/mp4">
                        <source src="video/video.webm" type="video/webm">
                        <source src="video/video.ogv" type="video/ogg">
                    </video>
                </div><!--contenedor-video-->

                <div class="contenido-programa">
                    <div class="contenedor">
                        <div class="programa-evento">
                            <h2>Programa del Evento</h2>
                                <?php  
                                    try {
                                        require_once('includes/funciones/bd_conexion.php');
                                        $sql = "SELECT * FROM categoria_evento; ";
                                        $resultado = $conn->query($sql);
                                    } catch (\Exception $e) {
                                        echo $e->getMessage();
                                    }
                                ?>
                            <nav class="menu-programa">
                                <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ 
                                    $categoria = $cat['cat_evento'];
                                    $icono = $cat['icono'];
                                ?>
                                    <a href="#<?php echo strtolower($categoria);?>">
                                    <i class="fa <?php echo $icono;?>" aria-hidden="true">
                                    </i><?php echo $categoria;?></a>   
                                <?php } ?>
                            </nav><!--menu-programa-->
 
                            <?php  
                                try {
                                     
                                    require_once('includes/funciones/bd_conexion.php');
                                    $sql = "SELECT evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado FROM `eventos` INNER JOIN `categoria_evento` ON eventos.id_cat_evento = categoria_evento.id_categoria INNER JOIN `invitados` ON eventos.id_inv = invitados.invitado_id AND `eventos`.id_cat_evento = 1 ORDER BY evento_id LIMIT 2;";

                                    $sql .= "SELECT evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado FROM `eventos` INNER JOIN `categoria_evento` ON eventos.id_cat_evento = categoria_evento.id_categoria INNER JOIN `invitados` ON eventos.id_inv = invitados.invitado_id AND `eventos`.id_cat_evento = 2 ORDER BY evento_id LIMIT 2;";

                                    $sql .= "SELECT evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado FROM `eventos` INNER JOIN `categoria_evento` ON eventos.id_cat_evento = categoria_evento.id_categoria INNER JOIN `invitados` ON eventos.id_inv = invitados.invitado_id AND `eventos`.id_cat_evento = 5 ORDER BY evento_id LIMIT 2;"; 
                                } catch (\Exception $e) {
                                    echo $e->getMessage();
                                }
                            ?>

                            <?php $conn -> multi_query($sql);?>
                            <?php 
                                do{
                                    $resultado = $conn->store_result();
                                    $row = $resultado->fetch_all(MYSQLI_ASSOC); 

                            ?>
                                <?php $i = 0;?>
                                <?php foreach ($row as $evento): ?>   
                                    <?php if($i % 2 == 0){?>                        
                                    <div id="<?php echo strtolower($evento['cat_evento']);?>" class="info-curso ocultar clearfix">
                                    <?php } ?>
                                    <div class="detalle-evento">                                       
                                        <h3><?php echo $evento['nombre_evento'];?></h3>
                                        <p><i class="fa fa-clock" aria-hidden="true"></i> <?php echo $evento['hora_evento']?></p>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento']?></p>
                                        <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " ". $evento['apellido_invitado']?></p>
                                    </div>         
                                                               
                                    <?php if($i % 2 == 1):?>
                                    <a href="#" class="button float-right">Ver todos</a> 
                                    </div><!--talleres--> 
                                    <?php endif;?>
                                <?php $i++;?>    
                                <?php  endforeach; ?>
                                <?php $resultado->free();?>
                            <?php
                                } while ($conn->more_results() && $conn->next_result()); 
                            ?> 
                        </div><!--programa-evento-->
                    </div><!--contenedor-->
                </div><!--contenido-programa-->
            </section><!--programa--> 
            
            <?php include_once 'includes/templates/invitados.php'?> 

            <div class="contador parallax">
                 <div class="contenedor">
                    <ul class="resumen-evento clearfix">
                        <li><p class="numero"></p> Invitados</li>
                        <li><p class="numero"></p> Talleres</li>
                        <li><p class="numero"></p> Días</li>
                        <li><p class="numero"></p> Conferencias</li>
                    </ul>
                 </div>
            </div>

            <section class="precios seccion">
                <h2>Precios</h2>
                <div class="contenedor">
                    <ul class="lista-precios clearfix">
                        <li>
                            <div class="tabla-precio">
                                <h3>Pase por día</h3>
                                <p class="numero">$30</p>
                                <ul>
                                    <li>Bocadillos Gratis</li>
                                    <li>Todas las Conferencias</li>
                                    <li>Todos los talleres</li>
                                </ul>
                                <a href="#" class="button hollow">Comprar</a>
                            </div>
                        </li>
                        <li>
                            <div class="tabla-precio">
                                <h3>Todos los Días</h3>
                                <p class="numero">$50</p>
                                <ul>
                                    <li>Bocadillos Gratis</li>
                                    <li>Todas las Conferencias</li>
                                    <li>Todos los talleres</li>
                                </ul>
                                <a href="#" class="button">Comprar</a>
                            </div>
                        </li>
                        <li>
                            <div class="tabla-precio">
                                <h3>Pase por 2 días</h3>
                                <p class="numero">$45</p>
                                <ul>
                                    <li>Bocadillos Gratis</li>
                                    <li>Todas las Conferencias</li>
                                    <li>Todos los talleres</li>
                                </ul>
                                <a href="#" class="button hollow">Comprar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            <div id="mapa" class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3899.3931363536517!2d-76.9789089!3d-12.2216386!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c810b49c65fd%3A0x8ff33bec47f443a6!2sUniversidad%20Cient%C3%ADfica%20del%20Sur!5e0!3m2!1ses-419!2spe!4v1630435460834!5m2!1ses-419!2spe" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <section class="seccion">
                <h2>Testimoniales</h2>
                <div class="testimoniales contenedor clearfix">
                    <div class="testimonial">
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum ullam, quaerat dicta ipsam repudiandae asperiores nobis, eum modi sequi magnam, delectus temporibus animi atque. Nostrum similique sed fugiat doloribus voluptate.</p>
                            <footer class="info-testimonial clearfix">
                                <img src="img/testimonial.jpg" alt="imagen testimonial">
                                <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                            </footer>
                        </blockquote>
                    </div><!--.testimonial-->
                    <div class="testimonial">
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum ullam, quaerat dicta ipsam repudiandae asperiores nobis, eum modi sequi magnam, delectus temporibus animi atque. Nostrum similique sed fugiat doloribus voluptate.</p>
                            <footer class="info-testimonial clearfix">
                                <img src="img/testimonial.jpg" alt="imagen testimonial">
                                <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                            </footer>
                        </blockquote>
                    </div><!--.testimonial-->
                    <div class="testimonial">
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum ullam, quaerat dicta ipsam repudiandae asperiores nobis, eum modi sequi magnam, delectus temporibus animi atque. Nostrum similique sed fugiat doloribus voluptate.</p>
                            <footer class="info-testimonial clearfix" >
                                <img src="img/testimonial.jpg" alt="imagen testimonial">
                                <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
                            </footer>
                        </blockquote>
                    </div><!--.testimonial-->
                </div>                
            </section>

            <!--<div class="newsletter parallax">
                <div class="contenido contenedor">
                    <p>Regístrate a newsletter:</p>
                    <h3>UcSurConf</h3>
                    <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
                </div><!--contenido-->
            <!-- </div>--><!--newsletter-->

            <section class="seccion">
                <h2>faltan</h2>
                <div class="cuenta-regresiva contenedor">
                    <ul class="clearfix">
                        <li><p id="dias" class="numero"></p>Días</li>
                        <li><p id="horas" class="numero"></p>Horas</li>
                        <li><p id="minutos" class="numero"></p>Minutos</li>
                        <li><p id="segundos" class="numero"></p>Segundos</li>
                    </ul>
                </div>
            </section>
            
            
<?php
    include_once 'includes/templates/footer.php';
?>