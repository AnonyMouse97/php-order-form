<?php

$inputNames = ['email', 'street', 'streetnumber', 'city', 'zipcode'];


foreach ($inputNames as $inputName) {
    if (isset($_POST[$inputName])) {
        if($inputName == 'email') {
            if (filter_var($_POST[$inputName], FILTER_VALIDATE_EMAIL)) {
                ${$inputName} = htmlspecialchars($_POST[$inputName]);
            }
            else {
                ${$inputName} = false;
            }
        }
        elseif ($inputName == 'streetnumber' || $inputName == 'zipcode') {
            if (is_numeric($_POST[$inputName])) {
                    ${$inputName} = htmlspecialchars($_POST[$inputName]);
                }
                else {
                    ${$inputName} = false;
                }
            }
                else {
            ${$inputName} = htmlspecialchars($_POST[$inputName]);  
        }    
    }  
    else {
        ${$inputName} = false;
    } 
}



if (isset($_POST['products']) && $_POST['products'] != 0) {
    $checkedProducts = $_POST['products'];
}else {
    $checkedProducts = [];
}