<?php

//REGISTRAR
if($_POST['registro'] == 'nuevo'){  
     
    try {   
        include_once 'funciones/funciones.php';

        $nombre_categoria = $_POST['nombre_categoria'];
        $icono = $_POST['icono'];
 
        $stmt = $conn -> prepare('INSERT INTO categoria_evento (cat_evento,icono) VALUES(?,?)');
        $stmt -> bind_param('ss',$nombre_categoria,$icono);
        $stmt -> execute();
        $id_insertado = $stmt->insert_id; 

        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
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
   
    try {
        include_once 'funciones/funciones.php';
        
        
        $nombre_categoria = $_POST['nombre_categoria'];
        $icono = $_POST['icono'];
        $id_registro = $_POST['id_registro'];
        
        $stmt = $conn -> prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ?');
        $stmt -> bind_param('ssi',$nombre_categoria, $icono, $id_registro);
        $stmt -> execute();        

        if($stmt->affected_rows){
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

if($_POST['registro'] == 'eliminar'){  
    try {        
        include_once 'funciones/funciones.php';
         $id = $_POST['id']; 
         $stmt = $conn->prepare('DELETE FROM categoria_evento WHERE id_categoria = ?');
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