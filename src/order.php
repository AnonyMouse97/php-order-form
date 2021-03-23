<?php

function getPrice($checkedProducts, $products){
    $orderValue = 0;
    if (isset($_POST['express_delivery'])) {
        $orderValue += $_POST['express_delivery'];
    }

    foreach($checkedProducts as $i => $checkedProduct){
        if ($checkedProduct > 0) {
            $orderValue += $checkedProduct * $products[$i]['price'];
        }     
    }
    return $orderValue;
}
