<html>
<head>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
<div id="map"></div>
<style>
#map {
  width: 100%;
  height: 100%;
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
        var map = L.map('map').setView([51.505, -0.09], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
        }).addTo(map);
<?php
$file = file('map_data.csv');
$count = 0;
foreach($file as $line) {
        $data = explode(',',$line);
        if($data[0]!=='lat') {
                echo 'var marker'.$count.' = L.marker(['.$data[0].','.$data[1].']).bindPopup(\''.$data[3].'\').addTo(map);'."\n";
                $count++;
        }
}
?>
});
</script>


</body>
</html>
