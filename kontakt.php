<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontakt</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <style>
      /* Set the size of the div element that contains the map */
      #map {
        width: 800px;
        height: 400px;
       }
    </style>
<script>
    function initMap() {
        var mapOptions = {
            center: new google.maps.LatLng(44.7981873,20.4689813),
            zoom: 13,
            zoomControl: true,
            zoomControlOptions: { position: google.maps.ControlPosition.TOP_RIGHT }

        };
        var map = new google.maps.Map(document.getElementById("map"),mapOptions);
        var url = "http://localhost/ProdavnicaIgracaka/lokacije.json";
        var myloc = new Array();
        $.getJSON(url, function(lokacije) {
            $.each (lokacije.marker,function(i, marker){
                kreirajMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(marker.latitude,marker.longitude),
                    map: map,
                    title: marker.naziv
                });
            })
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<?php 

include 'meni.php';

?>

    <div id="content"> 
        <div class="container"> 
            <div class="col-md-12">                
               <ul class="breadcrumb">
                   <li>
                       <a href="pocetna.php">Početna</a>
                   </li>
                   <li>
                       Lokacije
                   </li>
               </ul>
           </div>
           <div class="col-md-3"> 
   <?php    
    include("saStrane.php");    
    ?>               
           </div>
           <div>
           <h3>Posetite nas</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC80FPohxzFb8SMh3nVKdHGzUtE8KmZ_SE&callback=initMap">
    </script>
           <div class="col-md-9"> 
        
        <p class="address mb-5">
          <em>
            <strong>Kneza Miloša 43</strong>
          </em>
        </p><p class="address mb-5">
          <em>
            <strong>Bulevar Kralja Aleksandra 53 </strong>
          </em>
        </p></p><p class="address mb-5">
          <em>
            <strong> Bulevar Oslobođenja 219</strong>
          </em>
        </p></p><p class="address mb-5">
          <em>
            <strong> Gospodara Vučića 78</strong>
          </em>
        </p>
        <p class="address mb-5">
          <em>
            <strong>Bulevar Mihajla Pupina 17</strong>
            <br> 11 000, BEOGRAD
          </em>
        </p>
        <p class="mb-0">
          <large>
            <em>Pozovite:</em>
          </large>
          <br>
          (+381) 11 3252-464<br>
          (+381) 64 564-23-86
        </p>
        <p class="mb-0">
          <large>
            <em><br>Imate neka pitanja za nas? Posaljite nam mejl:</em><br>
          </large>
          <a href="kontakt@knjizaraMS.rs">prodavnicaigracaka@knjizaraMS.rs</a>
        </p>
        </div>
      </div>
      </div>
        </div>
    </div>
</body>
</html>