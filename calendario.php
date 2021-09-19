<?php
    include_once 'includes/templates/header.php';
?> 

            <section class="seccion contenedor">
                <h2>Calendario de Eventos</h2>

                <?php  
                    try {
                        require_once('includes/funciones/bd_conexion.php');
                        $sql = "SELECT evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado FROM `eventos` INNER JOIN `categoria_evento` ON eventos.id_cat_evento = categoria_evento.id_categoria INNER JOIN `invitados` ON eventos.id_inv = invitados.invitado_id ORDER BY evento_id";
                        $resultado = $conn->query($sql);
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                ?>

                <div class="calendario">
                    <?php 
                        //AGRUPAMIENTO POR FECHA 
                        $calendario = array();

                        while( $eventos = $resultado->fetch_assoc() ){
                            //OBTENER LA FECHA DEL EVENTO PARA EL AGRUPAMIENTO
                            $fecha = $eventos['fecha_evento'];
                            $evento = array(
                                'titulo' => $eventos['nombre_evento'],
                                'fecha' => $eventos['fecha_evento'],
                                'hora' => $eventos['hora_evento'],
                                'categoria' => $eventos['cat_evento'],
                                'icono' => 'fa '.$eventos['icono'],
                                'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
                            );           

                            $calendario[$fecha][] = $evento;                     
                        } 
                    ?>
                    <?php
                        //IMPRIME TODOS LOS EVENTOS
                        //ACCEDIENDO A LOS KEYS DEL ARREGLO $calendario
                        foreach ($calendario as $dia => $lista_eventos) { ?>
                            <h3>
                                <i class="fa fa-calendar"></i>
                                <?php 
                                    //Unix
                                    setlocale (LC_ALL, "es_ES.UTF-8");
                                    //Windows 
                                    setlocale(LC_TIME,"spanish");                                
                                    echo date($dia);?>
                            </h3>
                            <?php 
                                foreach ( $lista_eventos as $evento ) { ?>
                                    <div class="dia">
                                        <p class="titulo"> <?php echo $evento['titulo']?> </p>
                                        <p class="hora"> 
                                            <i class="far fa-clock" aria-hidden="true"></i> 
                                            <?php echo $evento['fecha'] . " " . $evento['hora']?> 
                                        </p>
                                        <p>
                                            <i class="<?php echo $evento['icono']?>" aria-hidden="true"></i> 
                                            <?php echo $evento['categoria']?></p>
                                        <p>
                                            <i class="fa fa-user" aria-hidden="true"></i> 
                                            <?php echo $evento['invitado']?>
                                        </p>
                                    </div>
                            <?php  }  //FIN FOREACH DE EVENTOS ?>

                    <?php  }  //FIN FOREACH DE DIAS ?> 
                </div>  
                <?php 
                    $conn -> close();
                ?> 
            </section> 
<?php
    include_once 'includes/templates/footer.php';
?>