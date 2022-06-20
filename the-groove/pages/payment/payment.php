<?php 
    $total = $_GET["dato1"];
    $idOrder = $_GET["dato2"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel = "icon" href = "./icons/credit-card.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/payment.css">
    <link rel="stylesheet" href="./css/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

</head>
<body class="black-scroll">

    <div class="row pl-10 pe-3 mt-5">
        <div class="col-12 col-sm-12 col-md-9 col-lg-8 col-xl-8 col-xxl-7">
            <!-- OXXO -->
            <div class="pt-2 ps-3 bg-gray pb-2">
                <div class="form-check">
                    <input class="form-check-input bg-black" type="radio" name="oxxo" id="oxxo" value="oxxo"/>
                    <label class="form-check-label text ms-2" for="oxxo"> OXXO </label>
                    <img class="img-icon" src="./icons/oxxo.svg" alt="OXXO">
                </div>
                <div class="mt-2 ps-5 mb-4" id="oxxo-info" hidden="true">
                    <label class="text ">REFERENCE</label>
                    <br>
                    <input class="input-r text ps-4" type="text" readonly placeholder="35481102556">
                </div>
            </div>
            <!-- CREDIT CARD -->
            <div class="mt-3 pt-2 ps-3 bg-gray pb-2">
                <div class="form-check">
                    <input class="form-check-input bg-black" type="radio" name="card" id="card" value="card"  />
                    <label class="form-check-label text  ms-2" for="credit-card"> Credit Card</label>
                    <img class="img-icon" src="./icons/visa.svg" alt="VISA">
                    <img class="img-icon" src="./icons/mastercard.svg" alt="mastercard">

                </div>
                <div class="mt-2 ps-5 row mb-4" id="credit-info" hidden="false">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
                        <form action="">
                            <label class="title-inter-12 mt-2" for="">Cardholder name:</label><br>
                            <input class="input-r text ps-4 w-75" type="text" placeholder="Cardholder name" required>
                            <br>
                            <label class="title-inter-12 mt-2" for="">Card number:</label><br>
                            <input class="input-r text ps-4 w-75" type="text" minlength="16" maxlength="16" placeholder="card number" required>
                            <br>
                            <label class="title-inter-12 mt-2" for="">Expiration date</label><label class="title-inter-12 mt-2 ms-25" for="">Security code:</label><br>
                            <input class="input-r text ps-4 w-50 " type="month"  placeholder="expiration date" required>

                            <input class="input-r text ps-4 w-25" type="text" minlength="3" maxlength="3" placeholder="CVV" required>
                        </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4">
                        <img src="./icons/card.svg" alt="" class="w-100 pe-5">
                    </div>
                   
                </div>

            </div>

            <!-- MAPA -->
            <div class="mt-3 pt-2 ps-5 pb-5 mb-5 pe-5 w-100 bg-gray">
            <div class="text-center">
                <h5 class="text  mt-2 pb-1 pt-1 fw-bold"> Delivery Address</h5>
                <div class="col-10 title-inter-12 mt-2 ms-5">
                    Search: <input id="autocomplete" style="border: groove;" class=" white-input" placeholder="Enter your address" onFocus="geolocate()" type="text" autocomplete="off"/>
                </div>
            </div>
                <div class="container rounded shadow my-3 p-3 title-inter-12 mt-3">
                    <div class="row">
                        <div class="col-12 col-md-6 mt-2">
                        Street: <input id="route" name="route" class="white-input" required />
                        </div>
                        <div class="col-12 col-md-6 mt-2">
                        No: <input id="street_number" name="street_number" required class="white-input"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mt-2">
                        City: <input id="locality" required class="white-input"/>
                        </div>
                        <div class="col-12 col-md-6 mt-2">
                        State: <input id="administrative_area_level_1" required class="white-input"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mt-2">
                        CP: <input id="postal_code" required class="white-input"/>
                        </div>
                        <div class="col-12 col-md-6 mt-2">
                        Country: <input id="country" class="white-input"/>
                        <input type="hidden" name="latitud" id="latitud">
                        <input type="hidden" name="longitud" id="longitud">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div id="map"></div>
                </div>
            </div>
        </div>
        <!-- INFO PAGO -->
        <div class="col-11 col-sm-11 col-md-2 col-lg-3 col-xl-3 col-xxl-3 bc-black ">
            <div class="text-center">
                <h5 class="title-inter bg-dark text-white mt-2 pb-1 pt-1"> Order summary</h5>
            </div>
            <label class="text ms-2 mt-2"> <strong>No. Order:</strong> <label class="ms-4"><?=$idOrder?></label></label>
            <br>
            <label class="text ms-2"> <strong>Subtotal:</strong> <label class="ms-5">$<?=$total?></label></label>
            <br>
            <label class="text ms-2"> <strong>Shipping cost:</strong> <label class="ms-2">$200</label></label><br>
            <label class="text ms-2 mt-4"> <strong>Total to pay: <label for="">$<?=$total + 200?></label></strong></label>
            <a href="?seccion=payment&amp;accion=finish&idOrder=<?=$idOrder?>"> 
                <button type="submit" class="btn bg-dark radius-l radius-r text-white title-inter-12 btnFinish " >FINISH</button>
            </a>

        </div>
    </div>
    <script>
        document.querySelector('input[name=oxxo]').addEventListener("click", function(){
            hiddenInfo("oxxo")
        })

        document.querySelector('input[name=card]').addEventListener("click", function(){
            hiddenInfo("card")
        })

        function hiddenInfo(value){
            if(value == "oxxo")
            {
                document.getElementById("card").checked = false
                document.getElementById("oxxo-info").hidden = false;
                document.getElementById("credit-info").hidden = true;
            }else{
                document.getElementById("oxxo").checked = false
                document.getElementById("credit-info").hidden = false;
                document.getElementById("oxxo-info").hidden = true;
            }
        }

        //MAPA
        var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
    var coordenadas = {  lat: 21.152639, lng:  -101.711598 };
    var propiedades = {
        center: coordenadas,
        zoom: 12
    };
    function initAutocomplete() {
    map = new google.maps.Map(document.getElementById('map'),propiedades);
    const options = {
      fields: ["formatted_address", "geometry", "name"],
      strictBounds: false,
      types: ["establishment"],
    };
    
        var autocompletado = document.getElementById('autocomplete');
        autocomplete = new google.maps.places.Autocomplete(autocompletado, options);
        autocomplete.bindTo("bounds", map);
        autocomplete.setFields(['address_component','geometry']);
        autocomplete.addListener('place_changed', obtieneDatos);
        
    }
  function obtieneDatos() {
    var place = autocomplete.getPlace();
    console.log(place);
    console.log('Resultado: ' + place.geometry);
    var marker = new google.maps.Marker({
        position: place.geometry.location,
        map: map
    });
    console.log('Location' + place.geometry.location);
    map.panTo(place.geometry.location);
    map.setZoom(18);
    map.setCenter(place.geometry.location);
    console.log(place.address_components);
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      console.log(addressType);
      if (componentForm[addressType]) {
        var val = place.address_components[i]['long_name'];
        document.getElementById(addressType).value = val;
      }
    }
  }
 
    function geolocate() {
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
            };
            var circle = new google.maps.Circle(
                {
                  strokeColor: '#FF0000',
                strokeOpacity : 0.8,
                strokeWeight : 2,
                fillColor: '#FF0000',
                fillOpacity : 0.35,
                map: map,
                center: geolocation, 
                radius: position.coords.accuracy}
                );
            console.log(circle.getBounds());
            autocomplete.setBounds(circle.getBounds());
        });
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMrQgga-C5zCuZLTVk2MPVzX7naqKZXZU&libraries=places&callback=initAutocomplete" async defer></script>

</body>
</html>