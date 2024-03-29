<?php

//REGISTRAR
if($_POST['registro'] == 'nuevo'){  

   /*  
    $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );

    die(json_encode( $respuesta ));
    */

    try {   
        include_once 'funciones/funciones.php';
 
        $nombre_invitado = $_POST['nombre_invitado'];
        $apellido_invitado = $_POST['apellido_invitado'];
        $biografia_invitado = $_POST['biografia_invitado'];
 
        //UBICACION PARA LAS FOTOS
        $directorio = "../img/invitados/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0755, true);
            //( DIRECTORIO , PERMISOS PARA SERVIDOR WEB, CUANDO SE CREA UN ARCHIVO SE CREA CON LOS MISMOS PERMISOS)
        }

        if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
            $imagen_url = $_FILES['archivo_imagen']['name'];
            $imagen_resultado = "Se subió correctamente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }

        $stmt = $conn -> prepare('INSERT INTO invitados (nombre_invitado,apellido_invitado,descripcion,url_imagen) VALUES(?,?,?,?)');
        $stmt -> bind_param('ssss',$nombre_invitado,$apellido_invitado,$biografia_invitado,$imagen_url);
        $stmt -> execute();
        $id_insertado = $stmt->insert_id; 

        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
                'resultado_imagen' => $imagen_resultado
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

//ACTUALIZAR
if($_POST['registro'] == 'actualizar'){  
   
   /* $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );

    die(json_encode( $respuesta ));*/
       
    
    try {        
        include_once 'funciones/funciones.php';
 
        $nombre_invitado = $_POST['nombre_invitado'];
        $apellido_invitado = $_POST['apellido_invitado'];
        $biografia_invitado = $_POST['biografia_invitado'];
        $id_registro = $_POST['id_registro'];

        //UBICACION PARA LAS FOTOS
        $directorio = "../img/invitados/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0755, true);
            //( DIRECCTORIO , PERMISOS PARA SERVIDOR WEB, CUANDO SE CREA UN ARCHIVO SE CREA CON LOS MISMOS PERMISOS)
        }

        if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
            $imagen_url = $_FILES['archivo_imagen']['name'];
            $imagen_resultado = "Se subió correctamente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }
       
        if($_FILES['archivo_imagen']['size'] > 0){
            //CON IMAGEN
            $stmt = $conn -> prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion =? , url_imagen = ? WHERE invitado_id = ?');
            $stmt -> bind_param('ssssi',$nombre_invitado, $apellido_invitado, $biografia_invitado, $imagen_url,$id_registro );
        }else{
            //SIN IMAGEN
            $stmt = $conn -> prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ? WHERE invitado_id = ?');
            $stmt -> bind_param('sssi',$nombre_invitado, $apellido_invitado, $biografia_invitado, $id_registro );
        }
 
       $estado =  $stmt -> execute();      
        

        if($estado == true){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
} 

//ELIMINAR
if($_POST['registro'] == 'eliminar'){  
    
    try {        
        include_once 'funciones/funciones.php';
         $id = $_POST['id']; 
         $stmt = $conn->prepare('DELETE FROM invitados WHERE invitado_id = ?');
         $stmt -> bind_param('i',$id);
         $stmt -> execute();
         if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id
            );
         }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
         }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

?>