<?php
    require('header.php');
?>
<a href="../index.php">Voltar</a>

<div class="container">
       <?php

       require('../class/oficina.php');
       $o = new Oficina();
       $coll = $o->getOficinasLatLng();
       $coll = json_encode($coll, true);
       echo '<div id="data">'.$coll.'</div>';

       $allData = $o->getAllOficinas();
       $allData = json_encode($allData, true);
       echo '<div id="allData">'.$allData.'</div>';
    ?>
    <h1>Acesso a API do Google Maps com PHP e JS</h1>
    <form class="form-inline" method="post" id="form_route">
          <div class="form-group col-md-4">
            <label>Localize a sua loja desejada: </label>
            <input type="text" class="form-control" id="route_from" />
            <button type="submit" class="btn btn-primary ml-2" id="acao">Traçar rota</button>
          </div>
    </form><br>

    <!-- div que vai mostrar o mapa -->
    <div id="map"></div>
</div>
