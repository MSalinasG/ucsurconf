<?php 
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)){
        die('Error!');
    }

include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';

?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Para Editas Registro de Usuario manual
        <small>llena el formulario para editar un usuario registrado</small>
      </h1>
 
    </section>

    <div class="row"> 
        <div class="col-md-12">
  
      <!-- Main content -->
          <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Crear Usuario</h3> 
      
              </div>
              <div class="box-body">
                <?php 
                    $sql = "SELECT * FROM registrados WHERE ID_Registrado = $id";
                    $resultado = $conn -> query($sql);
                    $registrado = $resultado->fetch_assoc();

                    echo "<pre>";
                        var_dump($registrado);
                    echo "</pre>";
                ?>
                          <!-- form start -->
                          <form class="editar-registrado" role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
                                <div class="box-body">
                                    <div class="form-group">
                                      <label for="nombre_registrado">Nombre</label>
                                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $registrado['nombre_registrado']?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="apellido">Apellido</label>
                                      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $registrado['apellido_registrado']?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $registrado['email_registrado']?>">
                                    </div>       
                                    <?php 
                                        $pedido = $registrado['pases_articulos'];
                                        $boletos = json_decode( $pedido , true );

                                        echo "<pre>";
                                        var_dump($boletos);
                                        echo "</pre>";
                                    ?>                               
                                    <div class="form-group">
                                        <div id="paquetes" class="paquetes">
                                        <div class="box-header with-border"> 
                                            <h3 class="box-title">Número de boletos</h3>
                                        </div>
                                          <ul class="lista-precios clearfix row">
                                                  <li class="col-md-4">
                                                      <div class="tabla-precio text-center">
                                                          <h3>Pase por día (Viernes)</h3>
                                                          <p class="numero">$30</p>
                                                          <ul>
                                                              <li>Bocadillos Gratis</li>
                                                              <li>Todas las Conferencias</li>
                                                              <li>Todos los talleres</li>
                                                          </ul>
                                                          <div class="orden">
                                                              <label for="pase_dia">Boletos deseados:</label>
                                                              <input value="<?php echo $boletos['un_dia']['cantidad']?>" type="number" class="form-control" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
                                                              <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                                          </div>
                                                      </div>
                                                  </li>
                                                  <li class="col-md-4">
                                                      <div class="tabla-precio text-center">
                                                          <h3>Todos los Días</h3>
                                                          <p class="numero">$50</p>
                                                          <ul>
                                                              <li>Bocadillos Gratis</li>
                                                              <li>Todas las Conferencias</li>
                                                              <li>Todos los talleres</li>
                                                          </ul>
                                                          <div class="orden">
                                                                  <label for="pase_completo">Boletos deseados:</label>
                                                                  <input value="<?php echo $boletos['pase_completo']['cantidad']?>" type="number" class="form-control" min="0" id="pase_completo" name="boletos[completo][cantidad]" size="3" placeholder="0">
                                                                  <input type="hidden" value="50" name="boletos[completo][precio]">
                                                          </div>
                                                      </div>
                                                  </li>
                                                  <li class="col-md-4">
                                                      <div class="tabla-precio text-center">
                                                          <h3>Pase por 2 días (Viernes y Sabado)</h3>
                                                          <p class="numero">$45</p>
                                                          <ul>
                                                              <li>Bocadillos Gratis</li>
                                                              <li>Todas las Conferencias</li>
                                                              <li>Todos los talleres</li>
                                                          </ul>
                                                          <div class="orden">
                                                                  <label for="pase_dos_dias">Boletos deseados:</label>
                                                                  <input value="<?php echo $boletos['pase_2dias']['cantidad']?>" type="number" class="form-control" min="0" id="pase_dos_dias" name="boletos[2dias][cantidad]" size="3" placeholder="0">
                                                                  <input type="hidden" value="45" name="boletos[2dias][precio]">
                                                          </div>
                                                      </div>
                                                  </li>
                                              </ul>
                                      </div><!--paquetes-->
                                    </div><!-- form.group-->
                                    <div class="form-group">
                                      <div class="box-header with-border talleres_ver"> 
                                          <h3 class="box-title">Elige los talleres</h3>
                                      </div> 
                                        <div id="eventos" class="eventos clearfix">                                                                                     
                                            <div class="caja"> 
                                                <?php 
                                                    $eventos = $registrado['talleres_registrados'];
                                                    $id_eventos_registrados = json_decode($eventos, true); 

                                                    try {
                                                        
                                                        $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                                                        $sql .= "FROM eventos ";
                                                        $sql .= "JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                                                        $sql .= "JOIN invitados ON eventos.id_inv = invitados.invitado_id ";
                                                        $sql .= "ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento";
                                                        $resultado = $conn->query($sql);
                                                        
                                                    } catch (Exception $e) {
                                                        echo $e->getMessage();
                                                    }   

                                                    $days_dias = array(
                                                        'Monday'=>'lunes',
                                                        'Tuesday'=>'martes',
                                                        'Wednesday'=>'miercoles',
                                                        'Thursday'=>'jueves',
                                                        'Friday'=>'viernes',
                                                        'Saturday'=>'sabado',
                                                        'Sunday'=>'domingo'
                                                        );

                                                    $eventos_dias = array();
                                                    while($eventos = $resultado->fetch_assoc()){
                                                        $fecha = $eventos['fecha_evento']; 

                                                        $dia_semana = strftime('%A', strtotime($fecha));
                                                        $dia_semana =  $days_dias[$dia_semana];

                                                        $categoria = $eventos['cat_evento'];

                                                        $dia = array(                                             
                                                            'nombre_evento' => $eventos['nombre_evento'],
                                                            'hora' => $eventos['hora_evento'],
                                                            'id' => $eventos['evento_id'],
                                                            'nombre_invitado' => $eventos['nombre_invitado'],
                                                            'apellido_invitado' => $eventos['apellido_invitado']
                                                        );
                                                      $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                                                    } 
                                                ?>

                                                <?php foreach ($eventos_dias as $dia => $eventos) { ?> 
                                                  <div id="<?php echo $dia;?>" class="contenido-dia clearfix row">
                                                      <h4 class="text-center nombre_dia"><?php echo $dia;?></h4>
                                                        <?php foreach ($eventos['eventos'] as $tipo => $eventos_dia) { ?>  
                                                            <div class="col-md-4">
                                                              <p><b><?php echo $tipo;?>:</b></p>
                                                                <?php foreach ($eventos_dia as $evento) { ?>
                                                                    <label>
                                                                        <input <?php echo (in_array( $evento['id'], $id_eventos_registrados['eventos']) ? 'checked' : '')?> type="checkbox" class="minimal" name="registro_evento[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                                                        <time> <?php echo $evento['hora']; ?></time> <?php echo $evento['nombre_evento']; ?>
                                                                        <br>
                                                                        <span class="autor"><?php echo $evento['nombre_invitado']. " " . $evento['apellido_invitado'];?></span>
                                                                    </label><br>
                                                                <?php }?>
                                                            </div>
                                                        <?php    }     ?>
                                                  </div> <!--#contenido_dia-->
                                                <?php } ?>
                                              </div><!--.caja-->
                                        </div> <!--#eventos-->

                                        <div id="resumen" class="resumen">
                                            <div class="box-header with-border"> 
                                                <h3 class="box-title">Pagos y Extras</h3>
                                            </div>
                                            <br>
                                            <div class="caja clearfix row">
                                                <div class="extras col-md-6">
                                                    <div class="orden">
                                                        <label for="camisa_evento">Camisa del evento $10<small>(promoción 7% dto.)</small></label>
                                                        <input value="<?php echo $boletos['camisas'];?>" type="number" class="form-control" min="0"   id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                                                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                                    </div><!--orden-->
                                                    <div class="orden">
                                                            <label for="etiquetas">Paquete de 10 etiquetas $2<small>(HTML5 - CCS3 - Javascript - CHROME)</small></label>
                                                            <input value="<?php echo $boletos['etiquetas'];?>" type="number" class="form-control" min="0"   id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                                                            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                                    </div><!--orden-->
                                                    <div class="orden">
                                                        <label for="regalo">Seleccione un regalo</label><br>
                                                        <select name="regalo" class="form-control seleccionar" id="regalo" required>
                                                            <option value="">-Seleccione un regalo-</option>
                                                            <option value="2" <?php echo ($registrado['regalo'] == 2) ? 'selected' : '' ;?> >Etiquetas</option>
                                                            <option value="1" <?php echo ($registrado['regalo'] == 1) ? 'selected' : '' ;?> >Pulsera</option>
                                                            <option value="3" <?php echo ($registrado['regalo'] == 3) ? 'selected' : '' ;?> >Plumas</option>
                                                        </select>
                                                    </div><!--orden-->
                                                    <br>
                                                    <input type="button" id="calcular" class="btn btn-success" value="Calcular">
                                                </div><!--extras-->

                                                <div class="total col-md-6">
                                                    <p>Resumen:</p>
                                                    <div id="lista-productos"></div>
                                                    <p>Total Ya Pagado : <?php echo (float) $registrado['total_pagado']?></p>
                                                    <p>Total</p>
                                                    <div id="suma-total">

                                                    </div>
                                                    <input type="hidden" name="total_pedido" id="total_pedido" >                                                    
                                                </div><!--total-->
                                            </div><!--caja-->
                                    </div><!--resumen--> 
                                    </div>
                                </div>
                                <!-- /.box-body xxx-->

                                <div class="box-footer">
                                  <input type="hidden" name="registro" value="actualizar" />
                                  <input type="hidden" name="id_registro" value="<?php echo $registrado['ID_Registrado'];?>">
                                  <input type="hidden" name="fecha_registro" value="<?php echo $registrado['fecha_registro'];?>">
                                  <button type="submit" class="btn btn-primary" id="btnRegistro">Añadir</button>
                                </div>
                              </form>
              </div>
              <!-- /.box-body --> 
            </div>
            <!-- /.box -->

          </section>
      <!-- /.content -->
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
 
  <?php include_once 'templates/footer.php'; ?>
 

