$(document).ready(function(){  
    $('#guardar-registro').on('submit', function(e){
        e.preventDefault();
        //console.log("Clickk!!!");
        var datos = $(this).serializeArray();
         //console.log(datos);

        //CREADO AJAX CON JQUERY
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
              // console.log(data);
                var resultado = data;
               
               if(resultado.respuesta == 'exito'){
                    swal(
                        'Correcto !',
                        'Se guardó correctamente',
                        'success'
                    )
               }else{
                swal(
                    'Error !',
                    'Hubo un error',
                    'error'
                )
               }
            }
        }) 
    });



//ELIMINAR REGISTRO
    $('.borrar_registro').on('click',function(e){
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');

        swal({
            title: '¿Estás seguro?',
            text: "Un registro eliminado no se puede recuperar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
                    //console.log("ID : " + id);
                    $.ajax({
                        type: 'post',
                        data:{
                            'id' : id,
                            'registro' : 'eliminar'
                        },
                        url: 'modelo-'+tipo+'.php',
                        success: function(data){
                             console.log(data);
                            var resultado = JSON.parse(data);
                            if(resultado.respuesta == 'exito'){
                                swal(
                                    'Eliminado!',
                                    'Registro Eliminado.',
                                    'success'
                                  )
                                  jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                            }else{
                                swal(
                                    'Error!',
                                    'No se pudo eliminar.',
                                    'error'
                                  )
                            }
                            
                        }
                    });
            }).catch(swal.noop);;
    });

    
    //SE EJECUTA CUANDO HAY UN ARCHIVO
    $('#guardar-registro-archivo').on('submit', function(e){
        e.preventDefault();
        //console.log("Clickk!!!");
        var datos = new FormData(this);
         //console.log(datos);

        //CREADO AJAX CON JQUERY
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data){
               console.log(data);
                var resultado = data;
               if(resultado.respuesta == 'exito'){
                    swal(
                        'Correcto !',
                        'Se guardó correctamente',
                        'success'
                    )
               }else{
                swal(
                    'Error !',
                    'Hubo un error',
                    'error'
                )
               }
            }
        });
    });
 
});