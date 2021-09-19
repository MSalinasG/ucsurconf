(function(){
    'use strict';

    var regalo = document.getElementById('regalo');
    document.addEventListener('DOMContentLoaded',function(){ 
        //Datos Usuario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

       //Campos pases
       var pase_dia = document.getElementById('pase_dia');
       var pase_completo = document.getElementById('pase_completo');
       var pase_dos_dias = document.getElementById('pase_dos_dias');

       //Botones y Divs
       var calcular = document.getElementById('calcular');
       var errorDiv = document.getElementById('error');
       var botonRegistro = document.getElementById('btnRegistro');
       var lista_productos = document.getElementById('lista-productos');
       var suma =document.getElementById('suma-total');

       //Extras
       var camisas = document.getElementById('camisa_evento');
       var etiquetas = document.getElementById('etiquetas');


        botonRegistro.disabled = true;

        if(document.getElementById('calcular')){

        calcular.addEventListener('click', calcularMontos);

        pase_dia.addEventListener('blur', mostrarDias);
        pase_completo.addEventListener('blur',mostrarDias);
        pase_dos_dias.addEventListener('blur',mostrarDias);

        nombre.addEventListener('blur',validarCampos);
        apellido.addEventListener('blur',validarCampos);
        email.addEventListener('blur',validarCampos);
        email.addEventListener('blur',validarEmail);

        var formulario_editar = document.getElementsByClassName('editar-registrado');
        if(formulario_editar.length > 0){
            if(pase_dia.value || pase_completo.value || pase_dos_dias.value ){
                mostrarDias();
            }
        }
        

        function validarEmail(){
            if(this.value.indexOf("@") > -1){
                errorDiv.style.display = "none";
                this.style.border = "1px solid #cccccc";
            }else{
                errorDiv.style.display = "block";
                errorDiv.innerHTML = "Debe contener al menos un arroba(@)";
                this.style.border = "1px solid red";
                errorDiv.style.border = "1px solid red";
            }
        }

        function validarCampos(){
            if(this.value == ''){
                errorDiv.style.display = "block";
                errorDiv.innerHTML = "Este campo es obligatorio";
                this.style.border = "1px solid red";
                errorDiv.style.border = "1px solid red";
                this.focus();
            }else{
                errorDiv.style.display = "none";
                this.style.border = "1px solid #cccccc";
            }
        }

       function calcularMontos(event){
           event.preventDefault();    
        if(regalo.value === ''){
            alert("Debes de elegir un regalo!.");
            regalo.focus();
        }else{
            var boletosDia = parseInt(pase_dia.value,10) || 0,
                boletosDosDias = parseInt(pase_dos_dias.value,10) || 0,
                boletosCompleto = parseInt(pase_completo.value,10) || 0 ,
                cantCamisas = parseInt(camisas.value,10) || 0 ,
                cantEtiquetas = parseInt(etiquetas.value,10) || 0 ;

            var totalPagar = (boletosDia * 30 ) + (boletosDosDias * 45) + (boletosCompleto * 50) + 
                            ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);
                              
            
            var listadoProductos = [];
            if(boletosDia>=1){
                listadoProductos.push(boletosDia + ' Pases por día');   
            }
            if(boletosDosDias >= 1){
                listadoProductos.push(boletosDosDias + ' Pases por 2 días');
            }
            if(boletosCompleto >= 1){
                listadoProductos.push(boletosCompleto + ' Pases completos');
            }
            if(cantCamisas >= 1){
                listadoProductos.push(cantCamisas + ' Camisas');
            }
            if(cantEtiquetas >= 1){
                listadoProductos.push(cantEtiquetas + ' Etiquetas');
            }

           lista_productos.style.display="block";
            lista_productos.innerHTML = '';
            for(var i = 0; i < listadoProductos.length; i++){
                lista_productos.innerHTML += listadoProductos[i] + '<br/>'
            }

            suma.innerHTML = "$ " + totalPagar.toFixed(2); /**toFixed(2) --> INDICA LA CANTIDAD DE DECIMALES 2 */                  

            botonRegistro.disabled = false;
            document.getElementById('total_pedido').value = totalPagar;
        }
       }

       function mostrarDias(event){
            var boletosDia = parseInt(pase_dia.value,10) || 0,
                boletosDosDias = parseInt(pase_dos_dias.value,10) || 0,
                boletosCompleto = parseInt(pase_completo.value,10) || 0;

            var diasElegidos = [];

            if(boletosDia > 0){
                diasElegidos.push('viernes');
            }
            if(boletosDosDias > 0){
                diasElegidos.push('viernes','sabado');
            }
            if(boletosCompleto > 0){
                diasElegidos.push('viernes','sabado','domingo');
            }

            var talleres = document.getElementsByClassName("talleres_ver");
            
            console.log(talleres);

            for(var i = 0; i < diasElegidos.length; i++){
                document.getElementById(diasElegidos[i]).style.display = 'block';
                talleres[0].style.display = 'block';
            }

            if(diasElegidos.length == 0){
                var todosDias = document.getElementsByClassName('contenido-dia');

                for (var i = 0; i < todosDias; i++) {
                    todosDias[i].style.display = 'none';            
                          
                }
            }
            
       }
    }
    });//DOM Content Loaded 
})();