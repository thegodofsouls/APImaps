<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style.css">
    <title>API - PHP</title>
</head>
<body>
<div class="container">
    <center><h1>Acesso a API do Google Maps no PHP</h1></center>
    <?php
       require('class/oficina.php');
       $o = new Oficina();
       $coll = $o->getOficinasLatLng();
       $coll = json_encode($coll, true);
       echo '<div id="data">'.$coll.'</div>';

       $allData = $o->getAllOficinas();
       $allData = json_encode($allData, true);
       echo '<div id="allData">'.$allData.'</div>';
    ?>
    <form action="" method="post" id="form_route">
        <label>Localize a sua loja desejada: <input type="text" id="route_from"  size="50" /></label>
        <input type="submit" value="Traçar rota" />
    </form><br>
    <div id="map"></div>
</div>
<script async defer 
src="https://maps.googleapis.com/maps/api/
js?key=AIzaSyAbi65K7PefZP5cYBJeDr2MsiTJx089WPI&callback=initialize">
</script>
<script src="js/jquery.min.js"></script>
<script src="js/googlemap.js"></script>
</body>
</html>