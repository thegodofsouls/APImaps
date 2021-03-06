let map;
let geocoder;

function initialize() {
    //pegando a localizaçao atual
    if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(function(position1) {
                let pos = {
                    lat: position1.coords.latitude,
                    lng: position1.coords.longitude,
                };

                //serviço que vai calcular a rota
                let directionsService;
                directionsService = new google.maps.DirectionsService();

                //define a marcaçao principal de localizaçao do dispositivo atual
                let marker = new google.maps.Marker({
                    title: 'Localização Atual', //titulo que irá aparecer ao passar o cursor do mouse em cima da marcaçao principal
                    map: map, //define a imagem do marcador
                    position: new google.maps.LatLng(pos.lat, pos.lng) //posiçao das coordenadas de latitude e longitude
                });

                let options = {
                    zoom: 12, //zoom que o mapa vai receber
                    center: marker.position, //posiçao
                    mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa Roadmap = mapa de estrada
                };

                map = new google.maps.Map($('#map')[0], options);

                marker.setMap(map);

                loadMap();

                //traçando a rota
                $(document).ready(function() {
                    $('#form_route').submit(function() {
                        //info.close(); //vai fechar o balao de informaçao
                        marker.setMap(null);

                        //objeto que renderiza a rota
                        let directionsDisplay = new google.maps.DirectionsRenderer();

                        //contem as informaçoes da requisiçao que irá traçar a rota
                        let request = {
                            origin: $("#route_from").val(),
                            destination: marker.position,
                            travelMode: google.maps.DirectionsTravelMode.DRIVING //modos de transportes
                        };

                        //vai retornar a rota entre os dois endereços
                        directionsService.route(request, (response, status) => {
                            if (status == google.maps.DirectionsStatus.OK || request.origin != null) {
                                directionsDisplay.setDirections(response);
                                directionsDisplay.setMap(map);
                            }
                        });

                        return false;
                    });

                });

                console.log(position1);
            }, (error) => {
                console.log(error);
            }, {
                enableHighAccuracy: true,
                maximumAge: 20000,
                timeout: 20000
            }, )
            //navigator.geolocation.clearWatch(watcher)
    } else {
        alert('não foi possível encontrar a localização');
    }


}

const loadMap = () => {

    /* var sp = { lat: -23.5489, lng: -46.6388 };
     map = new google.maps.Map(document.getElementById('map'), {
         zoom: 10,
         center: sp
     });

     //marcador que vai aparecer no mapa
     var marker = new google.maps.Marker({
         position: sp,
         map: map
     }); */

    let cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();
    codeAddress(cdata)

    let allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllColleges(allData);

};

const showAllColleges = (allData) => {
    let infoWind = new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData, (data) => {
        let content = document.createElement('div');
        let strong = document.createElement('strong');
        strong.textContent = data.name;
        content.appendChild(strong);

        let marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat, data.lng),
            map: map
        });

        marker.addListener('click', () => {
            infoWind.setContent(content);
            infoWind.open(map, marker);
        });
        //fim

    });
};

const codeAddress = (cdata) => {
    Array.prototype.forEach.call(cdata, (data) => {
        let address = data.name + ' ' + data.address;
        geocoder.geocode({ 'address': address }, (results, status) => {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                let points = {};
                points.id = data.id;
                points.lat = map.getCenter().lat();
                points.lng = map.getCenter().lng();
                updateCollegeWithLatLng(points);
                //alert();
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    });
};

const updateCollegeWithLatLng = (points) => {
    //requisição ajax
    $.ajax({
        url: 'action.php',
        method: 'post',
        data: points,
        success: function(res) {
            console.log(res);
            location.reload();
        }
    })
};