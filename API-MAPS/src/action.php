<?php
    require('class/oficina.php');
    $o = new Oficina();
    $o->setId($_REQUEST['id']);
    $o->setLat($_REQUEST['lat']);
    $o->setLng($_REQUEST['lng']);
    $status = $o->updateOficinasLatLng();
    
    if($status == true)
    {
        echo 'Update...';
    }
    else
    {
        echo 'Failed...';
    }