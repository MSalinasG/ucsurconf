/*(function(){  
    'use strict';
    document.addEventListener('DOMContentLoaded',function(){
        //PONER MAPS EN PAGINA WEB
        var map = L.map('mapa').setView([-12.221402663498095, -76.97630177810473], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-12.221402663498095, -76.97630177810473]).addTo(map)
            .bindPopup('UcSurConf 2021<br>Bolestos disponibles')
            .openPopup()
            .bindTooltip('Estamos aquí!!')
            .openTooltip();
        });
            
})();*/