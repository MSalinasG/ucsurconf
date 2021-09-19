 
<?php
    include_once 'includes/templates/header.php';
?>
    <section class="seccion contenedor">
        <h2>Resumen de Registro</h2>  
        <?php
                $resultado =  $_GET['exito'];  
                  
                if($resultado === "true"){         
                    $paymentId = $_GET['paymentId'];    
                    $id_pago = (int) $_GET['id_pago'];  

                    echo "El pago se realizó correctamente <br><hr>";
                    echo "El ID es {$paymentId}";

                    require_once('includes/funciones/bd_conexion.php');
                    $stmt = $conn->prepare("UPDATE `registrados` SET `pagado` = ? WHERE `ID_Registrado` = ? ");
                    $pagado = 1;
                    $stmt->bind_param("ii",$pagado,$id_pago);
                    $stmt -> execute();
                    $stmt -> close();
                    $conn -> close();  
                }else{
                    echo "El pago no se realizó";
                }
                 
              ?>
                 
    </section>
<?php
    include_once 'includes/templates/footer.php';
?>