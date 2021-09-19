$(document).ready(function(){
    $('#login-admin').on('submit', function(e){
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
                 //console.log(data);
                var resultado = data;
                //console.log(resultado);
                if(resultado.respuesta == 'exitoso'){
                     swal(
                         'Login Correcto !',
                         'Bienvenid@ ' + resultado.usuario + '!!',
                         'success'
                     )
                     setTimeout(function(){
                        window.location.href = 'admin-area.php'
                     },2000);
                }else{
                    swal(
                        'Error !',
                        'Usuario o Password incorrectos',
                        'error'
                    )
                }
            }
        })
    });
});
