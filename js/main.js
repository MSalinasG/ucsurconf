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

        function validarEmail(){
            if(this.value.indexOf("@") > -1){
                errorDiv.style.display = "none";
                this.style.border = "1px solid #cccccc";

                if(this.value.indexOf(".") > -1){
                    errorDiv.style.display = "none";
                this.style.border = "1px solid #cccccc";
                }else{
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Debe contener al menos un punto(.)";
                    this.style.border = "1px solid red";
                    errorDiv.style.border = "1px solid red";
                    this.focus();
                }

            }else{
                errorDiv.style.display = "block";
                errorDiv.innerHTML = "Debe contener al menos un arroba(@)";
                this.style.border = "1px solid red";
                errorDiv.style.border = "1px solid red";
                this.focus();
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
           var registro_val_checkbox = document.querySelector('.registro_val_checkbox:checked');           

           if(nombre.value == "" || apellido.value == ""  || email.value == ""){

                alert("Debes ingresar todos sus datos!.");
                if(nombre.value == ""){nombre.focus();}
                if(apellido.value == ""){apellido.focus();}
                if(email.value == ""){email.focus();}

            }else if(pase_dia.value == 0 && pase_completo.value == 0  && pase_dos_dias.value == 0){

                alert("Debes de elegir al menos un boleto!.");

            }else if(regalo.value === ''){

                alert("Debes de elegir un regalo!.");                 
                regalo.focus();

            }else if(registro_val_checkbox == null){
                alert("Debes seleccionar al menos un evento!.");
            }
            else{
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

            if(boletosDia == 0){       
                document.getElementById("viernes").style.display = 'none';            
            }

            if(boletosDosDias == 0){ 
                document.getElementById("viernes").style.display = 'none';   
                document.getElementById("sabado").style.display = 'none';            
            }

            if(boletosCompleto == 0){ 
                document.getElementById("viernes").style.display = 'none';   
                document.getElementById("sabado").style.display = 'none';
                document.getElementById("domingo").style.display = 'none';             
            }  

            if(boletosDia == 0 && boletosDosDias == 0 && boletosCompleto == 0){ 
                for (i=0;i<document.registro_reservacion.elements.length;i++){
                    if(document.registro_reservacion.elements[i].type == "checkbox"){
                        document.registro_reservacion.elements[i].checked=0
                    }
                }
            }

            for(var i = 0; i < diasElegidos.length; i++){
                
                document.getElementById(diasElegidos[i]).style.display = 'block';  

            }
       }
    }
    });//DOM Content Loaded 
})();
