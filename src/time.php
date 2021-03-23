<?php

function deliveryTime(){
    $localTime = date_create('now', new DateTimeZone('Europe/Brussels'))->format('G:i');
    $deliveryTime = date('G:i', strtotime('+1 hour', strtotime($localTime)));
    if (isset($_POST['express_delivery'])) {
        $deliveryTime = date('G:i', strtotime('+30 minutes', strtotime($localTime)));
    }
    return $deliveryTime;
}