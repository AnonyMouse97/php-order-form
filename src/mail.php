<?php
$message = 'congrats it works !' ;
if (isset($_SESSION['email'], $_SESSION['street'], $_SESSION['streetnumber'],$_SESSION['city'],$_SESSION['zipcode'])) {
    //echo  $_SESSION['email'];
    mail('samuel.le.belgique@gmail.com', 'Your pizza order !', $message);
}