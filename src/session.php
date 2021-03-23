<?php
if (!empty($_POST)) {
    $_SESSION['email'] = $email;
    $_SESSION['street'] = $street;
    $_SESSION['streetnumber'] = $streetnumber;
    $_SESSION['city'] = $city;
    $_SESSION['zipcode'] = $zipcode;
}

function displaySession($value){
    if (isset($_SESSION[$value])) {
        return $_SESSION[$value];
    }
    else {
        $value = "";
    }
}